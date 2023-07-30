<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">

            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{ route('dashboard') }}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('app/assets/img/logo/DISPAR.png') }}" alt="" height="54">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('app/assets/img/logo/DISPAR.png') }}" alt="" height="80">
                    </span>
                </a>

                <a href="{{ route('dashboard') }}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('app/assets/img/logo/DISPAR.png') }}" alt="" height="54">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('app/assets/img/logo/DISPAR.png') }}" alt="" height="80">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="mdi mdi-menu"></i>
            </button>
        </div>

        <div class="d-flex">
            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="mdi mdi-fullscreen"></i>
                </button>
            </div>

            
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if (auth()->user()->profile_image_path)
                        <img class="rounded-circle header-profile-user"
                            src="{{ asset('storage/' . auth()->user()->profile_image_path) }}" alt="Image not found">
                    @else
                        <img class="rounded-circle header-profile-user"
                            src="{{ asset('assets/images/imagenotfound.jpeg') }}" alt="Logo">
                    @endif
                    <span class="d-none d-xl-inline-block ms-1">{{ auth()->user()->name }}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item {{ request()->routeIs('profile*') ? 'mm-active active' : '' }}"
                        href="{{ route('profile.edit') }}"><i
                            class="mdi mdi-account-circle-outline font-size-16 align-middle me-1"></i>
                        Profile</a>
                    <a class="dropdown-item d-block {{ request()->routeIs('pengaturan-website*') ? 'mm-active active' : '' }}"
                        href="{{ route('pengaturan-website.index') }}"><span
                            class="badge badge-success float-end">11</span><i
                            class="mdi mdi-cog-outline font-size-16 align-middle me-1"></i> Settings</a>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                    this.closest('form').submit();"><i
                                class="mdi mdi-power font-size-16 align-middle me-1 text-danger"></i> Logout</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
