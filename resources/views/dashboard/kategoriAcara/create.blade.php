@extends('dashboard.layouts.main')
@section('title', 'Tambah Kategori Acara')
@section('breadcrumb')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h4>Tambah Kategori Acara</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Arsip & Event</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Acara</a></li>
                            <li class="breadcrumb-item active">Tambah Kategori Acara</li>
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
                    <h4 class="header-title">Tambah Kategori Acaramu</h4>
                    <p class="card-title-desc">Tambahkan kategori untuk setiap acaramu agar mempermudah dalam
                        pengelompokkan acara.</p>
                    <form class="custom-validation" action="{{ route('kategori-acara.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_kategori">Kategori Acara</label>
                            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" required
                                placeholder="Ketikkan Kategori Acara" value="{{ old('nama_kategori') }}" autofocus />
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
                                <button type="reset" class="btn btn-secondary waves-effect">
                                    Reset
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
