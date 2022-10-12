@extends('web.layouts.master')
@section('content')

    <main class="pt-4 pb-4">
@if(session()->has('success'))
    <div class="alert alert-success text-center">
        {{ session()->get('success') }}
    </div>
@endif

        <section id="form">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-md-7">
                        <form method="POST" action="{{ LaravelLocalization::localizeUrl('postEditProfile') }}">
                            @csrf
                            <h2 class="title-form">@lang('web.editProfile')</h2>
                            <label for="1" class="form-label fw-bold">@lang('web.name')</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <label for="2" class="form-label fw-bold pt-4">@lang('web.phone')</label>
                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $user->phone }}" required autocomplete="phone" autofocus>

                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <label for="3" class="form-label fw-bold pt-4">@lang('web.email')</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <label for="4" class="form-label fw-bold pt-4"> @lang('web.password')</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror


                            <button type="submit" class="btn btn-submit">@lang('web.editProfile')</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </main>

@endsection

