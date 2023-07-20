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
                <h3 class="box-title">Laporan LB1</h3>
            </div>

            <form class="form-horizontal" method="post" action="/superadmin/laporan/lb1">
                @csrf
                <div class="box-body">

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Tahun</label>
                        <div class="col-sm-10">
                            <select name="tahun" class="form-control" required>
                                <option value="">-semua-</option>
                                <option value="2023" {{old('tahun') == '2023' ? 'selected':''}}>2023</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label"></label>
                        <div class="col-sm-10">
                            <a href="/logo/LB1.xlsx" class='btn btn-primary'><i class="fa fa-file-excel-o"></i> Export</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</section>
    
@endsection

@push('js')
    
@endpush