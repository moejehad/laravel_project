@extends('layouts.website.template')


@section('content')

    <div class="fashion_section">
        <div class="container">
            <h1 class="fashion_taital mt-5">Populer Stores</h1>
            <div class="fashion_section_2">
            <div class="row">
                @foreach ($stores as $store)
                <div class="col-lg-4 col-sm-4">
                    <div class="box_main">
                        <a href="/stores/{{ $store->id }}">
                            <div class="tshirt_img"><img src="{{ $store->logo }}"></div>
                            <h4 class="shirt_text">{{ $store->name }}</h4>
                            <p class="price_text">Address : {{ $store->address }}</p>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            </div>
            <div class="text-center m-4">
                <a class="btn btn-dark btn-lg" href="/stores">See more</a>
            </div>
        </div>
    </div>

    <div class="fashion_section">
        <div class="container">
            <h1 class="fashion_taital">Popular Products</h1>
            <div class="fashion_section_2">
                <div class="row">
                    @foreach ($products as $product)
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
                            <a href="/products/purchase/{{ $product->id }}" class="btn btn-warning btn-md mt-2">
                                Purchase
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="text-center m-4">
                <a class="btn btn-dark btn-lg" href="/products">See more</a>
            </div>
        </div>
    </div>

@endsection
