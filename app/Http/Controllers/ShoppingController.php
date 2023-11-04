<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class ShoppingController extends Controller
{
    //
    public function index(){
        $products = Product::all();
        return view('shop.index' , ['products' => $products]);
    }

    public function show(Request $request , $id){
        $product =  Product::where('id' , $id)->with('category')->first();
       return view('shop.show' , ['product' => $product]);
    }
    public function addToCart(Request $request){
        $userId =  $request->user()->id;
        $validator = $request->validate([
            'productId' => 'required|integer',
        ]);
        $cart = Cart::where('userId' , $userId)->first();
        //return $cart;
        if(!$cart){
            $newCart = Cart::create([
                'userId' => $userId
            ]);

            CartItem::create(['productId' => $validator['productId'] , 'quantity' => 1 , 'cartId' => $newCart->id]);

            return redirect("/shop/products")->with('cart' , 'Item Added Successfully in Cart');
        }
        $existingProduct = DB::table('cart_items')->where([['productId' , '=' , $validator['productId'] ] , ['cartId' , '=' , $cart->id ]])->get();
        if(count($existingProduct) > 0 ) {
            DB::table('cart_items')->where('id' , '=' , $existingProduct[0]->id)->update(['quantity' => $existingProduct[0]->quantity + 1]);
            return redirect("/shop/products")->with('qty' , 'Item Added Successfully');
        }

        CartItem::create(['productId' => $validator['productId'] , 'quantity' => 1 , 'cartId' => $cart->id]);
            return redirect("/shop/products")->with('cart' , 'Item Added Successfully in Cart');
        
    }

    public function getCart(Request $request){
        $totalQuantity = 0;

        $userId = $request->user()->id;

        $cart = Cart::where('userId' , $userId)->first();

        if(!$cart) {
           
            $newCart = Cart::create([
                'userId' => $userId
             ]);
            return redirect('/shop/products/getcart');  
        }

        $cartItems = CartItem::where('cartId' ,$cart->id)->with('product')->get();

        if(count($cartItems) <= 0)  return view( 'shop.cart' , ['products' => []]);

        foreach($cartItems as $c){

            $totalQuantity =  $totalQuantity + $c->quantity;
        }
    
        return view( 'shop.cart' , ['products' => $cartItems]);

    }

}
