@extends('app.layouts.main')
@section('title', 'Destinasi Wisata')
@section('app')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('assets/vritual/photo.min.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/vritual/markers.min.css')}}"/>  
<script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>

<!--   <section class="breadcrumb__area include-bg pt-150 pb-150 breadcrumb__overlay"
        data-background="{{ asset('app/assets/img/breadcrumb/pantai-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="breadcrumb__content p-relative z-index-1">
                        <h3 class="breadcrumb__title mb-20">Virtual view</h3>
                        <div class="breadcrumb__list">
                            <span><a href="/">Home</a></span>
                            <span class="dvdr"><i class="fa-regular fa-angle-right"></i></span>
                            <span class="sub-page-black">Virtual view</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
 <div id="viewer"  style="width: 100%;"></div>  
 <div id="ModalShowLink" class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content"> 
          <div class="modal-header"> 
            <h5 id="labelmarker"></h5> 
        </div>
            <div class="modal-body" id="showGallery">
             </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="{{asset('assets/vritual/dropify/js/dropify.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/three/build/three.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uevent@2/browser.min.js"></script>
<script src="{{asset('assets/vritual/photo.min.js')}}"></script>
<script src="{{asset('assets/vritual/markers.min.js')}}"></script>
<script src="{{asset('assets/vritual/jquery-ui.js')}}"></script>
<script type="text/javascript"> 
    var tag = document.createElement('script'); 
    tag.src = "https://www.youtube.com/player_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag); 
    const windowHeight       = $( window ).height();
    $('#viewer').css({height : (parseInt(windowHeight))+"px"});
    @if(@$app->request->input('r'))window.id_virtual='{{@$app->request->input('r')}}';@endif
    var markersPlugin       =false; 
    const sorage_room       ='{{asset('storage')}}/'; 
    const url_game         ='{{url('g')}}/'; 
    const _token            ='{{csrf_token()}}'; 
    const getrooms          ='{{route('getrooms')}}';
    const loading_img       ='';  

$(document).ready( function ()
{ 
    cekstep();
    function cekstep()
    {  
        $('#viewer').empty();
        const marker_all   =[]; 
        const form_data2   = new FormData(); 
        form_data2.append('_token', _token); 
        if(typeof window.id_virtual !='undefined')
        { 
            form_data2.append('id_vir',   window.id_virtual);   
        } 

        fetch(getrooms, { method: 'POST',body:form_data2}).then(res => res.json()).then(data => 
        {

            var vir_rom=data.vir; 
            if(typeof vir_rom !='undefined')
            { 

                window.data_panorama =vir_rom;
                const dt_vir         =window.data_panorama;
                const asset_viewer   =sorage_room+dt_vir.gambar; 
                const marker_dt      =data.marker; 

                if(marker_dt.lenght!=0)
                {
                    for(let k_m of marker_dt) 
                    {

                        marker_all.push(k_m);
                    }
                } 
                var defaultLong =dt_vir.long?parseFloat(dt_vir.long):0;
                var defaultLat  =dt_vir.lat?parseFloat(dt_vir.lat):0;
                var defaultzoom =dt_vir.zoom?parseFloat(dt_vir.zoom):0; 
                defaultLong=typeof window.defaultlong!='undefined'?window.defaultlong:defaultLong;
                defaultLat =typeof window.defaultlat !='undefined'?window.defaultlat:defaultLat;
                


                window.viewer   = new PhotoSphereViewer.Viewer({
                container       : document.querySelector('#viewer'),
               // navbar          :false,
                defaultLong     :defaultLong,
                defaultLat      :defaultLat,
                //panorama      :asset_viewer,
                //defaultZoomLvl  :100,
                loadingImg      : loading_img,
                plugins         : [
                                    [PhotoSphereViewer.MarkersPlugin, {
                                     markers: marker_all,       
                                    }], 
                                    ],
                                });   
                window.viewer.setPanorama(asset_viewer)
                .then(() => { 
                window.viewer.animate({
                zoom        : defaultzoom,
                speed       : '5rpm',
                });

                });
                                             
              markersPlugin = window.viewer.getPlugin(PhotoSphereViewer.MarkersPlugin);   
              markersPlugin.on('select-marker', function(e, marker, data) 
                    {


                      
                      $('#showGallery').empty();
                               var label_=marker.config.tooltip.content;
                               label_=typeof label_!='undefined'?label_:'';
                               $('#labelmarker').html(label_);
                               $('#showGallery1').remove();

                               
                              $('#ModalShowLink').find('.modal-dialog').removeClass('md-big');
                                $('.modal-lg').css({
                                            "width" :"unset",
                                            'max-width': '800px'
                                          //  height:(parseInt(windowHeight)-200)+"px",
                                            });
                                           
                            //   console.log(marker.config.typemarker);
                                if(marker.config.link!='')
                                {

                                    switch(marker.config.typemarker)
                                    {
                                        case 'AddRooms': 
                                            var url_=`?r=`+marker.config.link;
                                            window.history.pushState({'historycontent':url_}, null,url_); 
                                            window.id_virtual=marker.config.link;
                                            window.viewer.animate({
                                            zoom: 100,
                                            speed: '10rpm',
                                            })
                                            .then(() => { 
                                              cekstep();
                                            });
                                             
                                        break;
                                        case 'Addvideo':  
                                        $('#showGallery').html('<div id="showGallery1" class="text-center">Loading...</div>');
                                        
                                        var laptyer=new YT.Player('showGallery1', {
                                        height: '360',
                                        width: '100%',
                                        videoId: marker.config.link
                                        }); 
                                            $('#ModalShowLink').modal('show');
                                        break;
                                        case 'AddPicture': 
                                         $('#ModalShowLink').modal('show'); 
                                         $('#showGallery').html('<img src="'+marker.config.link+'" width="100%">');

                                        break;
                                        case 'AddGame':  
                                            var widt_sc=$(window).width(); 
                                              $('#ModalShowLink').modal('show'); 
                                              $('#ModalShowLink').find('.modal-dialog').addClass('md-big');
                                              $('#showGallery').html('<iframe src="'+url_game+marker.config.link+'" title="'+label_+'" height="'+(parseInt(windowHeight)-200)+'px" width="100%" ></iframe>');
                                            $('.md-big').css({
                                            width : (parseInt(widt_sc)-50)+"px",
                                            'max-width': 'unset'
                                          //  height:(parseInt(windowHeight)-200)+"px",
                                            });
                                           
                                        break;
                                        case 'AddInformasi': 
                                            $('#showGallery').html(marker.config.link);
                                            $('#ModalShowLink').modal('show'); 
                                        break;
                                          case 'AddRating': 
                                            $('#ModalShowLink').modal('show'); 
                                            if($.cookie("rating")!=1)
                                            {
                                                  var form=`<form id="rettingfrom" name="rettingfrom">
                                                  <div id="alert-msg"></div>
                                                  <img src="assets/images/mr.pong.gif">
                                                  <div class="form-group">
                                                  <label>`+marker.config.link+`</label>
                                                   <select id="example-css" name="rating" autocomplete="off">
                                                          <option value="1">1</option>
                                                          <option value="2">2</option>
                                                          <option value="3">3</option>
                                                          <option value="4">4</option>
                                                          <option value="5">5</option>
                                                      </select>
                                                  </div>
                                                   <div class="form-group">
                                                     <label>Komentar Anda</label>
                                                     <textarea class="form-control" name="komentar" required="required"></textarea>
                                                  </div>
                                                <div class="form-group">
                                                <button class="btn btn-warning" type="submit">Kirim</button>
                                                </div>
                                                  </form>`;
                                                  $('#showGallery').html(form);
                                                   $("#example-css").barrating({ theme: "css-stars", showSelectedRating: !1 });

                                            }
                                            else
                                            {
                                              var form=`<form id="rettingfrom" name="rettingfrom">
                                                  <div class="alert alert-success">Anda Sudah melakukan penilaian Sebelum nya</div>
                                                  <img src="assets/images/mr.pong.gif"> 
                                                  </form>`;
                                                  $('#showGallery').html(form);
                                            } 
                                        break;
                                    }
                                } 
                    });
                    window.viewer.on('position-updated', (e, position) => { 

                       // console.log(position);
                      window.defaultlong= Math.PI*(position.longitude/2);
                      window.defaultlat=  Math.PI*(position.latitude/2);  
                    console.log( window.defaultlong);
                     console.log(window.defaultlat);



                    });


            }
           
        });
      
    }

    $('body').delegate('#sideshow','click',function(e)
    {
        e.preventDefault();
        $(this).closest('#sidebar').toggleClass('show');
        $('.header-sm').removeClass('show');
        if($(this).closest('#sidebar').hasClass('show')==false)
        {
          $('.header-sm').addClass('show'); 
        }

    });
  // $('body').delegate('.rooms','click',function(e)
  //   {
  //     e.preventDefault();
  //     var url_=`?r=`+$(this).data('id');
  //     window.history.pushState({'historycontent':url_}, null,url_); 
  //     window.id_virtual=$(this).data('id');
  //     cekstep();   
  //   });
     
$('body').delegate('.zoom_up','click',function(e)
  {
      e.preventDefault();
      var zoom=window.viewer.getZoomLevel(); 
      if(zoom<=100&&zoom>=0)
      {
        var zoomin =parseInt(zoom)+20; 
          window.viewer.animate({
          zoom: zoomin,
          speed: '2rpm',
          });
      } 

  });
$('body').delegate('.zoom_down','click',function(e)
  {
      e.preventDefault();
      var zoom=window.viewer.getZoomLevel(); 
      if(zoom<=100&&zoom>=0)
      {
        var zoomin =parseInt(zoom)-20; 
          window.viewer.animate({
          zoom: zoomin,
          speed: '2rpm',
          });
      } 

  });
$('body').delegate('#navigasi_footer li','click',function(e)
  {
      e.preventDefault();
        var position    =window.viewer.getPosition(); 
        var longitude   =position.longitude;
        var latitude    =position.latitude; 
         switch($(this).data('position'))
         {
            case 'up': 
            latitude= latitude+(2/Math.PI);
            break;
            case 'left':
             longitude= longitude-(2/Math.PI);
            break;
            case 'right':

             longitude= longitude+(2/Math.PI);
            break;
            case 'down': 
               latitude= latitude-(2/Math.PI);
            break;
         } 
          window.viewer.animate({
          longitude: parseFloat(longitude),
          latitude: parseFloat(latitude),
          speed: '5rpm',
          }); 
  });
$('body').delegate('#navigasi_footer li','click',function(e)
  {
      e.preventDefault();
        var position    =window.viewer.getPosition(); 
        var longitude   =position.longitude;
        var latitude    =position.latitude; 
         switch($(this).data('position'))
         {
            case 'up': 
            latitude= latitude+(2/Math.PI);
            break;
            case 'left':
             longitude= longitude-(2/Math.PI);
            break;
            case 'right':

             longitude= longitude+(2/Math.PI);
            break;
            case 'down': 
               latitude= latitude-(2/Math.PI);
            break;
         } 
          window.viewer.animate({
          longitude: parseFloat(longitude),
          latitude: parseFloat(latitude),
          speed: '5rpm',
          }); 
  });
$('body').delegate('#fullscreen','click',function(e)
  {
    e.preventDefault();
     window.viewer.animate({
          fullscreen: parseFloat(longitude),
          latitude: parseFloat(latitude),
          speed: '5rpm',
          }); 
  });  
    $('body').delegate('#sidebar li','click',function(e)
     {
     e.preventDefault();
     if($(this).data('link')!='')
     {
        window.location.href=$(this).data('link');
     }
 

    }); 
  $('body').delegate('#rettingfrom','submit',function(e)
     {
     e.preventDefault();
     var this_=$(this);
     this_.find('button[type="submit"]').html('Loading...');
     this_.find('button[type="submit"]').attr('disabled','disabled'); 
      const formretting     = document.forms.namedItem('rettingfrom');
      const saveretting     = new FormData(formretting); 
      saveretting.append('_token',_token);   
      fetch(storerating, { method: 'POST',body:saveretting}).then(res => res.json()).then(data => 
      {    
          this_.find('button[type="submit"]').html('Kirim');
          this_.find('button[type="submit"]').removeAttr('disabled','disabled'); 
          $("#alert-msg").html('<div class="alert alert-success">Terimakasih Atas Penilaian Dan Komentar Anda</div>');
           if(data.error==false)
           {

                $.cookie("rating", 1);
           }
           setTimeout(function(){$('#ModalShowLink').modal('hide'); },2000);

      });   

    });  
}); 
</script>

@endsection