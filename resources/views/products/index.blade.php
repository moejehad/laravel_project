@extends('layouts.website.template')


@section('content')
<div class="fashion_section">
    <div class="container">
        <h1 class="fashion_taital mt-4">All Products</h1>
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
    </div>
</div>
@endsection
