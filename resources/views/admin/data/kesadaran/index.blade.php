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
                    <h3 class="box-title">Kesadaran</h3>
                    <div class="box-tools">
                        <a href="/superadmin/data/status-pulang/get" class='btn btn-sm btn-primary'>
                            <i class="fa fa-repeat"></i> Get Kesadaran</a>
                    </div>
            </div>

            <div class="box-body table-responsive">
                <table class="table table-condensed table-bordered">
                <tr class="bg-primary" style="font-size: 10px;font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">
                    <th style="width: 10px">#</th>
                    <th>Kode Kesadaran</th>
                    <th>Nama Kesadaran</th>
                </tr>
        
                @foreach ($data as $key => $item)
                    
                <tr style="font-size: 12px">
                    <td style="widtd: 10px">{{$data->firstItem() + $key}}</td>
                    <td>{{$item->kdSadar}}</td>
                    <td>{{$item->nmSadar}}</td>
                </tr>    
                @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
@push('js')
    
@endpush
