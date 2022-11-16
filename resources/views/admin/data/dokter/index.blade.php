@extends('layouts.app')
@push('css')
    
@endpush
@section('content')
<section class="content-header">
    <h1>
      Baapik V.4
      <small>Sistem Informasi Manajemen Data Puskesmas</small>
    </h1>
</section>
<section class="content">

    
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <i class="fa fa-database"></i>
                    <h3 class="box-title">Dokter</h3>
                    <div class="box-tools">
                        <button type="button" class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#modal-add" data-backdrop="static" data-keyboard="false"><i class="fa fa-plus"></i>  Tambah Dokter</button>
                        <a href="/superadmin/data/dokter/get" class='btn btn-sm btn-primary'>
                            <i class="fa fa-repeat"></i> Get Dokter</a>
                    </div>
            </div>

            <div class="box-body table-responsive">
                <table class="table table-condensed table-bordered">
                <tr class="bg-primary" style="font-size: 10px;font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">
                    <th style="width: 10px">#</th>
                    <th>Kode Dokter</th>
                    <th>Nama Dokter</th>
                    <th></th>
                </tr>
        
                @foreach ($data as $key => $item)
                    
                <tr style="font-size: 12px">
                    <td style="widtd: 10px">{{$data->firstItem() + $key}}</td>
                    <td>{{$item->kdDokter}}</td>
                    <td>{{$item->nmDokter}}</td>
                    <td>
                    <a href="#" class="btn btn-primary btn-xs btn-flat edit-dokter" data-id="{{$item->id}}"
                    data-kdDokter="{{$item->kdDokter}}" data-nmDokter="{{$item->nmDokter}}"><i class="fa fa-edit"></i>  Edit</a>
                    <a href="/superadmin/data/dokter/{{$item->id}}/delete" class="btn btn-danger btn-xs btn-flat" onclick="return confirm('Yakin ingin di hapus');"> <i class="fa fa-trash"></i>  Delete</a>
                    </td>
                </tr>    
                @endforeach
                </table>
            </div>
        </div>
        {{$data->withQueryString()->links()}}
    </div>
</div>

<div class="modal fade" id="modal-add">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><i class="ion ion-clipboard"></i> Tambah Tenaga Medis</h4>
        </div>
        <form method="post" action="/superadmin/data/dokter/create">
        <div class="modal-body">
            @csrf
            <div class="form-group">
                <label>Kode Dokter</label>
                <input type="text" class="form-control" name="kdDokter" placeholder="Kode Dokter">
            </div>
            <div class="form-group">
                <label>Nama Dokter</label>
                <input type="text" class="form-control" name="nmDokter" placeholder="Nama Dokter">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn bg-grey pull-left" data-dismiss="modal"><i class="fa fa-sign-out"></i> Close</button>
          <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal-edit">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><i class="ion ion-clipboard"></i> Edit Tenaga Medis</h4>
        </div>
        <form method="post" action="/superadmin/data/dokter/update">
        <div class="modal-body">
            @csrf
            <div class="form-group">
                <label>Kode Dokter</label>
                <input type="text" id="kdDokter" class="form-control" name="kdDokter" placeholder="Kode Dokter">
            </div>
            <div class="form-group">
                <label>Nama Dokter</label>
                <input type="text" id="nmDokter" class="form-control" name="nmDokter" placeholder="Nama Dokter">
                <input type="hidden" id="dokter_id" class="form-control" name="dokter_id">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn bg-grey pull-left" data-dismiss="modal"><i class="fa fa-sign-out"></i> Close</button>
          <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
        </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
</section>
@if ($dataPcare != null)
    @foreach ($dataPcare->list as $item)
        <li>{{$item->kdDokter}}-{{$item->nmDokter}}</li>
    @endforeach
@endif

@endsection
@push('js')
    
<script>
    $(document).on('click', '.edit-dokter', function() {
    $('#dokter_id').val($(this).data('id'));
    $('#kdDokter').val($(this).data('kddokter'));
    $('#nmDokter').val($(this).data('nmdokter'));
    $("#modal-edit").modal();
  });
  </script>
@endpush
