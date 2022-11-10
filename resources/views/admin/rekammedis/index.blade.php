@extends('layouts.app')
@push('css')
    
@endpush
@section('content')
<section class="content">

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <i class="fa fa-search-plus"></i>
                <h3 class="box-title">Rekam Medis</h3>
            </div>
        <!-- /.box-header -->
            <form class="form-horizontal" method="get" action="/superadmin/rekam-medis/cari">
                @csrf
                <div class="box-body">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nomor Rekam Medis/NIK</label>
                    <div class="col-sm-3">
                    <input type="text" class="form-control" name="noRM" value="{{old('noRM')}}" placeholder="Nomor Rekam Medis/NIK">
                    </div>
                    <div class="col-sm-4">
                        <button type="submit" class='btn btn-primary btn-md'><i class="fa fa-search-plus"></i> Cari</button>
                    </div>
                </div>
                </div>
            </form>
        </div>
    </div>
</div>
</section>
    
@endsection

@push('js')
    
@endpush