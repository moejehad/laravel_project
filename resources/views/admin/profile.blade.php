@extends('layouts.dashboard.template')

@section('title') Profile @endsection

@section('content')
<div class="card shadow-lg mx-4 card-profile">
    <div class="card-body p-3">
        <div class="row gx-4">
            <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
                <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>
            </div>
            <div class="col-auto my-auto">
            <div class="h-100">
                <h5 class="mb-1">
                {{ $user->name }}
                </h5>
                <p class="mb-0 font-weight-bold text-sm">
                Email : {{ $user->email }}
                </p>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
