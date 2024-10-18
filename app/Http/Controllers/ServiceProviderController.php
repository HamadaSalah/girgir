<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ServiceProvider;
use Illuminate\Http\Request;

class ServiceProviderController extends Controller
{
    public function index(ServiceProvider $provider)
    {
        $provider->load('packages','servicesItems' , 'servicesItems' , 'feedbacks');

        $is_featured_packages = $provider->packages()->where('is_featured',1)->take(5)->get();

        if($is_featured_packages->count() < 5)
        {
            $is_featured_packages = $provider->packages()->take(5)->get();
        }


        // dd($provider , $is_featured_packages);
    }

    public function reviews(ServiceProvider $provider)
    {
        $provider->load('feedbacks','feedbacks.user');

        dd($provider);
    }

    public function packages(Request $request, ServiceProvider $provider)
    {
        $categories = Category::all();

        if($request->has('category_id'))
        {
            $provider->load(['packages' => function($query) use ($request){
                $query->where('category_id', $request->category_id);
            }]);
        }else{
        $provider->load('packages');
        }

        dd($provider);
    }

    public function services(ServiceProvider $provider)
    {
        $provider->load('servicesItems');

        dd($provider);
    }

    public function location(ServiceProvider $provider)
    {
        $provider->load('info');

        dd($provider);
    }

    public function about(ServiceProvider $provider)
    {
        $provider->load('info' , 'user');

        $topRatedFeedback = $provider->feedbacks()->orderBy('rating', 'desc')->with('user')->first();
        $provider->topRatedFeedback = $topRatedFeedback;

        return view('provider.about', compact('provider'));
    }
}
