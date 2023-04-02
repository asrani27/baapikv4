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
                    <h3 class="box-title">Status Pulang</h3>
                    <div class="box-tools">
                        <a href="/superadmin/data/status-pulang/get/true" class='btn btn-sm btn-primary'>
                            <i class="fa fa-repeat"></i> Get Status Pulang True</a>
                        <a href="/superadmin/data/status-pulang/get/false" class='btn btn-sm btn-primary'>
                            <i class="fa fa-repeat"></i> Get Status Pulang False</a>
                    </div>
            </div>

            <div class="box-body table-responsive">
                <table class="table table-condensed table-bordered">
                <tr class="bg-primary" style="font-size: 10px;font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">
                    <th style="width: 10px">#</th>
                    <th>Kode Status Pulang</th>
                    <th>Nama Status Pulang</th>
                </tr>
        
                @foreach ($data as $key => $item)
                    
                <tr style="font-size: 12px">
                    <td style="widtd: 10px">{{$data->firstItem() + $key}}</td>
                    <td>{{$item->kdStatusPulang}}</td>
                    <td>{{$item->nmStatusPulang}}</td>
                </tr>    
                @endforeach
                </table>
            </div>
        </div>
        {{$data->withQueryString()->links()}}
    </div>
</div>
</section>
@if ($dataPcare != null)
    @foreach ($dataPcare->list as $item)
        <li>{{$item->kdStatusPulang}}-{{$item->nmStatusPulang}}</li>
    @endforeach
@endif

@endsection
@push('js')
    
@endpush
