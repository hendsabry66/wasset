@extends('web.layouts.master')
@section('content')
    <main class="pt-4 pb-4">

        <section id="form">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-md-7">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <h2 class="title-form">{{ __('Reset Password') }}</h2>
                            <label for="1" class="form-label fw-bold">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                            <button type="submit" class="btn btn-submit">{{ __('Send Password Reset Link') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </main>


@endsection
