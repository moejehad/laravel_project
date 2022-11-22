@extends('layouts.dashboard.template')

@section('title') Edit Product @endsection

@section('content')

<div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <p class="mb-0">Edit Product</p>
            </div>
          </div>
          <div class="card-body">
            <form action="/admin/products/update/{{ $product->id }}" method="POST">
                @csrf
                @method('PUT')
            <div class="row">
                @if (session()->has('message'))
                <h6 class="alert alert-success mt-2 col-md-12">{{ session('message') }}</h6>
                @endif
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Name</label>
                  <input class="form-control" type="text" name="name" value="{{ $product->name }}">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Description</label>
                  <input class="form-control" type="text" name="description" value="{{ $product->description }}">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Base Price</label>
                  <input class="form-control" type="number" name="base_price" value="{{ $product->base_price }}">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Discount Price</label>
                  <input class="form-control" type="number" name="discount_price" value="{{ $product->discount_price }}">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Store Relation</label>
                  <select class="form-select" name="store_relation">
                    @foreach ($stores as $store)
                        <option value="{{ $store->id }}" @if ($product->store->id == $store->id)
                            selected
                        @endif>{{ $store->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Flag</label>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="flag" value="base_price" id="flexRadioDefault1"
                    @if ($product->flag == "base_price")
                        checked
                    @endif>
                    <label class="form-check-label" for="flexRadioDefault1">Base Price</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="flag" value="discount_price" id="flexRadioDefault2"
                    @if ($product->flag == "discount_price")
                        checked
                    @endif>
                    <label class="form-check-label" for="flexRadioDefault2">Discount Price</label>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Edit</button>
            </div>
        </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
