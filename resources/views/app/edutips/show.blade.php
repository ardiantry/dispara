@extends('app.layouts.main')
@section('title', 'Edukasi & Tips Detail')
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
                            <span><a href="{{ url('/') }}">Home</a></span>
                            <span class="dvdr"><i class="fa-regular fa-angle-right"></i></span>
                            <span><a href="{{ route('app-edutips.index') }}">Pedoman Informasi Lain</a></span>
                            <span class="dvdr"><i class="fa-regular fa-angle-right"></i></span>
                            <span class="sub-page-black">Detail Informasi </span>
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
                                <a href="javascript:void(0)">
                                    <img src="{{ asset('app/assets/img/blog/desain.jpeg') }}" alt=""
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
                                    How to Succeed in the aws Certified Developer Associate Exam
                                </h3>
                                <div class="postbox__text">
                                    <p>Nancy boy Charles down the pub get stuffed mate easy peasy brown bread car boot
                                        squiffy loo, blimey arse over tit it's your round cup of char horse play chimney pot
                                        old. Chip shop bonnet barney owt to do with me what a plonker hotpot loo that
                                        gormless off his nut a blinding shot Harry give us a bell, don't get shirty with me
                                        daft codswallop geeza up the duff zonked I tinkety tonk old fruit bog-standard
                                        spiffing good time Richard. Are you taking the piss young delinquent wellies
                                        absolutely bladdered the BBC Eaton my good sir, cup of tea spiffing bleeder David
                                        mufty you mug <span>cor blimey guvnor, burke bog-standard brown</span> bread wind up
                                        barney. Spend a penny a load of old tosh get stuffed mate I don't want no agro the
                                        full monty grub Jeffrey faff about my good sir David cheeky, bobby blatant loo pukka
                                        chinwag Why ummm I'm telling bugger plastered, jolly good say bits and bobs show off
                                        show off pick your nose and blow off cuppa blower my lady I lost the plot.</p>

                                    <blockquote>
                                        <p>Tosser argy-bargy mush loo at public school Elizabeth up the duff buggered
                                            chinwag on your bike mate don't get shirty with me super, Jeffrey bobby Richard
                                            cheesed off spend a penny a load of old tosh blag horse.</p><cite>Jon
                                            Barsito</cite>
                                    </blockquote>

                                    <p><img src="{{ asset('app/assets/img/blog/blog-in-4.jpg') }}" alt=""></p>

                                    <h3>Epora is the only template you will ever need</h3>

                                    <p>Are you taking the piss young delinquent wellies absolutely bladdered the Eaton my
                                        good sir, cup of tea spiffing bleeder David mufty you mug cor blimey guvnor, burke
                                        bog-standard brown bread wind up barney. Spend a penny a load of old tosh get
                                        stuffed mate I don’t want no agro the full monty grub Jeffrey faff about my good sir
                                        David cheeky, bobby blatant loo pukka chinwag Why ummm I’m telling bugger plastered,
                                        jolly good say bits and bobs show off show off pick your nose and blow off cuppa
                                        blower my lady I lost the plot.</p>

                                    <p>Cheeky bugger cracking goal starkers lemon squeezy lost the plot pardon me no biggie
                                        the BBC burke gosh boot so I said wellies, zonked a load of old tosh bodge barmy
                                        skive off he legged it morish spend a penny my good sir wind up hunky-dory. Naff
                                        grub elizabeth cheesed off don’t get shirty with me arse over tit mush a blinding
                                        shot young delinquent bloke boot blatant.</p>
                                </div>
                            </div>
                        </article>
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
                                            <a href="blog-details.html"><img
                                                    src="{{ asset('app/assets/img/blog/pariwisata1.jpeg') }}"
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
                                            <a href="blog-details.html"><img
                                                    src="{{ asset('app/assets/img/blog/pariwisata2.jpg') }}"
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
                                            <a href="blog-details.html"><img
                                                    src="{{ asset('app/assets/img/blog/pariwisata1.jpeg') }}"
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
