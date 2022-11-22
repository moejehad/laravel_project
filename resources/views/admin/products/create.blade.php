@extends('layouts.dashboard.template')

@section('title') Create Product @endsection

@section('content')

<div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <p class="mb-0">Create Product</p>
            </div>
          </div>
          <div class="card-body">
            <form action="{{ url('admin/products/store') }}" method="POST">
                @csrf
            <div class="row">
                @if (session()->has('message'))
                <h6 class="alert alert-success mt-2 col-md-12">{{ session('message') }}</h6>
                @endif
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Name</label>
                  <input class="form-control" type="text" name="name" placeholder="Product Name">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Description</label>
                  <input class="form-control" type="text" name="description" placeholder="Description">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Base Price</label>
                  <input class="form-control" type="number" name="base_price" placeholder="Base Price">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Discount Price</label>
                  <input class="form-control" type="number" name="discount_price" placeholder="Discount Price">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Store Relation</label>
                  <select class="form-select" name="store_relation">
                    @foreach ($stores as $store)
                        <option value="{{ $store->id }}">{{ $store->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Flag</label>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="flag" value="base_price" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">Base Price</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="flag" value="discount_price" id="flexRadioDefault2">
                    <label class="form-check-label" for="flexRadioDefault2">Discount Price</label>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
