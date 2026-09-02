<?php

namespace App\Providers;

use App\Models\GeneralSetting;
use App\Models\ProductCategory;
use App\View\Composers\SeoComposer;
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
        View::composer('layouts.app', function ($view) {
            $view->with([
                'headerCategories' => ProductCategory::active()->orderBy('id')->get(),
                'generalSettings'  => GeneralSetting::first(),
            ]);
        });

        View::composer([
            'front.home',
            'front.about-us',
            'front.contact-us',
            'front.faqs',
            'front.portfolio',
            'front.blogs',
            'front.commercial-gym-setup',
            'front.home-gym-setup',
            'front.outdoor-gym-setup',
            'front.resorts-gym-setup',
            'front.corporate-gym-setup',
            'front.products',
        ], SeoComposer::class);
    }
}