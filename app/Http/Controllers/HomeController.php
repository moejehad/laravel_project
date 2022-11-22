<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use App\Product;
use App\Purchase;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $stores_count = Store::all()->count();
        $products_count = Product::all()->count();
        $purchases_count = Purchase::all()->count();

        $stores = Store::limit(5)->orderBy('id', 'DESC')->get();
        $products = Product::with('store')->select('*')->limit(5)->orderBy('id', 'DESC')->get();

        foreach($stores as $store){
            $img_link = asset('uploads/images/'.$store->logo);
            $store->logo = $img_link;
        }

        return view(
            'admin.dashboard',
            [
                'stores_count' => $stores_count,
                'products_count' => $products_count,
                'purchases_count' => $purchases_count,
                'stores' => $stores,
                'products' => $products
            ]
        );
    }
}
