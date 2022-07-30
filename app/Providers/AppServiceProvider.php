<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Support\ServiceProvider;
use App\Models\ProductType;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    


    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {													
        view()->composer('layouts.header', function ($view) {							
            $loai_sp = ProductType::all();							
            $view->with('loai_sp', $loai_sp);				
            });
        view()->composer(['admin.product.create', 'admin.product.edit'], function ($view) {								
            $types = ProductType::get();
            $view->with("types", $types);
         });
        view()->composer('layouts.header', function ($view) {
            if (Session('cart')) {
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $view->with(['cart' => Session::get('cart'), 'product_cart' => $cart->items, 'totalPrice' => $cart->totalPrice, 'totalQty' => $cart->totalQty]);
            }
        });
    }								
}
