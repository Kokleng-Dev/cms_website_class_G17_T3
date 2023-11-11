@extends('frontends.layouts.master')
@push('title')
{{ company()->name }}
@endpush

@section('content')
    @include('frontends.homes.1_about')
    @include('frontends.homes.2_client')
    {{-- @include('frontends.homes.3_feature') --}}
    @include('frontends.homes.4_service')
    @include('frontends.homes.5_cta')
    @include('frontends.homes.6_portfolio')
    @include('frontends.homes.7_count')
    @include('frontends.homes.8_testimonial')
    @include('frontends.homes.9_team')
    @include('frontends.homes.10_contact')
@endsection