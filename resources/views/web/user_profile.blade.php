@extends('web.layouts.master')
@section('content')

    <main class="pt-4 pb-4">

        <section id="rating">
            <div class="container">
                <h3 class="fw-bold text-center mt-3 mb-3">@lang('web.advertiser')</h3>

                <div class="row justify-content-md-center align-items-center pt-4 pb-4">
                    <div class="col-md-6">
                        @if($user->image)
                            <img src="{{$user->image}}" class="float-start rounded-circle" alt="...">

                        @else
                            <img src="{{url('web/assets/images/user.png')}}" class="float-start rounded-circle" alt="...">

                        @endif
                        <h4 class="fw-bold pt-2">{{$user->name}}</h4>
                        <h6>{{$user->email}}</h6>

                        @for($i=1;$i<=5;$i++)
                            @if($i<=round($user->ratings()->avg('rating')))
                                <span class="fa fa-star checked"></span>
                            @else
                                <span class="fa fa-star"></span>
                            @endif
                        @endfor


                    </div>
                </div>

                <div class="text-center">
                    <button type="button" class="btn btn-rate" data-bs-toggle="modal" data-bs-target="#rate">
                        <i class="fa fa-plus"></i> @lang('web.add_review')
                    </button>

                    <div class="modal fade" id="rate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="rateLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="rateLabel">@lang('web.Do you recommend to deal with him?')</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-footer">
                                    <form action="{{url('rateUser')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="rated_user_id" value="{{$user->id}}">
                                        <input type="hidden" name="rating"  value="5">
                                        <button type="submit" class="btn btn-rating">
                                            <i class="fa fa-thumbs-up"></i>
                                            <h5>@lang('web.I recommend dealing with him')</h5>
                                        </button>
                                    </form>
                                    <form action="{{url('rateUser')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="rated_user_id" value="{{$user->id}}">
                                        <input type="hidden" name="rating"  value="0">
                                        <button type="submit" class="btn btn-rating">
                                            <i class="fa fa-thumbs-down"></i>
                                            <h5>@lang('web.I do not recommend dealing with him')</h5>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="container">
            <h3 class="head-carousel pt-5 pb-4">@lang('web.User Ads')</h3>
            <div class="owl-carousel owl-theme carousel-p">
                @foreach($ads as $ad)
                    <div class="item">
                    <div class="card">
                        <div class="overlay">
                            <h6 class="card-title fw-bold">@lang('web.You can see all the details of the advertisement here')</h6>
                            <a href="{{url('adDetails/'.$ad->id)}}" class="btn btn-card">@lang('web.details')</a>
                        </div>
                        <img src="{{$ad->image}}" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h6 class="card-title fw-bold">{{$ad->name}}</h6>
                            <p class="card-text">رقم الاعلان {{$ad->id}}</p>
                            <h6 class="fw-bold"><i class="fa fa-map-marker-alt"></i> {{$ad->city->name}}</h6>
                            <h5 class="fw-bolder pt-2">{{$ad->price}} <span class="fw-light">SR</span></h5>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>

    </main>
@endsection
