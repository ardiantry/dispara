@extends('dashboard.layouts.main')
@section('title', 'Edit Berita')
@section('breadcrumb')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h4>Edit Berita</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Arsip & Event</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Berita Media</a></li>
                            <li class="breadcrumb-item active">Edit Berita</li>
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
                    <h4 class="header-title">Ubah Beritamu</h4>
                    <p class="card-title-desc">Ubah berita sesuai dengan aturan yang telah termuat dalam form.</p>
                    <form class="custom-validation" action="{{ route('artikel.update', $artikel['id']) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <img src="{{ asset('storage/' . $artikel['image']) }}"
                                        alt="{{ $artikel->kategori['nama_kategori'] }}" width="350px">
                                </div>
                            </div>
                            <label for="image">Gambar</label>
                            <input type="file" class="form-control" id="image" name="image"
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
                                value="{{ old('title', $artikel['title']) }}" placeholder="Ketikkan judulmu" />
                            @error('title')
                                <span role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="kategori_id">Kategori Berita</label>
                            <select class="form-select" id="kategori_id" name="kategori_id"
                                aria-label="Default select example">
                                @foreach ($kategori_artikels as $item)
                                    @if ($item['nama_kategori'] === $artikel->kategori['nama_kategori'])
                                        <option value="{{ $item['id'] }}" selected>{{ $item['nama_kategori'] }}</option>
                                    @else
                                        <option value="{{ $item['id'] }}">{{ $item['nama_kategori'] }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('kategori_id')
                                <span role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="elm1">Isi</label>
                            <textarea id="elm1" name="isi" required>{{ old('isi', $artikel['isi']) }}</textarea>
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
                                <button type="button" class="btn btn-secondary waves-effect"
                                    onclick="location.href='{{ route('berita.index') }}'">
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
