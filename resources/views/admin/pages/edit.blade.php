@extends('admin.layouts.master')
@section('breadcrumb')
    <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block"> @lang('admin.pages')</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}"> @lang('admin.dashboard')</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{route('pages.index')}}"> @lang('admin.pages')</a>
                    </li>
                    <li class="breadcrumb-item active">  @lang('admin.editPage')
                    </li>
                </ol>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <section id="horizontal-form-layouts">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-content collpase show">
                        <div class="card-body">

                            <form class="form form-horizontal ajaxForm" action="{{route('pages.update', $page->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                {{ method_field('PUT') }}
                                <div class="form-body">
                                    <h4 class="form-section"><i class="ft-user"></i>  @lang('admin.editPage') </h4>

                                    @include('admin.pages.form')

                                </div>
                                <div class="form-actions ">
                                    <a href="{{route('pages.index')}}" class="btn btn-warning mr-1">
                                        <i class="ft-x"></i> @lang('admin.cancel')
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-check-square-o"></i> @lang('admin.save')
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </section>
@endsection
