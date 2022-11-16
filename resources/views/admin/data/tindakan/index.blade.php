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
                    <h3 class="box-title">Tindakan</h3>
                    <div class="box-tools">
                        <button type="button" class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#modal-add" data-backdrop="static" data-keyboard="false"><i class="fa fa-plus"></i>  Tambah Tindakan</button>
                        <a href="/superadmin/data/tindakan/get" class='btn btn-sm btn-primary'>
                            <i class="fa fa-repeat"></i> Get Tindakan</a>
                    </div>
            </div>

            <div class="box-body table-responsive">
                <table class="table table-condensed table-bordered">
                <tr class="bg-primary" style="font-size: 10px;font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">
                    <th style="width: 10px">#</th>
                    <th>Kode Tindakan</th>
                    <th>Nama Tindakan</th>
                    <th>Tarif</th>
                    <th></th>
                </tr>
        
                @foreach ($data as $key => $item)
                    
                <tr style="font-size: 12px">
                    <td style="widtd: 10px">{{$data->firstItem() + $key}}</td>
                    <td>{{$item->kdTindakan}}</td>
                    <td>{{$item->nmTindakan}}</td>
                    <td>{{$item->maxTarif}}</td>

                    <td>
                        <a href="#" class="btn btn-primary btn-xs btn-flat edit-tindakan" data-id="{{$item->id}}"
                        data-kdTindakan="{{$item->kdTindakan}}" data-nmTindakan="{{$item->nmTindakan}}" data-maxTarif="{{$item->maxTarif}}"><i class="fa fa-edit"></i>  Edit</a>
                        <a href="/superadmin/data/tindakan/{{$item->id}}/delete" class="btn btn-danger btn-xs btn-flat" onclick="return confirm('Yakin ingin di hapus');"> <i class="fa fa-trash"></i>  Delete</a>
                        
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
        <form method="post" action="/superadmin/data/tindakan/create">
        <div class="modal-body">
            @csrf
            <div class="form-group">
                <label>Kode Tindakan</label>
                <input type="text" class="form-control" name="kdTindakan" placeholder="Kode Tindakan">
            </div>
            <div class="form-group">
                <label>Nama Tindakan</label>
                <input type="text" class="form-control" name="nmTindakan" placeholder="Nama Tindakan">
            </div>
            <div class="form-group">
                <label>Tarif</label>
                <input type="text" class="form-control" name="maxTarif" placeholder="tarif">
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
          <h4 class="modal-title"><i class="ion ion-clipboard"></i> Edit Tindakan</h4>
        </div>
        <form method="post" action="/superadmin/data/tindakan/update">
        <div class="modal-body">
            @csrf
            <div class="form-group">
                <label>Kode Tindakan</label>
                <input type="text" id="kdTindakan" class="form-control" name="kdTindakan" placeholder="Kode Tindakan">
            </div>
            <div class="form-group">
                <label>Nama Tindakan</label>
                <input type="text" id="nmTindakan" class="form-control" name="nmTindakan" placeholder="Nama Tindakan">
                <input type="hidden" id="tindakan_id" class="form-control" name="tindakan_id">
            </div>
            <div class="form-group">
                <label>Tarif</label>
                <input type="text" id="maxTarif" class="form-control" name="maxTarif" placeholder="Tarif">
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
        <li>{{$item->kdTindakan}}-{{$item->nmTindakan}}</li>
    @endforeach
@endif

@endsection
@push('js')
    
<script>
    $(document).on('click', '.edit-tindakan', function() {
    $('#tindakan_id').val($(this).data('id'));
    $('#kdTindakan').val($(this).data('kdtindakan'));
    $('#nmTindakan').val($(this).data('nmtindakan'));
    $('#maxTarif').val($(this).data('maxtarif'));
    $("#modal-edit").modal();
  });
  </script>
@endpush
