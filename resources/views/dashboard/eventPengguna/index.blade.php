@extends('dashboard.layouts.main')
@section('title', 'Kelola Pengunjung Acara')
@section('breadcrumb')
<style type="text/css">
    .badge-warning {
  background: rgb(230, 132, 7);
}
    .badge-success {
  background: rgb(37, 159, 2);
}
.badge-danger {
 background: rgb(223, 5, 5)
}
</style>
    <!-- start page title -->
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h4>Kelola Pengunjung Acaramu</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Arsip & Event</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Acara</a></li>
                            <li class="breadcrumb-item active">Kelola Pengunjung Acara</li>
                        </ol>
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
                    <form id="update" name="update">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th data-orderable="false"><input type="checkbox" name="checkall"></th>
                                <th data-orderable="false">Nama Acara</th> 
                                <th data-orderable="false">Nama Pengunjung</th>

                                <th data-orderable="false">Pelindung/Asal/Institusi</th>
                                <th data-orderable="false">Status</th>

                                <th data-orderable="false">No. HP</th>
                                <th data-orderable="false">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                    <div class="form-group row"> 
                        <div class="col-md-4">
                            <div class="msg-alert"></div>
                            <div class="input-group">
                                <select name="status" class="form-control">
                                    <option value="setujui">Setujui</option>
                                    <option value="tolak">Tolak</option>
                                    <option value="proses">Proses</option> 
                                </select>
                                <span class="input-group-append"><button class="btn btn-primary" type="submit">Update</button></span>
                            </div>
                        </div>
                    </div>
                        
                    </form>
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
            ajax: '{{ route('ajax_tbl_pengguna_event') }}',
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
            data: 'nama',
            name: 'nama'
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


                $('body').delegate('#update','submit',function(e)
                {
                    e.preventDefault();
                    var $this=$(this);
                    var label_btn= $this.find('button[type="submit"]').text();
                    $this.find('.msg-alert').empty();
                    $this.find('button[type="submit"]').html('loading...');
                    $this.find('button[type="submit"]').attr('disabled','disabled');  
                    const eventsimpan    = document.forms.namedItem('update'); 
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
                                          $('.table').DataTable().ajax.reload();
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
