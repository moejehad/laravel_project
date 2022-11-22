@extends('layouts.website.template')


@section('content')
<div class="card shadow-lg m-4 card-profile-bottom">
    <div class="card-body p-3">
        <div class="row gx-4 m-4">
            <div class="col-auto">
                <div class="avatar avatar-xl position-relative">
                    <img src="{{ $store->logo }}"  width="120" class="border-radius-lg shadow-sm">
                </div>
            </div>
            <div class="my-auto">
                <div class="h-100">
                    <h2 class="font-weight-bold">{{ $store->name }}</h2>
                    <h5 class="mb-1">Address : {{ $store->address }}</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="fashion_section">
        <div class="container">
            <h1 class="fashion_taital mt-4">Store Products</h1>
            <div class="fashion_section_2">
                <div class="row">
                    @foreach ($store->products as $product)
                        <div class="col-lg-4 col-sm-4">
                            <div class="box_main">
                            <h4 class="shirt_text">{{ $product->name }}</h4>
                            <p class="price_text">Store : {{ $product->store->name }}</p>
                            <p class="price_text mt-2">Price :
                                @if ($product->flag == "base_price")
                                    <span class="text-info">{{ $product->base_price }} / Base Price</span>
                                @else
                                    <span class="text-danger">{{ $product->discount_price }} / Discount Price </span>
                                @endif
                            </p>
                            <a href="" class="btn btn-warning btn-md mt-2">
                                Purchase
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
