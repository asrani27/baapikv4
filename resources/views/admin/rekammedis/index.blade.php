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
                    <input type="text" class="form-control" name="cari" value="{{old('cari')}}" placeholder="Nomor Rekam Medis/NIK">
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
@if ($data != null)
    
<div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
          <div class="box-header with-border">
              <i class="fa fa-book"></i>
          <h3 class="box-title">Rekam Medis Pasien</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <div class="box-body table-responsive">
            <table class="table table-condensed table-bordered">
              <tr class="bg-primary" style="font-size: 10px;font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">
                <th style="width: 10px">#</th>
                <th>Tanggal</th>
                <th>Poli</th>
                <th>Anamnesa</th>
                <th>Diagnosa</th>
                <th>Resep</th>
                <th>Tindakan</th>
                <th>Laboratorium</th>
                <th>Kajian</th>
              </tr>
      
              @php
                  $no = 1;
              @endphp
              
              @foreach ($data->riwayat as $item)
                  
              <tr style="font-size: 12px">
                  <td style="width: 10px">{{$no++}}</td>
                  <td style="width: 75px">{{$item->tglDaftar}}</td>
                  <td>{{$item->nmPoli}}</td>
                  @if ($item->anamnesa == null)
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                  @else
                  <td>
                   Tenaga Medis 1 : {{$item->anamnesa->dokter == null ? '' : $item->anamnesa->dokter->nmDokter}} <br/>
                   Tenaga Medis 2 : - <br/>
                   Kesadaran : {{$item->anamnesa->sadar == null ? '': $item->anamnesa->sadar->nmSadar}}<br/>
                   Keluhan : {{$item->anamnesa->keluhan}}<br/>
                   Suhu : {{$item->anamnesa->suhu}}<br/>
                   IMT : {{$item->anamnesa->imt}}<br/>
                   Sistole : {{$item->anamnesa->sistole}}<br/>
                   Diastole : {{$item->anamnesa->diastole}}<br/>
                   Resprate : {{$item->anamnesa->respRate}}<br/>
                   Heartrate :{{$item->anamnesa->heartRate}}
                  </td>
                  <td>
                    @if (count($item->diagnosa) != 0)
                      @foreach ($item->diagnosa as $itemDiag)
                      <li>{{$itemDiag->diag->kdDiag}} - {{$itemDiag->diag->nmDiag}}</li>
                      @endforeach
                    @endif
                  </td>
                  <td> 
                    @if (count($item->resep) != 0)
                      @foreach ($item->resep as $itemResep)
                      <li>{{$itemResep->nama}}, <br/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Signa1: {{$itemResep->signa1}}, 
                        <br/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Signa2: {{$itemResep->signa2}}
                        <br/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Jumlah Obat : {{$itemResep->jmlObat}}
                        <br/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Jumlah Permintaan : {{$itemResep->jmlPermintaan}}
                    </li>
                      @endforeach
                    @endif
                  </td>

                  <td>
                    @if (count($item->tindakan) != 0)
                      @foreach ($item->tindakan as $itemTindakan)
                      <li>{{$itemTindakan->tind->nmTindakan}}</li>
                      @endforeach
                    @endif
                  </td>
                  <td>

                  </td>
                  @endif
                </tr>
                
              @endforeach
            </table>
        </div>
      </div>
    </div>
</div>
@endif
</section>
    
@endsection

@push('js')
    
@endpush