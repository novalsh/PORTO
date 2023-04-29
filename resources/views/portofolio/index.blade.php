@extends('index')

@section('main-content')

@section('breadcrumb')
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ url('/dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Admin</li>
@endsection

@section('main-content')

    <section id="screen" class="fixed-top py-5">
        <div class="container my-auto">
            <div class="row">
                <div class="col-lg-6 text-center mx-auto">
                    <div class="card p-3">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-8 d-flex text-start">
                                    <h5 class="mb-0 text-primary"><b>Create new<br>Portofolio</b></h5>
                                </div>
                                <div class="col-md-4 text-end">
                                    <button onclick="closeCreateModal()"
                                        class="btn btn-sm btn-outline-secondary px-3 text-center">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    @if (session()->has('success'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <form action="{{ url('/portofolios') }}" enctype="multipart/form-data" method="post"
                                        class="text-start">
                                        @csrf
                                        <div class="mb-2">
                                            <label for="photo">Portofolio Photo</label>
                                            <input class="form-control @error('portoflio') is-invalid @enderror "
                                                type="file" name="photo" id="photo">
                                            @error('photo')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <div class="mb-2">
                                                <label for="name">Portofolio Name</label>
                                                <input class="form-control @error('name') is-invalid @enderror"
                                                    type="name" name="nama" id="nama" placeholder="WEBSITE"
                                                    value="{{ old('name') }}">
                                                @error('nama')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <div class="mb-2">
                                                    <label for="description">Description</label>
                                                    <textarea class="form-control @error('description') is-invalid @enderror "
                                                    type="description" name="description" id="description"
                                                        placeholder="description">{{ old('description') }}</textarea>
                                                    @error('description')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary mt-2 w-100" type="submit">add this data</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </section>
    <section>
        <div class="container">
            @if (session()->has('status'))
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-success py-3" role="alert">
                            {{ session('status') }}
                        </div>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6>Portofolio Data</h6>
                                </div>
                                <div class="col-md-6 text-end">
                                    <button class="btn btn-primary" type="button" onclick="showCreateModal()">register
                                        portofolio</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                ID</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Photo URL</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Portofolio Name</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Description</th>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($admins as $index => $item)
                                            <tr>
                                                <td class="text-center">
                                                    <p class="text-xs font-weight-bold mb-0">{{ $loop->iteration }}</p>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <img src="{{ asset($item->photo) }}" alt="" width="180">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <p class="text-xs text-secondary mb-0">
                                                                {{ $item->photo }}&nbsp;&nbsp;&nbsp;</p>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="align-middle text-center">
                                                    <p class="text-xs font-weight-bold mb-0">{{ $item->nama }}</p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <p class="text-xs font-weight-bold mb-0">{{ $item->description }}</p>
                                                <td class="text-center d-flex">
                                                    <a href="{{ url('/portfolios/' . $item->id) }}"
                                                        class="btn btn-sm btn-primary px-3 text-light text-center me-2">
                                                        <i class="fa-solid fa-eye" aria-hidden="true"></i>
                                                    </a>
                                                    <a href="{{ url('/portofolios/' . $item->id . '/edit') }}"
                                                        class="btn btn-sm btn-secondary px-3 text-light text-center me-2">
                                                        <i class="fa-solid fa-pen" aria-hidden="true"></i>
                                                    </a>
                                                    <form action="{{ url('/portofolios/' . $item->id) }}" method="post">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="btn btn-sm btn-danger px-3 text-center me-2"
                                                            data-toggle="tooltip" data-original-title="Edit user"
                                                            onclick="return confirm('Are you sure want to delete {{ $item->nama }}?')">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                        </button>
                                                    </form>
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
    </section>
@endsection
