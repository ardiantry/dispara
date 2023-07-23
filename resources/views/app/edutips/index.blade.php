@extends('app.layouts.main')
@section('title', 'Edukasi & Tips')
@section('app')
    <!-- breadcrumb-area -->
    <section class="breadcrumb__area include-bg pt-150 pb-150 breadcrumb__overlay"
        data-background="{{ asset('app/assets/img/breadcrumb/tutor-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="breadcrumb__content p-relative z-index-1">
                        <h3 class="breadcrumb__title mb-20">Edukasi & Tips</h3>
                        <div class="breadcrumb__list">
                            <span><a href="/">Home</a></span>
                            <span class="dvdr"><i class="fa-regular fa-angle-right"></i></span>
                            <span class="sub-page-black">Pedoman Informasi Lain</span>
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
                        <article class="postbox__item format-image mb-60 transition-3">
                            <div class="postbox__thumb w-img mb-30">
                                <a href="{{ route('app-edutips.show') }}">
                                    <img src="{{ asset('app/assets/img/blog/artikel.png') }}" alt=""
                                        style="width: 870px; height:460px;" draggable="false">
                                </a>
                            </div>
                            <div class="postbox__content">
                                <div class="postbox__meta">
                                    <span class="badge bg-secondary text-white">
                                        Olahraga
                                    </span>
                                    <span><i class="fi fi-rr-calendar"></i> July 21, 2020 </span>
                                    <span><i class="fi fi-rr-clock"></i> Diposting 2 jam yang lalu</span>
                                    <span><i class="fi fi-rr-user"></i> Admin</span>
                                </div>
                                <h3 class="postbox__title">
                                    <a href="{{ route('app-edutips.show') }}">How to Succeed in the aws Certified Developer
                                        Associate
                                        Exam</a>
                                </h3>
                                <div class="postbox__text">
                                    <p>Compellingly exploit B2B vortals with emerging total linkage. Appropriately pursue
                                        strategic leadership whe intermandated ideas. Proactively revolutionize
                                        interoperable "outside the box" thinking with fully researched innovation.
                                        Dramatically facilitate exceptional architectures and bricks-and-clicks data.
                                        Progressively genera extensible e-services for.</p>
                                </div>
                                <div class="postbox__read-more">
                                    <a href="{{ route('app-edutips.show') }}" class="tp-btn">Baca selengkapnya</a>
                                </div>
                            </div>
                        </article>
                        <article class="postbox__item format-image mb-60 transition-3">
                            <div class="postbox__thumb w-img mb-30">
                                <a href="{{ route('app-edutips.show') }}">
                                    <img src="app/assets/img/blog/desain.jpeg" alt=""
                                        style="width: 870px; height:460px;" draggable="false">
                                </a>
                            </div>
                            <div class="postbox__content">
                                <div class="postbox__meta">
                                    <span class="badge bg-secondary text-white">
                                        Berita Media
                                    </span>
                                    <span><i class="fi fi-rr-calendar"></i> July 21, 2020 </span>
                                    <span><i class="fi fi-rr-clock"></i> Diposting 2 jam yang lalu</span>
                                    <span><i class="fi fi-rr-user"></i> Admin</span>
                                </div>
                                <h3 class="postbox__title">
                                    <a href="{{ route('app-edutips.show') }}">How to Succeed in the aws Certified Developer
                                        Associate
                                        Exam</a>
                                </h3>
                                <div class="postbox__text">
                                    <p>Compellingly exploit B2B vortals with emerging total linkage. Appropriately pursue
                                        strategic leadership whe intermandated ideas. Proactively revolutionize
                                        interoperable "outside the box" thinking with fully researched innovation.
                                        Dramatically facilitate exceptional architectures and bricks-and-clicks data.
                                        Progressively genera extensible e-services for.</p>
                                </div>
                                <div class="postbox__read-more">
                                    <a href="{{ route('app-edutips.show') }}" class="tp-btn">Baca selengkapnya</a>
                                </div>
                            </div>
                        </article>
                        <article class="postbox__item format-image mb-60 transition-3">
                            <div class="postbox__thumb w-img mb-30">
                                <a href="{{ route('app-edutips.show') }}">
                                    <img src="app/assets/img/blog/portofolio.jpeg" alt=""
                                        style="width: 870px; height:460px;" draggable="false">
                                </a>
                            </div>
                            <div class="postbox__content">
                                <div class="postbox__meta">
                                    <span class="badge bg-secondary text-white">
                                        Olahraga
                                    </span>
                                    <span><i class="fi fi-rr-calendar"></i> July 21, 2020 </span>
                                    <span><i class="fi fi-rr-clock"></i> Diposting 2 jam yang lalu</span>
                                    <span><i class="fi fi-rr-user"></i> Admin</span>
                                </div>
                                <h3 class="postbox__title">
                                    <a href="{{ route('app-edutips.show') }}">How to Succeed in the aws Certified Developer
                                        Associate
                                        Exam</a>
                                </h3>
                                <div class="postbox__text">
                                    <p>Compellingly exploit B2B vortals with emerging total linkage. Appropriately pursue
                                        strategic leadership whe intermandated ideas. Proactively revolutionize
                                        interoperable "outside the box" thinking with fully researched innovation.
                                        Dramatically facilitate exceptional architectures and bricks-and-clicks data.
                                        Progressively genera extensible e-services for.</p>
                                </div>
                                <div class="postbox__read-more">
                                    <a href="{{ route('app-edutips.show') }}" class="tp-btn">Baca selengkapnya</a>
                                </div>
                            </div>
                        </article>
                        <div class="basic-pagination">
                            <nav>
                                <ul>
                                    <li>
                                        <a href="blog.html">
                                            <i class="far fa-angle-left"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <span class="current">1</span>
                                    </li>
                                    <li>
                                        <a href="blog.html">2</a>
                                    </li>
                                    <li>
                                        <a href="blog.html">3</a>
                                    </li>
                                    <li>
                                        <a href="blog.html">
                                            <i class="far fa-angle-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-12">
                    <div class="sidebar__wrapper">
                        <div class="sidebar__widget mb-55">
                            <div class="sidebar__widget-content">
                                <h3 class="sidebar__widget-title mb-25">Search</h3>
                                <div class="sidebar__search">
                                    <form action="#">
                                        <div class="sidebar__search-input-2">
                                            <input type="text" placeholder="Cari berita....">
                                            <button type="submit"><i class="far fa-search"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar__widget mb-55">
                            <h3 class="sidebar__widget-title mb-25">Recent Post</h3>
                            <div class="sidebar__widget-content">
                                <div class="sidebar__post rc__post">
                                    <div class="rc__post mb-20 d-flex align-items-center">
                                        <div class="rc__post-thumb">
                                            <a href="blog-details.html"><img src="app/assets/img/blog/pariwisata1.jpeg"
                                                    alt="blog-sidebar" style="width: 90px; height: 90px;"></a>
                                        </div>
                                        <div class="rc__post-content">
                                            <h3 class="rc__post-title">
                                                <a href="blog-details.html">Seamlessly monetize centa material
                                                    bleeding.</a>
                                            </h3>
                                            <div class="rc__meta">
                                                <span>21 Jan 2022</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rc__post mb-20 d-flex align-items-center">
                                        <div class="rc__post-thumb">
                                            <a href="blog-details.html"><img src="app/assets/img/blog/pariwisata2.jpg"
                                                    alt="blog-sidebar" style="width: 90px; height: 90px;"></a>
                                        </div>
                                        <div class="rc__post-content">
                                            <h3 class="rc__post-title">
                                                <a href="blog-details.html">How often should you schedule professional</a>
                                            </h3>
                                            <div class="rc__meta">
                                                <span>July 21, 2021</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rc__post mb-20 d-flex align-items-center">
                                        <div class="rc__post-thumb">
                                            <a href="blog-details.html"><img src="app/assets/img/blog/pariwisata1.jpeg"
                                                    alt="blog-sidebar" style="width: 90px; height: 90px;"></a>
                                        </div>
                                        <div class="rc__post-content">
                                            <h3 class="rc__post-title">
                                                <a href="blog-details.html">How to keep your institue and home Safe</a>
                                            </h3>
                                            <div class="rc__meta">
                                                <span>July 21, 2021</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar__widget mb-40">
                            <h3 class="sidebar__widget-title mb-10">Category</h3>
                            <div class="sidebar__widget-content">
                                <ul>
                                    <li><a href="#">Budaya <span>(14)</span></a></li>
                                    <li><a href="#">Event <span>(19)</span></a></li>
                                    <li><a href="#">Berita Media <span>(21)</span></a></li>
                                    <li><a href="#">Edukasi & Tips <span>(27)</span></a></li>
                                    <li><a href="#">Sosial <span>(35)</span></a></li>
                                    <li><a href="#">Olahraga <span>(5)</span></a></li>
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
