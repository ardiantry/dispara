@extends('dashboard.layouts.main')
@section('title', 'Kelola Virtual tour')
@section('breadcrumb')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h4>Kelola Virtual tour</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{url('dashboard/virtual-tour')}}">Virtuak tour</a></li>
                            <li class="breadcrumb-item active">Kelola Virtual tour</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
@endsection
@section('content')
<link rel="stylesheet" href="{{asset('assets/vritual/photo.min.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/vritual/markers.min.css')}}"/>  
<style type="text/css">


.psv-button.psv-button--hover-scale.psv-markers-button.psv-button--active {
  display: none;
}
.psv-button.psv-button--hover-scale.psv-markers-list-button {
  display: none;
}
.wizard > .steps > ul > li
    {
        width: 33.3%!important;
    }
.nav .nav-item {
 text-align: center;
display: block;
margin-bottom: 14px;
width: 31%;
margin: auto;
}
 .tab-content
 {
  transition: all 0.2s ease;
 }
.nav-item a {
  height: 80px; 
  text-align: ;
  padding: 20px;
  font-size: 18px;
  display: block;
  border-radius: 4px;
}
 
 .nav-pills .nav-link {  
  background: rgb(196, 194, 194);
}
.nav-item a{
  background: #b0cfdf;
  color: #fff;
}
.nav.nav-pills {
  display: flex;
  text-align: center;
  padding: 0px 5px;
}
.body-icon {
  text-align: center;
  padding: 5px;
  border: 1px solid #ccc;
  margin: 10px;
}
.body-icon a {
  border-radius: 50%;
  height: 30px;
  width: 30px;
  font-size: 15px;
  padding: 7px;
  line-height: 1;
}
#listmarker .input-group {
  display: block;
}
.body-icon {
text-align: center;
padding: 5px;
border: 1px solid #f4f4f4;
background: rgba(225, 225, 225, 0.21);
border-radius: 15px;
margin: 0px 0px 10px 0px;
min-height: 120px;
}

#listmarker {
  max-height: 400px;
  overflow-y: auto;
}
#media {
  margin: 20px 0px;
}
#ModalMarker3d .modal-header {
  background: rgb(27, 169, 202);
  color: #fff;
}


#Mapping .form-group {
  text-align: center;
  border: 1px solid #cccccc5e;
  background: rgba(166, 151, 151, 0.04);
  padding: 10px;
  border-radius: 5px;
}

.footer-mdl {
  background: rgb(223, 223, 223);
  padding: 10px;
  border-top: 2px solid #85868694;
}
#deflonglat {
  font-size: 12px;
  text-align: left;
  color: #ccc;
}
.btn.btn-default {
  background: rgb(219, 219, 219);
  color: #fff;
}
@media(max-width: 786px)
{
    .nav .nav-item {
    width: 100%;
    margin: 5px;
    }
}
 .btn-block {
  width: 100%;
}

</style>
<!-- Page-Title --> 
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
<!-- Nav tabs -->
                <ul class="nav nav-pills col-md-12" role="tablist">
                    <li class="nav-item waves-effect waves-light" ><a id="tab1"  >1. Detail View</a></li>
                    <li class="nav-item waves-effect waves-light" ><a   id="tab2"  >2. Input Foto 360</a></li>
                    <li class="nav-item waves-effect waves-light" ><a   id="tab3"   >3. Mapping</a></li> 
                </ul> 

                <div class="tab-content">
                    <div class="tab-pane p-3" id="DetailRuangan" role="tabpanel">  
                        <form id="simpanNamavirtual" name="simpanNamavirtual">
                            <div class="form-group mb-3">
                                    <label>Nama View</label>
                                    <input type="text" name="nama_ruangan" class="form-control">
                            </div>
                             <div class="form-group  mb-3">
                                    <label>View</label>
                                    <select name="kode_ruangan" class="form-control" >
                                      <option value="FrontRoom">Utama</option>
                                      <option value="InRoom">Lainnya</option>

                                    </select>
                            </div>
                             <div class="form-group mb-3">
                                    <label>Deskripsi View</label>
                                   <textarea class="form-control" name="deskripsi"></textarea>
                            </div>
                              <div class="form-group row justify-content-end">
                                <div class="col-md-3 text-right"> 
                                    <button id="NextSave"     type="submit" class="btn btn-primary btn-block">Selanjutnya</button>

                                </div>
                            </div>
                        </form>
                    </div> 
                    <div class="tab-pane p-3" id="InputFoto360" role="tabpanel">  
                        <form id="unggahfoto" name="unggahfoto">
                            <div class="progress1">     
                            </div>
                            <div class="form-group mb-3">
                            <input type="file" class="form-control" name="file"  accept="image/*" >
                            </div>
                            <div class="form-group row justify-content-end">
                                <div class="col-md-3 text-right"> 
                                    <button   type="submit" class="btn btn-primary btn-block">Selanjutnya</button>

                                </div>
                            </div>
                         </form>
                    </div> 
                    <div class="tab-pane p-3" id="Mapping" role="tabpanel">   
                        <div id="msg_alert"></div>
                        <div class="row  m-b-20"> 
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>Tambah Marker</label>
                                  <div>
                                  <a class="btn btn-primary add_btn" href="#" data-id="AddRooms">Room</a>   
                                  <a class="btn btn-primary add_btn" href="#" data-id="Addvideo">Video</a>
                                  <a class="btn btn-primary add_btn" href="#" data-id="AddPicture">Gambar</a> 
                                 <!--  <a class="btn btn-primary add_btn" href="#" data-id="AddGame">Game</a>  -->
                                  <a class="btn btn-primary add_btn" href="#" data-id="AddInformasi">Informasi</a> 
                                  <!-- <a class="btn btn-primary add_btn" href="#" data-id="AddRating">Rating</a> -->  


                                </div>
                                </div>  
                            </div>
                            <div class="col-md-6">
                             <form id="updatedefault" name="updatedefault">
                              <div class="form-group"> 
                                <label>Default Layar</label>
                                <div  id="deflonglat"></div>
                                  <div class="input-group">
                                      <input type="text" name="longitude" class="form-control" placeholder="longitude">
                                      <input type="text" name="latitude" class="form-control" placeholder="longitude">
                                      <input type="text" name="zoom" class="form-control" placeholder="Zoom"> 
                                          <span class="input-group-append">
                                            <button class="btn btn-success btn" type="submit">Perbaharui</button>
                                          </span>
                                      </div>  
                                </form>
                              </div>
                              </div>
                        </div>
                        <div id="viewer"  style="width: 100%; height: 80vh;"></div>  
                    </div> 
                </div>
                
            </div>
        </div>
    </div>
</div> 
<div id="AddmarkersModal" class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title align-self-center mt-0" id="headerLabel">Tambah markers</h5>
            </div>
            <div class="modal-body">
             <div class="row" id="listmarker"> 
             </div>
                <hr>
                    <form id="formMarker" name="formMarker"> 

                    <div class="form-group">
                    <h3>Custome Marker</h3> 
                        <input type="file"  class="form-control" name="filemarker">
                    </div>
                        <div class="form-group footer-mdl">
                            <button type="submit" class="btn btn-success">Unggah</button>
                        </div>
                </form>
             </div>
        </div>
    </div>
</div>
<div id="ModalMarker3d" class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title align-self-center mt-0" id="Labl_attr_marker"></h5>
            </div>
            <div class="modal-body">
                <form id="formMarker3d" name="formMarker3d"> 
                   
                </form>
             </div>
             
        </div>
    </div>
</div>

<script type="text/javascript">
   var tag = document.createElement('script');
            tag.src = "https://www.youtube.com/player_api";
            var firstScriptTag = document.getElementsByTagName('script')[0];
            firstScriptTag.parentNode.insertBefore(tag, firstScriptTag); 
</script>
@include('dashboard.virtualtour.create_script')
@endsection
