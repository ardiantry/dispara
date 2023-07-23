@extends('dashboard.layouts.main')
@section('title', 'Kelola Kategori Wisata')
@section('breadcrumb')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h4>Kelola Kategori Wisata</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Arsip & Event</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Wisata</a></li>
                            <li class="breadcrumb-item active">Kelola Kategori Wisata</li>
                        </ol>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="float-end d-none d-sm-block">
                        <a href="{{ route('kategori-wisata.create') }}" class="btn btn-success">+Tambah Kategori</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap table-striped"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th data-orderable="false">No</th>
                                <th data-orderable="false">Nama Kategori</th>
                                <th data-orderable="false">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($kategoriWisatas as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data['nama_kategori'] }}</td>
                                    <td style="width: 100px" id="tooltip-container0">
                                        <a href="{{ route('kategori-wisata.edit', $data['id']) }}"
                                            class="btn btn-outline-secondary btn-sm edit"
                                            data-bs-container="#tooltip-container0" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Edit">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a href="javascript:void(0);" class="btn btn-outline-secondary btn-sm"
                                            data-bs-container="#tooltip-container0" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Delete" data-id="{{ $data['id'] }}"
                                            data-title="{{ $data['nama_kategori'] }}" onclick="confirmDelete(this)">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        <form id="form-delete-{{ $data['id'] }}" method="POST"
                                            action="{{ route('kategori-wisata.destroy', $data['id']) }}">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <h5 class="text-center text-white p-4 rounded"
                                    style="background: #525ce5 url({{ asset('assets/images/title-img.png') }});">
                                    Datamu masih
                                    kosong
                                    </h4>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

@endsection
