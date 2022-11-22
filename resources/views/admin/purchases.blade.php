
@extends('layouts.dashboard.template')

@section('title') Products @endsection

@section('content')

<div class="container-fluid py-4">
    <div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header">
                <div class="row">
                    <h6 class="col-10">All Purchases</h6>
                </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product Name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Store Name</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Purchase Price</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Purchases</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($purchases as $purchase)
                        <tr>
                        <td>
                            <div class="d-flex flex-column justify-content-center">
                                <p class="text-xs font-weight-bold mb-0">{{ $purchase->product->name }}</p>
                            </div>
                        </td>
                        <td>
                            <p class="text-xs font-weight-bold mb-0">{{ $purchase->store->name }}</p>
                        </td>
                        <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold">
                                @if ($purchase->product->flag == "base_price")
                                    <span class="text-info">{{ $purchase->product->base_price }} / Base Price</span>
                                @else
                                    <span class="text-danger">{{ $purchase->product->discount_price }} / Discount Price</span>
                                @endif
                            </span>
                        </td>
                        <td class="align-middle text-center">{{ $purchase->created_at }}</td>
                        <td class="align-middle text-center">{{ $purchase->created_at }}</td>
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
