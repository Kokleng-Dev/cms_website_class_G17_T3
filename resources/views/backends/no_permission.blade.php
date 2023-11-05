@extends('backends.layouts.master')
@push('title')
{{ __('Role') }}
@endpush

@section('content-body')
<div class="card">
    <div class="card-header">
        <h2 class="m-0 text-danger">
            <i class="fa fa-times"></i> {{ __('No Permission') }}
        </h2>
    </div>
    <div class="card-body">
        <h2>No Permission</h2>
    </div>
</div>
@endsection