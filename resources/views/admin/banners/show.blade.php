@extends('admin.layouts.master')
@section('breadcrumb')
    <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block"> @lang('admin.cities')</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}"> @lang('admin.dashboard')</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{route('cities.index')}}"> @lang('admin.cities')</a>
                    </li>
                    <li class="breadcrumb-item active">  @lang('admin.addCity')
                    </li>
                </ol>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <section id="horizontal-form-layouts">
        <div class="row match-height">
            <div class=" col-sm-12">
                <div class="card" style="height: 399.797px;">
                    <div class="card-content">
                        <div class="card-body">
                            @if(!empty($banner->image))
                                <img class=" img-fluid mb-1" width="100" src="{{$banner->image}}" alt="Card image cap">
                            @endif

                            <p class="card-text"><span>  @lang('admin.details_en') :- </span>
                                {{$banner->getTranslation('details','en')}}
                            </p>

                            <p class="card-text"><span>  @lang('admin.details_ar') :- </span>
                                {{$banner->getTranslation('details','ar')}}
                            </p>

                            <a href="{{route('banners.edit',$banner->id)}}" class="btn btn-outline-teal">@lang('admin.edit')</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>

@endsection
