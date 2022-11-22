
@extends('layouts.dashboard.template')

@section('title') Show Product @endsection

@section('content')

<div class="container-fluid py-4">
    <div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-body px-0 pt-0 pb-2">
                <div class="row m-4">
                    <div class="col-md-6">
                        <a href="{{ url('/admin/stores') }}" class="btn btn-primary">
                            <i class="fa fa-arrow-left"></i>
                            Back
                        </a>
                        <div>
                            <h5>Store Logo</h5>
                            <img src="{{ $product->store->logo }}" class="avatar avatar-md me-3 mb-4">
                        </div>
                        <div class="h6 font-weight-300">
                            <h5>Store Name</h5>
                            {{ $product->store->name }}
                        </div>
                        <div class="h6 font-weight-300">
                            <h5>Store Address</h5>
                            {{ $product->store->address }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="h6 font-weight-300">
                            <h5>Product Name</h5>
                            {{ $product->name }}
                        </div>
                        <div class="h6 font-weight-300 mt-4">
                            <h5>Product Description</h5>
                            {{ $product->description }}
                        </div>
                        <div class="h6 font-weight-300 mt-4">
                            <h5>Product Price</h5>
                            @if ($product->flag == "base_price")
                                <span class="text-info">{{ $product->base_price }} / Base Price</span>
                            @else
                                <span class="text-danger">{{ $product->discount_price }} / Discount Price </span>
                            @endif
                        </div>

                        <div class="h6 font-weight-300 mt-4">
                            <h5>Product Purchases</h5>
                            {{ $purchases_count }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

@endsection
