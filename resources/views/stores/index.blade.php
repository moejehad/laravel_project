@extends('layouts.website.template')


@section('content')
    <div class="fashion_section">
        <div class="container">
            <h1 class="fashion_taital mt-5">All Stores</h1>

            @if (count($stores) == 0)
                <h6 class="alert alert-danger m-2">No Stores Found</h6>
            @endif

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
        </div>
    </div>
@endsection
