@extends('layouts.app')
@push('css')
    
@endpush
@section('content')
<section class="content-header">
    <h1>
      Manual Book
      <small>Silahkan Klik Icon ?, untuk melihat detail manual book</small>
    </h1>
    <ol class="breadcrumb">
        <a href="/superadmin/manualbook/create" class="btn btn-xs btn-primary"><i class="fa fa-plus-circle"></i> Tambah Manual Book</a>
        <a href="/superadmin/manualbook/download" class="btn btn-xs btn-danger"><i class="fa fa-download"></i> Download Manual Book PDF</a>
        
    </ol>
</section>
<section class="content">
<div class="row">
    <div class="col-md-12">
        @foreach ($data as $item)
        <div class="box box-solid collapsed-box">
            <div class="box-header bg-light-blue-gradient ">
            <!-- tools box -->
            <div class="pull-right box-tools">
                <a href="/superadmin/manualbook/edit/{{$item->id}}" class="btn btn-primary btn-sm pull-right" title="Edit Manual Book" style="margin-right: 5px;">
                <i class="fa fa-edit"></i></a>
                {{-- <button type="button" class="btn btn-primary btn-sm pull-right" data-widget="collapse"
                        data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
                <i class="fa fa-minus"></i></button> --}}
            </div>
            <!-- /. tools -->

            <button type="button" class="btn btn-primary btn-xs" data-widget="collapse"
            data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
    
            <i class="fa fa-question"></i></button>

            <h3 class="box-title">
                {{$item->judul}}
            </h3>
            </div>
            <div class="box-body">
                {!!$item->isi!!}
            </div>
        </div>
        @endforeach
    </div>
</div>
</section>
@endsection
@push('js')
    
@endpush
