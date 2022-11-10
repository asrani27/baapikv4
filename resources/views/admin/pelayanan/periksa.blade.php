@extends('layouts.app')
@push('css')
    
@endpush
@section('content')
<section class="content">
    <div class="row">
        @include('admin.pelayanan.sidebar')
        <div class="col-md-8">
            @include('admin.pelayanan.menu')
            <div class="box box-primary">
                <div class="box-header with-border">
                    <i class="fa fa-user-plus"></i>
                <h3 class="box-title">Biodata Pasien</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal">
                <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label">No RM</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" value="{{$data->noRM}}" readonly>
                      </div>
                      <label class="col-sm-2 control-label">Tanggal Daftar</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" value="{{$data->tglDaftar}}" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">No Kartu</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control"  value="{{$data->noKartu}}" readonly>
                      </div>
                      <label class="col-sm-2 control-label">Jenis</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" value="{{$data->jenis}}" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">NIK</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" value="{{$data->nik}}"  readonly>
                      </div>
                      <label class="col-sm-2 control-label">ruang</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" value="{{$data->nmPoli}}" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Nama</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" value="{{$data->nama}}" readonly>
                      </div>
                      <label class="col-sm-2 control-label">Nama Ayah</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" readonly value="{{$data->pasien == null ? '': $data->pasien->nama_ayah}}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Tanggal Lahir</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" value="{{$data->tglLahir}}" readonly>
                      </div>
                      <label class="col-sm-2 control-label">Nama Ibu</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" readonly value="{{$data->pasien == null ? '': $data->pasien->nama_ibu}}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Usia</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" value="{{hitungUmur($data->tglLahir)}}" readonly>
                      </div>
                      <label class="col-sm-2 control-label">Telp Ayah</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" readonly value="{{$data->pasien == null ? '': $data->pasien->telp_ayah}}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Jenis Kelamin</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" value="{{$data->sex}}" readonly>
                      </div>
                      <label class="col-sm-2 control-label">Telp Ibu</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" readonly value="{{$data->pasien == null ? '': $data->pasien->telp_ayah}}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Alamat</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" value="{{$data->alamat}}" readonly>
                      </div>
                      <label class="col-sm-2 control-label">Penanggung Jawab</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" readonly value="{{$data->pasien == null ? '': $data->pasien->nama_penanggung_jawab}}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Telp</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" value="{{$data->telp}}" readonly>
                      </div>
                      <label class="col-sm-2 control-label">Telp Penanggung Jawab</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" readonly value="{{$data->pasien == null ? '': $data->pasien->telp_penanggung_jawab}}">
                      </div>
                    </div>
                    
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <i class="fa fa-book"></i>
            <h3 class="box-title">Riwayat Pasien</h3>
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
                </tr>
        
                @php
                    $no = 1;
                @endphp
                
                @foreach ($riwayat as $item)
                    
                <tr style="font-size: 12px">
                    <td style="widtd: 10px">{{$no++}}</td>
                    <td>{{$item->tglDaftar}}</td>
                    <td>{{$item->nmPoli}}</td>
                    @if ($item->anamnesa == null)
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
                    @endif
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
