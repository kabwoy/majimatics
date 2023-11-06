<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

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
    public function boot(Request $request): void
    {
        //
        
       Facades\View::composer('*' , function(View $view){
        $totalQuantity = 0;
        $userId = request()->user()->id ?? null;

        if(!$userId){
            return redirect('/auth/login');
        }
        $cart = Cart::where('userId' , $userId)->first();

        if(!$cart) {
            Facades\View::share('qty' , 0);
            return;
        } 

        $cartItems = CartItem::where('cartId' ,$cart->id)->with('product')->get();

        if(count($cartItems) <= 0)  return view('shop.cart' , ['products' => []]);

        foreach($cartItems as $c){

            $totalQuantity =  $totalQuantity + $c->quantity;
        }

        Facades\View::share('qty' , $totalQuantity ?? '0');
        // Facades\View::share('qty' ,  $view->quantity);
        

       });

    }
}
