@extends('app.layouts.main')
@section('title', 'Home')
@section('app')
<style type="text/css">
    .bg-grey {
  background: rgb(247, 248, 249);
}
.fix.blog-round {
  height: 200px;
}
.blog-edu { 
  min-height: 200px;
}
</style>
    <!-- slider-area -->
    <section class="slider-area">
        <div class="slider-active slider-arrow">
            <div class="slider-item slider-bg-height d-flex align-items-center p-relative"
                data-background="app/assets/img/slider/slider-bg-01.png">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-7 col-lg-7 col-12">
                            <div class="slider-content">
                                <span class="slider-text mb-15">Budaya</span>
                                <h2 class="slider-title mb-65">ISLAMIC CENTER INDRAMAYU</h2>
                                <div class="slider-btn">
                                    <a class="tp-btn mr-5" href="{{ route('app-tour.index') }}">Eksplore Wisata</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-5 d-none d-lg-block">
                            <div class="slider-info-list">
                                <ul>
                                    <li>
                                        <span>250</span>Masjid
                                    </li>
                                    <li>
                                        <span>120</span>Kelenteng
                                    </li>
                                    <li>
                                        <span>100</span>Gereja
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slider-item slider-bg-height d-flex align-items-center p-relative"
                data-background="app/assets/img/slider/slider-bg-02.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-7 col-lg-7">
                            <div class="slider-content">
                                <span class="slider-text mb-15">Budaya</span>
                                <h2 class="slider-title mb-65">PULAU BIAWAK INDRAMAYU</h2>
                                <div class="slider-btn">
                                    <a class="tp-btn mr-5" href="{{ route('app-tour.index') }}">Eksplore Wisata</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-5 d-none d-lg-block">
                            <div class="slider-info-list">
                                <ul>
                                    <li>
                                        <span>320</span>Laut/Pantai
                                    </li>
                                    <li>
                                        <span>222</span>Sungai
                                    </li>
                                    <li>
                                        <span>40</span>Danau
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- slider-area-end -->

    <!-- video-area -->
    <section class="bg-grey video-area pt-110 pb-120 wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".3s">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="video-bg p-relative text-center">
                        <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" width="100%"
                            height="610" type="text/html"
                            src="https://www.youtube.com/embed/GlPU73wPOPo?autoplay=0&fs=0&iv_load_policy=3&showinfo=0&rel=0&cc_load_policy=0&start=0&end=0&vq=hd1080&origin=https://youtubeembedcode.com">
                            <div><small><a href="https://youtubeembedcode.com/de/">youtubeembedcode.com/de/</a></small>
                            </div>
                            <div><small><a href="https://spindelharpan.nu/">patiens spindelharpan</a></small></div>
                            <div><small><a href="https://youtubeembedcode.com/nl/">youtubeembedcode.com/nl/</a></small>
                            </div>
                            <div><small><a href="https://xn--mikroln-jxa.com/">https://mikrolån.com</a></small></div>
                        </iframe>
                        <div class="video-shape-area">
                            <img class="video-shape" src="app/assets/img/about/shape-2-img-2.png" alt="video-shape">
                            <img class="video-shape-2 d-none d-md-block" src="app/assets/img/about/video-2-shape-2.png"
                                alt="video-shape">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- video-area-end -->
    <!-- blog-area -->
    <section class="blog-area pt-115 pb-110 wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".3s">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center mb-65">
                        <h2 class="tp-section-title mb-20">Headline News</h2>
                    </div>
                </div>
            </div> 
            <div class="row">
                @forelse($beritas as $data)
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="tp-blog tp-blog-parent mb-60">
                            <div class="tp-blog__thumb">
                                <div class="fix blog-round">
                                    <a href="{{ route('app-blog.show', $data['id']) }}"><img
                                            src="{{ asset('storage/' . $data['image']) }}" alt="{{ $data['title'] }}"></a>
                                </div>
                            </div>
                            <div class="tp-blog__content blog-edu p-relative">
                                <div class="tp-blog__meta-list mb-10">
                                    <span><i class="fi fi-rr-calendar"></i> {{ $data->created_at->format('M d, Y') }}
                                    </span>
                                    <span><a
                                            href="{{ route('app-blog.index', ['kategori-berita' => $data->kategori['nama_kategori']]) }}"><i
                                                class="fi fi-sr-apps"></i>{{ $data->kategori['nama_kategori'] }}</a></span>
                                </div>
                                <h3 class="tp-blog__title mb-15"><a
                                        href="{{ route('app-blog.show', $data['id']) }}">{{ $data['title'] }}</a></h3>
                                <span><i class="fi fi-rr-clock"></i> {{ $data->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                        <div class="blog-btn text-center">
                            <a href="{{ route('app-blog.show', $data['id']) }}" class="tp-btn">Selengkapnya</a>
                        </div>
                    </div>
                @empty
                    <p class="text-center">Oppsss... Tidak ada Berita tersedia</p>
                @endforelse
            </div>
        </div>
    </section>
    <!-- blog-area-end -->


 <!-- Event -->
@php
$tb_event=App\Models\Event::limit(3)->get();
//dd($tb_event);
@endphp
    <section class="bg-grey blog-area pt-115 pb-110 wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".3s">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center mb-65">
                        <h2 class="tp-section-title mb-20">Event</h2>
                    </div>
                </div>
            </div> 
            <div class="row">
                @forelse($tb_event as $data)
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="tp-blog tp-blog-parent mb-60">
                            <div class="tp-blog__thumb">
                                <div class="fix blog-round">
                                    <a href="{{ route('app-blog.show', $data['id']) }}"><img
                                            src="{{ asset('storage/' . $data['image']) }}" alt="{{ $data['title'] }}"></a>
                                </div>
                            </div>
                            <div class="tp-blog__content blog-edu p-relative">
                                <div class="tp-blog__meta-list mb-10">
                                    <span><i class="fi fi-rr-calendar"></i> {{ $data->created_at->format('M d, Y') }}
                                    </span>
                                     
                                </div>
                                <h3 class="tp-blog__title mb-15"><a
                                        href="{{ route('app-event.show', $data['id']) }}">{{ $data['title'] }}</a></h3>
                                <span><i class="fi fi-rr-clock"></i> {{ $data->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                      
                    </div>
                @empty
                    <p class="text-center">Oppsss... Tidak ada Berita tersedia</p>
                @endforelse
            </div>
        </div>
    </section>
    <!-- event-area-end -->

<!-- Event -->
@php
$tb_artikel=App\Models\Artikel::limit(3)->get();
//dd($tb_event);
@endphp
    <section class="blog-area pt-115 pb-110 wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".3s">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center mb-65">
                        <h2 class="tp-section-title mb-20">Artikel</h2>
                    </div>
                </div>
            </div> 
            <div class="row">
                @forelse($tb_artikel as $data)
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="tp-blog tp-blog-parent mb-60">
                            <div class="tp-blog__thumb">
                                <div class="fix blog-round">
                                    <a href="{{ route('app-blog.show', $data['id']) }}"><img
                                            src="{{ asset('storage/' . $data['image']) }}" alt="{{ $data['title'] }}"></a>
                                </div>
                            </div>
                            <div class="tp-blog__content blog-edu p-relative">
                                <div class="tp-blog__meta-list mb-10">
                                    <span><i class="fi fi-rr-calendar"></i> {{ $data->created_at->format('M d, Y') }}
                                    </span>
                                     
                                </div>
                                <h3 class="tp-blog__title mb-15"><a
                                        href="{{ route('app-edutips.show', $data['id']) }}">{{ $data['title'] }}</a></h3>
                                <span><i class="fi fi-rr-clock"></i> {{ $data->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                      
                    </div>
                @empty
                    <p class="text-center">Oppsss... Tidak ada Berita tersedia</p>
                @endforelse
            </div>
        </div>
    </section>
    <!-- event-area-end -->


@php
$tbWisata=App\Models\Wisata::limit(3)->get();
//dd($tb_event);
@endphp
    <section class="bg-grey  blog-area pt-115 pb-110 wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".3s">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center mb-65">
                        <h2 class="tp-section-title mb-20">Wisata</h2>
                    </div>
                </div>
            </div> 
            <div class="row">
                @forelse($tbWisata as $data)
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="tp-blog tp-blog-parent mb-60">
                            <div class="tp-blog__thumb">
                                <div class="fix blog-round">
                                    <a href="{{ route('app-blog.show', $data['id']) }}"><img
                                            src="{{ asset('storage/' . $data['image']) }}" alt="{{ $data['title'] }}"></a>
                                </div>
                            </div>
                            <div class="tp-blog__content blog-edu p-relative">
                                <div class="tp-blog__meta-list mb-10">
                                    <span><i class="fi fi-rr-calendar"></i> {{ $data->created_at->format('M d, Y') }}
                                    </span>
                                     
                                </div>
                                <h3 class="tp-blog__title mb-15"><a
                                        href="{{ route('app-tour.show', $data['id']) }}">{{ $data['title'] }}</a></h3>
                                <span><i class="fi fi-rr-clock"></i> {{ $data->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                      
                    </div>
                @empty
                    <p class="text-center">Oppsss... Tidak ada Berita tersedia</p>
                @endforelse
            </div>
        </div>
    </section>
    <!-- event-area-end -->


@endsection
