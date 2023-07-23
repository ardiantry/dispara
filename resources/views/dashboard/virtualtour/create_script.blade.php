<script src="{{asset('assets/vritual/dropify/js/dropify.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/three/build/three.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uevent@2/browser.min.js"></script>
<script src="{{asset('assets/vritual/photo.min.js')}}"></script>
<script src="{{asset('assets/vritual/markers.min.js')}}"></script>
<script src="{{asset('assets/vritual/jquery-ui.js')}}"></script>
<script type="text/javascript"> 
    $(document).ready( function () {
         
        var markersPlugin       =false; 
        const sorage_room       ='{{asset('storage')}}/'; 
        
        const _token            ='{{csrf_token()}}';
        @if(@$app->request->input('id'))
        window.id_virtual='{{@$app->request->input('id')}}';

        @endif 
        cekstep();
        $('.dropify1').dropify(); 



      $('body').delegate('#simpanNamavirtual','submit',function(e)
      {
           // window.history.pushState({'historycontent':url_}, null,url_);
           var $this=$(this); 

           $('.form-control').removeClass('parsley-error');
            e.preventDefault();
            var form_= document.forms.namedItem("simpanNamavirtual");
            const form_data   = new FormData(form_); 
            form_data.append('_token',   _token);
            if(window.id_virtual!=undefined)
            {
                form_data.append('id_vir', window.id_virtual);  
            } 
            fetch('{{route('virtualroom.save')}}', { method: 'POST',body:form_data}).then(res => res.json()).then(data => 
                {
                    if(data.error==true)
                    {
                    
                        for(let alt in data.alert)
                        {
                            $('*[name="'+alt+'"]').addClass('parsley-error');
                        }

                    }
                    else
                    {
                        if(data.id_vr!='')
                        {
                            var url_='?id='+data.id_vr;
                            window.id_virtual=data.id_vr;
                            window.history.pushState({'historycontent':url_}, null,url_);
                            cekstep();
                        }
                    }
                });
      });
 
    $('body').delegate('#unggahfoto','submit',function(e)
    { 
         $('.progress1').html(`<div class="progress"><div class="progress-bar progress-animated bg-success" role="progressbar" style="max-width: 0%; border-radius: 50px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div></div>`);
        e.preventDefault();
        var form_2= document.forms.namedItem("unggahfoto");
        const oData = new FormData(form_2);

        if (window.XMLHttpRequest) 
        {
            var xmlhttp=new XMLHttpRequest();
        } 
        else  
        {  
            var xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        oData.append('_token',_token);  
        oData.append('id_vir', window.id_virtual); 
        xmlhttp.responseType    =   'json';
        xmlhttp.crossDomain = true;
        xmlhttp.async = false;
        xmlhttp.cache = false;
        xmlhttp.contentType = false;
        xmlhttp.processData = false;
        xmlhttp.open("POST",'{{route('virtualroom.room_image')}}',true);
        xmlhttp.upload.addEventListener('progress', function(e) {
                var max         = e.total;
                var current     = e.loaded;
                var Percentage  = (current * 100) / max; 
                if (Percentage >= 100) 
                { 
                    $(' .progress-bar').css('max-width', Percentage+ '%');  
                }  
        });
        xmlhttp.onreadystatechange = function() 
        { 
             if (this.readyState==4 && this.status==200) 
            { 
                 $('.progress1').empty();
                    cekstep();
               
            }
        }
    xmlhttp.send(oData);
     
    }); 


function cekstep()
{

    $('.nav-item a').removeClass('active');
    $('.tab-pane').removeClass('active');
    $('#viewer').empty();  
    const marker_all        =[]; 
    window.data_marker      =undefined;
    window.marker_poin      =undefined;

    if(window.id_virtual!=undefined)
    { 

        const form_data2   = new FormData(); 
        form_data2.append('_token', _token); 
        form_data2.append('id_vir',   window.id_virtual); 
        fetch('{{route('virtualroom.first')}}', { method: 'POST',body:form_data2}).then(res => res.json()).then(data => 
        {
            $('#tab1').attr('href','#DetailRuangan');
            $('#tab1').attr('data-toggle','tab');
            $('#tab1').attr('role','tab'); 
            $('#tab1').addClass('nav-link');

            var vir_rom=data.vir; 
            if(typeof vir_rom !='undefined')
            { 


                //console.log(vir_rom.gambar);
                $('*[name="nama_ruangan"]').val(vir_rom.nama);
                $('*[name="kode_ruangan"]').find('option[value="'+vir_rom.kode_ruangan+'"]').attr('selected','selected');
                $('*[name="deskripsi"]').text(vir_rom.deskripsi);
                if(vir_rom.gambar==null)
                {
                    $('#tab2').attr('href','#InputFoto360');
                    $('#tab2').attr('data-toggle','tab');
                    $('#tab2').attr('role','tab');  
                    $('#tab2').addClass('nav-link').addClass('active');
                    $('#InputFoto360').addClass('active');

                }
                else
                {
                    $('#tab2').attr('href','#InputFoto360');
                    $('#tab2').attr('data-toggle','tab');
                    $('#tab2').attr('role','tab'); 
                    $('#tab2').addClass('nav-link');

                    
                    $('#tab3').attr('href','#Mapping');
                    $('#tab3').attr('data-toggle','tab');
                    $('#tab3').attr('role','tab');  
                    $('#tab3').addClass('nav-link').addClass('active');
                    $('#Mapping').addClass('active');

                    $('.dropify-render').find('img').attr('src',sorage_room+vir_rom.gambar);
                    $('.dropify-filename-inner').text(vir_rom.gambar); 
                    window.data_panorama =vir_rom;
                    const dt_vir         =window.data_panorama;
                    const asset_viewer   =sorage_room+dt_vir.gambar; 
                    const marker_dt     =data.marker;
                    if(marker_dt.lenght!=0)
                    {
                        for(let k_m of marker_dt) 
                        {

                            marker_all.push(k_m);
                        }
                    } 
                    var defaultLong     =dt_vir.long?parseFloat(dt_vir.long):0;
                    var defaultLat      =dt_vir.lat?parseFloat(dt_vir.lat):0;
                    var defaultzoom     =dt_vir.zoom?parseFloat(dt_vir.zoom):0;
                    $('#deflonglat').html(' (Lon:'+defaultLong+', Lat:'+defaultLat+', Zoom:'+defaultzoom+')');
                    $('#updatedefault').find('input[name="longitude"]').val(defaultLong);
                    $('#updatedefault').find('input[name="latitude"]').val(defaultLat);
                    $('#updatedefault').find('input[name="zoom"]').val(defaultzoom);


                    window.viewer        = new PhotoSphereViewer.Viewer({
                        container: document.querySelector('#viewer'),
                        panorama: asset_viewer,
                        defaultLong:defaultLong,
                        defaultLat:defaultLat,
                        defaultZoomLvl:defaultzoom,
                        plugins: [
                                [PhotoSphereViewer.MarkersPlugin, {
                                 markers: marker_all,       
                                }], 
                                ],
                        });
                    markersPlugin = window.viewer.getPlugin(PhotoSphereViewer.MarkersPlugin); 
                    window.viewer.on('click', (e, data) => {
                        if(window.data_marker)
                        {
                            window.data_marker.longitude=data.longitude;
                            window.data_marker.latitude=data.latitude;  
                            pindahmarker(window.data_marker);

                        } 
                    }); 
                    viewer.on('position-updated', (e, position) => { 

                       // console.log(position);
                        $('#updatedefault').find('input[name="longitude"]').val(position.longitude);
                        $('#updatedefault').find('input[name="latitude"]').val(position.latitude);  

                    });
                    viewer.on('zoom-updated', (e, level) => {
                        $('#updatedefault').find('input[name="zoom"]').val(level);  
                    });

                    markersPlugin.on('select-marker', function(e, marker, data) 
                    {
                        window.marker_congif=undefined; 
                        if(data.dblclick==true)
                        {
                            console.log(marker.config);
                            window.marker_congif=marker.config; 
                            $('#ModalMarker3d').modal('show');

                        } 
                        else if(data.rightclick==true)
                        {
                            if(!confirm('you sure delete this marker?'))
                            {
                                return;
                            }

                            if(marker.config.id.indexOf('marker_saving-')==-1)
                            {
                               cekstep(); 
                                return;
                            }
                            const dlte_mar        = new FormData(); 
                            dlte_mar.append('_token',_token);
                            dlte_mar.append('id_delete',marker.config.id);  
                            fetch('{{route('virtualroom.dlte_mar')}}', { method: 'POST',body:dlte_mar}).then(res => res.json()).then(data => 
                            { 
                               cekstep(); 

                            });   
                        } 
                         
                    }); 

                } 
            } 

        });

    }
    else
    {   
        $('#tab1').attr('href','#DetailRuangan');
        $('#tab1').attr('data-toggle','tab');
        $('#tab1').attr('role','tab');  
        $('#tab1').addClass('nav-link').addClass('active');
        $('#DetailRuangan').addClass('active');

    }
}
if(window.id_virtual!=undefined)
{  
    $('body').delegate('.nav-link','click',function(e){
        e.preventDefault();
        console.log('test');
        $('.nav-link').removeClass('active');
        $('.tab-pane ').removeClass('active');
        var href_=$(this).attr('href');
        $(href_).addClass('active');
        $(this).addClass('active'); 
    }); 
}

// all about icon/marker
$('body').delegate('.add_btn','click',function(e){ 
    e.preventDefault();
    if(window.data_marker!=undefined)
    {
        alert('Marker sebelumnya belum di simpan');
        return;
    }
    $('#listmarker').empty();
    $('#AddmarkersModal').modal('show');
    window.action_btn=$(this).data('id');
    var Labl='';
    switch($(this).data('id'))
    { 
        case 'AddRooms': 
        Labl='Add Rooms'; 
        break;
        case 'Addvideo':
        Labl='Add Video'; 
        break;
         case 'AddPicture':
        Labl='Add Picture'; 
        break;
         case 'AddGame':
        Labl='Add Game'; 
        break;
        case 'AddInformasi':
        Labl='Add Informasi'; 
        break;
        case 'AddRating':
        Labl='Add Rating'; 
        break;
        
        

    }
    // window.marker_congif
     $('#headerLabel').html(Labl);
}); 



$('body').delegate('#updatedefault','submit',function(e)
{
    e.preventDefault();   
    const namdeflonglat      = document.forms.namedItem('updatedefault');
    const fromdeflonglat     = new FormData(namdeflonglat); 
    fromdeflonglat.append('_token',_token); 
    fromdeflonglat.append('id_vir',window.id_virtual);   
    fetch('{{route('virtualroom.fromdeflonglat')}}', { method: 'POST',body:fromdeflonglat}).then(res => res.json()).then(data => 
    {    
        alert('Update success');
    });  
});

$('body').delegate('#formMarker','submit',function(e)
{
    e.preventDefault();  
    const formMarker      = document.forms.namedItem('formMarker');
    const fromicon        = new FormData(formMarker); 
    fromicon.append('_token',_token); 
    fetch('{{route('virtualroom.simpanmarker')}}', { method: 'POST',body:fromicon}).then(res => res.json()).then(data => 
    { 
        if(data.error)
        {
            alert('File Icon not supported');
        }
        else
        { 
            getmarker();
        }

    });  
});


$('#AddmarkersModal').on('shown.bs.modal', function (e) 
{
    e.preventDefault();
    getmarker();

});  
$('#ModalMarker3d').on('shown.bs.modal', function (e) 
{
    e.preventDefault();
    var btn_edt_    =typeof window.data_marker=='undefined'?' <a class="btn btn-success btn-sm" href="#" id="editpositon" >Edit Position</a>    ':''; 
    var tooltip     = window.marker_congif.tooltip.content? window.marker_congif.tooltip.content:'';
    var html        = window.marker_congif.html? window.marker_congif.html:'';
    var propert     = ` 
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label>Width</label>
                                <input type="number" class="form-control" required="required"  value="`+ window.marker_congif.width+`" name="width">
                            </div>
                            <div class="col-md-6">
                                <label>Height</label>
                                <input type="number" class="form-control" required="required"  value="`+ window.marker_congif.height+`" name="height">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label>Judul</label>
                                <input type="text" class="form-control" required="required"  value="`+tooltip+`" name="tooltip">
                            </div>
                            
                        </div> 
                        <div class="form-group m-b-20" id="getdatavir">
                            <input type="file" class="form-control" value="" name="link" placeholder="Link">
                            <input type="hidden" class="form-control" value="`+window.marker_congif.link+`" name="Link_save">
                            
                        </div> 
                        <div id="media"></div>
                        <div class="form-group footer-mdl">
                            <div class="input-group">
                            <span class="input-group-append">
                                <button type="submit"  class="btn btn-primary btn-sm">Save</button>  
                                  `+btn_edt_+`  
                                  </span>
                            </div>             
                        </div> 
                `;  
    $('#formMarker3d').html(propert); 
    var lbl_='';
    switch(window.marker_congif.typemarker)
    {
        case 'AddRooms': 
            lbl_='Data Rooms';
            getdatavir();
            var link=window.marker_congif.link!=''?'Check Rooms':'Enpty';
            $('#media').html(`<a target="_blank" class="badge badge-success  mb-3" href="{{url('')}}?r=`+window.marker_congif.link+`">`+link+`</a>
            `);
        break;
        case 'Addvideo':
            lbl_='Data Video';   
            $('#getdatavir').html(`<label>Embed Youtube</label><input type="text" required="required"  class="form-control" value="`+window.marker_congif.link+`" name="link" placeholder="Link contoh (mKd3GLiro_Q)">`);

            // $('#media').html(`
            // <video width="100%" controls>
            // <source src="`+window.marker_congif.link+`" type="video/mp4">  
            // </video> 
            // `);
            var laptyer=new YT.Player('media', {
                height  : '360',
                width   : '100%',
                videoId: window.marker_congif.link
            }); 

        break;
        case 'AddPicture':
            lbl_='Data Picture'; 
            $('#media').html(`<img width="100%" src="`+window.marker_congif.link+`" /> `);
        break;
        case 'AddGame':
            lbl_='Data Game'; 
            getdatagame();
            var link=window.marker_congif.link!=''?'Cek Games':'Enpty';
            $('#media').html(`<a target="_blank" class="badge badge-success  mb-3" href="{{url('games')}}/`+window.marker_congif.link+`">`+link+`</a>
                `);
        break;
        case 'AddInformasi':
            lbl_='Data Informasi'; 
       //     $('#media').html(window.marker_congif.link);
            // getdatainformasi(window.marker_congif.link); 
             $('#getdatavir').html(

                        `<div class="form-group"><label>Informasi</label>
                            <textarea class="form-control" name="link" >`+window.marker_congif.link+`</textarea>
                            </div>
                            
                        `);  
        break;
         case 'AddRating':
            lbl_='Data Rating';  
            var informasi=window.marker_congif.link?window.marker_congif.link:'Bagaimana Penilaian anda tentang Virtual tour ini?';
             $('#getdatavir').html(

                        `<div class="form-group"><label>Informasi</label>
                            <textarea class="form-control" name="link" >`+informasi+`</textarea>
                            </div>
                            
                        `);  
        break;


    }
    $('#Labl_attr_marker').html(lbl_);

});  

function getdatavir()
{
     
    const form_vir        = new FormData(); 
    form_vir.append('_token',_token); 
    form_vir.append('id_vir',window.id_virtual);  
    fetch('{{route('virtualroom.getdatavir')}}', { method: 'POST',body:form_vir}).then(res => res.json()).then(data => 
    {  
        var inpt_slct='';
        for(let ky of data.Virtualtour)
        {
                      
            var selected_=window.marker_congif.link==ky.id?'selected="selected"':'';
            inpt_slct+=`<option value="`+ky.id+`" `+selected_+`>`+ky.nama+`</option>`;
        }
        $('#getdatavir').html(
            `<select class="form-control" name="link">
            `+inpt_slct+`
            </select>`);
    }); 
}
function getdatagame()
{ 
    const form_game        = new FormData(); 
    form_game.append('_token',_token); 
    form_game.append('id_vir',window.id_virtual);  
    fetch('{{route('virtualroom.getdatagame')}}', { method: 'POST',body:form_game}).then(res => res.json()).then(data => 
    {  
         var inpt_slct='';
        for(let ky of data.Games)
        {
           // console.log(window.marker_congif.link);
            var selected_=window.marker_congif.link==ky.id?'selected="selected"':'';
            inpt_slct+=`<option value="`+ky.id+`" `+selected_+`>`+ky.nama+`</option>`;
        }
        $('#getdatavir').html(
            `<select class="form-control" name="link">
            `+inpt_slct+`
            </select>`);
    }); 
}
// function getdatainformasi(link)
// {
//      $('#getdatavir').html(
//             `<label>Informasi</label>
//             <textarea class="form-control" name="link" >`+link+`</textarea>`);
// }

function getmarker()
{
  $('#listmarker').html('<div class="container text-center">loading...</div>');
    const fromlisticon        = new FormData(); 
    fromlisticon.append('_token',_token); 
    fetch('{{route('virtualroom.listmarker')}}', { method: 'POST',body:fromlisticon}).then(res => res.json()).then(data => 
    { 
        var list='';
        var i=0;
        for(let lio of data.tb_marker)
        {

            var btn_del=`<a class="hapusmarker btn btn-danger btn-sm" title="Hapus" href="#"><i class="fa fa-trash-o"></i></a>`;
                    list+=`<div class="col-md-3 text-center">
                    <div class="body-icon"  data-id="`+lio.id+`" data-url="`+sorage_room+lio.url+`">
                            <img src="`+sorage_room+lio.url+`" style="width:100%;">
                            <div class="input-group">
                            <a class="Addlis_marker btn btn-success btn-sm" title="Add marker" href="#"><i class="fa fa-check-circle"></i></a>
                           `+btn_del+`
                            </div>
                            </div>
                    </div>`;
                    i++
        }


        $('#listmarker').html(list);
    });  
}
$('body').delegate('.hapusmarker','click',function(e)
{
    e.preventDefault();  
    if(!confirm('yakin Menghapus data ini?'))
    {
        return false;
    }
 
    const hapusicon        = new FormData(); 
    hapusicon.append('_token',_token); 
    hapusicon.append('id_hapus',$(this).closest('.body-icon').data('id'));  
    fetch('{{route('virtualroom.hapusmarker')}}', { method: 'POST',body:hapusicon}).then(res => res.json()).then(data => 
    { 
        getmarker();

    });  
});

$('body').delegate('.Addlis_marker','click',function(e)
    {
        e.preventDefault();  
        $('#AddmarkersModal').modal('hide'); 
        $('#propertimarker').empty(); 
        var id_marker   =$(this).closest('.body-icon').data('id');
        var url_marker  =$(this).closest('.body-icon').data('url');
        var longitude   =$('#updatedefault').find('input[name="longitude"]').val();
        var latitude    =$('#updatedefault').find('input[name="latitude"]').val();
            longitude   =longitude?parseFloat(longitude):0;
            latitude    =latitude?parseFloat(latitude):0;

        window.data_marker={
            id_marker   :"marker-"+id_marker,
            url_marker  :url_marker,
            longitude   :longitude,
            latitude    :latitude,
            width       :100,
            height      :100,
            typemarker  :window.action_btn,
            anchor      :"bottom center",
            tooltip     :'', 
            link        :''
            };
        pindahmarker(window.data_marker); 
 
    });

function pindahmarker(data)
 {
     $('#propertimarker').empty();   
         if(window.marker_poin!=undefined)
         { 
           markersPlugin.removeMarker(window.marker_poin);

         }
        window.marker_poin={"id"            : data.id_marker,
                            "image"         : data.url_marker,
                            "longitude"     : data.longitude,
                            "latitude"      : data.latitude,
                            "width"         : data.width,
                            "height"        : data.height,
                            "anchor"        : data.anchor,
                            "typemarker"    : data.typemarker,
                            "tooltip"       : data.tooltip, 
                            "link"          : data.link
                            }; 
        markersPlugin.addMarker(window.marker_poin);  
 }
// all about icon/marker 
    $('body').delegate('#formMarker3d','submit',function(e)
    {
        e.preventDefault(); 
        var this_=$(this);
        this_.find('button[type="submit"]').html('loading...');
        var form                = document.forms.namedItem("formMarker3d");
        const simpanmarkeredit  = new FormData(form); 
        simpanmarkeredit.append('_token',_token);
        simpanmarkeredit.append('id_vir', window.id_virtual);   
        if(typeof window.marker_congif!='undefined')
        {
            var dtcon           =window.marker_congif;
            var marker_congif   =Object.keys(window.marker_congif);
            for(let ky of marker_congif)
            {
                var obj_=typeof dtcon[ky];
                if(obj_!='object'&&ky!='width'&&ky!='height'&&ky!='link')
                {
                    simpanmarkeredit.append(ky, dtcon[ky]);   
                }
                
            } 
        }
        console.log(simpanmarkeredit);
        fetch('{{route('virtualroom.simpanmarkeredit')}}', { method: 'POST',body:simpanmarkeredit}).then(res => res.json()).then(data => 
        { 
            cekstep();
            $('#ModalMarker3d').modal('hide');
             this_.find('button[type="submit"]').html('Save');

        });   

    });


    $('body').delegate('#editpositon','click',function(e)
    {
         e.preventDefault(); 
         if(window.data_marker!=undefined)
         {
            alert('cant updated Position');
            return;
         }
         $('#ModalMarker3d').modal('hide'); 
        window.data_marker={
                                id_marker   :window.marker_congif.id,
                                url_marker  :window.marker_congif.image,
                                longitude   :parseFloat(window.marker_congif.longitude),
                                latitude    :parseFloat(window.marker_congif.latitude),
                                width       :parseFloat(window.marker_congif.width),
                                height      :parseFloat(window.marker_congif.height),
                                typemarker  :window.marker_congif.typemarker,
                                anchor      :window.marker_congif.anchor,
                                tooltip     :window.marker_congif.tooltip, 
                                link        :window.marker_congif.link
                            }; 
         window.marker_poin={
                                "id"            : window.data_marker.id_marker,
                                "image"         : window.data_marker.url_marker,
                                "longitude"     : window.data_marker.longitude,
                                "latitude"      : window.data_marker.latitude,
                                "width"         : window.data_marker.width,
                                "height"        : window.data_marker.height,
                                "anchor"        : window.data_marker.anchor,
                                "typemarker"    : window.data_marker.typemarker,
                                "tooltip"       : window.data_marker.tooltip, 
                                "link"          : window.data_marker.link

                            }; 
        pindahmarker(window.data_marker);
     
    });
            

    });
</script> 
