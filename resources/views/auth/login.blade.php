@extends('web.layouts.master')
@section('content')

    <main class="pt-4 pb-4">

        <section id="form">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-md-7">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <h2 class="title-form">@lang('web.login')</h2>
                            <label for="1" class="form-label fw-bold">@lang('web.email')</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <label for="2" class="form-label fw-bold pt-4"> @lang('web.password')</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            @if (Route::has('password.request'))
                                <a class="link" href="{{ route('password.request') }}">@lang('web.Forgot your password?')</a>

                            @endif

                            <button type="submit" class="btn btn-submit">@lang('web.login')</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </main>

@endsection




{{--                        <div class="row mb-3">--}}
{{--                            <div class="col-md-6 offset-md-4">--}}
{{--                                <div class="form-check">--}}
{{--                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

{{--                                    <label class="form-check-label" for="remember">--}}
{{--                                        {{ __('Remember Me') }}--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}


