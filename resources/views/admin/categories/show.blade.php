@extends('admin.layouts.master')
@section('breadcrumb')
    <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block"> @lang('admin.categories')</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}"> @lang('admin.dashboard')</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{route('categories.index')}}"> @lang('admin.categories')</a>
                    </li>
                    <li class="breadcrumb-item active">  @lang('admin.addCategory')
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
                            @if(!empty($category->image))
                             <img class=" img-fluid mb-1" width="100" src="{{$category->image}}" alt="Card image cap">
                            @endif
                            <h4 class="card-title"># {{$category->id}}  </h4>
                                <p class="card-text"><span>الاسم: - </span>

                                    {{$category->getTranslation('name','ar')}}  - {{ $category->getTranslation('name','en') }}

                                </p>

                            <p class="card-text"><span> القسم الاساسي :- </span>{{($category->parent_category)? $category->parent_category->name : '-'}}</p>
                            <p class="card-text"><span>  الحالة :- </span>
                                @if($category->status == 'active')
                                    <span class="badge badge-success">@lang('admin.active')</span>
                                @else
                                    <span class="badge badge-danger">@lang('admin.in_active')</span>
                                @endif
                            </p>
                            <p class="card-text"><span>  @lang('admin.display_in_home') :- </span>
                                @if($category->display_in_home == '1')
                                    <span class="badge badge-success">@lang('admin.yes')</span>
                                @else
                                    <span class="badge badge-danger">@lang('admin.no')</span>
                                @endif
                            </p>
                            <p class="card-text"><span>  الترتيب :- </span>{{$category->order}}</p>
                            <a href="{{route('categories.edit',$category->id)}}" class="btn btn-outline-teal">@lang('admin.edit')</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
@endsection
