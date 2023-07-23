@extends('dashboard.layouts.main')
@section('title', 'Kelola Acara')
@section('breadcrumb')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h4>Kelola Acaramu</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Arsip & Event</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Acara</a></li>
                            <li class="breadcrumb-item active">Kelola Acara</li>
                        </ol>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="float-end d-none d-sm-block">
                        <a href="{{ route('acara.create') }}" class="btn btn-success">+Tambah Acara</a>
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
                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th data-orderable="false">Judul</th>
                                <th data-orderable="false">Kategori</th>
                                <th data-orderable="false">Tanggal Mulai/Waktu</th>
                                <th data-orderable="false">Tanggal Selesai/Waktu</th>
                                <th data-orderable="false">Isi</th>
                                <th data-orderable="false">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($acaras as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data['title'] }}</td>
                                    <td>{{ $data->kategori['nama_kategori'] }}</td>
                                    <td>{{ $data['tgl_mulai'] }} WIB</td>
                                    <td>{{ $data['tgl_selesai'] }} WIB</td>
                                    <td>
                                        <!-- Small modal -->
                                        <button type="button" class="btn btn-primary btn-sm waves-effect waves-light"
                                            data-bs-toggle="modal"
                                            data-bs-target=".modal{{ $data['id'] }}">Selengkapnya</button>
                                        <!-- sample modal content -->
                                        <div class="modal fade modal{{ $data['id'] }}" tabindex="-1"
                                            aria-labelledby="#exampleModalFullscreenLabel" style="display: none;"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-fullscreen">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title mt-0" id="exampleModalFullscreenLabel">
                                                            {{ $data->kategori['nama_kategori'] }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src="{{ asset('storage/' . $data['image']) }}"
                                                            alt="{{ $data->kategori['nama_kategori'] }}"
                                                            class="d-block m-auto" width="400px">
                                                        <h5>{{ $data['title'] }}</h5>
                                                        <p>{!! $data['isi'] !!}</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary waves-effect"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                    </td>
                                    <td style="width: 100px" id="tooltip-container0">
                                        <a href="{{ route('acara.edit', $data['id']) }}"
                                            class="btn btn-outline-secondary btn-sm edit"
                                            data-bs-container="#tooltip-container0" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Edit">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a href="javascript:void(0);" class="btn btn-outline-secondary btn-sm"
                                            data-bs-container="#tooltip-container0" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Delete" data-id="{{ $data['id'] }}"
                                            data-title="{{ $data['title'] }}" onclick="confirmDelete(this)">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        <form id="form-delete-{{ $data['id'] }}" method="POST"
                                            action="{{ route('acara.destroy', $data['id']) }}">
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
