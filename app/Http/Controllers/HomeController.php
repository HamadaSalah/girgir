<?php

namespace App\Http\Controllers;

use App\Filters\PackagesFilter;
use App\Models\Category;
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
            $trendy_packages = Package::where('type', 'package')->inRandomOrder()->take(3)->with('createdBy', 'feedbacks')->get();
        }


        return view('home', compact('categories' ,  'most_requested_packages', 'best_shops', 'trendy_packages'));
    }


    /**
     * @return Application|Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function search()
    {

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

        return view('show-providers', ['provider' => $provider]);
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

}
