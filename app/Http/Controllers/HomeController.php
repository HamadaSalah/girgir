<?php

namespace App\Http\Controllers;

use App\Filters\PackagesFilter;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Chat;
use App\Models\CouponCode;
use App\Models\Message;
use App\Models\Order;
use App\Models\Package;
use App\Models\Provider;
use App\Models\Service;
use App\Models\ServiceProvider;
use App\Models\ServicesToPackage;
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

        $chat = Chat::with('messages')->where('user_id', auth()->user()->id)->where('provider_id', $provider->id)->first();


        return view('show-providers', ['provider' => $provider, 'services' => $services, 'chat' => $chat]);
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

        $another_Service = ServicesToPackage::where('package_id', $package->id)->where('user_id', auth()->user()->id)->get();
        $services = $package->provider->packages->pluck('services')->flatten()->unique() ;
        return view('package', ['package' => $package, 'services' => $services, 'another_Service' => $another_Service,
                    'an_service' => Service::take(30)->get()]);
    }

    public function addToCard(Request $request) {

        $discount = NULL;

        if($request->coupon_code) {
            $coupon_code = CouponCode::where('code', $request->coupon_code)->first();
            if($coupon_code) {
                $discount = $coupon_code->dicount;
            }
        }

        if($request->add_to_card) {
            $package = Package::find($request->package);
            $package->carts()->create([
                'user_id'=>auth()->user()->id,
                "time_from" => $request->time_from,
                "time_to" => $request->time_to,
                "location" => $request->location,
                "notes" => $request->notes,
                "phone_numbers" => $request->phone_numbers,
                'discount' => $discount
            ]);
        }
        return redirect()->route('myCart');

    }

    public function myCart() {

        $carts = Cart::with('cartable')->where('user_id', auth()->user()?->id)->get();
        $totalCost = Cart::with('cartable')
        ->where('user_id', auth()->user()?->id)
        ->get()
        ->sum(function($cart) {
            return $cart->cartable->cost;
        });


        return view('carts', compact('carts', 'totalCost'));
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

    public function orderDetails($invoice_number) {

        $order =  Order::where('user_id', auth()->user()->id)->where('invoice_number', $invoice_number)->first();
        return view('order_details', compact('order'));
    }

    public function addServicesToPackage(Request $request) {
       $data =  $request->validate([
            'service_id' => 'required',
            'package_id' => 'required'
        ]);

        ServicesToPackage::create([
            'service_id' => $request->service_id,
            'package_id' =>  $request->package_id,
            'another' =>  $request->another ?? NULL,
            'user_id' =>auth()->user()->id
        ]);
        return redirect()->back();

    }   
    public function DeleteFromANother($id) {
   

        $ser = ServicesToPackage::findOrFail($id);

        $ser->delete();
        return redirect()->back();
    }


    public function sendMessage(Request $request) {

        $request->validate([
            'user_id' => 'required|integer',
            'provider_id' => 'required|integer',
            'message' => 'required|string',
        ]);
    
        // Process the data, e.g., save it to the database
        // Example:
        $data = [
            'user_id' => $request->user_id,
            'provider_id' => $request->provider_id,
            'message' => $request->message,
        ];
  
        $chat = Chat::where('user_id', $request->user_id)->where('provider_id', $request->provider_id)->first();

        if(!$chat) {
            $chat = Chat::create([
                'user_id' => $request->user_id,
                'provider_id' => $request->provider_id,    
            ]);
        }
        
        
        // Assuming you save it to a model or do further processing
        Message::create([
            'chat_id' => $chat->id,
            'message' => $request->message,
            'sender_id' => $request->sender_id ?? 'guest'
        ]);
    
        return response()->json(['success' => true, 'message' => 'Request sent successfully!']);
    
    }
}
