@extends('app.layouts.main')
@section('title', 'Profile |'.' '.@Session::get('session_pengguna')->nama)
@section('app')
@php
$user_=@Session::get('session_pengguna');
// dd($user_);
$img=@$user_->gambar?url('storage/'.@$user_->gambar):asset('assets/images/imagenotfound.jpeg');
@endphp
 
<style type="text/css">
	.profile {
  min-height: 400px;
  margin-top: 60px;
  margin-bottom: 60px;
}
 
#v-pills-tab .nav-link {
  border: 1px solid #aaa6a6cc;
  margin: 5px 0px;
  background: rgb(244, 244, 244);
}
.rounded-circle {
  width: 200px;
  height: 200px;
}

.img-area {
  width: 200px;
  position: relative;
  margin: auto;
}
.img-area input {
  position: absolute;
  left: 0;
  bottom: 0;
  right: 0;
  top: 0;
  z-index: 10;
  opacity: 0;
}
#img_wisata {
  width: 200px;
  text-align: center;
  margin: 10px auto;
}
.badge {
  border-radius: 10px;
  border: 1px solid #ccc;
  padding: 5px 5px;
}
.badge-success {
  background: rgb(42, 149, 27);
} 
.badge-danger {
  background: rgb(170, 35, 4);
}
.badge-warning {
  background: rgb(232, 176, 10);
}
.modal-header {
  background: rgb(16, 164, 236); 
}
</style>
<section class="breadcrumb__area include-bg pt-150 pb-150 breadcrumb__overlay"
        data-background="{{ asset('app/assets/img/breadcrumb/pantai-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="breadcrumb__content p-relative z-index-1">
                        <h3 class="breadcrumb__title mb-20">Profile</h3>
                        <div class="breadcrumb__list">
                            <span><a href="/">Home</a></span>
                            <span class="dvdr"><i class="fa-regular fa-angle-right"></i></span>
                            <span class="sub-page-black">{{@Session::get('session_pengguna')->nama}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<div>

<section class="profile">
	<div class="container">
		<div class="row">
			<div class="col-3">
			    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
			      <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Profile</a> 


			      <a class="nav-link" id="v-pills-event-tab" data-toggle="pill" href="#v-pills-event" role="tab" aria-controls="v-pills-event" aria-selected="false">Event</a> 

 					<a class="nav-link" id="v-pills-wisata-tab" data-toggle="pill" href="#v-pills-wisata" role="tab" aria-controls="v-pills-wisata" aria-selected="false">Wisata</a> 
	
					<a class="nav-link" id="v-pills-VirtualTour-tab" data-toggle="pill" href="#v-pills-VirtualTour" role="tab" aria-controls="v-pills-VirtualTour" aria-selected="false">Virtual Tour</a> 


 				<a class="nav-link"   href="#" id="Logout"   >Logout</a> 
			    </div>
			  </div>
			  <div class="col-9">
			    <div class="tab-content" id="v-pills-tabContent">
<!-- profile -->
			      <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
			      	<div class="card">
						<div class="card-body">
							
						      	<div class="text-center">
							      		 <form id="ImageUpload" name="ImageUpload">
						      				<div class="img-area">
						      					<div class="loadingimg"></div>
								      			<img class="rounded-circle" src="{{$img}}">
								    	  		<input type="file" id="idfile" name="foto">
						      				</div>
							      		</form>
						      	</div>
						      	 <form id="EditMember" name="EditMember">
					                    <div class="msg-alert"></div>
					                    <div class="form-group mb-3">
					                        <label>Email</label>
					                        <input type="text"  class="form-control" value="{{$user_->email}}"  minlength="3" maxlength="50" readonly="" disabled="disabled">
					                    </div>
					                     <div class="form-group mb-3">
					                        <label>Nama</label>
					                        <input type="text" name="nama"  class="form-control" value="{{$user_->nama}}" minlength="3" maxlength="50" required="">
					                    </div>
					                     <div class="form-group mb-3">
					                        <label>No telp</label>
					                        <input type="text" name="no_hp" class="form-control" value="{{$user_->no_hp}}" minlength="3" maxlength="15" required="">
					                    </div>
					                     <div class="form-group mb-3">
					                        <label>Instansi</label>
					                        <input type="text" name="instansi" class="form-control" value="{{$user_->instansi}}"  minlength="3" maxlength="100" required="">
					                    </div> 

					                     <div class="form-group mb-3">
					                        <button class="btn btn-primary btn-sm btn-block" type="submit">Update</button>
					                    </div>
		                		</form>
						</div>
			      	 </div>
			      </div> 

<!-- profile -->
<!-- event -->
			    <div class="tab-pane fade" id="v-pills-event" role="tabpanel" aria-labelledby="v-pills-event-tab">
				    <div class="card">
					    <div class="card-body">

							<div class="table-responsive">
							<form id="updateEvent" name="updateEvent">
								<table id="tbl_event" class="table table-bordered dt-responsive nowrap">
								<thead>
								<tr>
										<th>No</th>
										<th data-orderable="false"><input type="checkbox" name="checkall"></th>
										<th data-orderable="false">Nama Acara</th>   
										<th data-orderable="false">Pelindung/Asal/Institusi</th>
										<th data-orderable="false">Status</th>

										<th data-orderable="false">No. HP</th>
										<th data-orderable="false">Email</th>
								</tr>
								</thead>
								</table>

						<div class="msg-alert"></div>
						<input type="hidden" name="status" value="tolak">
						<button class="btn btn-primary mb-3" type="submit">Batalkan
						</button>
							</form>
							</div>
					    </div>
					</div>
				</div> 
<!-- event -->
<!-- wisata -->
				<div class="tab-pane fade" id="v-pills-wisata" role="tabpanel" aria-labelledby="v-pills-wisata-tab">
				    <div class="card">
					    <div class="card-body"> 
					    	<button id="addwisata" class="btn btn-primary mb-3">+ wisata</button>

					    	<div class="table-responsive">
					    		<table id="tbl_wisata" class="table table-bordered dt-responsive nowrap">
								<thead>
								<tr>
										<th>No</th> 
										<th data-orderable="false">Judul</th>   
										<th data-orderable="false">Katagori</th> 
										<th data-orderable="false">Link Google map</th>   
										<th data-orderable="false">Status</th>  
										<th data-orderable="false">Aksi</th>
								</tr>
								</thead>
								</table>
					    	</div>

					    </div>
					</div>
				</div> 
<!-- wisata -->
<!-- VirtualTour -->


				<div class="tab-pane fade" id="v-pills-VirtualTour" role="tabpanel" aria-labelledby="v-pills-VirtualTour-tab">
				    <div class="card">
					    <div class="card-body"> 
					    	<button id="adVirtualTour" class="btn btn-primary mb-3">+ Virtual Tour</button>

					    	<div class="table-responsive">
					    	  <div class="table-responsive">
                                        <table id="KatagoriVirtual" class="table table-bordered dt-responsive nowrap">
                                        <thead>
                                        <tr>
                                        <th>Nama Virtual</th> 
                                        <th>Status</th>  
                                        <th>Aksi</th> 
                                        </tr>
                                        </thead>
                                        </table>
                                    </div>
					    	</div>

					    </div>
					</div>
				</div> 
<!-- VirtualTour -->
			</div>

		</div>
	</div> 	
</div> 	
</div>
</section> 



<!-- modal wisata -->
<div id="Modalformwisata" class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title align-self-center mt-0" >Form Wisata</h5>
            </div>
            <div class="modal-body">
                
					<form  id="simpanWisata"  name="simpanWisata" > 
                        <div class="form-group mb-3">
                            <label >Gambar</label>
                            <div id="img_wisata"></div>
                            <input type="file" class="form-control"  name="image"  accept=".jpeg,.jpg,.png,.jfif,.svg" />
                        </div>
                        <div class="form-group mb-3">
                        	 <label >Judul</label>
                            <input type="text" class="form-control" name="title" required
                                placeholder="Ketikkan judulmu"  />
                        </div>

						<div class="form-group  mb-3">
							 <label >Kategori Wisata</label>
						    <select class="form-select"  name="kategori_id"
                                aria-label="Default select example" required>
                                <option>Pilih Kategori Wisata</option>
                                @php
                                	$kategori_wisatas=DB::table('kategori_wisatas')->get();
                                @endphp
                                @foreach ($kategori_wisatas as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_kategori}}</option>
                                @endforeach 
                            </select>
						</div>
						<div class="form-group  mb-3">
							<label >Isi</label>
                            <textarea  name="isi" class="form-control" required="required">{{ old('isi') }}</textarea>
						</div>
						<div class="form-group  mb-3">
							 <label>Virtual Tour</label>
	                           <select class="form-control" name="id_ruangan"  >
	                               <option>--Pilih Virtual Tour--</option>
	                               @php
	                               $tbvp=DB::table('tb_katagori_ruangan')->select('id','nama')->where('id_autor_member',@Session::get('session_pengguna')->id)->get();
	                               @endphp
	                               @foreach($tbvp as $vp)
	                                <option value="{{$vp->id}}">{{$vp->nama}}</option>
	                               @endforeach
	                           </select> 
						</div>
						<div class="form-group mb-3">
						 <label >Link Google Map</label>
						<input type="text" class="form-control" name="link_google_map" 
						    placeholder="Link Google Map"  />
						</div>
                        <div class="form-group"> 
                                <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                    Simpan
                                </button>
                               
                        </div>
                    </form>
                    <!-- end form --> 

            </div>           
        </div>
    </div>
</div>

<!-- modal vir -->
<div id="ModalKatagori" class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title align-self-center mt-0" >Tambah katagori view</h5>
            </div>
            <div class="modal-body">
                 <form id="UpdateKatagori" name="UpdateKatagori">
                     <div class="form-group">
                        <label>Nama katagori view</label>
                        <div class="input-group">
                            <input type="text" required="" maxlength="100" name="nama" class="form-control">
                            <span class="input-group-append">
                                <button class="btn btn-success" type="submit">simpan</button>
                            </span>
                            
                        </div>
                     </div>
                 </form>
            </div>
        </div>
    </div>
</div>
<!-- modal vir -->

<div id="ModalRuangan" class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title align-self-center mt-0" id="headerLabel"></h5>
            </div>
            <div class="modal-body">
                 <a href="#" id="AddvrDetail"  class="btn btn-success btn-sm mb-3"> Tambah View</a>
                <div class="table-responsive">
                    <table id="tbl_virtualtour" class="table table-bordered dt-responsive nowrap">
                    <thead>
                    <tr>
                    <th>Nama View</th>
                    <th>Deskripsi</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                    </tr>
                    </thead>
                    </table>
                </div>
            </div>           
        </div>
    </div>
</div>

<div id="ModalTambahRuangan" class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title align-self-center mt-0">Tambah View <span id="judul_vr_rom"></span></h5>
            </div>
            <div class="modal-body">
                 <form id="simpanNamavirtual" name="simpanNamavirtual">
                            <div class="form-group mb-3">
                                    <label>Nama View</label>
                                    <input type="text" name="nama_ruangan" class="form-control" required="required">
                            </div>
                            <div class="form-group mb-3">
                            	<label>Foto 360</label>
                            	<div class="input-group">
                            	<input type="file" class="form-control" name="file"  accept="image/*" >
                            	<span class="input-group-append img_vr"></span>
                            		
                            	</div>
                            </div>
                             <div class="form-group mb-3">
                                    <label>Deskripsi View</label>
                                   <textarea class="form-control" name="deskripsi" required="required"></textarea>
                            </div>
                              <div class="form-group mb-3">
                                    <button id="NextSave"     type="submit" class="btn btn-primary btn-block">Simpan</button>

                            </div>
                        </form>
            </div>           
        </div>
    </div>
</div>

<script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
<!-- <script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script> -->
<script type="text/javascript">
	$(document).ready(function()
	{

$('.nav-link').click(function(e)
{
	e.preventDefault();
	$('.nav-link').removeClass('active');
	$(this).addClass('active');
	$('.tab-pane').removeClass('active');
	$('.tab-pane').removeClass('show'); 
	$(`${$(this).attr('href')}`).addClass('show');
	$(`${$(this).attr('href')}`).addClass('active');  

})

		$('input[name="foto"]').change(function(e)
		{

			e.preventDefault();
			var file = document.getElementById("idfile");
			if(file.files.length == 0 )
			{
				return;
			}
			$('.loadingimg').html('loading..');
			const formImageUpload    = document.forms.namedItem('ImageUpload'); 
            const Form_ImageUpload   = new FormData(formImageUpload);
            Form_ImageUpload.append('_token', '{{csrf_token()}}'); 
            fetch('{{route('upload.member')}}', { method: 'POST',body:Form_ImageUpload}).then(res => res.json()).then(data => 
            {
			$('.loadingimg').empty();

			if(!data.error)
			{
				$('.img-area').find('img').attr('src',data.img);
			}
            });
		});
		$('#Logout').click(function(e)
		{
			e.preventDefault();
			const Form_logout   = new FormData();
            Form_logout.append('_token', '{{csrf_token()}}'); 
            fetch('{{route('member.Logout')}}', { method: 'POST',body:Form_logout}).then(res => res.json()).then(data => 
            {
			 window.location.href="{{url('')}}";
            });
		});
		
		$('body').delegate('#EditMember','submit',function(e)
		{
			e.preventDefault();
		    var $this=$(this);
		    var label_btn= $this.find('button[type="submit"]').text();
		    $this.find('.msg-alert').empty();
		    $this.find('button[type="submit"]').html('loading...');
		    $this.find('button[type="submit"]').attr('disabled','disabled');  
		    const formEdit    = document.forms.namedItem('EditMember'); 
		    const form_Edit   = new FormData(formEdit);
		    form_Edit.append('_token', '{{csrf_token()}}'); 
		    fetch('{{route('edit.member')}}', { method: 'POST',body:form_Edit}).then(res => res.json()).then(data => 
		    {
		        $this.find('button[type="submit"]').html(label_btn);
		        $this.find('button[type="submit"]').removeAttr('disabled','disabled');  

		       var stst_=data.error?'danger':'success';
		       $this.find('.msg-alert').html(`<div class="alert alert-${stst_} text-center">${data.alert}</div>`);
		     
                setTimeout(function(){
                            $this.find('.msg-alert').empty();
                    },2000);
           
		       
		    }).catch(error => { 
		        $this.find('button[type="submit"]').html(label_btn);
		        $this.find('button[type="submit"]').removeAttr('disabled','disabled');  
		     $this.find('.msg-alert').html('<div class="alert alert-danger text-center">Eror koneksi buruk</div>');

		    });  
		});


 

  var table = $('#tbl_event').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: '{{ route('ajax_tbl_Event') }}',
            columns: [{
            data: 'DT_RowIndex',
            name: 'DT_RowIndex'
            }, 
            {
            data: 'aksi_input',
            name: 'aksi_input'
            }, 
            {
            data: 'title',
            name: 'title'
            }, 
            {
            data: 'pelindung',
            name: 'pelindung'
            },
            {
            data: 'status_',
            name: 'status_'
            },
            {
            data: 'no_hp',
            name: 'no_hp'
            },
             {
            data: 'email',
            name: 'email'
            } 

            ]
            }); 

	
	  $('body').delegate('#updateEvent','submit',function(e)
                {
                    e.preventDefault();
                    var $this=$(this);
                    var label_btn= $this.find('button[type="submit"]').text();
                    $this.find('.msg-alert').empty();
                    $this.find('button[type="submit"]').html('loading...');
                    $this.find('button[type="submit"]').attr('disabled','disabled');  
                    const eventsimpan    = document.forms.namedItem('updateEvent'); 
                    const event_simpan   = new FormData(eventsimpan);
                    event_simpan.append('_token', '{{csrf_token()}}');   
                    fetch('{{route('proses.event')}}', { method: 'POST',body:event_simpan}).then(res => res.json()).then(data => 
                    {
                        $this.find('button[type="submit"]').html(label_btn);
                        $this.find('button[type="submit"]').removeAttr('disabled','disabled');  

                       var stst_=data.error?'danger':'success';
                       $this.find('.msg-alert').html(`<div class="alert alert-${stst_} text-center">update berhasil</div>`);
                       if(!data.error)
                       {
                        
                             setTimeout(function(){ 
                                           $this.find('.msg-alert').empty();
                                          $('#tbl_event').DataTable().ajax.reload();
                                    },1000);

                       }
                       
                    }).catch(error => { 
                        $this.find('button[type="submit"]').html(label_btn);
                        $this.find('button[type="submit"]').removeAttr('disabled','disabled');  
                        $this.find('.msg-alert').html('<div class="alert alert-danger text-center">Eror koneksi buruk</div>');

                    }); 
                });	

	    $('body').delegate('input[name="checkall"]','change',function(e)
                {
                    e.preventDefault();

                    if($(this).is(':checked'))
                    {
                        $('input[name*="aksi"]').prop('checked',true);
                    }
                    else
                    {
                         $('input[name*="aksi"]').prop('checked',false);
                    }
                });


// wisata

 var tbl_wisata = $('#tbl_wisata').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: '{{ route('ajax_tbl_wisata') }}',
            columns: [{
            data: 'DT_RowIndex',
            name: 'DT_RowIndex'
            }, 
            {
            data: 'title',
            name: 'title'
            }, 
            {
            data: 'nama_kategori',
            name: 'nama_kategori'
            }, 
            {
            data: 'link_google_map',
            name: 'link_google_map'
            },
            {
            data: 'status_public',
            name: 'status_public'
            },
             { 
                        orderable   :  false,
                        searchable  :  false,
                        data        :  'action',
                        name        :  'action'
                    }
            ]
            }); 


$('body').delegate('#addwisata','click',function(e)
	{
		e.preventDefault();
		window.wisata=undefined;
		$('#Modalformwisata').modal('show');

	});
$('#tbl_wisata').delegate('.Edit_wis','click',function(e)
	{
		e.preventDefault();
		var $this_tr=$(this).closest('tr'); 
		window.wisata=tbl_wisata.row($this_tr).data();
			$('#Modalformwisata').modal('show');

	});



 $('#Modalformwisata').on('shown.bs.modal', function (e) 
        {
             $(this).find('input').val('');
             $(this).find('select').val('');
             $(this).find('textarea').val(''); 
             $('#img_wisata').empty();
             if(window.wisata!=undefined)
             {
             		$(this).find('*[name="title"]').val(window.wisata.title);
             		$(this).find('*[name="kategori_id"]').val(window.wisata.id_kat);
             		$(this).find('*[name="isi"]').val(window.wisata.isi);
             		$(this).find('*[name="id_ruangan"]').val(window.wisata.id_ruangan);  
             		$('#img_wisata').html(`<img src="{{url('storage')}}/${window.wisata.image}">`);
             		$(this).find('*[name="link_google_map"]').val(window.wisata.link_google_map);  

             		 
             }

             $(this).find('input').trigger('change');
             $(this).find('select').trigger('change');
             $(this).find('textarea').trigger('change');



        });

 $('body').delegate('#simpanWisata','submit',function(e)
                {
                    e.preventDefault();
                    console.log('kok macet');

                    var $this=$(this);
                    var label_btn= $this.find('button[type="submit"]').text();
                    $this.find('.msg-alert').empty();
                    $this.find('button[type="submit"]').html('loading...');
                    $this.find('button[type="submit"]').attr('disabled','disabled');  
                    const Wisatasimpan    = document.forms.namedItem('simpanWisata'); 
                    const Wisata_simpan   = new FormData(Wisatasimpan);
                    Wisata_simpan.append('_token', '{{csrf_token()}}'); 
                    if(window.wisata!==undefined)
                    {
                   		 Wisata_simpan.append('id', window.wisata.id);  
                    }  
                    fetch('{{route('proses.simpan.wisata')}}', { method: 'POST',body:Wisata_simpan}).then(res => res.json()).then(data => 
                    {
                        $this.find('button[type="submit"]').html(label_btn);
                        $this.find('button[type="submit"]').removeAttr('disabled','disabled');  

                       var stst_=data.error?'danger':'success';
                       $this.find('.msg-alert').html(`<div class="alert alert-${stst_} text-center">update berhasil</div>`);
                       if(!data.error)
                       {
                       		$('#Modalformwisata').modal('hide');
                            setTimeout(function(){ 
                                           $this.find('.msg-alert').empty();
                                          $('#tbl_wisata').DataTable().ajax.reload();
                                    },1000);

                       }
                       
                    }).catch(error => { 
                        $this.find('button[type="submit"]').html(label_btn);
                        $this.find('button[type="submit"]').removeAttr('disabled','disabled');  
                        $this.find('.msg-alert').html('<div class="alert alert-danger text-center">Eror koneksi buruk</div>');

                    }); 
                });	

$('body').delegate('.Hapus_wis','click',function(e)
                {
                    e.preventDefault(); 
                    if(!confirm('yakin hapus data'))
                    {
                    	return false;
                    }

				var $this_tr 			=$(this).closest('tr'); 
				var id_hapus 			=tbl_wisata.row($this_tr).data().id; 
                    const Wisata_hapus  = new FormData();
                    Wisata_hapus.append('_token', '{{csrf_token()}}');  
                   	Wisata_hapus.append('id', id_hapus);  
                    fetch('{{route('proses.hapus.wisata')}}', { method: 'POST',body:Wisata_hapus}).then(res => res.json()).then(data => 
                    {
                       
                          $('#tbl_wisata').DataTable().ajax.reload();
                       
                    }); 
                });	
// wisata



// virtualtour
  var tbl_virtualtour = $('#KatagoriVirtual').DataTable({
                "lengthMenu": [
                [ 10, 25, 50, 100, 1000, -1 ],
                [ '10 baris', '25 baris', '50 baris', '100 baris', '1000 baris', 'Seluruh Data' ]
                ],
                processing: true, 
                serverSide: true,
                "columnDefs": [ {
                "targets": 0,
                "orderable": false
                } ],
                ajax: '{{ route('ajax_tbl_KatagoriVirtual_memer') }}',
                 columns: [
                    { data: 'nama', name: 'nama' }, 
                    { data: 'status_public', name: 'status_public',  orderable   :  false},  

                    { 
                        orderable   :  false,
                        searchable  :  false,
                        data        :   'action',
                        name        : 'action'
                    }
                ]
            });


$('body').delegate('#adVirtualTour','click',function(e)
{
	e.preventDefault();
	window.vairtual=undefined;
	$('#ModalKatagori').modal('show');

});
$('body').delegate('.Edit_data_kat','click',function(e)
{
	e.preventDefault();
	window.vairtual 	=undefined;
	var $this_tr 		=$(this).closest('tr'); 
	window.vairtual 	=tbl_virtualtour.row($this_tr).data();
	$('#ModalKatagori').modal('show');

});
$('body').delegate('.Hapus_data_kat','click',function(e)
{ 
    e.preventDefault();
   var Hapus_data_kat=$(this).data('id'); 
    if(!confirm('You sure to delete?')) 
    {
        return;
    }
     const form_dtl   = new FormData(); 
    form_dtl.append('_token', '{{csrf_token()}}');
    form_dtl.append('id_delete',  Hapus_data_kat); 
    fetch('{{route('virtualroomkat_member.delete')}}', { method: 'POST',body:form_dtl}).then(res => res.json()).then(data => 
        {
             $('#KatagoriVirtual').DataTable().ajax.reload();
        });

});
$('body').delegate('.detail_data_kat','click',function(e)
{ 
    e.preventDefault();
	window.vairtual 	=undefined;
	var $this_tr 		=$(this).closest('tr'); 
	window.vairtual 	=tbl_virtualtour.row($this_tr).data();
    $('#headerLabel').html($(this).data('name'));
    $('#ModalRuangan').modal('show');
     
});


$('#ModalKatagori').on('shown.bs.modal', function (e) 
{
     $(this).find('input').val(''); 
     if(window.vairtual!=undefined)
     {
     		$(this).find('*[name="nama"]').val(window.vairtual.nama); 
     }

     $(this).find('input').trigger('change');

});



$('body').delegate('#UpdateKatagori','submit',function(e)
{ 
    e.preventDefault();
    var $this            	= $(this);   
    var form_           	= document.forms.namedItem("UpdateKatagori");
    const form_data_vr     	= new FormData(form_); 
     form_data_vr.append('_token', '{{csrf_token()}}');
    if(window.vairtual!=undefined)
    {
        form_data_vr.append('id_kategori', window.vairtual.id);  
    } 
    fetch('{{route('katagori_vr.member.save')}}', { method: 'POST',body:form_data_vr}).then(res => res.json()).then(data => 
        {
           	 $('#ModalKatagori').modal('hide');
             $('#KatagoriVirtual').DataTable().ajax.reload();
        });
});


$('#ModalRuangan').on('shown.bs.modal', function (e) 
{
     var id_kat=window.vairtual.id; 
     window.vr = $('#tbl_virtualtour').DataTable({
                "lengthMenu": [
                [ 10, 25, 50, 100, 1000, -1 ],
                [ '10 baris', '25 baris', '50 baris', '100 baris', '1000 baris', 'Seluruh Data' ]
                ],
                processing: true, 
                serverSide: true,
                "columnDefs": [ {
                "targets": 0,
                "orderable": false
                } ],
                ajax: `{{ route('ajax_tbl_virtualtour_member') }}?id_kat=${id_kat}`,
                 columns: [
                    { data: 'nama', name: 'nama' }, 
                    { data: 'deskripsi', name: 'deskripsi' }, 
                    { data: 'created_at', name: 'created_at' },
                    { 
                        orderable   :  false,
                        searchable  :  false,
                        data        : 'action',
                        name        : 'action'
                    }
                ]
            });
});

$('#ModalRuangan').on('hidden.bs.modal', function (e) 
{ 
        window.vr.destroy();
});

$('body').delegate('#AddvrDetail','click',function(e)
{ 
    e.preventDefault(); 
    window.vairtual_detail=undefined;
    $('#ModalTambahRuangan').modal('show'); 
     
});
$('body').delegate('.Edit_data_vr','click',function(e)
{ 
    e.preventDefault();  
	var $this_tr 		 	=$(this).closest('tr'); 
	window.vairtual_detail 	=window.vr.row($this_tr).data();
	console.log(window.vairtual_detail);
    $('#ModalTambahRuangan').modal('show'); 
     
});

$('#ModalTambahRuangan').on('show.bs.modal', function (e) { 
        $('#ModalRuangan').modal('hide'); 
       $(this).find('input').val(''); 
       $(this).find('textarea').val(''); 

       $('.img_vr').empty();
       $('#judul_vr_rom').empty();

       
     if(window.vairtual_detail!=undefined)
     {
     		$(this).find('*[name="nama_ruangan"]').val(window.vairtual_detail.nama); 
     		$(this).find('*[name="deskripsi"]').val(window.vairtual_detail.deskripsi); 
      		$('.img_vr').html(`<a class="btn btn-primary" target="_blank" href="{{url('virtual-view')}}?=${window.vairtual_detail.id}">Lihat 360</a>`);
      		 $('#judul_vr_rom').html(window.vairtual_detail.nama);


     }

     $(this).find('input').trigger('change');
     $(this).find('textarea').trigger('change'); 



});
$('#ModalTambahRuangan').on('hidden.bs.modal', function (e) { 
         $('#ModalRuangan').modal('show'); 
});



$('body').delegate('#simpanNamavirtual','submit',function(e)
{ 
    e.preventDefault();
    var $this            	= $(this);   
    var form_           	= document.forms.namedItem("simpanNamavirtual");
    const form_data_vr_2    = new FormData(form_); 
    form_data_vr_2.append('_token', '{{csrf_token()}}');
    form_data_vr_2.append('id_kat',  window.vairtual.id);  
    if(window.vairtual_detail!==undefined)
    {
 			form_data_vr_2.append('id_vir',  window.vairtual_detail.id); 
    }
    fetch('{{route('image_vr.member.save')}}', { method: 'POST',body:form_data_vr_2}).then(res => res.json()).then(data => 
        {
        	if(data.error)
        	{
        		alert('wajib upload gambar');
        	}
        	else
        	{

	           	 $('#ModalTambahRuangan').modal('hide');
	            // $('#tbl_virtualtour').DataTable().ajax.reload();
        	}
        });
});

$('body').delegate('.detail_vr_target','click',function(e)
{ 
	e.preventDefault();
	window.open($(this).attr('href'),'_blank');
});

$('body').delegate('.Hapus_data_vr','click',function(e)
{ 
	e.preventDefault();
	var Hapus_data_kat=$(this).data('id'); 
	if(!confirm('You sure to delete?')) 
	{
	return;
	}
	const form_dtl   = new FormData(); 
	form_dtl.append('_token', '{{csrf_token()}}');
	form_dtl.append('id_delete',  Hapus_data_kat); 
	fetch('{{route('virtualroommember.delete')}}', { method: 'POST',body:form_dtl}).then(res => res.json()).then(data => 
	{
	     $('#tbl_virtualtour').DataTable().ajax.reload();
	});
});


	});
</script>
@endsection