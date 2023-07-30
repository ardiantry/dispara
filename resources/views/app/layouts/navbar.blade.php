<!-- header area start -->
@php

if(@Session::get('session_pengguna'))
{
 
}
@endphp
<style type="text/css">
    .nav-pills .nav-link {
  background: 0 0;
  border: 0;
  border-radius: .25rem;
  color: #000;
}
.nav-pills .nav-link.active, .nav-pills .show > .nav-link {
  color: #dd1212;
  background-color: unset;
}
#ModalLogin .modal-header
{
  padding: unset;  
  background: rgb(189, 189, 189);
}
#pills-tab {
  margin-bottom: 0px !important;
  margin: 10px 0px !important;
}
</style>
<header class="header__transparent">
    <div class="header__area">
        <div class="main-header third-header header-xy-spacing" id="header-sticky">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-xxl-3 col-xl-3 col-lg-5 col-md-6 col-6">
                        <div class="logo-area d-flex align-items-center">
                            <div class="logo">
                                <a href="{{ route('app.index') }}">
                                    <img src="{{ asset('app/assets/img/logo/DISPAR.png') }}" alt="logo">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div
                        class="col-xxl-9 col-xl-9 col-lg-7 col-md-6 col-6 d-flex align-items-center justify-content-end">
                        <div class="main-menu main-menu-black d-flex justify-content-end">
                            <nav id="mobile-menu">
                                <ul>
                                    <li>
                                        <a href="{{ url('/') }}">Home</a>
                                    </li>
                                    <li class="has-dropdown">
                                        <a href="javascript:void(0);">Edukasi</a>
                                        <ul class="submenu">
                                            <li><a href="{{ route('app-blog.index') }}">Berita</a></li>
                                            <li><a href="{{ route('app-edutips.index') }}">Artikel</a></li>
                                            <li><a href="{{ route('app-event.index') }}">Event</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="{{ route('app-tour.index') }}">Wisata</a>
                                    </li> 
                                   <!--  <li>
                                        <a href="{{ route('virtual-view.index') }}">Virtual View</a>
                                    </li> -->
                                    <li class="has-dropdown">
                                        <a href="javascript:void(0);">Tentang Kami</a>
                                        <ul class="submenu">
                                            <li><a href="{{ route('vismis.index') }}">Visi Misi</a></li>
                                            <li><a href="{{ route('tupoksi.index') }}">Tugas Fungsi</a></li>
                                            <li><a href="{{ route('struktur.index') }}">Struktur Organisasi</a></li>
                                            <li><a href="{{ route('profilPejabat.index') }}">Profil</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        
                            <div class="header-right d-flex align-items-center">
                                <div class="header-meta header-meta-white">
                                    <ul>
                                        @if(@Session::get('session_pengguna'))
                                        <li><a title="{{@Session::get('session_pengguna')->nama}}" href="{{route('profile.member')}}" class="d-none d-md-block"><i
                                                    class="fi fi-rr-user"></i></a>
                                        </li>
                                        @else
                                        <li><a title="login" id="LoginMember" href="#" class="d-none d-md-block"><i class="fas fa-sign-in-alt"></i></a>
                                        </li>
                                        @endif
                                        
                                    </ul>
                                </div>
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header area end -->
<div class="tp-sidebar-menu">
    <button class="sidebar-close"><i class="icon_close"></i></button>
    <div class="side-logo mb-30">
        <a href="#"><img src="{{ asset('app/assets/img/logo/dispara.png') }}" alt="logo" width="50%"></a>
    </div>
    <div class="mobile-menu"></div>
    <div class="sidebar-info">
        <h4 class="mb-15">Contact Info</h4>
        <ul class="side_circle">
            <li>Jl. Gatot Subroto No.4, Karanganyar, Kec.
                Indramayu, Kabupaten Indramayu, Jawa Barat 45213</li>
            <li><a href="tel:(0234) 272325">(0234) 272325</a></li>
            <li><a href="mailto:disbudparindramayu@gmail.com">disbudparindramayu@gmail.com</a></li>
        </ul>
        <div class="side-social">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-linkedin"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
    </div>
</div>
<div class="body-overlay"></div>
 
<div id="ModalLogin" class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-md">
<div class="modal-content"> 
  <div class="modal-header"> 
   <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-Loginmember-tab" data-bs-toggle="pill" data-bs-target="#Loginmember" type="button" role="tab" aria-controls="pills-Loginmember" aria-selected="true">Login</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-Registermember-tab" data-bs-toggle="pill" data-bs-target="#Registermember" type="button" role="tab" aria-controls="pills-Registermember" aria-selected="false">Register</button>
          </li>
          
        </ul>
</div>
    <div class="modal-body">

        
        <div class="tab-content" id="pills-tabContent">
            <!-- login -->
          <div class="tab-pane fade show active" id="Loginmember" role="tabpanel" aria-labelledby="pills-Loginmember-tab">
            <form id="LoginMember" name="LoginMember">
                <div class="msg-alert"></div>
                <div class="form-group mb-3">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" minlength="3" maxlength="50" required="">
                </div>
                 <div class="form-group mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" minlength="3" maxlength="50" required="">
                </div>
                 <div class="form-group mb-3">
                    <button class="btn btn-primary btn-sm btn-block" type="submit">Login</button>
                </div>
            </form>
          </div>
            <!-- login -->
            <!-- registrasi -->
              <div class="tab-pane fade" id="Registermember" role="tabpanel" aria-labelledby="pills-Registermember-tab">
                <form id="RegisterMember" name="RegisterMember">
                    <div class="msg-alert"></div>
                     <div class="form-group mb-3">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" minlength="3" maxlength="50" required="">
                    </div>
                    <div class="form-group mb-3">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" minlength="3" maxlength="50" required="">
                    </div>
                     <div class="form-group mb-3">
                        <label>No telp</label>
                        <input type="text" name="no_hp" class="form-control" minlength="3" maxlength="15" required="">
                    </div>
                     <div class="form-group mb-3">
                        <label>Instansi</label>
                        <input type="text" name="instansi" class="form-control" minlength="3" maxlength="100" required="">
                    </div>
                     <div class="form-group mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" minlength="3" maxlength="15" required="">
                    </div>
                     <div class="form-group mb-3">
                        <label>Ulang password</label>
                        <input type="password" name="repassword" class="form-control" minlength="3" maxlength="15" required="">
                    </div>
                     <div class="form-group mb-3">
                        <button class="btn btn-primary btn-sm btn-block" type="submit">Register</button>
                    </div>
                </form>

              </div>
            <!-- registrasi -->
           
        </div>



     </div>
</div>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function()
    {
        $('#LoginMember').click(function(e)
        {
            e.preventDefault();
            $('#ModalLogin').modal('toggle');
            $('.msg-alert').empty();
        });

        $('body').delegate('#RegisterMember','submit',function(e)
        {
         e.preventDefault();
            var $this=$(this);
            var label_btn= $this.find('button[type="submit"]').text();
            $this.find('.msg-alert').empty();
            $this.find('button[type="submit"]').html('loading...');
            $this.find('button[type="submit"]').attr('disabled','disabled');  
            const formsimpan    = document.forms.namedItem('RegisterMember'); 
            const Form_simpan   = new FormData(formsimpan);
            Form_simpan.append('_token', '{{csrf_token()}}'); 
            fetch('{{route('register.member')}}', { method: 'POST',body:Form_simpan}).then(res => res.json()).then(data => 
            {
                $this.find('button[type="submit"]').html(label_btn);
                $this.find('button[type="submit"]').removeAttr('disabled','disabled');  

               var stst_=data.error?'danger':'success';
               $this.find('.msg-alert').html(`<div class="alert alert-${stst_} text-center">${data.alert}</div>`);
               if(!data.error)
               {
                    @if(\Request::route()->getName()!='app-event.show') 
                        setTimeout(function(){
                                    window.location.reload();
                            },2000);
                    @else 
                     setTimeout(function(){
                            $('#ModalLogin').modal('hide');
                            $('#ikuteventModal').modal('show');
                            },2000);
                    @endif

               }
               
            }).catch(error => { 
                $this.find('button[type="submit"]').html(label_btn);
                $this.find('button[type="submit"]').removeAttr('disabled','disabled');  
             $this.find('.msg-alert').html('<div class="alert alert-danger text-center">Eror koneksi buruk</div>');

            });  
        });
         $('body').delegate('#LoginMember','submit',function(e)
        {
         e.preventDefault();
            var $this=$(this);
            var label_btn= $this.find('button[type="submit"]').text();
            $this.find('.msg-alert').empty();
            $this.find('button[type="submit"]').html('loading...');
            $this.find('button[type="submit"]').attr('disabled','disabled');  
            const formsimpan    = document.forms.namedItem('LoginMember'); 
            const Form_simpan   = new FormData(formsimpan);
            Form_simpan.append('_token', '{{csrf_token()}}'); 
            fetch('{{route('login.member')}}', { method: 'POST',body:Form_simpan}).then(res => res.json()).then(data => 
            {
                $this.find('button[type="submit"]').html(label_btn);
                $this.find('button[type="submit"]').removeAttr('disabled','disabled');  

               var stst_=data.error?'danger':'success';
               $this.find('.msg-alert').html(`<div class="alert alert-${stst_} text-center"><ul>${data.alert}</ul></div>`);
               if(!data.error)
               {
                    @if(\Request::route()->getName()!='app-event.show') 
                        setTimeout(function(){
                                    window.location.reload();
                            },2000);
                    @else 
                    setTimeout(function(){
                                   $('#ModalLogin').modal('hide');
                                    $('#ikuteventModal').modal('show');
                            },2000);
                     
                    @endif

               }
               
            }).catch(error => { 
                $this.find('button[type="submit"]').html(label_btn);
                $this.find('button[type="submit"]').removeAttr('disabled','disabled');  
             $this.find('.msg-alert').html('<div class="alert alert-danger text-center">Eror koneksi buruk</div>');

            });  
        });

    });
</script>