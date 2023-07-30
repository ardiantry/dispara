@extends('dashboard.layouts.main')
@section('title', 'Dashboard')
@section('breadcrumb')
@php
$tb_event=App\Models\Event::count();
$tb_artikel=App\Models\Artikel::count();
$tb_bwrita=App\Models\Berita::count();
$tb_wisata=App\Models\Wisata::count();
$tb_pengguna=App\Models\Pengguna::count();
$tb_user=App\Models\User::count();



@endphp
    <!-- start page title -->
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h4>Dashboard</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Menu</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
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
    <div class="col-xl-4 col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <p class="font-size-16">Event</p>
                    <div class="mini-stat-icon mx-auto mb-4 mt-3">
                        <span class="avatar-title rounded-circle bg-soft-success">
                            <i class="dripicons-suitcase text-success font-size-20"></i>
                        </span>
                    </div>
                    <h5 class="font-size-22">{{$tb_event}}</h5>


                    <div class="progress mt-3" style="height: 4px;">
                        <div class="progress-bar progress-bar bg-success" role="progressbar" style="width: 100%"
                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                        </div>

                    </div>
                </div>
            </div>
        </div> 
    </div>

    <div class="col-xl-4 col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <p class="font-size-16">Berita</p>
                    <div class="mini-stat-icon mx-auto mb-4 mt-3">
                        <span class="avatar-title rounded-circle bg-soft-warning">
                            <i class="dripicons-to-do text-warning font-size-20"></i>
                        </span>
                    </div>
                    <h5 class="font-size-22">{{$tb_bwrita}}</h5>


                    <div class="progress mt-3" style="height: 4px;">
                        <div class="progress-bar progress-bar bg-warning" role="progressbar" style="width: 100%"
                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                        </div>

                    </div>
                </div>
            </div>
        </div> 
    </div>

    <div class="col-xl-4 col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <p class="font-size-16">Artikel</p>
                    <div class="mini-stat-icon mx-auto mb-4 mt-3">
                        <span class="avatar-title rounded-circle bg-soft-danger">
                            <i class="fas fa-newspaper text-danger font-size-20"></i>
                        </span>
                    </div>
                    <h5 class="font-size-22">{{$tb_artikel}}</h5>


                    <div class="progress mt-3" style="height: 4px;">
                        <div class="progress-bar progress-bar bg-danger" role="progressbar" style="width: 100%"
                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                        </div>

                    </div>
                </div>
            </div>
        </div> 
    </div>

    <div class="col-xl-4 col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <p class="font-size-16">Wisata</p>
                    <div class="mini-stat-icon mx-auto mb-4 mt-3">
                        <span class="avatar-title rounded-circle bg-soft-primary">
                            <i class="dripicons-map text-primary font-size-20"></i>
                        </span>
                    </div>
                    <h5 class="font-size-22">{{$tb_wisata}}</h5>


                    <div class="progress mt-3" style="height: 4px;">
                        <div class="progress-bar progress-bar bg-primary" role="progressbar" style="width: 100%"
                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                        </div>

                    </div>
                </div>
            </div>
        </div> 
    </div>

    <div class="col-xl-4 col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <p class="font-size-16">Pengguna</p>
                    <div class="mini-stat-icon mx-auto mb-4 mt-3">
                        <span class="avatar-title rounded-circle bg-soft-info">
                            <i class="mdi mdi-account-outline text-info font-size-20"></i>
                        </span>
                    </div>
                    <h5 class="font-size-22">{{$tb_pengguna}}</h5>


                    <div class="progress mt-3" style="height: 4px;">
                        <div class="progress-bar progress-bar bg-info" role="progressbar" style="width: 100%"
                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                        </div>

                    </div>
                </div>
            </div>
        </div> 
    </div>

    <div class="col-xl-4 col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <p class="font-size-16">Admin</p>
                    <div class="mini-stat-icon mx-auto mb-4 mt-3">
                        <span class="avatar-title rounded-circle bg-soft-primary">
                            <i class="mdi mdi-account-outline text-primary font-size-20"></i>
                        </span>
                    </div>
                    <h5 class="font-size-22">{{$tb_user}}</h5>


                    <div class="progress mt-3" style="height: 4px;">
                        <div class="progress-bar progress-bar bg-primary" role="progressbar" style="width: 100%"
                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                        </div>

                    </div>
                </div>
            </div>
        </div> 
    </div>

</div>
@endsection
