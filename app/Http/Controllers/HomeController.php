<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Service;
use App\Models\ServiceProvider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $categories = Category::take(5)
            ->get();

        $packages = Service::where('type', 'package')
            ->with('features')
            ->take(3)
            ->get();

        $most_requested_packages = Service::where('type', 'package')
            ->withCount('orders')
            ->orderBy('orders_count', 'desc')
            ->take(3)
            ->with(['createdBy' , 'features','feedbacks'])
            ->get();

        $best_shops = ServiceProvider::withCount(['services as services_orders_count' => function ($query) {
                $query->withCount('orders');
            }])
            ->orderBy('services_orders_count', 'desc')
            ->take(3)
            ->with('feedbacks', 'user')
            ->get();

        $trendy_packages = Service::where('type', 'package')
            ->whereHas('orders')
            ->withCount('orders')
            ->orderBy('orders_count', 'desc')
            ->take(3)
            ->get();

    if ($trendy_packages->isEmpty()) {
        $trendy_packages = Service::where('type', 'package')
            ->inRandomOrder()
            ->take(3)
            ->with('createdBy', 'feedbacks')
            ->get();
    }


        return view('home', compact('categories' , 'packages', 'most_requested_packages', 'best_shops', 'trendy_packages'));
    }
}
