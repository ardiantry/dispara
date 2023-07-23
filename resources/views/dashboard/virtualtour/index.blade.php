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
                        <a href="{{ route('virtual.create') }}" class="btn btn-success">+ Tambah Room</a>
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
                                    <table id="tbl_virtualtour" class="table table-bordered dt-responsive nowrap">
                                    <thead>
                                    <tr>
                                    <th>Nama Room</th>
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
        </div>
    </div>
</div>
</div>
<script>
    $(document).ready( function () { 
        var tbl_virtualtour = $('#tbl_virtualtour').DataTable({
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
            ajax: '{{ route('ajax_tbl_virtualtour') }}',
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
 
        $('body').delegate('.Edit_data','click',function(e)
        {
            e.preventDefault();
            window.location.href="{{ route('virtual.create') }}?id="+$(this).data('id');
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
                   window.location.reload();
                });
        });
    });
</script>
@endsection
 