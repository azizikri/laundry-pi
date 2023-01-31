@extends('admin.layouts.master')

@push('plugin-styles')
    <link href="{{ asset('admin/assets/plugins/dropify/css/dropify.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Servis</a></li>
            <li class="breadcrumb-item"><a href="#">{{ $service->name }}</a></li>
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
                    <h6 class="card-title my-3">Buat Servis</h6>
                    <form class="forms-sample" action="{{ route('admin.services.update', $service) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input name="name" type="text" class="form-control" id="name" autocomplete="off"
                                placeholder="Nama" value="{{ old('name')  ?? $service->name}}">
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Harga</label>
                            <input name="price" type="number" class="form-control" id="price" placeholder="Harga" value="{{ old('price') ?? $service->price }}">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ old('description') ?? $service->description }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Gambar</label>
                            <input name="image" type="file" id="image" accept=".png,.jpg,.webp"/>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
@push('plugin-scripts')
    <script src="{{ asset('admin/assets/plugins/dropify/js/dropify.min.js') }}"></script>
@endpush

@push('custom-scripts')
    <script>
        $(function() {
            $('#image').dropify();
        });
    </script>
@endpush
