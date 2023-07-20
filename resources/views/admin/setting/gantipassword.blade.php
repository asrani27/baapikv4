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
    <i class="fa fa-key"></i>
      <h3 class="box-title">Ganti Password</h3>
    </div>
    <!-- /.box-header -->
    <form class="form-horizontal" method="post" action="/superadmin/setting/gantipassword">
        @csrf
    <div class="box-body">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Masukkan Password Lama</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="password_lama" required>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Masukkan Password Baru</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="password1" required>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Masukkan Lagi Password Baru</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="password2" required>
            </div>
        </div>
    </div>
    <div class="box-footer">
        <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-send"></i> Update</button>
      </div>
    </form>
    
    </div>
    </div>
  </div>
</section>
@endsection
@push('js')
    
@endpush
