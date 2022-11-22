<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use App\Product;
use App\Purchase;

class ProductController extends Controller
{

    public function index(){
        $products = Product::with('store')->select('*')->get();
        return view('admin.products.index',['products' => $products]);
    }

    public function create(){
        $stores = Store::all();
        return view('admin.products.create',['stores' => $stores]);
    }


    public function store(Request $request){

        $product = new Product();
        $product->name = $request['name'];
        $product->description = $request['description'];
        $product->base_price = $request['base_price'];
        $product->discount_price = $request['discount_price'];
        $product->store_id = $request['store_relation'];
        $product->flag = $request['flag'] == "base_price" ? "base_price" : "discount_price";
        $product->save();

        return redirect()->back()->with('message','Product Created Successfully');

    }


    public function destroy($id){
        Product::findOrFail($id)->delete();
        return redirect()->back();
    }


    public function show($id){
        $product = Product::with('store')->findOrFail($id);
        $img_link = asset('uploads/images/'.$product->store['logo']);
        $product->store->logo = $img_link;
        $purchases_count = Purchase::select('*')->where('product_id',$id)->count();
        return view('admin.products.show',['product' => $product,'purchases_count' => $purchases_count]);
    }


    public function edit($id){
        $product = Product::findOrFail($id);
        $stores = Store::all();
        return view('admin.products.edit',['product' => $product,'stores' => $stores]);
    }


    public function update($id,Request $request){

        $product = Product::find($id);
        $product->name = $request['name'];
        $product->description = $request['description'];
        $product->base_price = $request['base_price'];
        $product->discount_price = $request['discount_price'];
        $product->store_id = $request['store_relation'];
        $product->flag = $request['flag'] == "base_price" ? "base_price" : "discount_price";
        $product->save();

        return redirect()->back()->with('message','Product Updated Successfully');

    }

}
