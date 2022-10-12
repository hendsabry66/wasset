@extends('web.layouts.master')
@section('content')

    <section id="form">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-7">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success text-center">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ LaravelLocalization::localizeUrl('postContactUs') }}">
                        @csrf

                        <label for="1" class="form-label fw-bold">@lang('web.name')</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror


                        <label for="3" class="form-label fw-bold pt-4">@lang('web.email')</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror

                        <label for="3" class="form-label fw-bold pt-4">@lang('web.subject')</label>
                        <input id="subject" type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" value="{{ old('subject') }}" required autocomplete="subject">

                        @error('subject')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror

                        <label for="4" class="form-label fw-bold pt-4">@lang('web.message')</label>
                        <textarea id="message" class="form-control @error('message') is-invalid @enderror" name="details" required autocomplete="new-password"></textarea>

                        @error('message')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror


                        <button type="submit" class="btn btn-submit hvr-sweep-to-left">@lang('web.send')</button>
                    </form>
                </div>
            </div>

        </div>
    </section>

@endsection
