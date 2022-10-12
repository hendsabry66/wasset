@extends('web.layouts.master')
@section('content')

    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">@lang('web.home')</a></li>
                <li class="breadcrumb-item active" aria-current="page">@lang('web.favourites')</li>
            </ol>
        </nav>
    </div>

    <div class="products mt-5">
        <div class="container">
            <div class="head text-center  mb-5">
                {{--                <h2>@lang('web.products')</h2>--}}
            </div>
            <div class="row">
                @foreach($ads as $ad)
                    <div class="col-md-4 col-6">
                        <div class="item card-sile">
                            <a href="{{url('adDetails/'.$ad->id)}}">
                                <figure>
                                    @if($ad->image)
                                        <img src="{{$ad->image}}" alt="">
                                    @else
                                        <img src="{{asset('web/assets/images/c01.png')}}" alt="">
                                    @endif
                                </figure>
                                <h3> {{$ad->name}}</h3>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>


@endsection
