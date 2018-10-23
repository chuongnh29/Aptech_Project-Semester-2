<?php

namespace App\Providers;

use App\ProductType;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('header', function ($view) {
            $loai_sp_nam = ProductType::where('type', 0)->get();
            $view->with('loai_sp_nam', $loai_sp_nam);
        });

        view()->composer('header', function ($view1) {
            $loai_sp_nu = ProductType::where('type', 1)->get();
            $view1->with('loai_sp_nu', $loai_sp_nu);
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
