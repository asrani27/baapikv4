@extends('layouts.app')
@push('css')
    
@endpush
@section('content')
<section class="content">

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <i class="fa fa-search"></i>
                <h3 class="box-title">Filter Data</h3>
            </div>
        <!-- /.box-header -->
            <form class="form-horizontal" method="get" action="/superadmin/pelayanan/filter">
                @csrf
                <div class="box-body">
                <div class="form-group">
                    <label class="col-sm-1 control-label">Tanggal</label>
                    <div class="col-sm-3">
                    <input type="date" class="form-control" name="tanggal" value="{{old('tanggal')}}">
                    </div>
                    <label class="col-sm-1 control-label">Poli</label>
                    <div class="col-sm-3">
                        <select name="kdPoli" class="form-control">
                            <option value="">-semua poli-</option>
                            @foreach ($poli as $item)
                            <option value="{{$item->kdPoli}}" {{old('kdPoli') == $item->kdPoli ? 'selected':''}}>{{$item->nmPoli}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <button type="submit" class='btn btn-primary btn-md'><i class="fa fa-search"></i> Filter</button>
                    </div>
                </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
    <div class="box box-primary">
    <div class="box-header with-border">
      <i class="fa fa-user-plus"></i>
      <h3 class="box-title">Data Pelayanan</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
      <table class="table table-condensed table-bordered">
        <tr class="bg-primary" style="font-size: 10px;font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">
          <th style="width: 10px">#</th>
          <th>No Antrian</th>
          <th>Tanggal Daftar</th>
          <th>No. Urut</th>
          <th>NIK</th>
          <th>No. Kartu</th>
          <th>Nama</th>
          <th>Jkel</th>
          <th>Tanggal Lahir</th>
          <th>Usia</th>
          <th>Jenis</th>
          <th>Ruang</th>
          <th>Status Pulang</th>
          <th>Briding?</th>
          <th>Aksi</th>
        </tr>

        @foreach ($data as $key => $item)
            
        <tr style="font-size: 12px">
            <td style="widtd: 10px">{{$data->firstItem() + $key}}</td>
            <td>{{$item->nomor_antrian}}</td>
            <td>{{$item->tglDaftar}}</td>
            <td>{{$item->noUrut}}</td>
            <td>{{$item->nik}}</td>
            <td>{{$item->noKartu}}</td>
            <td>{{$item->nama}}</td>
            <td>{{$item->sex}}</td>
            <td>{{\Carbon\Carbon::parse($item->tglLahir)->format('d-m-Y')}}</td>
            <td>{{hitungUmur($item->tglLahir)}}</td>
            <td>{{$item->jenis}}</td>
            <td>{{$item->nmPoli}}</td>
            <td>{{$item->status}}</td>
            <td>
                @if ($item->jenis != 'UMUM')
                @if ($item->noUrut != null)
                <span class="label label-success">sudah</span>
                @else
                <span class="label label-danger">belum</span>
                @endif
                @endif
            </td>
            <td>
                @if ($item->ke_poli == 1)
                    <a href="/superadmin/pelayanan/periksa/{{$item->id}}" class="btn btn-success btn-flat btn-xs"><i class="fa fa-stethoscope"></i> Periksa</a>
                @endif
            </td>
          </tr>
          
        @endforeach
      </table>
    </div>
    <div class="box-footer clearfix">
        Total Pelayanan : {{$data->total()}}
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
