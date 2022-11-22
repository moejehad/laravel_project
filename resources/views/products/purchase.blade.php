
@extends('layouts.website.template')


@section('content')
<div class="card shadow-lg m-4 card-profile-bottom">
    <div class="card-body p-3">
        <div class="text-center m-4">
            <h2 class="font-weight-bold text-success">
                {{ $product->name }} Purchased successfully
            </h2>
            <a href="/" class="btn btn-warning">Home</a>
        </div>
    </div>
</div>

@endsection
