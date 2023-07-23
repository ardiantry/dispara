@extends('app.layouts.main')
@section('title', 'Artikel')
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
                            <span><a href="/">Home</a></span>
                            <span class="dvdr"><i class="fa-regular fa-angle-right"></i></span>
                            <span class="sub-page-black">Artikel</span>
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
                <div class="col-xxl-8 col-xl-8 col-lg-7 col-md-12">
                    <div class="postbox__wrapper pr-20">
                        @forelse($artikels as $data)
                            <article class="postbox__item format-image mb-60 transition-3">
                                <div class="postbox__thumb w-img mb-30">
                                    <a href="{{ route('app-edutips.show', $data['id']) }}">
                                        <img src="{{ asset('storage/' . $data['image']) }}" alt="{{ $data['title'] }}"
                                            style="width: 870px; height:460px;" draggable="false">
                                    </a>
                                </div>
                                <div class="postbox__content">
                                    <div class="postbox__meta">
                                        <span class="badge bg-secondary text-white">
                                            {{ $data->kategori['nama_kategori'] }}
                                        </span>
                                        <span><i class="fi fi-rr-calendar"></i> {{ $data->created_at->format('M d, Y') }}
                                        </span>
                                        <span><i class="fi fi-rr-clock"></i>
                                            {{ $data->created_at->diffForHumans() }}</span>
                                        <span><i class="fi fi-rr-user"></i>{{ $data['author'] }}</span>
                                    </div>
                                    <h3 class="postbox__title">
                                        <a href="{{ route('app-edutips.show', $data['id']) }}">{{ $data['title'] }}</a>
                                    </h3>
                                    <div class="postbox__text">
                                        <p>{{ Str::limit(strip_tags($data['isi']), 330, '...') }}</p>
                                    </div>
                                    <div class="postbox__read-more">
                                        <a href="{{ route('app-edutips.show', $data['id']) }}" class="tp-btn">Baca
                                            selengkapnya</a>
                                    </div>
                                </div>
                            </article>
                        @empty
                            <p class="text-center">Oppsss... Tidak ada Artikel tersedia</p>
                        @endforelse
                        @if ($artikels->count())
                            <div class="basic-pagination">
                                <nav>
                                    <ul>
                                        <li>
                                            @if ($artikels->onFirstPage())
                                                <span class="disabled">
                                                    <i class="far fa-angle-left"></i>
                                                </span>
                                            @else
                                                <a href="{{ $artikels->previousPageUrl() }}">
                                                    <i class="far fa-angle-left"></i>
                                                </a>
                                            @endif
                                        </li>

                                        @foreach ($artikels->getUrlRange(1, $artikels->lastPage()) as $page => $url)
                                            <li>
                                                @if ($page == $artikels->currentPage())
                                                    <span class="current">{{ $page }}</span>
                                                @else
                                                    <a href="{{ $url }}">{{ $page }}</a>
                                                @endif
                                            </li>
                                        @endforeach

                                        <li>
                                            @if ($artikels->hasMorePages())
                                                <a href="{{ $artikels->nextPageUrl() }}">
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
                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-12">
                    <div class="sidebar__wrapper">
                        <div class="sidebar__widget mb-55">
                            <div class="sidebar__widget-content">
                                <h3 class="sidebar__widget-title mb-25">Search</h3>
                                <div class="sidebar__search">
                                    <form>
                                        <div class="sidebar__search-input-2">
                                            <input type="text" value="{{ request('search_query') }}"
                                                placeholder="Cari artikelmu disini..." name="search_query">
                                            <button type="submit"><i class="far fa-search"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @auth
                            <div class="sidebar__widget mb-55">
                                <h3 class="sidebar__widget-title mb-25">Baru dikunjungi</h3>
                                <div class="sidebar__widget-content">
                                    <div class="sidebar__post rc__post">
                                        @forelse($recent as $r)
                                            <div class="rc__post mb-20 d-flex align-items-center">
                                                <div class="rc__post-thumb">
                                                    <a href="{{ route('app-edutips.show', $r->artikel['id']) }}"><img
                                                            src="{{ asset('storage/' . $r->artikel['image']) }}"
                                                            alt="{{ $r->artikel['title'] }}"
                                                            style="width: 90px; height: 90px;"></a>
                                                </div>
                                                <div class="rc__post-content">
                                                    <h3 class="rc__post-title">
                                                        <a
                                                            href="{{ route('app-edutips.show', $r->artikel['id']) }}">{{ $r->artikel['title'] }}</a>
                                                    </h3>
                                                    <div class="rc__meta">
                                                        <span>{{ $r->artikel->created_at->format('M d, Y') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <p>Kamu belum melakukan kunjungan artikel</p>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        @endauth
                        <div class="sidebar__widget mb-40">
                            <h3 class="sidebar__widget-title mb-10">Kategori Artikel</h3>
                            <div class="sidebar__widget-content">
                                <ul>
                                    @forelse ($kategorisArtikel as $data)
                                        <li>
                                            <a
                                                href="{{ route('app-edutips.index', ['kategori-artikel' => $data['nama_kategori']]) }}">
                                                {{ $data['nama_kategori'] }}
                                                <span>({{ $data->artikels_postingan_count }})</span>
                                            </a>
                                        </li>
                                    @empty
                                        <li class="text-center text-muted">
                                            Tidak ada kategori artikel tersedia
                                        </li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- postbox area end -->
@endsection
