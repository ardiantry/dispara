@extends('app.layouts.main')
@section('title', 'Tugas Pokok & Fungsi')
@section('app')
    <!-- breadcrumb-area -->
    <section class="breadcrumb__area include-bg pt-150 pb-150 breadcrumb__overlay"
        data-background="{{ asset('app/assets/img/breadcrumb/bunderan-bg.jpeg') }}">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="breadcrumb__content p-relative z-index-1">
                        <h3 class="breadcrumb__title mb-20 text-center">Tugas Pokok & Fungsi</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- video-area -->
    <section class="video-area pt-90 pb-120 wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".4s">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-12 col-md-12">
                    <div class="section-title mb-65">
                        <span class="tp-sub-title-box mb-15">Tugas Pokok & Fungsi</span>
                        <h2 class="tp-section-title mb-20">Dinas Pariwisata Kepemudaan Dan Olahraga
                            Kabupaten
                            Indramayu Tahun {{ date('Y') }}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="video-bg p-relative text-center">
                        <img src="{{ asset('app/assets/img/bg/video-bg-01.jpg') }}" alt="video-bg">
                        <div class="video-shape">
                            <img src="{{ asset('app/assets/img/about/shape-2-img-2.png') }}" alt="video-shape">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- video-area-end -->
@endsection
