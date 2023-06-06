@extends('index')

@section('main-content')

    {{--  --}}
@section('breadcrumb')
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ url('/dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ url('/categories') }}">Category</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Edit</li>
@endsection

@section('main-content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12 text-start">
                    <div class="card p-3">
                        <div class="card-header">
                            <h1 class="text-primary">Edit Category</h1>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    @if (session()->has('success'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <form method="post" action="{{ route('categories.update', $admins->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <div class="mb-2">
                                            <label for="jenis">Jenis Category</label>
                                            <input class="form-control @error('jenis') is-invalid @enderror"
                                                type="text" name="jenis" id="jenis" placeholder="WEBSITE"
                                                value="{{ $admins->jenis }}">
                                            @error('jenis')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <button class="btn btn-primary mt-2 w-55" type="submit">Update this data</button>
                                    </form>
                                </div>
                                <div class="col-md-6">
                                    <img class="w-100 position-relative z-index-2 pt-4"
                                        src="{{ url('assets/img/illustrations/rocket-white.png') }}" alt="rocket">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
