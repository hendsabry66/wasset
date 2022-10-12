
@extends('web.layouts.master')
@section('content')
<main class="pt-4 pb-4">
    @if(session()->has('success'))
    <div class="alert alert-success text-center">
    {{ session()->get('success') }}
    </div>
    @endif
    <section id="messages">
        <div class="container">
            <h3 class="fw-bold text-center mt-3 mb-3">الرسائل</h3>
            @foreach($conversations as $conversation)

            <div class="row justify-content-md-center align-items-center border-bottom pt-3 pb-2">
                <div class="col-11 col-md-7">
                    <img src="{{asset('web/assets/images/user.png')}}" class="float-start" alt="...">
                    <h6><a href="{{url('userProfile/'.$conversation['user']['id'])}}" title="...">{{$conversation['user']['name']}}</a></h6>
                    <h5><a href="{{url('conversation/'.$conversation->id)}}" title="...">{{$conversation->latest_message->message}}</a></h5>
                    <p class="text-muted">{{\Carbon\Carbon::parse($conversation->latest_message->created_at)->diffForHumans()}}</p>
                </div>
                <div class="col-1"><a href="{{url('deleteConversation/'.$conversation->id)}}" class="text-muted"><i class="fa fa-trash-can"></i></a></div>
            </div>
            @endforeach



        </div>
    </section>

</main>
    @endsection

