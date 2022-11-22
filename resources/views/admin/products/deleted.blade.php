@extends('layouts.dashboard.template')

@section('title') Deleted Products @endsection

@section('content')

<div class="container-fluid py-4">
    <div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header">
                <div class="row">
                    <h6 class="col-8">Deleted Products</h6>
                </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Store</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Price</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Flag</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created Date</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Show</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                        <td>
                            <div class="d-flex flex-column justify-content-center">
                                <p class="text-xs font-weight-bold mb-0">{{ $product->name }}</p>
                            </div>
                        </td>
                        <td>
                            <p class="text-xs font-weight-bold mb-0">{{ $product->store->name }}</p>
                        </td>
                        <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold">
                                @if ($product->flag == "base_price")
                                    <span class="text-info">{{ $product->base_price }}</span>
                                @else
                                    <span class="text-danger">{{ $product->discount_price }}</span>
                                @endif
                            </span>
                        </td>
                        <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold">
                                @if ($product->flag == "base_price")
                                    <span class="text-info"> Base Price</span>
                                @else
                                    <span class="text-danger">Discount</span>
                                @endif
                            </span>
                        </td>
                        <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold">{{ $product->created_at }}</span>
                        </td>
                        <td class="align-middle text-center">
                            <a href="/admin/products/{{ $product->id }}" class="text-info font-weight-bold text-xs">
                                <i class="fa fa-eye"></i>
                            </a>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>

@endsection
