<!doctype html>
<html lang="ar">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{settings()['site_name']}}</title>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
    <link href="{{asset('web/assets/css/all.min.css')}}" rel="stylesheet">
    <link href="{{asset('web/assets/css/owl.carousel.min.css')}}" rel="stylesheet">

    <!--الاستبدال فى الانجلش-->
     @if(App::getLocale() == 'en')
        <link href="{{asset('web/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    @else
        <link href="{{asset('web/assets/css/bootstrap.rtl.min.css')}}" rel="stylesheet">
    @endif

    <!--الاضافة فى الانجلش -->
    @if(App::getLocale() == 'en')
     <link href="{{asset('web/assets/css/style.ltr.css')}}" rel="stylesheet">
    @else
        <link href="{{asset('web/assets/css/style.css')}}" rel="stylesheet">
    @endif
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.34/sweetalert2.min.css">

</head>
<body>

<header>
    <div class="container">
        <div class="row align-items-center pt-3 pb-3">
            <div class="col-md-3 text-center text-md-start">
                <a href="{{url('/')}}"><img src="{{url('uploads/setting/'.settings()['logo'])}}" alt=""></a>
            </div>
            <div class="col-8 col-md-4 text-center user-icon">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    @if($localeCode != App::getLocale())
                        <a href="{{LaravelLocalization::getLocalizedURL($localeCode)}}" class="lang">
                            {{ $properties['native'] }}
                        </a>

                    @endif
                @endforeach
                <a href="{{LaravelLocalization::localizeUrl('/myProfile')}}"><i class="fa fa-user"></i><span class="d-none d-md-inline-block">@lang('web.profile')</span></a>
                <a href="{{LaravelLocalization::localizeUrl('favourites')}}"><i class="fa fa-heart"></i><span class="d-none d-md-inline-block">@lang('web.favourites')</span></a>
                <a href="{{LaravelLocalization::localizeUrl('conversations')}}"><i class="fa fa-comment"></i><span class="d-none d-md-inline-block">@lang('web.messages')</span></a>
            </div>
            <div class="col-4 col-md-3 text-center text-md-start pb-3 pb-md-0 pt-3 pt-md-0">
                @if(auth()->check())
                    <form action="{{  \LaravelLocalization::localizeURL('/logout') }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-submit">@lang('web.logout')</button>
                    </form>
                @else
                    <a href="{{LaravelLocalization::localizeUrl('login')}}" class="login"><i class="fa fa-lock"></i><span class="fw-bold d-none d-md-inline-block"></span>@lang('web.Log in')</a>
                    <a href="{{LaravelLocalization::localizeUrl('register')}}" class="login"><span class="fw-bold d-none d-md-inline-block"></span>@lang('web.or join us')</a>
                @endif
            </div>
            <div class="col-md-2 text-center text-md-end">
                <a href="{{LaravelLocalization::localizeUrl('ad/create')}}" class="btn btn-banner">@lang('web.add your ad')</a>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-md">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{LaravelLocalization::localizeUrl('/')}}">@lang('web.home')</a>
                    </li>
                    @foreach(categories() as $category)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="{{url('ads/'.$category->id)}}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{$category->name}}
                        </a>
                        @if(!empty($category->children))
                            <ul class="dropdown-menu">
                                @foreach($category->children as $child)
                                    <li>
                                        <a class="dropdown-item" href="{{url('ads/'.$child->id)}}">{{$child->name}}</a>
                                    </li>
                                @endforeach

                            </ul>
                        @endif
                    </li>
                    @endforeach

                    <li class="nav-item">
                        <a class="nav-link" href="{{LaravelLocalization::localizeUrl('contactUs')}}">@lang('web.contact us')</a>
                    </li>
                </ul>

            </div>

            <div class="d-flex text-md-end">
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="{{settings()['facebook']}}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                    <li class="list-inline-item"><a href="{{settings()['twitter']}}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                    <li class="list-inline-item"><a href="{{settings()['instagram']}}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                    <li class="list-inline-item"><a href="{{settings()['snapchat']}}" target="_blank"><i class="fab fa-snapchat"></i></a></li>
                    <li class="list-inline-item"><a href="{{settings()['youtube']}}" target="_blank"><i class="fab fa-youtube"></i></a></li>
                </ul>
            </div>

        </div>
    </nav>
</header>
