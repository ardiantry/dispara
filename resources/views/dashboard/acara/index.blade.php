@extends('dashboard.layouts.main')
@section('title', 'Kelola Acara')
@section('breadcrumb')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h4>Kelola Acaramu</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Arsip & Event</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Acara</a></li>
                            <li class="breadcrumb-item active">Kelola Acara</li>
                        </ol>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="float-end d-none d-sm-block">
                        <a href="{{ route('acara.create') }}" class="btn btn-success">+Tambah Acara</a>
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
            <div class="card">
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th data-orderable="false">Judul</th>
                                <th data-orderable="false">Kategori</th>
                                <th data-orderable="false">Tanggal Mulai/Waktu</th>
                                <th data-orderable="false">Tanggal Selesai/Waktu</th>
                                <th data-orderable="false">Jumlah Peserta</th>
                                <th data-orderable="false">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
     <script type="text/javascript">
        $(document).ready(function(){ 
  var table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: '{{ route('ajax_tbl_event') }}',
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
            data: 'tgl_mulai',
            name: 'tgl_mulai'
            },
            {
            data: 'tgl_selesai',
            name: 'tgl_selesai'
            },
            {
            data: 'jumlah_peserta',
            name: 'jumlah_peserta'
            }, 
            {
            data: 'aksi',
            name: 'aksi'
            },
             
            ]
            }); 

  $('body').delegate('.HPSEvent','click',function(e)
  {
    e.preventDefault();
    if(!confirm('Yakin menghapus data?'))
    {
        return false;
    }
    const Form_hps   = new FormData();
            Form_hps.append('_token', '{{csrf_token()}}'); 
            Form_hps.append('id', $(this).data('id')); 

            fetch('{{route('member.Logout')}}', { method: 'POST',body:Form_hps}).then(res => res.json()).then(data => 
            {
             $('#datatable').DataTable().ajax.reload();
            });
  });

  }); 
</script>
@endsection
