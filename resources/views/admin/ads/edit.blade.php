@extends('admin.layouts.master')
@section('breadcrumb')
    <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block"> @lang('admin.ads')</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}"> @lang('admin.dashboard')</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{route('ads.index')}}"> @lang('admin.ads')</a>
                    </li>
                    <li class="breadcrumb-item active">  @lang('admin.editAd')
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

                            <form class="form form-horizontal ajaxForm" action="{{ route('ads.update', $ad->id) }}"  method="post">
                                @csrf
                                {{ method_field('PUT') }}
                                <div class="form-body">
                                    <h4 class="form-section"><i class="ft-user"></i>  @lang('admin.editAd') </h4>

                                    @include('admin.ads.form')

                                </div>
                                <div class="form-actions ">
                                    <a href="{{route('ads.index')}}" class="btn btn-warning mr-1">
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
@section('js')

    <script>

        $('select[name="country_id"]').on('change', function() {

            var countryID = $(this).val();

            if(countryID) {
                console.log(countryID);
                $.ajax({
                    url: '{{url('/admin/cities/cityAjax/')}}'+'/'+countryID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {

                        $('select[name="city_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="city_id"]').append('<option value="'+ value.id +'">'+ value.name.en +' - '+ value.name.ar +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="city_id"]').empty();
            }
        });
        $('select[name="category_id"]').on('change', function() {

            var categoryID = $(this).val();

            if(categoryID) {
                $.ajax({
                    url: '{{url('/admin/categories/categoryAjax/')}}'+'/'+categoryID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {

                        $('select[name="subcategory_id"]').empty();
                        $.each(data, function(key, value) {

                            $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">'+ value.name.en +' - '+ value.name.ar +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="subcategory_id"]').empty();
            }
        });
    </script>
@endsection
