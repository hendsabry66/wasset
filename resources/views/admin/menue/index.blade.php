@extends('admin.layouts.master')
@section('content')
    {!! Menu::render() !!}
@endsection
@push('scripts')
    {!! Menu::scripts() !!}
@endpush
