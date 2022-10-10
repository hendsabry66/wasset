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
                    <li class="breadcrumb-item active">  @lang('admin.addAd')
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
                <div class="card" style="">
                    <div class="card-content">
                        <div class="card-body">
                            @if(!empty($ad->images))
                                @foreach($ad->images as $image)
                                    <img class=" img-fluid mb-1" width="100" src="{{$image->name}}" alt="Card image cap">
                                @endforeach
                            @endif
                            <h4 class="card-title"># {{$ad->id}} </h4>
                            <p class="card-text"><span> الاسم   :- </span>{{$ad->getTranslation('name','en')}} - {{$ad->getTranslation('name','ar')}}</p>
                            <p class="card-text"><span> القسم الاساسي :- </span>{{($ad->category)? $ad->category->getTranslation('name','en').'- '.$ad->category->getTranslation('name','ar')  : '-'}}</p>
                            <p class="card-text"><span> القسم الفرعي :- </span>{{($ad->subcategory)? $ad->subcategory->getTranslation('name','en').'- '.$ad->subcategory->getTranslation('name','ar')  : '-'}}</p>
                            <p class="card-text"><span>  المدينه :- </span>{{($ad->city)? $ad->city->getTranslation('name','en').'- '.$ad->city->getTranslation('name','ar') : '-'}}</p>
                            <p class="card-text"><span>  الدولة :- </span>{{($ad->country)? $ad->country->getTranslation('name','en').'- '.$ad->country->getTranslation('name','ar') : '-'}}</p>
                            <p class="card-text"><span>   @lang('admin.latitude') :- </span>{{$ad->latitude}}</p>
                            <p class="card-text"><span>  @lang('admin.longitude')  :- </span>{{$ad->longitude}}</p>
                            <p class="card-text"><span>  @lang('admin.communication')  :- </span>{{$ad->communication}}</p>
                            <p class="card-text"><span>   @lang('admin.details_en') :- </span>{{$ad->getTranslation('details','en')}}</p>
                            <p class="card-text"><span>   @lang('admin.details_ar') :- </span>{{$ad->getTranslation('details','ar')}}</p>

                           <a href="{{route('ads.edit',$ad->id)}}" class="btn btn-outline-teal">@lang('admin.edit')</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
@endsection


