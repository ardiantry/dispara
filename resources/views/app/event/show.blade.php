@extends('app.layouts.main')
@section('title', 'Event')
@section('app')
<style type="text/css">
    .basic-login { 
  border: unset;
}
</style>
    <!-- breadcrumb-area -->
    <section class="breadcrumb__area include-bg pt-150 pb-150 breadcrumb__overlay"
        data-background="{{ asset('app/assets/img/breadcrumb/event-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="breadcrumb__content p-relative z-index-1">
                        <h3 class="breadcrumb__title mb-20">Event</h3>
                        <div class="breadcrumb__list">
                            <span><a href="{{ url('/') }}">Home</a></span>
                            <span class="dvdr"><i class="fa-regular fa-angle-right"></i></span>
                            <span><a href="{{ route('app-event.index') }}">Event Pariwisata, Event Seni Budaya</a></span>
                            <span class="dvdr"><i class="fa-regular fa-angle-right"></i></span>
                            <span class="sub-page-black">Detail Event</span>
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
                                    <img src="{{ asset('storage/' . $eventPostingan['image']) }}"
                                        alt="{{ $eventPostingan['title'] }}" style="width: 870px; height:460px;"
                                        draggable="false">
                                </a>
                            </div>
                            <div class="postbox__content">
                                <div class="postbox__meta">
                                    <span class="badge bg-secondary text-white">
                                        {{ $eventPostingan->kategori['nama_kategori'] }}
                                    </span>
                                    <span><i class="fi fi-rr-calendar"></i>
                                        {{ date_create($eventPostingan['tgl_mulai'])->format('M d, Y') . ' Pukul ' . date_create($eventPostingan['tgl_mulai'])->format('H:i') . ' WIB' }}
                                    </span>
                                    <span><i class="fi fi-rr-clock"></i>
                                        {{ $eventPostingan->created_at->diffForHumans() }}</span>
                                    <span><i class="fi fi-rr-user"></i> {{ $eventPostingan['author'] }}</span>
                                </div>
                                <h3 class="postbox__title">
                                    {{ $eventPostingan['title'] }}
                                </h3>
                                <div class="postbox__text">
                                    {!! $eventPostingan['isi'] !!}
                                </div>
                            </div>
                            @if (!$eventPenggunaStatus)
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="blog-btn text-center w-100">
                                            <!-- Button trigger modal -->
                                            <button type="button" class="tp-btn" 
                                                data-bs-target="#ikuteventModal">
                                                IKUT EVENT
                                            </button>
                                        </div>
                                        <!-- Modal -->
                                        <div class="modal fade" id="ikuteventModal" tabindex="-1"
                                            aria-labelledby="ikuteventModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="basic-login">
                                                            @if ($message = session('success'))
                                                                <div class="alert alert-success" role="alert">
                                                                    {{ $message }}!
                                                                </div>
                                                            @elseif($message = session('error'))
                                                                <div class="alert alert-danger" role="alert">
                                                                    {{ $message }}
                                                                </div>
                                                            @elseif($errors->any())
                                                                <div class="alert alert-danger" role="alert">
                                                                    Terjadi kesalahan
                                                                </div>
                                                            @endif
                                                            @guest
                                                                <h3 class="text-center mb-60">Formulir Pendaftaran</h3>
                                                                <form
                                                                    action="{{ route('buku-tamu.store', ['postingan' => $eventPostingan['id']]) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <label for="name">Nama Lengkap</label>
                                                                    <input id="name" type="text" name="name"
                                                                        value="{{ old('name') }}"
                                                                        placeholder="Masukan nama Anda" pattern="[^0-9]+"
                                                                        required
                                                                        oninput="this.value=this.value.replace(/[0-9]/g,'');"
                                                                        autofocus autocomplete="name" />
                                                                    @error('name')
                                                                        <span role="alert">
                                                                            <strong
                                                                                class="text-danger">{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                    <label for="email">Email</label>
                                                                    <input id="email" type="email" name="email"
                                                                        value="{{ old('email') }}"
                                                                        placeholder="Masukan alamat Email anda" required
                                                                        autocomplete="username" />
                                                                    @error('email')
                                                                        <span role="alert">
                                                                            <strong
                                                                                class="text-danger">{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                    <label for="pelindung">Pelindung</label>
                                                                    <input id="pelindung" type="text" name="pelindung"
                                                                        value="{{ old('pelindung') }}"
                                                                        placeholder="Instansi/Lembaga/Organisasi/Masyarakat Umum"
                                                                        required />
                                                                    @error('pelindung')
                                                                        <span role="alert">
                                                                            <strong
                                                                                class="text-danger">{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                    <label for="alamat">Alamat Domisili</label>
                                                                    <input id="alamat" type="text" name="alamat"
                                                                        value="{{ old('alamat') }}"
                                                                        placeholder="Masukan alamat domisili Anda" required />
                                                                    @error('alamat')
                                                                        <span role="alert">
                                                                            <strong
                                                                                class="text-danger">{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                    <label for="no_hp">Nomor Handphone</label>
                                                                    <input id="no_hp" pattern="[0-9]*" name="no_hp"
                                                                        value="{{ old('no_hp') }}" inputmode="numeric"
                                                                        minlength="10" maxlength="13" required
                                                                        placeholder="Masukan Nomor Handphone Anda"
                                                                        oninput="this.value=this.value.replace(/[^0-9]/g,'');" />
                                                                    @error('no_hp')
                                                                        <span role="alert">
                                                                            <strong
                                                                                class="text-danger">{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                    <label for="password">Password</label>
                                                                    <input id="password" type="password" name="password"
                                                                        autocomplete="new-password" required />
                                                                    @error('password')
                                                                        <span role="alert">
                                                                            <strong
                                                                                class="text-danger">{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                    <label for="password_confirmation">Konfirmasi
                                                                        Password</label>
                                                                    <input id="password_confirmation" type="password"
                                                                        name="password_confirmation"
                                                                        autocomplete="new-password" required />
                                                                    @error('password_confirmation')
                                                                        <span role="alert">
                                                                            <strong
                                                                                class="text-danger">{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                    <div class="mt-10"></div>
                                                                    <button type="submit" class="tp-btn w-100">Daftar
                                                                        sekarang</button>
                                                                </form>
                                                            @else
                                                                <h3 class="text-center mb-60">Apa anda yakin ingin mengikuti
                                                                    event ini?</h3>
                                                                <form
                                                                    action="{{ route('buku-tamu-older.store', ['postingan' => $eventPostingan['id']]) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <button type="submit" class="tp-btn w-100">Ya,
                                                                        Ikut</button>
                                                                </form>
                                                            @endguest

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end Modal -->
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('#LoginMember').click(function(e)
        {
            e.preventDefault();
            $('#ModalLogin').modal('toggle');
            $('.msg-alert').empty();
        });
    </script>
    <!-- postbox area end -->
@endsection
