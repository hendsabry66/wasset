
@extends('web.layouts.master')
@section('content')

        <div class="row justify-content-center">
            <div class="col-lg-10">

                <div class="message-single">
                    <p>رسالة خاصة</p>
                    @foreach($messages as $message)
                         <div class="card mb-3">
                        <div class="card-header">
                            <p>المرسل: <a href=""><i class="fas fa-user"></i> {{$message->user->name}}</a></p>
                            <p>{{\Carbon\Carbon::parse($message->created_at)}}</p>
                        </div>
                        <div class="card-body">
                            <p>
                                {{$message->message}}
                            </p>
                        </div>
                    </div>
                    @endforeach


                    <div class="card mb-3">
                        <div class="card-body">
                            <form  action="{{LaravelLocalization::localizeUrl('sendMessage')}}" method="post">
                                @csrf
                                @if($conversation->sender_id == auth()->user()->id)
                                    <input type="hidden" name="reciver_id" value="{{$conversation->reciver_id}}">
                                @else
                                    <input type="hidden" name="reciver_id" value="{{$conversation->sender_id}}">
                                @endif

                                <textarea name="message" class="form-control" placeholder="اكتب رد"></textarea>
                                <input class="btn btn-primary mt-3" name="submit" value="إرســـال" type="submit">
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

  @endsection
