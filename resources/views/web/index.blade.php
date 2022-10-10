@extends('web.layouts.master')
@section('content')

    <main class="pt-4 pb-4">
        <div class="container">

            <div id="search-home">
                <h3 class="fw-bold text-center">من خلال وسيط كوم بإمكانك البحث عن وظيفة وبيع وشراء أي شيء</h3>
                <div class="box">
                    <ul class="nav nav-pills nav-fill mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all" aria-selected="true">الكل</button>
                        </li>
                        @foreach($categories as $key=>$category)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-cat{{$key}}-tab" data-bs-toggle="pill" data-bs-target="#pills-cat{{$key}}" type="button" role="tab" aria-controls="pills-cat{{$key}}" aria-selected="false">
                                {{$category->name}}</button>
                        </li>
                        @endforeach

                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab" tabindex="0">
                            <form method="get" action="{{url('search')}}">
                                @csrf
                                <input type="hidden" name="category_id" value="null">
                                <div class="row pt-3">
                                    <div class="col-8 col-md-10">
                                        <input type="text" name="text" class="form-control" placeholder="كلمة البحث..">
                                    </div>
                                    <div class="col-4 col-md-2">
                                        <button type="submit" class="btn btn-search">بحث</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @foreach($categories as $key=>$category)
                        <div class="tab-pane fade" id="pills-cat{{$key}}" role="tabpanel" aria-labelledby="pills-cat{{$key}}-tab" tabindex="0">
                            <form method="get" action="{{url('search')}}">

                                @csrf
                                <input type="hidden" name="category_id" value="{{$category->id}}">
                                <div class="row pt-3">
                                    <div class="col-8 col-md-10">
                                        <input type="text" class="form-control" placeholder="كلمة البحث..">
                                    </div>
                                    <div class="col-4 col-md-2">
                                        <button type="submit" class="btn btn-search">بحث</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div id="categories-home">
                <div class="row pt-5 pb-5">
                    @foreach($categories as $key=>$category)
                    <div class="col-6 col-md-2">
                        <div class="box">
                            <div class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-center fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{$category->image}}" alt=""> {{$category->name}}
                                </a>
                                <ul class="dropdown-menu">
                                    @if(!empty($category->children))
                                        @foreach($category->children as $child)
                                            <li><a class="dropdown-item" href="{{url('ads/'.$child->id)}}">{{$child->name}}</a></li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>


            <h3 class="head-carousel pt-4 pb-4"><i class="fa fa-eye"></i> بناء على ما شاهدت مؤخراً</h3>
            <div class="owl-carousel owl-theme carousel-p">
                @foreach($myLastViews as $value)
                    <div class="item">
                    <div class="card">
                        <div class="overlay">
                            <h6 class="card-title fw-bold">يمكنك مشاهدة تفاصيل الإعلان كلها من هنا</h6>
                            <a href="{{url('adDetails/'.$value->id)}}" class="btn btn-card">التفاصيل</a>
                        </div>
                        <img src="{{$value->image}}" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h6 class="card-title fw-bold">{{GoogleTranslate::trans($value->name, app()->getLocale())}}</h6>
                            <p class="card-text">رقم الاعلان {{$value->id}}</p>
                            <h6 class="fw-bold"><i class="fa fa-map-marker-alt"></i> {{$value->city->name}}</h6>
                            <h5 class="fw-bolder pt-2">{{$value->price}}<span class="fw-light">SR</span></h5>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

            @foreach($homeCategory as $homeCat)
            <h3 class="head-carousel pt-4 pb-4"><img src="{{$homeCat->image}}"> الإعلانات المميزة في قسم {{$homeCat->name}}</h3>
            <div class="owl-carousel owl-theme carousel-p">
                @foreach($homeCat->ads as $ad)
                <div class="item">
                    <div class="card">
                        <div class="overlay">
                            <h6 class="card-title fw-bold">يمكنك مشاهدة تفاصيل الإعلان كلها من هنا</h6>
                            <a href="{{url('ads/'.$ad->id)}}" class="btn btn-card">التفاصيل</a>
                        </div>
                        <img src="{{$ad->image}}" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h6 class="card-title fw-bold">   {{GoogleTranslate::trans($ad->name, app()->getLocale())}}</h6>
                            <p class="card-text">رقم الاعلان {{$ad->id}}</p>
                            <h6 class="fw-bold"><i class="fa fa-map-marker-alt"></i> {{$ad->city->name}}</h6>
                            <h5 class="fw-bolder pt-2">{{$ad->price}} <span class="fw-light">SR</span></h5>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            @endforeach





            <div class="row banner justify-content-end" style="background-image: url('web/assets/images/banner2.jpg')">
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
