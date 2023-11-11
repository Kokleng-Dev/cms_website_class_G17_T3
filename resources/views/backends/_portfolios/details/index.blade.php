@extends('backends.layouts.master')
@push('title')
{{ __('Portfolio Section') }}
@endpush

@section('content-body')
<div class="card">
    <div class="card-header">
        <h2 class="m-0 text-primary">
            <i class="fa fa-info"></i> {{ __('Portfolio Section') }}
        </h2>
    </div>
    <div class="card-body">
        {{-- @if(checkPermission('_portfolio','create'))
            <a href="{{ route('admin._portfolio.create') }}" class="btn btn-sm btn-primary">
                <i class="fa fa-plus-circle"></i> {{ __('Create') }}
            </a>
            <br> <br>
        @endif --}}
        @include('backends.alerts.index')
        <h1>Hello</h1>
    </div>
</div>
@endsection

@push('js')
@endpush