<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">


        <div class="user-sidebar text-center">
            <div class="dropdown">
                <div class="user-img">
                    @if (auth()->user()->profile_image_path)
                        <img src="{{ asset('storage/' . auth()->user()->profile_image_path) }}" alt="Image not found"
                            class="rounded-circle">
                    @else
                        <img src="{{ asset('assets/images/imagenotfound.jpeg') }}" alt="Logo" class="rounded-circle">
                    @endif
                    <span class="avatar-online bg-success"></span>
                </div>
                <div class="user-info">
                    <h5 class="mt-3 font-size-16 text-white">Admin</h5>
                    <span class="font-size-13 text-white-50">{{ auth()->user()->name }}</span>
                </div>
            </div>
        </div>
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li class="{{ request()->is('dashboard') ? 'mm-active' : '' }}">
                    <a href="{{ route('dashboard') }}" class="waves-effect">
                        <i class="dripicons-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="menu-title">Arsip & Event</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="dripicons-suitcase"></i>
                        <span>Event</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li class="{{ request()->routeIs('kategori-acara*') ? 'mm-active' : '' }}"><a
                                href="{{ route('kategori-acara.index') }}">Kategori Event</a></li>
                        <li class="{{ request()->routeIs('acara*') ? 'mm-active' : '' }}"><a
                                href="{{ route('acara.index') }}">Kelola Event</a></li>
                        <li class="{{ request()->routeIs('pengunjung-acara*') ? 'mm-active' : '' }}"><a
                                href="{{ route('pengunjung-acara.index') }}">Pengunjung Event</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="dripicons-to-do"></i>
                        <span>Berita Media</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li class="{{ request()->routeIs('kategori-berita*') ? 'mm-active' : '' }}"><a
                                href="{{ route('kategori-berita.index') }}">Kategori Berita</a></li>

                        <li class="{{ request()->routeIs('berita*') ? 'mm-active' : '' }}"><a
                                href="{{ route('berita.index') }}">Kelola Berita</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-newspaper"></i>
                        <span>Artikel</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li class="{{ request()->routeIs('kategori-artikel*') ? 'mm-active' : '' }}"><a
                                href="{{ route('kategori-artikel.index') }}">Kategori Artikel</a></li>

                        <li class="{{ request()->routeIs('artikel*') ? 'mm-active' : '' }}"><a
                                href="{{ route('artikel.index') }}">Kelola Artikel</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="dripicons-map"></i>
                        <span>Wisata</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li class="{{ request()->routeIs('kategori-wisata*') ? 'mm-active' : '' }}"><a
                                href="{{ route('kategori-wisata.index') }}">Kategori
                                Wisata</a></li>
                        <li class="{{ request()->routeIs('wisata*') ? 'mm-active' : '' }}">
                            <a href="{{ route('wisata.index') }}">Kelola Wisata</a></li>
                        <li class="{{ request()->routeIs('virtual*') ? 'mm-active' : '' }}"><a href="{{ route('virtual.index') }}">Virtual Tour</a></li>
                    </ul>
                </li>
                <li class="menu-title">Umum</li>
                <li class="{{ request()->routeIs('pengaturan-website*') ? 'mm-active' : '' }}">
                    <a href="{{ route('pengaturan-website.index') }}" class="waves-effect">
                        <i class="dripicons-gear"></i>
                        <span>Pengaturan</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
