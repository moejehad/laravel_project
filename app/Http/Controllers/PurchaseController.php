<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Purchase;

class PurchaseController extends Controller
{
    public function index(){
        $purchases = Purchase::with('store')->with('product')->select('*')->get();
        return view('admin.purchases',['purchases' => $purchases]);
    }



}
