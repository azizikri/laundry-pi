@extends('admin.layouts.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Paket</a></li>
            <li class="breadcrumb-item"><a href="#">{{ $package->name }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>

    <div class="row">
        {{-- validation error --}}
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title my-3">Buat Paket</h6>
                    <form class="forms-sample" action="{{ route('admin.packages.update', $package) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input name="name" type="text" class="form-control" id="name" autocomplete="off"
                                placeholder="Nama" value="{{ old('name')  ?? $package->name}}">
                        </div>
                        <div class="mb-3">
                            <label for="kg" class="form-label">Berat Cucian (kg)</label>
                            <input name="kg" type="number" class="form-control" id="kg" placeholder="Berat Cucian (kg)" value="{{ old('kg') ?? $package->kg }}">
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Harga</label>
                            <input name="price" type="number" class="form-control" id="price" placeholder="Harga" value="{{ old('price') ?? $package->price }}">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ old('description') ?? $package->description }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <a href="{{ route('admin.packages.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

