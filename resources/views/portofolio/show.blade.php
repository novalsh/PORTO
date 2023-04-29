@extends('index')

@section('main-content')

@section('breadcrumb')
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ url('/dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Admin</li>
@endsection

@section('main-content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-start">
                <div>
                    <div class="page-header min-height-300 border-radius-xl" style="background-image: url({{ asset($admins->photo) }}); background-position-y: 50%;">
                        <span class="mask bg-gradient-primary opacity-6"></span>
                    </div>
                    <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
                        <div class="row gx-4">
                            <div class="col-auto">
                                <div class="avatar avatar-xl position-relative">
                                    <img src="{{  asset($admins->photo) }}" alt="profile_image" width="w-full" class="w-100 border-radius-lg shadow-sm">
                                </div>
                            </div>
                            <div class="col-auto my-auto">
                                <div class="h-100">
                                    <h5 class="mb-1">
                                        {{ $admins->nama }}
                                    </h5>
                                    <p class="mb-0 font-weight-bold text-sm">
                                        {{ $admins->description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-4 mt-md-0">
                <div class="card h-100">
                    <div class="card-header p-3">
                        <div class="row">
                            <div class="col-md-8 d-flex align-item-center">
                                <h6 class="mb-0">Portofolio Description</h6>
                            </div>
                            <div class="col-md-4 text-end">
                                <a href="{{ url('/portofolios/'.$admins->id.'/edit') }}">
                                    <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" aria-hidden="true" aria-label="Edit Portofolio" data-bs-original-title="Edit Portofolio"></i>
                                    <span class="sr-only">Edit Portofolio</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <p class="text-sm">
                            {{ $admins->description }}
                        </p>
                        <hr class="horizontal gray-light my-4">
                        <ul class="list-group">
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Photo:</strong> &nbsp; {{ $admins->photo }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection