@extends('layouts.app')
@push('css')
    
@endpush
@section('content')
<section class="content">

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <i class="fa fa-file-o"></i>
                <h3 class="box-title">Laporan Kunjungan Pasien</h3>
            </div>
            <form class="form-horizontal" method="post" action="/superadmin/laporan/kunjungan">
                @csrf
                <div class="box-body">

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Jenis Kunjungan</label>
                        <div class="col-sm-10">
                            <select name="kunjSakit" class="form-control">
                                <option value="">-semua-</option>
                                <option value="1" {{old('kunjSakit') == '1' ? 'selected':''}}>Kunjungan Sakit</option>
                                <option value="0" {{old('kunjSakit') == '0' ? 'selected':''}}>Kunjungan Sehat</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <select name="jkel" class="form-control">
                                <option value="">-semua-</option>
                                <option value="L" {{old('jkel') == 'L' ? 'selected':''}}>Laki-Laki</option>
                                <option value="P" {{old('jkel') == 'P' ? 'selected':''}}>Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Bulan</label>
                        <div class="col-sm-10">
                            <select name="bulan" class="form-control">
                                <option value="">-semua-</option>
                                <option value="1" {{old('bulan') == '1' ? 'selected':''}}>Januari</option>
                                <option value="2" {{old('bulan') == '2' ? 'selected':''}}>Februari</option>
                                <option value="3" {{old('bulan') == '3' ? 'selected':''}}>Maret</option>
                                <option value="4" {{old('bulan') == '4' ? 'selected':''}}>April</option>
                                <option value="5" {{old('bulan') == '5' ? 'selected':''}}>Mei</option>
                                <option value="6" {{old('bulan') == '6' ? 'selected':''}}>Juni</option>
                                <option value="7" {{old('bulan') == '7' ? 'selected':''}}>Juli</option>
                                <option value="8" {{old('bulan') == '8' ? 'selected':''}}>Agustus</option>
                                <option value="9" {{old('bulan') == '9' ? 'selected':''}}>September</option>
                                <option value="10" {{old('bulan') == '10' ? 'selected':''}}>Oktober</option>
                                <option value="11" {{old('bulan') == '11' ? 'selected':''}}>November</option>
                                <option value="12" {{old('bulan') == '12' ? 'selected':''}}>Desember</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Tahun</label>
                        <div class="col-sm-10">
                            <select name="tahun" class="form-control">
                                <option value="">-semua-</option>
                                <option value="2023" {{old('tahun') == '2023' ? 'selected':''}}>2023</option>
                                <option value="2024" {{old('tahun') == '2024' ? 'selected':''}}>2024</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label"></label>
                        <div class="col-sm-10">
                            <button type="submit" class='btn btn-primary'><i class="fa fa-search"></i> Tampilkan</button>
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
          <h3 class="box-title">Rekap</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <div class="box-body table-responsive">
            <table class="table table-condensed table-bordered">
              <tr class="bg-primary" style="font-size: 10px;font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">
                <th style="width: 10px">#</th>
                <th>Tanggal</th>
                <th>No RM</th>
                <th>Nama</th>
                <th>Jkel</th>
                <th>Poli</th>
                <th>Anamnesa</th>
                <th>Diagnosa</th>
                <th>Resep</th>
                <th>Tindakan</th>
              </tr>
      
              @php
                  $no = 1;
              @endphp
              
              @foreach ($data as $item)
                  
              <tr style="font-size: 12px">
                  <td style="width: 10px">{{$no++}}</td>
                  <td style="width: 75px">{{$item->tglDaftar}}</td>
                  <td>{{$item->pasien == null ? '': $item->pasien->noRM}}</td>
                  <td>{{$item->pasien == null ? '': $item->pasien->nama}}</td>
                  <td>{{$item->pasien == null ? '': $item->pasien->sex}}</td>
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