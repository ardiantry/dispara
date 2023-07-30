@extends('app.layouts.main')
@section('title', 'Event')
@section('app')
@php
$member=@Session::get('session_pengguna');
@endphp
<style type="text/css">
    .basic-login { 
  border: unset;
}
.btn-block {
  width: 100%;
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
                           
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="blog-btn text-center w-100">
                                            <!-- Button trigger modal -->

                                            <button type="button" class="tp-btn" 
                                                id="{{@Session::get('session_pengguna')?'Isibukutamu':'LoginMember'}}">
                                                IKUT EVENT
                                            </button>
                                        </div>
                                        <!-- Modal -->
                                        <div class="modal fade" id="ikuteventModal" tabindex="-1"
                                            aria-labelledby="ikuteventModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4>Form Peserta Event</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                            <form action="#" method="POST" id="daftarEvent" name="daftarEvent">
                                                                <div class="msg-alert"></div>
                                                                <div class="form-group row mb-3">
                                                                    <label for="name" class="col-md-4">Nama Lengkap</label>
                                                                    <div class="col-md-8">
                                                                        <input type="text" name="name" readonly="readonly" 
                                                                            value="{{@$member->nama}}"
                                                                            placeholder="Masukan nama Anda" pattern="[^0-9]+"
                                                                            required
                                                                            oninput="this.value=this.value.replace(/[0-9]/g,'');"
                                                                            autofocus autocomplete="name" class="form-control"/> 
                                                                    </div>
                                                                </div>

                                                                 <div class="form-group row mb-3">
                                                                    <label for="email" class="col-md-4">Email</label>
                                                                    <div class="col-md-8">
                                                                        <input type="text" name="email" readonly="readonly" 
                                                                            value="{{@$member->email}}"
                                                                            placeholder="Masukan Email Anda" pattern="[^0-9]+"
                                                                            required
                                                                            oninput="this.value=this.value.replace(/[0-9]/g,'');"
                                                                            autofocus autocomplete="email" class="form-control"/> 
                                                                    </div>
                                                                </div>
                                                                 <div class="form-group row mb-3">
                                                                    <label for="no_hp" class="col-md-4">No Hp</label>
                                                                    <div class="col-md-8">
                                                                        <input id="no_hp" pattern="[0-9]*" name="no_hp" readonly="readonly" 
                                                                        value="{{@$member->no_hp}}" inputmode="numeric"
                                                                        minlength="10" maxlength="13" required
                                                                        placeholder="Masukan Nomor Handphone Anda"
                                                                        oninput="this.value=this.value.replace(/[^0-9]/g,'');"  class="form-control"/>
                                                                    </div>
                                                                </div>

                                                                 <div class="form-group row mb-3">
                                                                    <label for="no_hp" class="col-md-4">Alamat</label>
                                                                    <div class="col-md-8">
                                                                       <input id="alamat" type="text" name="alamat"
                                                                        value=""
                                                                        placeholder="Masukan alamat domisili Anda" required  class="form-control"/>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row mb-3">
                                                                     <label for="Instansi" class="col-md-4">Instansi</label>
                                                                      <div class="col-md-8">
                                                                    <input id="Instansi" type="text" name="instansi"
                                                                        value="{{@$member->instansi}}"
                                                                        placeholder="Instansi/Lembaga/Organisasi/Masyarakat Umum"
                                                                        required class="form-control" />
                                                                        </div>
                                                                  </div>      
                                                                <div class="form-grou row justify-content-md-end">
                                                                    <div class="col-md-8">
                                                                        <button class="btn btn-primary btn-block" type="submit">Ikut</button>
                                                                        
                                                                    </div>
                                                                </div>
                                                                 
                                                            </form>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end Modal -->
                                        </div>
                                    </div>
                                </div>
                            
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('body').delegate('#LoginMember','click',function(e)
        {
            e.preventDefault();
            $('#ModalLogin').modal('show');
            $('.msg-alert').empty();
        });
        $('body').delegate('#Isibukutamu','click',function(e)
        {
            e.preventDefault();
            $('#ikuteventModal').modal('show');
            $('.msg-alert').empty();
        });


        @if(@Session::get('session_pengguna'))


 $('body').delegate('#daftarEvent','submit',function(e)
        {
            e.preventDefault();
            var $this=$(this);
            var label_btn= $this.find('button[type="submit"]').text();
            $this.find('.msg-alert').empty();
            $this.find('button[type="submit"]').html('loading...');
            $this.find('button[type="submit"]').attr('disabled','disabled');  
            const eventsimpan    = document.forms.namedItem('daftarEvent'); 
            const event_simpan   = new FormData(eventsimpan);
            event_simpan.append('_token', '{{csrf_token()}}'); 
            event_simpan.append('id_member', '{{$member->id}}'); 
            event_simpan.append('id_event', '{{$eventPostingan->id}}');   
            fetch('{{route('join.event')}}', { method: 'POST',body:event_simpan}).then(res => res.json()).then(data => 
            {
                $this.find('button[type="submit"]').html(label_btn);
                $this.find('button[type="submit"]').removeAttr('disabled','disabled');  

               var stst_=data.error?'danger':'success';
               $this.find('.msg-alert').html(`<div class="alert alert-${stst_} text-center"><ul>${data.alert}</ul></div>`);
               if(!data.error)
               {
                
                     setTimeout(function(){ 
                                    $('#ikuteventModal').modal('hide');
                            },2000);

               }
               
            }).catch(error => { 
                $this.find('button[type="submit"]').html(label_btn);
                $this.find('button[type="submit"]').removeAttr('disabled','disabled');  
                $this.find('.msg-alert').html('<div class="alert alert-danger text-center">Eror koneksi buruk</div>');

            }); 

        });

        @endif
        
    </script>
    <!-- postbox area end -->
@endsection
