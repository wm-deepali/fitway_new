<?php

namespace App\Providers;
use App\Models\AboutUs;
use App\Models\Logo;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        View::composer('layouts.front', function ($view) {
            $pageKey = \Illuminate\Support\Facades\Route::currentRouteName() ?? 'home';
            $pageKey = $pageKey === 'locate-us' ? 'locate-us' : $pageKey; // route names already match page_key values

            $view->with([
                'siteLogo' => Logo::where('status', 'active')->first(),
                'footerAbout' => AboutUs::where('status', 'active')->first(),
                'seo' => \App\Models\SeoSetting::where('page_key', $pageKey)->first(),
            ]);
        });
    }
}