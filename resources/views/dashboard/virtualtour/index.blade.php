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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Arsip & Event</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Wisata</a></li>
                            <li class="breadcrumb-item active">Kelola Virtual tour</li>
                        </ol>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="float-end d-none d-sm-block">
                        <a href="#" id="addKatagori" class="btn btn-success">+ Tambah View</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="">
            <div class="custom-tab">
                
                <div class="row">
                    <div class="col-12"> 
                        <div class="card">
                            <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="KatagoriVirtual" class="table table-bordered dt-responsive nowrap">
                                        <thead>
                                        <tr>
                                        <th>Nama Virtual</th> 
                                         <th>Aksi</th> 
                                        </tr>
                                        </thead>
                                        </table>
                                    </div>
                                
                            </div>
                        </div>


                    </div>
                </div>
                 
            </div>
        </div>
    </div>
</div>
</div>

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


<script>
    $(document).ready( function () { 
      

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
                ajax: '{{ route('ajax_tbl_KatagoriVirtual') }}',
                 columns: [
                    { data: 'nama', name: 'nama' }, 
                    { 
                        orderable   :  false,
                        searchable  :  false,
                        data        :   'action',
                        name        : 'action'
                    }
                ]
            });



 


        // addcatagori
        $('#addKatagori').click(function(e)
        {
            e.preventDefault();
            window.id_kategori=undefined;
            if($(this).data('id'))
            {
                window.id_kategori=$(this).data('id');
            }
             $('#ModalKatagori').modal('show');

        });
        $('#ModalKatagori').on('shown.bs.modal', function (e) 
        {
            $('#UpdateKatagori').find('input[name="nama"]').val('');
            if(window.id_kategori!=undefined)
            {
               // $('#UpdateKatagori').find('input[name="nama"]').val('');
            }
        });

 




        $('body').delegate('#UpdateKatagori','submit',function(e)
        { 
            e.preventDefault();
            var $this           =$(this);   
            var form_           = document.forms.namedItem("UpdateKatagori");
            const form_data     = new FormData(form_); 
              form_data.append('_token', '{{csrf_token()}}');
            if(window.id_kategori!=undefined)
            {
                form_data.append('id_kategori', window.id_kategori);  
            } 
            fetch('{{route('katagori_vr.save')}}', { method: 'POST',body:form_data}).then(res => res.json()).then(data => 
                {
                    $('#ModalKatagori').modal('hide');
                     $('#KatagoriVirtual').DataTable().ajax.reload();
                });
      });
        
         $('body').delegate('.detail_data_kat','click',function(e)
        { 
            e.preventDefault();
            window.id_kategori=$(this).data('id');
            $('#headerLabel').html($(this).text());
            $('#ModalRuangan').modal('show');
             
        });
        $('#ModalRuangan').on('shown.bs.modal', function (e) 
        {
             var id_kat=window.id_kategori;

              var tbl_virtualtour_detail = $('#tbl_virtualtour').DataTable({
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
                        ajax: `{{ route('ajax_tbl_virtualtour') }}?id_kat=${id_kat}`,
                         columns: [
                            { data: 'nama', name: 'nama' }, 
                            { data: 'deskripsi', name: 'deskripsi' }, 
                            { data: 'created_at', name: 'created_at' },
                            { 
                                orderable   :  false,
                                searchable  :  false,
                                data        :   'action',
                                name        : 'action'
                            }
                        ]
                    });
        });


        $('body').delegate('.Edit_data','click',function(e)
        {
            e.preventDefault();
            window.location.href=`{{ route('virtual.create') }}?id_kat=${window.id_kategori}&id=${$(this).data('id')}`;
        });
        $('body').delegate('.Hapus_data','click',function(e)
        {
            e.preventDefault();
            if(!confirm('You sure to delete this rooms?')) 
            {
                return;
            }
             const form_data   = new FormData(); 
            form_data.append('_token', '{{csrf_token()}}');
            form_data.append('id_delete',   $(this).data('id')); 
            fetch('{{route('virtualroom.delete')}}', { method: 'POST',body:form_data}).then(res => res.json()).then(data => 
                {
                     $('#tbl_virtualtour').DataTable().ajax.reload();
                });
        });
        
        $('body').delegate('#AddvrDetail','click',function(e)
        { 
            e.preventDefault();
                if(window.id_kategori!=undefined)
                {
                    window.location.href=`{{route('virtual.create')}}?id_kat=${window.id_kategori}`;
                } 
             
        });


    });
</script>
@endsection
 