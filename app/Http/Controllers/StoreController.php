<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;


class StoreController extends Controller
{
    public function index(){

        $stores = Store::all();

        foreach($stores as $store){
            $img_link = asset('uploads/images/'.$store->logo);
            $store->logo = $img_link;
        }

        return view('admin.stores.index',['stores' => $stores]);

    }

    public function create(){
        return view('admin.stores.create');
    }

    public function store(Request $request){

        $store = new Store();

        if($request->hasfile('image'))
        {
            $image = $request->file('image');
            $destination = public_path('uploads/images');
            $extenstion = $image->getClientOriginalName();
            $imageName = time().'_'.$extenstion;
            $image->move($destination,$imageName);
            $store->logo = $imageName;
        }

        $store->name = $request['name'];
        $store->address = $request['address'];
        $store->save();

        return redirect()->back()->with('message','Store Created Successfully');

    }

    public function destroy($id){
        Store::findOrFail($id)->delete();
        return redirect()->back();
    }


    public function show($id)
    {
        $store = Store::findOrFail($id);
        $img_link = asset('uploads/images/'.$store->logo);
        $store->logo = $img_link;
        return view('admin.stores.show',['store' => $store]);
    }

    public function edit($id)
    {
        $store = Store::findOrFail($id);
        $img_link = asset('uploads/images/'.$store->logo);
        $store->logo = $img_link;
        return view('admin.stores.edit',['store' => $store]);
    }


    public function update($id,Request $request){

        $store = Store::find($id);

        if($request->hasfile('image'))
        {
            $image = $request->file('image');
            $destination = public_path('uploads/images');
            $extenstion = $image->getClientOriginalName();
            $imageName = time().'_'.$extenstion;
            $image->move($destination,$imageName);
            $store->logo = $imageName;
        }

        $store->name = $request['name'];
        $store->address = $request['address'];
        $store->save();

        return redirect()->back()->with('message','Store Updated Successfully');

    }


}
