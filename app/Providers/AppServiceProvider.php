<?php

namespace App\Providers;

use App\Models\GeneralSetting;
use App\Models\ProductCategory;
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
                'generalSettings' => GeneralSetting::first(),
            ]);
        });
    }
}