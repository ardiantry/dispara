@extends('dashboard.layouts.main')
@section('title', 'Pengaturan Umum')
@section('breadcrumb')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h4>Pengaturan Umum</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Umum</a></li>
                            <li class="breadcrumb-item active">Pengaturan</li>
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
                    <h4 class="header-title">Pengaturan Umum</h4>
                    <p class="card-title-desc">Kamu dapat melakukan modifikasi tentang website Dispara</p>
                    <form class="custom-validation" method="POST"
                        action="{{ route('pengaturan-website.update', $pengaturan['id']) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="mb-3 col-6">
                                <div style="height: 100px">
                                    @if ($pengaturan['logo_web'])
                                        <img src="{{ asset('storage/' . $pengaturan['logo_web']) }}"
                                            alt="{{ $pengaturan['nama_web'] }}" width="100px">
                                    @else
                                        <img src="{{ asset('assets/images/imagenotfound.jpeg') }}"
                                            class="rounded-circle mb-3" alt="{{ $pengaturan['nama_web'] }}" width="100px"
                                            height="100" class="mb-3">
                                    @endif
                                </div>
                                <label for="logo_web">Logo</label>
                                <input type="file" class="form-control" id="logo_web"
                                    accept=".jpeg,.jpg,.png,.jfif,.svg" name="logo_web" />
                                @error('logo_web')
                                    <span role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-6">
                                <div style="height: 100px">
                                    @if ($pengaturan['favicon'])
                                        <img src="{{ asset('storage/' . $pengaturan['favicon']) }}"
                                            alt="{{ $pengaturan['nama_web'] }}" width="100px" class="mb-3">
                                    @else
                                        <img src="{{ asset('assets/images/imagenotfound.jpeg') }}"
                                            class="rounded-circle mb-3" alt="{{ $pengaturan['nama_web'] }}" width="100px"
                                            height="100">
                                    @endif
                                </div>
                                <label for="favicon">Favicon Web</label>
                                <input type="file" id="favicon" class="form-control" accept=".ico" name="favicon" />
                                @error('favicon')
                                    <span role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="nama_web">Nama Website</label>
                            <input type="text" class="form-control" required placeholder="Masukkan nama websitemu"
                                name="nama_web" id="nama_web" value="{{ old('nama_web', $pengaturan['nama_web']) }}" />
                            @error('nama_web')
                                <span role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email_web">E-Mail Website</label>
                            <input type="email" class="form-control" required parsley-type="email"
                                placeholder="Email website" name="email_web" id="email_web"
                                value="{{ old('email_web', $pengaturan['email_web']) }}" />
                            @error('email_web')
                                <span role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="kontak">Kontak</label>
                            <input type="text" class="form-control" required placeholder="Masukkan kontak website"
                                name="kontak" id="kontak" value="{{ old('kontak', $pengaturan['kontak']) }}" />
                            @error('kontak')
                                <span role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="textarea">Alamat</label>
                            <textarea required class="form-control" maxlength="225" id="textarea" rows="5" name="alamat"
                                placeholder="Masukkan alamat">{{ old('alamat', $pengaturan['alamat']) }}</textarea>
                            @error('alamat')
                                <span role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="elm1">Deskripsi Website</label>
                            <textarea id="elm1" name="deskripsi_web" placeholder="Masukkan deskripsi singkat website">{{ old('deskripsi_web', $pengaturan['deskripsi_web']) }}</textarea>
                            @error('deskripsi_web')
                                <span role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-0">
                            <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                Simpan
                            </button>
                            <button type="reset" class="btn btn-secondary waves-effect">
                                Reset
                            </button>
                        </div>
                    </form>
                    <!-- end form -->
                </div>
            </div>
        </div> <!-- end col -->
    </div>

@endsection
