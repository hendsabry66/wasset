@extends('web.layouts.master')
@section('content')

    <main class="pt-4 pb-4">
        <div class="container">



            <div class="row align-items-center mt-4 mb-3">
                <div class="col-md-10">
                    {{--                    <h5 class="fw-bold">بيع واشتري سيارات اون لاين في كل المدن <span>795000</span> <small>إعلان</small></h5>--}}
                </div>

            </div>

        </div>

        @foreach($ads as $key=>$ad)

            <div class="card card-search mt-3 mb-3">
                <div class="row">
                    <div class="col-md-3">
                        <a href="{{url('adDetails/'.$ad->id)}}">
                            <img src="{{$ad->image}}" class="img-fluid rounded-start" alt="...">
                        </a>
                    </div>
                    <div class="col-md-9">
                        <div class="card-body">
                            {{--                        <div class="float-end"><span class="badge">إعلان مميز</span></div>--}}
                            <a href="{{url('adDetails/'.$ad->id)}}">
                                <h5 class="card-title">{{$ad->name}}</h5>
                            </a>
                            <p class="card-text">{{$ad->details}}</p>
                        </div>
                        <div class="row mt-md-3 p-3">
                            <div class="col-12 col-md-6 cb"><i class="fa fa-user"></i>{{$ad->user->name}}</div>
                            <div class="col col-md-1 cg"><i class="fa fa-thumbs-up"></i> 56</div>
                            <div class="col col-md-1 cg"><i class="fa fa-comment"></i> {{count($ad->comments)}}</div>
                            <div class="col-6 col-md-2 cg"><i class="fa fa-clock"></i> {{\Carbon\Carbon::parse($ad->created_at)->diffForHumans()}}</div>
                            <div class="col-6 col-md-2 cb"><i class="fa fa-map-marker-alt"></i> {{$ad->city->name}}</div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </main>

@endsection
