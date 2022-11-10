@extends('layouts.app')
@push('css')
    
@endpush
@section('content')
<section class="content-header">
    <h1>
      Baapik V.4
      <small>Selamat Datang</small>
    </h1>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
    <div class="box box-primary">
    <div class="box-header with-border">
    <i class="fa fa-key"></i>
      <h3 class="box-title">Akun Development</h3>
    </div>
    <!-- /.box-header -->
    <form class="form-horizontal" method="post" action="/superadmin/setting/akun-bridging/development">
        @csrf
    <div class="box-body">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">User Pcare</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="user_pcare_dev" placeholder="user_pcare_dev" value="{{$data == null ? '': $data->user_pcare_dev}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Pass Pcare</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" name="pass_pcare_dev" placeholder="pass_pcare_dev" value="{{$data == null ? '': $data->pass_pcare_dev}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Cons ID</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="cons_id_dev" placeholder="cons_id_dev" value="{{$data == null ? '': $data->cons_id_dev}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Secret Key</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="secret_key_dev" placeholder="secret_key_dev" value="{{$data == null ? '': $data->secret_key_dev}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">User Key</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" name="user_key" placeholder="user_key" value="{{$data == null ? '': $data->user_key}}">
            </div>
        </div>
    </div>
    <div class="box-footer">
        <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-send"></i> Update</button>
        <a href="/superadmin/setting/akun-bridging/development/testing" class="btn btn-success btn-flat"><i class="fa fa-refresh"></i> Test Connection</a>
      </div>
    </form>
    
    </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
    <div class="box box-primary">
    <div class="box-header with-border">
    <i class="fa fa-key"></i>
      <h3 class="box-title">Akun Production</h3>
    </div>
    <!-- /.box-header -->
    <form class="form-horizontal" method="post" action="/superadmin/setting/akun-bridging/development">
        @csrf
    <div class="box-body">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">User Pcare</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="user_pcare_dev" placeholder="-">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Pass Pcare</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="pass_pcare_dev" placeholder="-">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Cons ID</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="cons_id_dev" placeholder="-">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Secret Key</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="secret_key_dev" placeholder="-">
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
