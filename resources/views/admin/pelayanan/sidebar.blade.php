<div class="col-md-4">
    <div class="box box-primary">
        <div class="box-header with-border">
            <i class="fa fa-ambulance"></i>
        <h3 class="box-title">Keterangan</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal" method="POST" action="/superadmin/pelayanan/periksa/{{$id}}">
            @csrf
        <div class="box-body">
            <div class="form-group">
            <label for="inputEmail3" class="col-sm-4 control-label">Status Pulang</label>

            <div class="col-sm-8">
                <select name="kdStatusPulang" class="form-control" required>
                    <option value="">-Pilih-</option>
                    @foreach ($statusPulang as $item)
                    <option value="{{$item->kdStatusPulang}}" {{$data->kdStatusPulang == $item->kdStatusPulang ? 'selected':''}}>{{$item->nmStatusPulang}}</option>
                    @endforeach
                </select>
            </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-primary btn-flat btn-block pull-right">
                <i class="fa fa-send"></i> SIMPAN</button>
        </div>
        <!-- /.box-footer -->
        </form>
    </div>


    {{-- <div class="box box-primary">
        <div class="box-header with-border">
            <i class="fa fa-book"></i>
        <h3 class="box-title">Riwayat Pasien</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal">
        <div class="box-body">
            <div class="form-group">

            </div>
        </div>
        
        </form>
    </div> --}}
</div>