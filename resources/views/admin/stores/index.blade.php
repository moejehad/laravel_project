@extends('layouts.dashboard.template')

@section('title') Stores @endsection

@section('content')

<div class="container-fluid py-4">
    <div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header">
                <div class="row">
                    <h6 class="col-10">All Stores</h6>
                    <a href="/admin/stores/create" class="btn btn-md btn-primary mb-0 col-2">New Store</a>
                </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                @if (count($stores) == 0)
                    <h6 class="alert alert-danger m-2">No Stores Found</h6>
                @endif
                <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Logo</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Address</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created Date</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Delete</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Edit</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Show</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($stores as $store)
                        <tr>
                            <td>
                                <img src="{{ $store->logo }}" class="avatar avatar-sm me-3" alt="user1">
                            </td>
                        <td>
                            <div class="d-flex flex-column justify-content-center">
                                <p class="text-xs font-weight-bold mb-0">{{ $store->name }}</p>
                            </div>
                        </td>
                        <td>
                            <p class="text-xs font-weight-bold mb-0">{{ $store->address }}</p>
                        </td>
                        <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold">{{ $store->created_at }}</span>
                        </td>
                        <td class="align-middle text-center">
                            <a href="/admin/stores/delete/{{ $store->id }}" class="text-danger font-weight-bold text-xs" data-toggle="tooltip"
                            onclick="event.preventDefault(); document.getElementById('delete-form').submit();">
                                <i class="fa fa-trash"></i>
                            </a>

                            <form id="delete-form" action="/admin/stores/delete/{{ $store->id }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                        <td class="align-middle text-center">
                            <a href="/admin/stores/edit/{{ $store->id }}" class="text-success font-weight-bold text-xs">
                                <i class="fa fa-edit"></i>
                            </a>
                        </td>
                        <td class="align-middle text-center">
                            <a href="/admin/stores/{{ $store->id }}" class="text-info font-weight-bold text-xs">
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
