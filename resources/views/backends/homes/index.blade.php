@extends('backends.layouts.master')
@push('title')
{{ __('Home Page') }}
@endpush

@section('content-body')
@include('backends.alerts.index')
<h2>Hello</h2>
@endsection