@extends('layouts.app')
@push('css')
    
@endpush
@section('content')
<section class="content">

  <div class="row">
    <div class="col-md-12">
    <div class="box box-primary">
    <div class="box-header with-border">
      <i class="fa fa-users"></i>
      <h3 class="box-title">Data Pasien</h3>
      <div class="box-tools">
        <form class="form" method="get" action="/superadmin/pasien/cari">
            <div class="input-group input-group-sm hidden-xs" style="width: 350px;">
            <input type="text" name="cari" class="form-control pull-right" placeholder="Cari NIK/No Kartu/Nama" value="{{old('cari')}}">

            <div class="input-group-btn">
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
            </div>
            </div>
        </form>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
      <table class="table table-condensed table-bordered">
        <tr class="bg-primary" style="font-size: 10px;font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">
          <th style="width: 10px">#</th>
          <th>No RM</th>
          <th>NIK</th>
          <th>No. Kartu</th>
          <th>Nama</th>
          <th>Tgl Lahir</th>
          <th>Jkel</th>
          <th>Alamat</th>
          <th>Telp</th>
          <th>Register</th>
          <th>Aksi</th>
        </tr>

        @foreach ($data as $key => $item)
            
        <tr style="font-size: 12px">
            <td style="widtd: 10px">{{$data->firstItem() + $key}}</td>
            <td>{{$item->noRM}}</td>
            <td>{{$item->nik}}</td>
            <td>{{$item->noKartu}}</td>
            <td>{{$item->nama}}</td>
            <td>{{$item->tglLahir}}</td>
            <td>{{$item->sex}}</td>
            <td>{{$item->alamat}}</td>
            <td>{{$item->telp}}</td>
            <td>
                <a href="/superadmin/pasien/daftar/bpjs/{{$item->id}}" class="btn bg-olive btn-flat btn-xs">BPJS</a>
                <a href="/superadmin/pasien/daftar/umum/{{$item->id}}" class="btn bg-olive btn-flat btn-xs">UMUM</a>
            </td>
            <td>
              <a href="/superadmin/pasien/edit/{{$item->id}}" class="btn btn-success btn-flat btn-xs"><i class="fa fa-edit"></i></a>
              <a href="/superadmin/pasien/delete/{{$item->id}}" class="btn btn-danger btn-flat btn-xs" onclick="return confirm('Yakin di hapus?');"><i class="fa fa-trash"></i></a>
            </td>
          </tr>
          
        @endforeach
      </table>
    </div>
    <div class="box-footer clearfix">
        Total Pasien : {{$data->total()}}
        <a href="/superadmin/pasien/add" class="btn btn-sm btn-primary btn-sm btn-flat pull-right">
            <i class="fa fa-user"></i> Tambah Pasien</a>
    </div>
    <!-- /.box-body -->
    </div>
    {{$data->withQueryString()->links()}}
    </div>
</div>
</section>


@endsection
@push('js')
    
@endpush
