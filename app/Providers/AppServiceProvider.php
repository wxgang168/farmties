<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        view()->composer('pages.dashboard.index', function($view) {
            $view->with('commodities', \App\Commodity::where('archived', 0)->latest()->get());
        });

        view()->composer('pages.index', function($view) {
            $view->with('services', \App\Service::where('archived', 0)->oldest()->get());
        });

        view()->composer('pages.index', function($view) {
            $view->with('sliders', \App\Slider::where('archived', 0)->latest()->get());
        });

        view()->composer('partials.public.top-nav', function($view) {
            $view->with('abbreviations', \App\Abbreviation::where('archived', 0)->latest()->get());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
