@extends('dashboard.layouts.main')
@section('title', 'Edit Kategori Artikel')
@section('breadcrumb')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h4>Edit Kategori Artikel</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Arsip & Event</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Berita Media</a></li>
                            <li class="breadcrumb-item active">Edit Kategori Artikel</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
@endsection
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Edit Kategori Artikelmu</h4>
                    <p class="card-title-desc">Edit kategori untuk setiap artikelmu agar mempermudah dalam
                        pengelompokkan artikel.</p>
                    <form class="custom-validation" action="{{ route('kategori-artikel.update', $kategori['id']) }}"
                        method="POST">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="nama_kategori">Kategori Artikel</label>
                            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" required
                                value="{{ old('nama_kategori', $kategori['nama_kategori']) }}" />
                            @error('nama_kategori')
                                <span role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-0">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                    Simpan
                                </button>
                                <button type="button" class="btn btn-secondary waves-effect"
                                    onclick="window.location.href='{{ route('kategori-artikel.index') }}'">
                                    Batal
                                </button>
                            </div>
                        </div>
                    </form>
                    <!-- end form -->
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
