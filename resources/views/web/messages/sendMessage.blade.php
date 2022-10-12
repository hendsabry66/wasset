@extends('web.layouts.master')
@section('content')

    <div class="row justify-content-center">
        <div class="col-lg-10">
{{--            <h3 class="head-page"><i class="fas fa-user"></i>ارسال رسالة خاصة</h3>--}}
{{--            <hr />--}}
            @if(session()->has('success'))
                <div class="alert alert-success text-center">
                    {{ session()->get('success') }}
                </div>
            @endif
            @if(session()->has('error'))
                <div class="alert alert-danger text-center">
                    {{ session()->get('error') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger text-center">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            @if($user)
                <div class="card mb-3">
                    <div class="card-header">
                        <p class="mp-2">مستلم الرسالة:</p>
                        <p class="m-0"><i class="fas fa-user"></i> {{$user->name}}</p>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{LaravelLocalization::localizeUrl('sendMessage')}}">
                            @csrf
                            <input type="hidden" name="reciver_id" value="{{$user->id}}">
                            <textarea name="message" style="min-height: 200px" class="form-control" placeholder="نص الرسالة"></textarea>
                            <button class="button mt-3" type="submit">ارســــال <i class="fas fa-paper-plane"></i></button>
                        </form>
                    </div>
                </div>
            @else
                <p>لا يوجد مستخدم يمكنك مراسلته </p>
            @endif
        </div>
    </div>
@endsection
