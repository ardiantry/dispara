@extends('app.layouts.main')
@section('title', 'Event')
@section('app')
    <!-- breadcrumb-area -->
    <section class="breadcrumb__area include-bg pt-150 pb-150 breadcrumb__overlay"
        data-background="{{ asset('app/assets/img/breadcrumb/event-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="breadcrumb__content p-relative z-index-1">
                        <h3 class="breadcrumb__title mb-20">Event</h3>
                        <div class="breadcrumb__list">
                            <span><a href="/">Home</a></span>
                            <span class="dvdr"><i class="fa-regular fa-angle-right"></i></span>
                            <span class="sub-page-black">Event Pengguna</span>
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
            @if (count($eventPengguna))
                <div class="row text-center">
                    <div class="col-lg-12 col-md-12">
                        <div class="section-title mb-65">
                            <span class="tp-sub-title-box mb-15">Event Pengguna</span>
                            <h2 class="tp-section-title mb-20">Berikut adalah event yang Kamu ikuti</h2>
                        </div>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-xxl-8 col-xl-8 col-lg-7 col-md-12 mx-auto">
                    <div class="postbox__wrapper pr-20">
                        @forelse($eventPengguna as $data)
                            <article class="postbox__item format-image mb-60 transition-3">
                                <div class="postbox__thumb w-img mb-30">
                                    <a href="{{ route('app-event.show', $data->event['id']) }}">
                                        <img src="{{ asset('storage/' . $data->event['image']) }}"
                                            alt="{{ $data->event['title'] }}" style="width: 870px; height:460px;"
                                            draggable="false">
                                    </a>
                                </div>
                                <div class="postbox__content">
                                    <div class="postbox__meta">
                                        <span class="badge bg-secondary text-white">
                                            {{ $data->event->kategori['nama_kategori'] }}
                                        </span>
                                        <span><i class="fi fi-rr-calendar"></i>
                                            {{ $data->event->created_at->format('M d, Y') }} </span>
                                        <span><i class="fi fi-rr-clock"></i>
                                            {{ $data->event->created_at->diffForHumans() }}</span>
                                        <span><i class="fi fi-rr-user"></i> {{ $data->event['author'] }}</span>
                                    </div>
                                    <h3 class="postbox__title">
                                        <a href="{{ route('app-event.show', $data->event['id']) }}">
                                            {{ $data->event['title'] }}</a>
                                    </h3>
                                    <div class="postbox__text">
                                        <p>{{ Str::limit(strip_tags($data->event['isi']), 330, '...') }}</p>
                                    </div>
                                    <div class="postbox__read-more">
                                        <a href="{{ route('app-event.show', $data->event['id']) }}" class="tp-btn">Baca
                                            selengkapnya</a>
                                    </div>
                                </div>
                            </article>
                        @empty
                            <h1 class="text-center bg-danger p-3 text-white">Opps... Kamu belum memiliki event yang
                                diikuti
                            </h1>
                        @endforelse
                        @if ($eventPengguna->count())
                            <div class="basic-pagination">
                                <nav>
                                    <ul>
                                        <li>
                                            @if ($eventPengguna->onFirstPage())
                                                <span class="disabled">
                                                    <i class="far fa-angle-left"></i>
                                                </span>
                                            @else
                                                <a href="{{ $eventPengguna->previousPageUrl() }}">
                                                    <i class="far fa-angle-left"></i>
                                                </a>
                                            @endif
                                        </li>

                                        @foreach ($eventPengguna->getUrlRange(1, $eventPengguna->lastPage()) as $page => $url)
                                            <li>
                                                @if ($page == $eventPengguna->currentPage())
                                                    <span class="current">{{ $page }}</span>
                                                @else
                                                    <a href="{{ $url }}">{{ $page }}</a>
                                                @endif
                                            </li>
                                        @endforeach

                                        <li>
                                            @if ($eventPengguna->hasMorePages())
                                                <a href="{{ $eventPengguna->nextPageUrl() }}">
                                                    <i class="far fa-angle-right"></i>
                                                </a>
                                            @else
                                                <span class="disabled">
                                                    <i class="far fa-angle-right"></i>
                                                </span>
                                            @endif
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- postbox area end -->
@endsection
