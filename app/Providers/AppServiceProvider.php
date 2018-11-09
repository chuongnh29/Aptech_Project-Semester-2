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
            $loai_sp_nu = ProductType::where('type', 1)->get();
            $view->with(['loai_sp_nam' => $loai_sp_nam, 'loai_sp_nu' => $loai_sp_nu]);

        });
        view()->composer(['header', 'pages.dathang'], function ($view) {
            if (Session('cart')) {
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $view->with(['cart' => Session::get('cart'), 'product_cart' => $cart->items, 'totalPrice' => $cart->totalPrice, 'tolalQty' => $cart->totalQty]);
            }
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
