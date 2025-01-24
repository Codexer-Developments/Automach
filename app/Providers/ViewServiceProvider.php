<?php

namespace App\Providers;

use App\Models\BodyType;
use Illuminate\Support\ServiceProvider;
use App\Models\Brand;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            // Fetch the last 5 brands
            $recentBrands = Brand::latest()->take(5)->get();

            // Fetch the last 5 body types
            $recentBodyTypes = BodyType::latest()->take(5)->get();

            // Share both variables with all views
            $view->with([
                'recentBrands' => $recentBrands,
                'recentBodyTypes' => $recentBodyTypes,
            ]);
        });
    }
}
