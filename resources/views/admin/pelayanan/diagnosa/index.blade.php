@extends('layouts.app')
@push('css')
<meta name="csrf-token" content="{{ csrf_token() }}" />
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
                <h3 class="box-title">Diagnosa</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST" action="/superadmin/pelayanan/periksa/{{$id}}/diagnosa">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Diagnosa</label>
                          <div class="col-sm-10">
                            <select id="selDiag" class="form-control form-control-sm select2 selDiag" name="kdDiag">
                              
                            </select>
                            {{-- <select class="form-control select2" name="kdDiag" style="width: 100%;" required>
                                <option value="">-Pilih-</option>
                                @foreach ($diag as $item)
                                    <option value="{{$item->kdDiag}}">{{$item->kdDiag}}-{{$item->nmDiag}}</option>
                                @endforeach
                            </select> --}}
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
                <h3 class="box-title">Diagnosa Pasien</h3>
                </div>
                <div class="box-body table-responsive">
                    <table class="table table-condensed table-bordered">
                      <tr class="bg-primary" style="font-size: 10px;font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">
                        <th style="width: 10px">#</th>
                        <th>Kode</th>
                        <th>Nama Diagnosa</th>
                        <th></th>
                      </tr>
              
                      @php
                          $no = 1;
                      @endphp
                      
                      @foreach ($data->diagnosa as $key => $item)
                          
                      <tr style="font-size: 12px">
                          <td style="widtd: 10px">{{$no++}}</td>
                          <td>{{$item->diag->kdDiag}}</td>
                          <td>{{$item->diag->nmDiag}}</td>
                          <td>
                              <a href="/superadmin/pelayanan/periksa/{{$id}}/diagnosa/{{$item->id}}/delete" class="btn btn-danger btn-flat btn-xs"onclick="return confirm('Yakin Ingin Di Hapus?');">
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
<script>
  $(document).ready(function(){
       $("#selDiag").select2({
          placeholder: '-Pilih-',
          ajax: { 
          url: '/superadmin/pelayanan/getDiagnosa',
          type: "post",
          dataType: 'json',
          delay: 250,
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          data: function (params) {
              return {
              searchTerm: params.term // search term
              };
          },
          processResults: function (response) {
            console.log(response);
              var data_array = [];
                      response.forEach(function(value,key){
                  data_array.push({id:value.kdDiag,text:value.kdDiag+' - '+value.nmDiag})
              });
              return {
                  results: data_array
              };
          },
          cache: true
          }
      });
  });
  </script>
@endpush
