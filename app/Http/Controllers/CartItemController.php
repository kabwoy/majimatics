<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;

class CartItemController extends Controller
{
    //

    public function updateQuantity(Request $request , $id){
        $item = CartItem::find($id);
        $item->update(['quantity' => $item->quantity + 1]);
        return response(['message' => 'quantity updated'] , 200);
        
    }

    public function decrementQuantity(Request $request , $id){

        $item = CartItem::find($id);
        $item->update(['quantity' => $item->quantity - 1]);
        return response(['message' => 'quantity updated'] , 200);
        
    }

   
}
