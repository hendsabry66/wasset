@extends('web.layouts.master')
@section('content')

<main class="pt-4 pb-4">
    <div class="container">
        @if(session()->has('success'))
            <div class="alert alert-success text-center">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-9 pb-3">
                <div class="e3lan-title">
                    <div class="row">
                        <div class="col-md-6 p-2"><h4 class="fw-bold">{{GoogleTranslate::trans($ad->name, app()->getLocale())}}</h4></div>
                        <div class="col-6 col-md-3 cb p-2"><i class="fa fa-user"></i> <a href="{{url('userProfile/'.$ad->user->id)}}">{{$ad->user->name}}</a></div>
                        <div class="col-6 col-md-3 p-2"><a href="tel:{{$ad->user->phone}}"><span class="badge">{{$ad->user->phone}} <i class="fa fa-phone"></i></span></a></div>
                    </div>
                    <div class="row">
                        <div class="col-6 col-md-3 cb p-2"><i class="fa fa-map-marker-alt"></i> {{ $ad->city->name }}</div>
                        <div class="col-6 col-md-5 cb p-2"><h5><span>{{ $ad->price }}</span> SR</h5></div>
                        <div class="col-4 col-md-1 cg p-2"><i class="fa fa-thumbs-up"></i> 56</div>
                        <div class="col-4 col-md-1 cg p-2"><i class="fa fa-comment"></i> {{count($ad->comments)}}</div>
                        <div class="col-4 col-md-2 cg p-2 text-end"><i class="fa fa-clock"></i> {{\Carbon\Carbon::parse($ad->created_at)->diffForHumans()}}</div>
                    </div>
                </div>
                <div class="e3lan-body">
                    <p>
                        {{ $ad->details }}
                    </p>
                </div>
                <div class="owl-carousel owl-theme carousel-g">
                    @foreach($ad->images as $key=>$image)
                        <div class="item" data-hash="{{$key}}">
                            <img src="{{$image->name}}" alt="">
                        </div>
                    @endforeach
                    <div class="item" data-hash="000"></div>
                </div>
                <div class="row pb-4">

                    @foreach($ad->images as $key=>$image)
                    <a class="button secondary url col" href="#{{$key}}">
                        <img src="{{$image->name}}" class="rounded" alt="">
                    </a>
                    @endforeach

                </div>
                <ul class="e3lan-s text-center">
                    <li>
                        <a href="{{LaravelLocalization::localizeUrl('sendMessage/'.$ad->user->id)}}"><i class="fa fa-envelope"></i> <span>مراسلة</span></a>


                    </li>

                    <li>
{{--                        <a href="#"><i class="fa fa-heart"></i> <span>تفضيل</span></a>--}}
                        <form method="post" action="{{LaravelLocalization::localizeUrl('addFavorite')}}" id="favouritePost">
                            @csrf
                            <input type="hidden" name="ad_id" value="{{$ad->id}}" id="ad_id">

                            <button type="submit" class="favorite btn btn-primary"><i class="fa fa-heart"></i>@lang('web.add_to_favourites')</button>

                        </form>
                    </li>
                    <li><a href="#"><i class="fa fa-share"></i> <span>مشاركة</span></a></li>
                    <li><a href="#"><i class="fa fa-circle-info"></i> <span>إبلاغ</span></a></li>
                </ul>
                <div class="map">
                    <p><i class="fa fa-map-marker-alt"></i> الرياض - المنطقة الخضراء - شارع الملك عبد العزيز</p>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d927755.0519899436!2d47.383030476260934!3d24.72539808840737!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2f03890d489399%3A0xba974d1c98e79fd5!2z2KfZhNix2YrYp9i2INin2YTYs9i52YjYr9mK2Kk!5e0!3m2!1sar!2seg!4v1660278967459!5m2!1sar!2seg" width="100%" height="350"></iframe>
                </div>
            </div>
            <div class="col-md-3">
                <div class="similar">
                    <h5 class="fw-bold">@lang('web.similar ads')</h5>
                    <div class="row">
                        @foreach($similarAds as $ad)
                        <div class="col-6 box">
                            <a href="{{url('adDetails/'.$ad->id)}}"><img src="{{$ad->image}}" alt=""></a>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#favouritePost").submit(function (e) {
                e.preventDefault();

                var ad_id = $("#ad_id").val();

                $.ajax({
                    method: "post",
                    url: "{{ url('/addFavourite') }}",
                    dataType: "json",
                    data: {ad_id: ad_id},
                    cache: false,
                    success: function (response) {
                        // alert('تم اضافة المنتج الي المفضلة');
                        // $('.favorite').removeClass("btn-warning").addClass("btn-success");
                        // $('.favorite').append('<p>تمت الاضافة الي المفضلة</p>');

                        var lang = "{{App::getLocale()}}";

                        if(lang == 'en'){
                            Swal.fire({
                                title: 'success!',
                                text: 'added to favorite',
                                icon: 'success',
                                confirmButtonText: 'ok'
                            });
                        }else{
                            Swal.fire({
                                title: 'تم  !',
                                text: 'تم الاضافه الي المفضله ',
                                icon: 'success',
                                confirmButtonText: 'نعم'
                            });
                        }

                    }
                });
            });
        });
    </script>
@endsection
