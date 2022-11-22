@extends('layouts.dashboard.template')

@section('title') Create Store @endsection

@section('content')

<div class="container-fluid py-4">
    <div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-body px-0 pt-0 pb-2">
                <div class="w-95 mx-auto mt-2">

                    <a href="{{ url('/admin/stores') }}" class="btn btn-primary mt-4">
                        <i class="fa fa-arrow-left"></i>
                        Back
                    </a>

                    @if (session()->has('message'))
                        <h6 class="alert alert-success mt-2">{{ session('message') }}</h6>
                    @endif

                    <form action="{{ url('admin/stores/store') }}" enctype="multipart/form-data" method="POST" class="mt-2">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Store Name">
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Store Address">
                        </div>
                        <div class="form-group">
                            <label for="logo">Store Logo</label>
                            <input type="file" name="image" class="form-control-file" id="logo">
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

@endsection
