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
        <button type="button" class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#modal-add" data-backdrop="static" data-keyboard="false"><i class="fa fa-plus"></i>  Tambah </button><br/><br/>
        <div class="box box-primary">
            <div class="box-header with-border">
                <i class="fa fa-database"></i>
                    <h3 class="box-title">Diagnosa</h3>
                    <div class="box-tools">
                      <form class="form" method="get" action="/superadmin/data/diagnosa/cari">
                          <div class="input-group input-group-sm hidden-xs" style="width: 350px;">
                          <input type="text" name="cari" class="form-control pull-right" placeholder="Cari Nama / Kode" value="{{old('cari')}}">
              
                          <div class="input-group-btn">
                              <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                          </div>
                          </div>
                      </form>
                    </div>
            </div>

            <div class="box-body table-responsive">
                <table class="table table-condensed table-bordered">
                <tr class="bg-primary" style="font-size: 10px;font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">
                    <th style="width: 10px">#</th>
                    <th>Kode Diagnosa</th>
                    <th>Nama Diagnosa</th>
                    <th></th>
                </tr>
        
                @foreach ($data as $key => $item)
                    
                <tr style="font-size: 12px">
                    <td style="widtd: 10px">{{$data->firstItem() + $key}}</td>
                    <td>{{$item->kdDiag}}</td>
                    <td>{{$item->nmDiag}}</td>
                    <td>
                    <a href="#" class="btn btn-primary btn-xs btn-flat edit-diagnosa" data-id="{{$item->id}}"
                        data-kddiag="{{$item->kdDiag}}" data-nmdiag="{{$item->nmDiag}}"><i class="fa fa-edit"></i>  Edit</a>
                        <a href="/superadmin/data/diagnosa/{{$item->id}}/delete" class="btn btn-danger btn-xs btn-flat" onclick="return confirm('Yakin ingin di hapus');"> <i class="fa fa-trash"></i>  Delete</a>
                    </td>
                </tr>    
                @endforeach
                </table>
            </div>
        </div>
        {{$data->withQueryString()->links()}}
    </div>

    <div class="col-md-12">
        <div class="box">
        <div class="box-body table-responsive">
            <form class="form" method="get" action="/superadmin/data/diagnosa/get">
                <div class="input-group input-group-sm hidden-xs" style="width: 350px;">
                <input type="text" name="caripcare" class="form-control pull-right" placeholder="Cari Nama / Kode dari PCARE" value="{{old('caripcare')}}" required>
    
                <div class="input-group-btn">
                    <button type="submit" class="btn btn-default">Check Pcare</button>
                </div>
                </div>
            </form>

            @if ($dataPcare == null)
                
            @else
            <form method="post" action="/superadmin/data/diagnosa">
                @csrf
            
                <button type="submit" class="btn btn-flat btn-sm btn-primary">SIMPAN KE LOKAL DB</button>
                <ul>
                    @foreach ($dataPcare->list as $item)
                    <li>
                        {{$item->kdDiag}} - {{$item->nmDiag}}
                    </li>
                    <input type="hidden" name="kdDiag[]" value="{{$item->kdDiag}}">
                    <input type="hidden" name="nmDiag[]" value="{{$item->nmDiag}}">
                    @endforeach
                </ul>
            </form>
            @endif
        </div>
        </div>
    </div>
</div>
</section>


<div class="modal fade" id="modal-add">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><i class="ion ion-clipboard"></i> Tambah Diagnosa</h4>
        </div>
        <form method="post" action="/superadmin/data/diagnosa/create">
        <div class="modal-body">
            @csrf
            <div class="form-group">
                <label>Kode </label>
                <input type="text" class="form-control" name="kdDiag" placeholder="Kode">
            </div>
            <div class="form-group">
                <label>Nama Diagnosa</label>
                <input type="text" class="form-control" name="nmDiag" placeholder="Nama">
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
          <h4 class="modal-title"><i class="ion ion-clipboard"></i> Edit Diagnosa</h4>
        </div>
        <form method="post" action="/superadmin/data/diagnosa/update">
        <div class="modal-body">
            @csrf
            <div class="form-group">
                <label>Kode</label>
                <input type="text" id="kdDiag" class="form-control" name="kdDiag" placeholder="Kode">
            </div>
            <div class="form-group">
                <label>Nama Diagnosa</label>
                <input type="text" id="nmDiag" class="form-control" name="nmDiag" placeholder="Nama">
                <input type="hidden" id="diagnosa_id" class="form-control" name="diagnosa_id">
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
@endsection
@push('js')
    
    
<script>
    $(document).on('click', '.edit-diagnosa', function() {
    $('#diagnosa_id').val($(this).data('id'));
    $('#kdDiag').val($(this).data('kddiag'));
    $('#nmDiag').val($(this).data('nmdiag'));
    console.log($(this).data('id'));
    $("#modal-edit").modal();
  });
  </script>
@endpush
