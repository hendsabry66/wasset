@extends('web.layouts.master')
@section('title', 'Add New')
@section('content')

    @if(session()->has('success'))
        <div class="alert alert-success text-center">
            {{ session()->get('success') }}
        </div>
    @endif
    <div id="head-u" class="text-center">
        <div class="overlay"></div>
        @if(!empty($user->image))
            <img class="user-img" src="{{$user->image}}">
        @else
            <img class="text-center" width="150" src="{{asset('/web/assets/images/user.png')}}">
        @endif

    </div>

    <div class="container text-center">
        <h3 class="fw-bold">{{$user->name}} </h3>
        <a href="{{LaravelLocalization::localizeUrl('editProfile')}}" class="btn btn-success mt-md-5 mb-3 hvr-sweep-to-left"> @lang('web.editProfile')</a>
    </div>

    <section id="cards">
        <div class="container">
            <h2 class="title-cards">@lang('web.myAds')</h2>
            <div class="row">

                @foreach($user->ads as $ad)
                    <div class="col-sm-6 col-md-3">
                        <div class="card">
                            <a href="{{url('adDetails/'.$ad->id)}}"><img src="{{$ad->image}}" class="card-img-top hvr-shrink" alt="{{$ad->name}}"></a>
                            <div class="card-body">
                                <h5 class="card-title">  {{$ad->name}} </h5>

{{--                                <p><span>المنطقة :- </span>{{$ad->area->name}}</p>--}}
                                <p><span>@lang('web.city') :- </span>{{$ad->city->name}}</p>

                                <p class="card-text">
                                    {{Str::limit($ad->details, 100)}}
                                </p>
                                <a href="{{url('adDetails/'.$ad->id)}}" class="more">@lang('web.more') <i class="fa fa-arrow-left"></i></a>
                                <br>
{{--                                <a href="{{url('ads/edit/'.$ad->id)}}" class="btn btn-light">تعديل</a>--}}
{{--                                <a href="{{url('ads/delete/'.$ad->id)}}" class="btn btn-danger">حذف</a>--}}
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>


@endsection
