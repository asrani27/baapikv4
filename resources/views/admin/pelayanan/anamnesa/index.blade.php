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
                <h3 class="box-title">Anamnesa</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST" action="/superadmin/pelayanan/periksa/{{$id}}/anamnesa">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Tenaga Medis 1</label>
                          <div class="col-sm-10">
                            <select class="form-control select2" name="kdDokter1" style="width: 100%;" required>
                                <option value="">-tenaga medis 1-</option>
                                @foreach ($tm1 as $item)
                                    <option value="{{$item->kdDokter}}">{{$item->nmDokter}}</option>
                                @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Tenaga Medis 2</label>
                          <div class="col-sm-10">
                            <select class="form-control select2" name="kdDokter2" style="width: 100%;">
                                
                                <option value="">-tenaga medis 2-</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Kesadaran</label>
                          <div class="col-sm-10">
                            <select class="form-control select2" name="kdSadar" style="width: 100%;">
                                
                                @foreach ($kesadaran as $item)
                                    <option value="{{$item->kdSadar}}">{{$item->nmSadar}}</option>
                                @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Keluhan</label>
                          <div class="col-sm-10">
                            <input type="text" name="keluhan" class="form-control">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Suhu</label>
                          <div class="col-sm-10">
                            <input type="text" name="suhu" class="form-control" value="0">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Tinggi Badan</label>
                          <div class="col-sm-10">
                            <input type="text" name="tinggiBadan" id="tb" class="form-control" required value="0"
                            onKeyPress="edValueKeyPress()" onKeyUp="edValueKeyPress()">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Berat Badan</label>
                          <div class="col-sm-10">
                            <input type="text" name="beratBadan" id="bb" class="form-control" required value="0"
                            onKeyPress="edValueKeyPress()" onKeyUp="edValueKeyPress()">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Lingkar Perut</label>
                          <div class="col-sm-10">
                            <input type="text" name="lingkarPerut" class="form-control" value="0">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">IMT</label>
                          <div class="col-sm-10">
                            <input type="text" name="imt" class="form-control" id="lblValue" readonly value="0">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Sistole</label>
                          <div class="col-sm-10">
                            <input type="text" name="sistole" class="form-control" value="0">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Diastole</label>
                          <div class="col-sm-10">
                            <input type="text" name="diastole" class="form-control" value="0">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Resprate</label>
                          <div class="col-sm-10">
                            <input type="text" name="respRate" class="form-control" value="0">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Heartrate</label>
                          <div class="col-sm-10">
                            <input type="text" name="heartRate" class="form-control" value="0">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Terapi Obat</label>
                          <div class="col-sm-10">
                            <input type="text" name="terapi" class="form-control">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Terapi Non Obat</label>
                          <div class="col-sm-10">
                            <input type="text" name="terapinonobat" class="form-control">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Keterangan</label>
                          <div class="col-sm-10">
                            <input type="text" name="keterangan" class="form-control">
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

<script>
    function edValueKeyPress()
    {
        var tb = document.getElementById("tb");
        var stb = tb.value**2;
    
        var bb = document.getElementById("bb");
        var sbb = bb.value;

        var result = (sbb / stb) * 10000;
        var lblValue = document.getElementById("lblValue").value = result.toFixed(2);
    }
</script>
<script>
    function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57))

        return false;
      return true;
    }
</script>
@endpush
