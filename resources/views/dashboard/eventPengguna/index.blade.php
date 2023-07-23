@extends('dashboard.layouts.main')
@section('title', 'Kelola Pengunjung Acara')
@section('breadcrumb')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h4>Kelola Pengunjung Acaramu</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Arsip & Event</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Acara</a></li>
                            <li class="breadcrumb-item active">Kelola Pengunjung Acara</li>
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
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th data-orderable="false">Nama Acara</th>
                                <th data-orderable="false">Nama Pengunjung</th>
                                <th data-orderable="false">Pelindung/Asal/Institusi</th>
                                <th data-orderable="false">No. HP</th>
                                <th data-orderable="false">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($eventPengguna as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->event['title'] }}</td>
                                    <td>{{ $data->tamu->user['name'] }}</td>
                                    <td>{{ $data->tamu['pelindung'] }}</td>
                                    <td>{{ $data->tamu['no_hp'] }}</td>
                                    <td>{{ $data->tamu->user['email'] }}</td>
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
