<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use App\Brand;
use App\Category;
use App\Wishlist;
use App\Cart;
use View;

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
        Schema::defaultStringLength(191);    

        View::composer('frontend.master', function( $view )
        {
            $brands = Brand::all();
            $categories = Category::all();
             if (Auth::check()) {   
                $wishlists = Wishlist::where('user_id', Auth::user()->id)->count();
                $carts = Cart::where('user_id', Auth::user()->id)->count();
            } else {
                $wishlists = 0;
                $carts = 0;
            }
            
            //pass the data to the view
            $view->with(compact('brands', 'categories', 'wishlists', 'carts'));
            
        });
    }
}
