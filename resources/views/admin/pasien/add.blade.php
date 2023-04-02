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
      <h3 class="box-title">Tambah Data Pasien</h3>
    </div>
    <!-- /.box-header -->
    <form class="form-horizontal" method="post" action="/superadmin/pasien/add">
        @csrf
    <div class="box-body">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">No. BPJS</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="noKartu" placeholder="no Kartu / NIK" value="{{$data == null ? old('noKartu'): $data->noKartu}}">
            </div>
            <div class="col-sm-2">
                <button type="submit" class="btn btn-primary btn-md btn-flat" value="check" name="check"><i class="fa fa-refresh"></i> Check BPJS</button>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">NIK</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="nik" placeholder="NIK" value="{{$data == null ? '': $data->noKTP}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Nama <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama" placeholder="Nama" value="{{$data == null ? '': $data->nama}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">No RM (Rekam Medis)</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="noRM" placeholder="no rekam medis" value="">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Jenis Kelamin <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <select name="sex" class="form-control">
                <option value="L" {{($data == null ? '': $data->sex) == 'L' ? 'selected':''}}>Laki-Laki</option>
                <option value="P" {{($data == null ? '': $data->sex) == 'P' ? 'selected':''}}>Perempuan</option>
              </select>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Lahir <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="date" class="form-control" name="tglLahir" value="{{$data == null ? '': \Carbon\Carbon::createFromFormat('d-m-Y', $data->tglLahir)->format('Y-m-d')}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="alamat" placeholder="alamat" value="">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Telp</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="telp" placeholder="telp" value="{{$data == null ? '': $data->noHP}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Nama Ayah</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama_ayah" placeholder="nama ayah" value="">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Telp Ayah</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="telp_ayah" placeholder="telp ayah" value="">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Nama Ibu</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama_ibu" placeholder="nama ibu" value="">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Telp Ibu</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="telp_ibu" placeholder="telp_ibu" value="">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Nama Penanggung Jawab</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama_penanggung_jawab" placeholder="nama penanggung jawab" value="">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Telp Penanggung Jawab</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="telp_penanggung_jawab" placeholder="telp penanggung jawab" value="">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Status Keaktifan</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="ketAktif" placeholder="" value="{{$data == null ? '': $data->ketAktif}}" readonly>
            </div>
        </div>
    </div>
    <div class="box-footer">
        <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-send"></i> Simpan</button>
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
