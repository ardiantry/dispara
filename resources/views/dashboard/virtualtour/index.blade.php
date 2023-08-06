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
                                         <form id="updateperubahan" name="updateperubahan">
                                        <table id="KatagoriVirtual" class="table table-bordered dt-responsive nowrap">
                                        <thead>
                                        <tr>
                                             <th><input type="checkbox" name="checkall"></th> 
                                            <th>Nama Virtual</th> 
                                            <th>Author</th> 
                                            <th>Status</th>  
                                            <th>Aksi</th> 
                                        </tr>
                                        </thead>
                                        </table>
                                        <div class="form-group row">
                                        <div class="col-3">
                                            <div class="input-group">
                                                <select class="form-control" name="status">
                                                    <option value="active">Setujui</option>
                                                    <option value="tolak">Tolak</option>

                                                </select>
                                                <span class="input-group-append">
                                                    <button type="submit" class="btn btn-success">Simpan</button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
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
                    { 
                        data: 'input_check', 
                        name: 'input_check', 
                        orderable   :  false,
                        searchable  :  false,
                    }, 
                    { data: 'nama', name: 'nama' }, 
                    { data: 'author', name: 'author' }, 
                    { data: 'status', name: 'status' },   
                    { 
                        orderable   :  false,
                        searchable  :  false,
                        data        : 'action',
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

     $('body').delegate('.Edit_data_kat','click',function(e)
            {
            e.preventDefault();
            window.id_kategori=undefined;
            window.nama_kategori=undefined;
            if($(this).data('id'))
            {
                window.id_kategori=$(this).data('id');
                   window.nama_kategori=$(this).data('name');
            }
             $('#ModalKatagori').modal('show');

        });


        $('#ModalKatagori').on('shown.bs.modal', function (e) 
        {
            $('#UpdateKatagori').find('input[name="nama"]').val('');
            if(window.nama_kategori!=undefined)
            {
              $('#UpdateKatagori').find('input[name="nama"]').val(window.nama_kategori);
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
            $('#headerLabel').html($(this).data('name'));
            $('#ModalRuangan').modal('show');
             
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
            fetch('{{route('virtualroomkat.delete')}}', { method: 'POST',body:form_dtl}).then(res => res.json()).then(data => 
                {
                     $('#KatagoriVirtual').DataTable().ajax.reload();
                });

             
        });

        $('#ModalRuangan').on('shown.bs.modal', function (e) 
        {
             var id_kat=window.id_kategori; 
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
                        ajax: `{{ route('ajax_tbl_virtualtour') }}?id_kat=${id_kat}`,
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

        $('#ModalRuangan').on('hidden.bs.modal', function (e) {
                window.vr.destroy();
        });

        $('body').delegate('.Edit_data','click',function(e)
        {
            e.preventDefault();
            window.location.href=`{{ route('virtual.create') }}?id_kat=${window.id_kategori}&id=${$(this).data('id')}`;
        });
        $('body').delegate('.Hapus_data','click',function(e)
        {
            e.preventDefault();
            if(!confirm('You sure to delete?')) 
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

     $('body').delegate('#updateperubahan','submit',function(e)
                    { 
                        e.preventDefault();
                        var $this           =$(this);   
                        var form_           = document.forms.namedItem("updateperubahan");
                        const form_data     = new FormData(form_); 
                        form_data.append('_token', '{{csrf_token()}}'); 
                        fetch('{{route('virtual_kat.update.save')}}', { method: 'POST',body:form_data}).then(res => res.json()).then(data => 
                        {
                             $('#KatagoriVirtual').DataTable().ajax.reload();
                        });
                  });

    });
</script>
@endsection
 