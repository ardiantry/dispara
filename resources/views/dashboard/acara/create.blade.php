@extends('dashboard.layouts.main')
@section('title', 'Tambah Acara')
@section('breadcrumb')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h4>Tambah Acara</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Arsip & Event</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Acara</a></li>
                            <li class="breadcrumb-item active">Tambah Acara</li>
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
                    <h4 class="header-title">Tambah Acaramu</h4>
                    <p class="card-title-desc">Tambah acara sesuai dengan aturan yang telah termuat dalam form.</p>
                    <form class="custom-validation" action="{{ route('acara.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="image">Gambar</label>
                            <input type="file" class="form-control" id="image" name="image" required
                                accept=".jpeg,.jpg,.png,.jfif,.svg" />
                            @error('image')
                                <span role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="title">Judul</label>
                            <input type="text" class="form-control" id="title" name="title" required
                                placeholder="Ketikkan judulmu" value="{{ old('title') }}" autofocus />
                            @error('title')
                                <span role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="kategori_id">Kategori Acara</label>
                            <select class="form-select" id="kategori_id" name="kategori_id"
                                aria-label="Default select example" required>
                                <option selected>Pilih Kategori Acara</option>
                                @foreach ($kategori_acaras as $item)
                                    <option value="{{ $item['id'] }}">{{ $item['nama_kategori'] }}</option>
                                @endforeach
                            </select>
                            @error('kategori_id')
                                <span role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tgl_mulai">Tanggal Dimulai Acara</label>
                            <input class="form-control" type="datetime-local" name="tgl_mulai"
                                value="{{ old('tgl_mulai') }}" id="tgl_mulai" required>
                        </div>
                        <div class="mb-3">
                            <label for="tgl_selesai">Tanggal Selesai Acara</label>
                            <input class="form-control" type="datetime-local" name="tgl_selesai"
                                value="{{ old('tgl_selesai') }}" id="tgl_selesai" required>
                        </div>
                        <div class="mb-3">
                            <label for="elm1">Isi</label>
                            <textarea id="elm1" name="isi">{{ old('isi') }}</textarea>
                            @error('isi')
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
