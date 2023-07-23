@extends('app.layouts.main')
@section('title', 'Artikel Detail')
@section('app')
    <!-- breadcrumb-area -->
    <section class="breadcrumb__area include-bg pt-150 pb-150 breadcrumb__overlay"
        data-background="{{ asset('app/assets/img/breadcrumb/berita-bg.png') }}">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="breadcrumb__content p-relative z-index-1">
                        <h3 class="breadcrumb__title mb-20">Artikel</h3>
                        <div class="breadcrumb__list">
                            <span><a href="{{ url('/') }}">Home</a></span>
                            <span class="dvdr"><i class="fa-regular fa-angle-right"></i></span>
                            <span><a href="{{ route('app-edutips.index') }}">Artikel Selengkapnya</a></span>
                            <span class="dvdr"><i class="fa-regular fa-angle-right"></i></span>
                            <span class="sub-page-black">Detail Artikel </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- postbox area start -->
    <div class="postbox__area pt-120 pb-120 wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".2s">
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 col-xl-8 col-lg-7 col-md-12 mx-auto">
                    <div class="postbox__wrapper pr-20">
                        <article class="postbox__item format-image mb-60 transition-3">
                            <div class="postbox__thumb w-img mb-30">
                                <a href="javascript:void(0)">
                                    <img src="{{ asset('storage/' . $artikelPostingan['image']) }}"
                                        alt="{{ $artikelPostingan['title'] }}" style="width: 870px; height:460px;"
                                        draggable="false">
                                </a>
                            </div>
                            <div class="postbox__content">
                                <div class="postbox__meta">
                                    <span class="badge bg-secondary text-white">
                                        {{ $artikelPostingan->kategori['nama_kategori'] }}
                                    </span>
                                    <span><i class="fi fi-rr-calendar"></i>
                                        {{ $artikelPostingan->created_at->format('M d, Y') }}
                                    </span>
                                    <span><i class="fi fi-rr-clock"></i>
                                        {{ $artikelPostingan->created_at->diffForHumans() }}</span>
                                    <span><i class="fi fi-rr-user"></i> {{ $artikelPostingan['author'] }}</span>
                                </div>
                                <h3 class="postbox__title">
                                    {{ $artikelPostingan['title'] }}
                                </h3>
                                <div class="postbox__text">
                                    {!! $artikelPostingan['isi'] !!}
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- postbox area end -->
@endsection
