<?php

namespace App\Providers;

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

        View::share('website_info', $website_info);
    }
}
