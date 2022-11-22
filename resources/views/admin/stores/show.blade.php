@extends('layouts.dashboard.template')

@section('title') Show Store @endsection

@section('content')

<div class="container-fluid py-4">
    <div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-body px-0 pt-0 pb-2">
                <div class="w-95 m-4 mx-auto">
                    <a href="{{ url('/admin/stores') }}" class="btn btn-primary">
                        <i class="fa fa-arrow-left"></i>
                        Back
                    </a>
                    <div>
                        <h5>Logo</h5>
                        <img src="{{ $store->logo }}" class="avatar avatar-md me-3 mb-4">
                    </div>
                    <div class="h6 font-weight-300">
                        <h5>Name</h5>
                        <i class="ni location_pin mr-2"></i>{{ $store->name }}
                    </div>
                    <div class="h6 mt-4">
                        <i class="ni business_briefcase-24 mr-2"></i>Address
                    </div>
                    <div>
                        <i class="ni education_hat mr-2"></i>{{ $store->address }}
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

@endsection
