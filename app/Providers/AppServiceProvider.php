<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Category;
use App\FoodType;
use Cart;

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
        view()->composer('client.layouts.header',function($view)
        {
            $types = FoodType::all();
            $cart = Cart::content();
            $total = Cart::subtotal();
            $view->with(['types' => $types, 'cart' => $cart, 'total' => $total]);
        });
        // view()->composer('client.pages.categories',function($view)
        // {
        //     $types = FoodType::all();
        //     $view->with('types', $types);
        // });

        // view()->composer('client.pages.list',function($view)
        // {
        //     $types = FoodType::all();
        //     $view->with('types', $types);
        // });
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
