@extends('layouts.dashboard.template')


@section('title') Dashboard @endsection

@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Stores Number</p>
                            <h5 class="font-weight-bolder mt-3">
                                {{ $stores_count }}
                            </h5>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                            <i class="fa fa-list text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Products Number</p>
                            <h5 class="font-weight-bolder mt-3">
                                {{ $products_count }}
                            </h5>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                        <i class="fa fa-list text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Purchases Number</p>
                            <h5 class="font-weight-bolder mt-3">
                                {{ $purchases_count }}
                            </h5>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                        <i class="fa fa-list text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
        <div class="col-lg-7 mb-lg-0 mb-4">
            <div class="card ">
            <div class="card-header pb-0 p-3">
                <div class="d-flex justify-content-between">
                <h6 class="mb-2">Last 5 Products</h6>
                </div>
            </div>
            <div class="table-responsive">
                @if (count($products) == 0)
                    <h6 class="alert alert-danger m-2">No Products Found</h6>
                @endif
                <table class="table align-items-center ">
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
                        <a href="/admin/products/delete/{{ $product->id }}" class="text-danger font-weight-bold text-xs" data-toggle="tooltip"
                        onclick="event.preventDefault(); document.getElementById('delete-form').submit();">
                            <i class="fa fa-trash"></i>
                        </a>

                        <form id="delete-form" action="/admin/products/delete/{{ $product->id }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                    <td class="align-middle text-center">
                        <a href="/admin/products/edit/{{ $product->id }}" class="text-success font-weight-bold text-xs">
                            <i class="fa fa-edit"></i>
                        </a>
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
        <div class="col-lg-5">
            <div class="card">
            <div class="card-header pb-0 p-3">
                <h6 class="mb-0">Last 5 Stores</h6>
            </div>
            <div class="card-body p-3">
                @if (count($stores) == 0)
                    <h6 class="alert alert-danger m-2">No Stores Found</h6>
                @endif
                <ul class="list-group">
                    @foreach ($stores as $store)
                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                        <a href="/admin/stores/{{ $store->id }}">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                    <img src="{{ $store->logo }}" class="avatar avatar-sm me-3" alt="user1">
                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">{{ $store->name }}</h6>
                                    <span class="text-xs">Address : <span class="font-weight-bold">{{ $store->address }}</span></span>
                                </div>
                            </div>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
            </div>
        </div>
        </div>
    </div>


@endsection
