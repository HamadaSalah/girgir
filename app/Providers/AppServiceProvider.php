<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\WebsiteInfo;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $website_info = WebsiteInfo::first();

        $global_categories = Category::take(5)->get();

        View::share('website_info', $website_info);
        View::share('global_categories', $global_categories);
    }
}
