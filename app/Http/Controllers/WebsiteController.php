<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use App\Product;
use App\Purchase;

class WebsiteController extends Controller
{
    public function index(){
        $stores = Store::limit(3)->get();
        $products = Product::with('store')->select('*')->limit(3)->get();

        foreach($stores as $store){
            $img_link = asset('uploads/images/'.$store->logo);
            $store->logo = $img_link;
        }

        return view('welcome',['stores' => $stores,'products' => $products]);
    }


    public function stores(){
        $stores = Store::all();
        foreach($stores as $store){
            $img_link = asset('uploads/images/'.$store->logo);
            $store->logo = $img_link;
        }
        return view('stores.index',['stores' => $stores]);
    }


    public function showStore($id){
        $store = Store::with('products')->findOrFail($id);
        $img_link = asset('uploads/images/'.$store->logo);
        $store->logo = $img_link;
        return view('stores.show',['store' => $store]);
    }


    public function products(){
        $products = Product::with('store')->select('*')->get();
        return view('products.index',['products' => $products,'title' => 'All Products']);
    }


    public function purchase($id){
        $product = Product::with('store')->findOrFail($id);

        $purchase = new Purchase();
        $purchase->product_id = $product->id;
        $purchase->store_id = $product->store->id;
        $purchase->purchase_price = $product->flag == "base_price" ? $product->base_price : $product->discount_price;
        $purchase->save();

        return view('products.purchase',['product' => $product]);
    }


    public function search(){
        $search_text = $_GET['query'];
        $products = Product::where('name','LIKE','%'.$search_text.'%')->get();
        return view('products.index',['products' => $products,'title' => 'Search Result']);
    }


}
