@extends('admin.layouts.master')
@include('admin.layouts.datatable.datatable')
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">

                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <section class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-head">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="btn-group">
                                        <a href="{{ route('roles.create') }}" class="btn btn-success">@lang('admin.addNewRole') <i class="fa fa-plus"></i></a>

{{--                                        <a href="#" class="bulk_delete_confirmation btn btn-danger" id="sample_editable_1_new" data-toggle="modal" data-target="#bulkDeleteModal" data-action="{{ route('roles.bulk-delete') }}">--}}
{{--                                           @lang('admin.multiDelete')--}}
{{--                                            <i class="icon-trash"></i>--}}
{{--                                        </a>--}}

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="box">

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                            @endif
                                <!-- /.box-header -->
                                <div class="box-body table-responsive datatable-table">
                                    {!!
                                        $dataTable->table([
                                            'class' => 'dataTable table table-striped table-bordered table-hover w-100 dataTables_wrapper ',
                                        ], true)
                                    !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


@endsection
