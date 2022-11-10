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
                <h3 class="box-title">Laboratorium</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal">
                <div class="box-body">
                    <div class="form-group">

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
