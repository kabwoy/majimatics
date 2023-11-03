<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('admin.products.index' , ['products' => $products]);
    }

    public function create(){
        $SIZES = ['SMALL' , 'MEDIUM', 'LARGE'];
        $categories = Category::all();
        return view('admin.products.new' , ['sizes' => $SIZES , 'categories' => $categories]);
    }
    public function store(Request $request){
        $productValidator = $request->validate([
            'product_name' => 'required|string',
            'price' => 'required|integer',
            'quantity' => 'required|integer',
            'size' =>'required|string',
            'categoryId' =>'required|integer',
            'image' => 'required|string'
        ]);
        Product::create($productValidator);
        return redirect('admin/products');
    }
    public function show(Request $request , $id){
        $product =  Product::find($id);
       return view('admin.products.show' , ['product' => $product]);
    }

    public function edit(Request $request , $id){
        $SIZES = ['SMALL' , 'MEDIUM', 'LARGE'];
        $product =  Product::find($id);
        $categories = Category::all();
        return view('admin.products.edit' , ['product' => $product ,'categories' => $categories ,'sizes' => $SIZES ]);
    }
    public function update(Request $request , $id){
        $productValidator = $request->validate([
            'product_name' => 'required|string',
            'price' => 'required|integer',
            'quantity' => 'required|integer',
            'size' =>'required|string',
            'categoryId' =>'required|integer',
            'image' => 'required|string'
        ]);

        $product =  Product::find($id);

        $product->update($productValidator);

        return redirect('/admin/products')->with('updated' , $product->product_name . ' updated successfull ');
    }
    public function delete(Request $request , $id){

        $product = Product::find($id);
        $product->delete();
        return redirect('/admin/products')->with('deleted' , $product->product_name . ' deleted successfull ');
    }
}
