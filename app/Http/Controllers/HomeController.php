<?php

namespace App\Http\Controllers;

use App\Filters\PackagesFilter;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Package;
use App\Models\Provider;
use App\Models\Service;
use App\Models\ServiceProvider;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;

class HomeController extends Controller
{
    /**
     * @param Request $request
     * @return Application
     */
    public function index(Request $request)
    {
        $categories = Category::take(5)->get();

        $most_requested_packages = Package::with('files')->take(10)->orderBy('order_count', 'desc')->get();


        $best_shops = Provider::withCount(['services as services_order_count' => function ($query) {
                $query->withCount('orders');
            }])
            ->orderBy('services_order_count', 'desc')->take(3)->get();

        $trendy_packages = Package::take(10)->orderBy('order_count', 'desc')->get();


        if ($trendy_packages->isEmpty()) {
            $trendy_packages = Package::inRandomOrder()->take(3)->with('createdBy', 'feedbacks')->get();
        }


        return view('home', compact('categories' ,  'most_requested_packages', 'best_shops', 'trendy_packages'));
    }


    /**
     * @return Application|Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function search()
    {

        // dd(request()->all());
        $query = Package::with('services');

        $query = app(Pipeline::class)->send($query)->through([
            PackagesFilter::class
        ])->thenReturn();

        $packages = $query->get();


        $serviceIds = $packages->pluck('services.*.id')->flatten()->unique();

        // Now retrieve all services by those IDs and eager-load the packages relationship
        $services = Service::whereIn('id', $serviceIds)->with('packages')->get();

        // dd($services[0]->packages[0] );

        return view('search', ['packages' => $packages, 'services' => $services]);
    }


    /**
     * @return Application|Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function providers() {
        return view('providers', ['best_shops' => Provider::with('package.files')->get()]);
    }

    /**
     * @param Provider $provider
     * @return Application|Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function showProvider(Provider $provider) {

        $provider->load(['packages']);
        $services = $provider->load('packages.services')
        ->packages
        ->flatMap(function ($package) {
            return $package->services;
        });

        return view('show-providers', ['provider' => $provider, 'services' => $services]);
    }

    /**
     * @param Provider $provider
     * @return Application|Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function providerPackage(Provider $provider) {


        $categories = Category::whereHas('packages', function ($query) use ($provider) {
            $query->where('provider_id', $provider->id);
        })->with(['packages' => function ($query) use ($provider) {
            $query->where('provider_id', $provider->id);
        }])->get();

        // $categories = Category::all();

        // if($request->has('category_id'))
        // {
        //     $provider->load(['packages' => function($query) use ($request){
        //         $query->where('category_id', $request->category_id);
        //     }]);
        // }else{
        // $provider->load('packages');
        // }

        // $provider->load(['packages']);

        return view('provider.packages', ['categories' => $categories, 'provider' => $provider]);
    }

    /**
     * @param Request $request
     * @param Category $category
     * @return Application|Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function category(Request $request,Category $category)
    {
        $category->load('packages');

        $serviceIds = $category->packages->pluck('services.*.id')->flatten()->unique();

        $services = Service::whereIn('id', $serviceIds)->with('packages')->get();

        return view('category.show', ['packages' => $category->packages, 'services' => $services]);
    }

    public function showPackage(Package $package){


        return view('package', ['package' => $package]);
    }

    public function addToCard(Request $request) {

        if($request->add_to_card) {

            $package = Package::find($request->package);
            $package->carts()->create([
                'user_id'=>auth()->user()->id,
                "time_from" => $request->time_from,
                "time_to" => $request->time_to,
                "location" => $request->location,
                "notes" => $request->notes,
                "phone_numbers" => $request->phone_numbers,
            ]);
        }
        else {

        }

        return redirect()->route('myCart');

    }

    public function myCart() {
        $carts = Cart::with('cartable')->where('user_id', auth()->user()?->id)->get();

        return view('carts', compact('carts'));
    }

    public function deleteMyCart(Cart $cart) {

        $cart->delete();
        return redirect()->back();

    }

    public function aboutProvider(Provider $provider) {
        return view('about-provider', compact('provider'));
    }

    public function checkout() {

        $carts = Cart::with('cartable')->where('user_id', auth()->user()?->id)->get();
        $totalCost = Cart::with('cartable')
        ->where('user_id', auth()->user()?->id)
        ->get()
        ->sum(function($cart) {
            return $cart->cartable->cost;
        });

        if($carts->count() > 0) {
              $order = Order::create([
                'user_id'=> auth()->user()->id,
                'provider_id'=> $carts[0]->cartable->provider->id,
                "date_from" => $carts[0]->time_from,
                "date_to" => $carts[0]->time_to,
                "location" => $carts[0]->location,
                "notes" => $carts[0]->notes,
                "phone_numbers" => $carts[0]->phone_numbers,
                "total" => $totalCost ?? 0,
                "gender" => $carts[0]->gender,
            ]);

            foreach($carts as $cart){
                $order->items()->create([
                    'orderable_type' => $cart->cartable_type,
                    'orderable_id' => $cart->cartable_id,
                ]);
                $cart->delete();
            }
         }

        return redirect()->route('home')->With('success', 'Order Successfully');
    }
    public function orders() {
        $orders = Order::where('user_id', auth()->user()->id)->get();
        return view('orders', compact('orders'));
    }

    public function orderDetails(Order $order) {

        return view('order_details', compact('order'));
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('home');
    }

}
