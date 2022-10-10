@extends('web.layouts.master')
@section('content')

<main class="pt-4 pb-4">
    <div class="container">

        <div id="search-page">
            <form>
            <div class="row pt-2 pb-2">

                <div class="col-6 col-md-2">
                    <div class="box">
                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-center fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                المدينة
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">- 0000</a></li>
                                <li><a class="dropdown-item" href="#">- 0000</a></li>
                                <li><a class="dropdown-item" href="#">- 0000</a></li>
                                <li class="text-end"><a href="#" class="dropdown-item"><i class="fa fa-arrow-left"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-2">
                    <div class="box">
                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-center fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                المدينة
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">- 0000</a></li>
                                <li><a class="dropdown-item" href="#">- 0000</a></li>
                                <li><a class="dropdown-item" href="#">- 0000</a></li>
                                <li class="text-end"><a href="#" class="dropdown-item"><i class="fa fa-arrow-left"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

{{--                    <div class="row pt-3">--}}
                        <div class="col-6 col-md-6">
                            <input type="text" class="form-control" placeholder="كلمة البحث..">
                        </div>
                        <div class="col-4 col-md-2">
                            <button type="submit" class="btn btn-search">بحث</button>
                        </div>
{{--                    </div>--}}
                </form>
{{--                <div class="col-6 col-md-2">--}}
{{--                    <div class="box">--}}
{{--                        <div class="nav-item dropdown">--}}
{{--                            <a class="nav-link dropdown-toggle text-center fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                                النوع--}}
{{--                            </a>--}}
{{--                            <ul class="dropdown-menu">--}}
{{--                                <li><a class="dropdown-item" href="#">- 0000</a></li>--}}
{{--                                <li><a class="dropdown-item" href="#">- 0000</a></li>--}}
{{--                                <li><a class="dropdown-item" href="#">- 0000</a></li>--}}
{{--                                <li class="text-end"><a href="#" class="dropdown-item"><i class="fa fa-arrow-left"></i></a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-6 col-md-2">--}}
{{--                    <div class="box">--}}
{{--                        <div class="nav-item dropdown">--}}
{{--                            <a class="nav-link dropdown-toggle text-center fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                                السعر--}}
{{--                            </a>--}}
{{--                            <ul class="dropdown-menu">--}}
{{--                                <li><a class="dropdown-item" href="#">- 0000</a></li>--}}
{{--                                <li><a class="dropdown-item" href="#">- 0000</a></li>--}}
{{--                                <li><a class="dropdown-item" href="#">- 0000</a></li>--}}
{{--                                <li class="text-end"><a href="#" class="dropdown-item"><i class="fa fa-arrow-left"></i></a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-6 col-md-2">--}}
{{--                    <div class="box">--}}
{{--                        <div class="nav-item dropdown">--}}
{{--                            <a class="nav-link dropdown-toggle text-center fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                                سنة الصنع--}}
{{--                            </a>--}}
{{--                            <ul class="dropdown-menu">--}}
{{--                                <li><a class="dropdown-item" href="#">- 0000</a></li>--}}
{{--                                <li><a class="dropdown-item" href="#">- 0000</a></li>--}}
{{--                                <li><a class="dropdown-item" href="#">- 0000</a></li>--}}
{{--                                <li class="text-end"><a href="#" class="dropdown-item"><i class="fa fa-arrow-left"></i></a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-6 col-md-2">--}}
{{--                    <div class="box">--}}
{{--                        <div class="nav-item dropdown">--}}
{{--                            <a class="nav-link dropdown-toggle text-center fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                                كم--}}
{{--                            </a>--}}
{{--                            <ul class="dropdown-menu">--}}
{{--                                <li><a class="dropdown-item" href="#">- 0000</a></li>--}}
{{--                                <li><a class="dropdown-item" href="#">- 0000</a></li>--}}
{{--                                <li><a class="dropdown-item" href="#">- 0000</a></li>--}}
{{--                                <li class="text-end"><a href="#" class="dropdown-item"><i class="fa fa-arrow-left"></i></a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-6 col-md-2">--}}
{{--                    <div class="box">--}}
{{--                        <div class="nav-item dropdown">--}}
{{--                            <a class="nav-link dropdown-toggle text-center fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                                فلتر--}}
{{--                            </a>--}}
{{--                            <ul class="dropdown-menu">--}}
{{--                                <li><a class="dropdown-item" href="#">- 0000</a></li>--}}
{{--                                <li><a class="dropdown-item" href="#">- 0000</a></li>--}}
{{--                                <li><a class="dropdown-item" href="#">- 0000</a></li>--}}
{{--                                <li class="text-end"><a href="#" class="dropdown-item"><i class="fa fa-arrow-left"></i></a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>

            <div class="row align-items-center mt-4 mb-3">
                <div class="col-md-10">
{{--                    <h5 class="fw-bold">بيع واشتري سيارات اون لاين في كل المدن <span>795000</span> <small>إعلان</small></h5>--}}
                </div>
{{--                <div class="col-md-2">--}}
{{--                    <div class="box pt-3 pb-3">--}}
{{--                        <div class="nav-item dropdown">--}}
{{--                            <a class="nav-link dropdown-toggle text-center fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                                الترتيب--}}
{{--                            </a>--}}
{{--                            <ul class="dropdown-menu">--}}
{{--                                <li><a class="dropdown-item" href="#">- 0000</a></li>--}}
{{--                                <li><a class="dropdown-item" href="#">- 0000</a></li>--}}
{{--                                <li><a class="dropdown-item" href="#">- 0000</a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
            <span class="badge rounded-pill text-bg-light p-3">مرسيدس بنز ( 3254 )</span>
            <span class="badge rounded-pill text-bg-light p-3">نيسان ( 2456 )</span>
            <span class="badge rounded-pill text-bg-light p-3">تويوتا ( 1587 )</span>
            <span class="badge rounded-pill text-bg-light p-3">بى ام دبليو ( 8632 )</span>
            <span class="badge rounded-pill text-bg-light p-3">فورد ( 5855 )</span>
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

        {!! $ads->links('pagination::bootstrap-4')  !!}

        <div class="row banner justify-content-end" style="background-image: url('/web/assets/images/banner2.jpg')">
            <div class="col-md-4 text-center">
                <h3 class="fw-bolder">عرض حصري</h3>
                <h2 class="fw-normal">وخصومات كبيرة</h2>
                <a href="#" class="btn btn-banner">المزيد</a>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
</main>

    @endsection
