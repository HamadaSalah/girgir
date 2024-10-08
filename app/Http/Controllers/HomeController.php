<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Package;
use App\Models\Provider;
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
}
