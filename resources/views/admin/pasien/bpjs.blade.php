@extends('layouts.app')
@push('css')
    
@endpush
@section('content')
<section class="content">

  <div class="row">
    <div class="col-md-12">
    <div class="box box-primary">
    <div class="box-header with-border">
    <i class="fa fa-user-plus"></i>
      <h3 class="box-title">Pendaftaran Pasien BPJS</h3>
    </div>
    <!-- /.box-header -->
    <form class="form-horizontal" method="post" action="/superadmin/pasien/daftar/bpjs/{{$id}}">
        @csrf
    <div class="box-body">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">No Kartu</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="nik" placeholder="NIK" value="{{$data->npKartu}}" readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Nama <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama" placeholder="Nama" value="{{$data->nama}}" readonly>
            </div>
        </div>
        
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Daftar</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" name="tglDaftar" value="{{\Carbon\Carbon::now()->format('Y-m-d')}}">
            </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Poli</label>
          <div class="col-sm-10">
            <select class="form-control select2" name="kdPoli" style="width: 100%;" required>
                <option value="">-Pilih-</option>
                @foreach ($poli as $item)
                    <option value="{{$item->kdPoli}}">{{$item->nmPoli}}</option>
                @endforeach
            </select>
          </div>
      </div>
    </div>
    <div class="box-footer">
        <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-send"></i> Daftar</button>
        <a href="/superadmin/pasien" class="btn btn-default pull-right btn-flat"><i class="fa fa-fw fa-backward"></i> Kembali</a>
      </div>
    </form>
    
    </div>
    </div>
</div>
</section>
@endsection
@push('js')
    
@endpush
