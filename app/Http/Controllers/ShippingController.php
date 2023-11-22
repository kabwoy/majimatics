<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShippingController extends Controller
{
    //
    public function createShipping(Request $request){
        dd($request->all());
    }
}
