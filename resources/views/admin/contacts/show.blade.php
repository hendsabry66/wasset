@extends('admin.layouts.master')
@section('breadcrumb')
    <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block"> @lang('admin.contacts')</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}"> @lang('admin.dashboard')</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{route('contacts.index')}}"> @lang('admin.contacts')</a>
                    </li>
{{--                    <li class="breadcrumb-item active">  @lang('admin.addPage')--}}
{{--                    </li>--}}
                </ol>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <section id="horizontal-form-layouts">
        <div class="row match-height">
            <div class=" col-sm-12">
                <div class="card" style="height: 399.797px;">
                    <div class="card-content">
                        <div class="card-body">
                            <h4 class="card-title"># {{$contact->id}}  -  {{$contact->subject}}</h4>
                            <p class="card-text"><span>@lang('admin.name') :- </span>{!! $contact->name !!}</p>
                            <p class="card-text"><span>@lang('admin.email') :- </span>{!! $contact->email !!}</p>
                            <p class="card-text"><span>@lang('admin.details') :- </span>{!! $contact->details !!}</p>
                            <p class="card-text"><span>  @lang('admin.type') :- </span>
                                @if($contact->type == 'issue')
                                    <span class="badge badge-success">@lang('admin.issue')</span>
                                @else
                                    <span class="badge badge-danger">@lang('admin.compliance')</span>
                                @endif
                            </p>
                            <p class="card-text"><span>  @lang('admin.status') :- </span>
                                @if($contact->status == 'sent')
                                    <span class="badge badge-success">@lang('admin.sent')</span>
                                @elseif($contact->status == 'seen')
                                    <span class="badge badge-success">@lang('admin.seen')</span>
                                @else
                                    <span class="badge badge-danger">@lang('admin.replied')</span>
                                @endif
                            </p>
{{--                            <a href="{{route('contacts.edit',$contact->id)}}" class="btn btn-outline-teal">@lang('admin.edit')</a>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>

@endsection
