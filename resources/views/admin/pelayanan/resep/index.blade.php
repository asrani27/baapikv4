@extends('layouts.app')
@push('css')
<!-- Select2 -->
<link rel="stylesheet" href="/assets/bower_components/select2/dist/css/select2.min.css">
    
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
                <h3 class="box-title">Resep</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST" action="/superadmin/pelayanan/periksa/{{$id}}/resep">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Nama Obat</label>
                          <div class="col-sm-10">
                            <select class="form-control select2" name="obat_id" style="width: 100%;" required>
                                <option value="">-Pilih-</option>
                                @foreach ($obat as $item)
                                    <option value="{{$item->id}}">{{$item->kode}}-{{$item->nama}}</option>
                                @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Signa</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="signa1" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Jumlah Obat</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="jmlObat" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Aturan Pakai</label>
                          <div class="col-sm-10">
                            <select name="aturan" class="form-control" required>
                              <option value="">-pilih-</option>
                              <option value="SEBELUM MAKAN">SEBELUM MAKAN</option>
                              <option value="SESUDAH MAKAN">SESUDAH MAKAN</option>
                              <option value="SAAT MAKAN">SAAT MAKAN</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label"></label>
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary btn-flat btn-block">
                                <i class="fa fa-send"></i> SIMPAN</button>
                          </div>
                        </div>
                    </div>
                    </form>
                
                </form>
            </div>

            <div class="box box-primary">
                <div class="box-header with-border">
                    <i class="fa fa-user-plus"></i>
                <h3 class="box-title">Resep Pasien</h3>
                </div>
                <div class="box-body table-responsive">
                    <table class="table table-condensed table-bordered">
                      <tr class="bg-primary" style="font-size: 10px;font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">
                        <th style="width: 10px">#</th>
                        <th>Kode</th>
                        <th>Nama Obat</th>
                        <th>Signa </th>
                        <th>Jml Obat</th>
                        <th>Aturan Pakai</th>
                        <th></th>
                      </tr>
              
                      @php
                          $no = 1;
                      @endphp
                      
                      @foreach ($data->resep as $key => $item)
                          
                      <tr style="font-size: 12px">
                          <td style="widtd: 10px">{{$no++}}</td>
                          <td>{{$item->kode}}</td>
                          <td>{{$item->nama}}</td>
                          <td>{{$item->signa1}}</td>
                          <td>{{$item->jmlObat}}</td>
                          <td>{{$item->aturan}}</td>
                          <td>
                              <a href="/superadmin/pelayanan/periksa/{{$id}}/resep/{{$item->id}}/delete" class="btn btn-danger btn-flat btn-xs"onclick="return confirm('Yakin Ingin Di Hapus?');">
                                <i class="fa fa-trash"></i></a>
                          </td>
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
    
<!-- Select2 -->
<script src="/assets/bower_components/select2/dist/js/select2.full.min.js"></script>
    
<script>
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()
    })
</script>
@endpush
