@extends('app.layouts.main')
@section('title', 'Profile |'.' '.@Session::get('session_pengguna')->nama)
@section('app')
@php
 
$user_=@Session::get('session_pengguna');
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
 				<a class="nav-link"   href="#" id="Logout" role="tab"  >Logout</a> 
			    </div>
			  </div>
			  <div class="col-9">
			    <div class="tab-content" id="v-pills-tabContent">

			      <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
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
		                    <!--  <div class="form-group mb-3">
		                        <label>Password</label>
		                        <input type="password" name="password" valu="" class="form-control" minlength="3" maxlength="15" >
		                    </div>
		                     <div class="form-group mb-3">
		                        <label>Ulang password</label>
		                        <input type="password" name="repassword"  class="form-control" minlength="3" maxlength="15">
		                    </div> -->
		                     <div class="form-group mb-3">
		                        <button class="btn btn-primary btn-sm btn-block" type="submit">Update</button>
		                    </div>
		                </form>
			      </div> 
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

			</div>

		</div>
	</div> 	
</div> 	
</div>
</section> 
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

	});
</script>
@endsection