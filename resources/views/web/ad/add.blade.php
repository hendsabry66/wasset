@extends('web.layouts.master')
@section('content')

<main class="pt-4 pb-4">

    @if($errors->any())
        <div class="alert alert-danger text-center">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session()->has('success'))
        <div class="alert alert-success text-center">
            {{ session()->get('success') }}
        </div>
    @endif

    <section id="form">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-7">
                    <form method="post" action="{{LaravelLocalization::localizeUrl('ad/store')}}" enctype="multipart/form-data">
                        @csrf
                        <h2 class="title-form">@lang('web.addAd')</h2>

                        <label for="1" class="form-label fw-bold"> @lang('web.adName')</label>
                        <input type="text" class="form-control" id="1" name="name">

                        <label for="2" class="form-label fw-bold pt-4">@lang('web.adDescription')</label>
                        <textarea class="form-control" id="2" rows="4" name="details"></textarea>

                        <label for="3" class="form-label fw-bold pt-4">@lang('web.category')</label>
                        <select class="form-select" id="3" name="category_id">
                            <option selected>@lang('web.choose')</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach

                        </select>

                        <label for="4" class="form-label fw-bold pt-4">@lang('web.area')</label>
                        <select class="form-select" id="4" name="country_id">
                            <option selected>@lang('web.choose')</option>
                            @foreach($countries as $country)
                                <option value="{{$country->id}}">{{$country->name}}</option>
                            @endforeach

                        </select>

                        <label for="5" class="form-label fw-bold pt-4">@lang('web.city')</label>
                        <select class="form-select" id="5" name="city_id">
                            <option selected>@lang('web.choose')</option>
                            @foreach($cities as $city)
                                <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach

                        </select>

                        <label for="6" class="form-label fw-bold pt-4">@lang('web.adImage')</label>
                        <input class="form-control" type="file" id="6" name="image">

                        <label for="7" class="form-label fw-bold pt-4">@lang('web.adAdditionalImages')</label>
                        <input class="form-control" type="file" id="7" name="images[]" multiple>

                        <button type="submit" class="btn btn-submit hvr-sweep-to-left">@lang('web.send')</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

</main>

@endsection
