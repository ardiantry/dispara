@extends('dashboard.layouts.main')
@section('title', 'Kelola Wisata')
@section('breadcrumb')
<style type="text/css">
    .note {
  color: #bd2a2a;
  font-size: 12px;
  display: block;
}
</style>
    <!-- start page title -->
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h4>Kelola Wisata</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Arsip & Event</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Wisata</a></li>
                            <li class="breadcrumb-item active">Kelola Wisata</li>
                        </ol>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="float-end d-none d-sm-block">
                        <a href="{{ route('wisata.create') }}" class="btn btn-success">+Tambah Destinasi</a>
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
                    <form id="updateperubahan" name="updateperubahan">
                        
                   
                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th><input type="checkbox" name="checkall"></th>
                                <th data-orderable="false">Judul</th>
                                <th data-orderable="false">Status</th>
                                <th data-orderable="false">Author</th>

                                <th data-orderable="false">Kategori</th>
                                <th data-orderable="false">Isi</th>
                                <th data-orderable="false">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($wisatas as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td> 
                                    <th>
                                        @if(@$data['author_member'])
                                        <input type="hidden" name="id[]" value="{{$data['id']}}">
                                        <input type="checkbox" name="aksi[{{$data['id']}}]" value="1">
                                        @else
                                        -
                                        @endif
                                    </th>

                                    <td>{{ $data['title'] }}</td>
                                     <td>{{ @$data['author_member']?$data['status_public']:'active' }}</td>
                                    <td>{{ $data['author'] }}<span class="note">{{@$data['author_member']?'member':'admin'}}</span></td>
                                    <td>{{ $data->kategori['nama_kategori'] }}</td>
                                    <td>
                                        <!-- Small modal -->
                                        <button type="button" class="btn btn-primary btn-sm waves-effect waves-light"
                                            data-bs-toggle="modal"
                                            data-bs-target=".modal{{ $data['id'] }}">Selengkapnya</button>
                                        <!-- sample modal content -->
                                        <div class="modal fade modal{{ $data['id'] }}" tabindex="-1"
                                            aria-labelledby="#exampleModalFullscreenLabel" style="display: none;"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-fullscreen"> 
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title mt-0" id="exampleModalFullscreenLabel">
                                                            {{ $data->kategori['nama_kategori'] }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src="{{ asset('storage/' . $data['image']) }}"
                                                            alt="{{ $data->kategori['nama_kategori'] }}"
                                                            class="d-block m-auto" width="400px">
                                                        <h5>{{ $data['title'] }}</h5>
                                                        <p>{!! $data['isi'] !!}</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary waves-effect"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                    </td>
                                    <td style="width: 100px" id="tooltip-container0">
                                        @if(@$data['author_member'])
                                            <a href="#"
                                            class="btn btn-outline-secondary btn-sm Detail_author"
                                             title="detail" data-id="{{$data['id']}}">
                                            <i class="dripicons-to-do"></i>
                                            </a>
                                        @else
                                        <a href="{{ route('wisata.edit', $data['id']) }}"
                                            class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        @endif
                                        <a href="javascript:void(0);" class="btn btn-outline-secondary btn-sm hapuswisata"
                                            data-id="{{ $data['id'] }}"
                                            data-title="{{ $data['title'] }}" >
                                            <i class="fas fa-trash"></i>
                                        </a> 
                                    </td>
                                </tr>
                            @empty
                                <h5 class="text-center text-white p-4 rounded"
                                    style="background: #525ce5 url({{ asset('assets/images/title-img.png') }});">
                                    Datamu masih
                                    kosong
                                    </h4>
                            @endforelse
                        </tbody>
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
        </div> <!-- end col -->
    </div> <!-- end row -->
    <script type="text/javascript">
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
                        fetch('{{route('wisata.update.save')}}', { method: 'POST',body:form_data}).then(res => res.json()).then(data => 
                        {
                               window.location.reload();
                        });
                  });
                    
                 $('body').delegate('.hapuswisata','click',function(e)
                    { 
                        e.preventDefault();
                        if(!confirm('yakin menghapus data?'))
                        {
                            return;
                        }
                        var $this           =$(this);   
                        const form_hps     = new FormData();  
                        form_hps.append('_token', '{{csrf_token()}}'); 
                        form_hps.append('_method', 'DELETE');  
                        fetch(`{{url('dashboard/wisata')}}/${$(this).data('id')}`, { method: 'POST',body:form_hps}).then(res => res.json()).then(data => 
                        {
                              window.location.reload();
                        });
                  });    


    </script>
@endsection
