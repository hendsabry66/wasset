@extends('web.layouts.master')
@section('content')
    <main class="pt-4 pb-4">

        <section id="form">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-md-7">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">

                            <h2 class="title-form">{{ __('Reset Password') }}</h2>
                            <label for="1" class="form-label fw-bold">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <label for="2" class="form-label fw-bold pt-4">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <label for="2" class="form-label fw-bold pt-4">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">


                            <button type="submit" class="btn btn-submit">{{ __('Reset Password') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </main>

@endsection
