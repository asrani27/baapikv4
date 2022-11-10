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
                </tr>
        
                @foreach ($data as $key => $item)
                    
                <tr style="font-size: 12px">
                    <td style="widtd: 10px">{{$data->firstItem() + $key}}</td>
                    <td>{{$item->kdDiag}}</td>
                    <td>{{$item->nmDiag}}</td>
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
                <a href="#" class="btn btn-flat btn-sm btn-primary">SIMPAN KE LOKAL DB</a>
                <ul>
                @foreach ($dataPcare->list as $item)
                <li>
                    {{$item->kdDiag}} - {{$item->nmDiag}}
                </li>
                @endforeach
                </ul>
            @endif
        </div>
        </div>
    </div>
</div>
</section>
@endsection
@push('js')
    
@endpush
