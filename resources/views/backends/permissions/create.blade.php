@extends('backends.layouts.master')
@push('title')
{{ __('Permission') }} / {{ __('Create') }}
@endpush

@section('content-body')
<div class="card">
    <div class="card-header">
        <h4 class="m-0 text-primary">
            <i class="fa fa-plus-circle"></i>
            {{ __('Create') }}
        </h4>
    </div>
    <div class="card-body">
        @include('backends.alerts.index')
        <div class="row">
            <div class="col-12 mb-3">
                <a href="{{ route('admin.user') }}" class="btn btn-sm btn-danger">
                    <i class="fa fa-reply"></i>
                    {{ __('Back') }}
                </a>
            </div>
        </div>
        <form action="{{ route('admin.permission.store') }}" method="post">
            @csrf

            <div class="row">
                <div class="col-4 mb-3">
                    <label for="name">{{__('Name')}}</label>
                    <input type="text" class="form-control" name="name" id="name" required>
                </div>
                <div class="col-4 mb-3">
                    <label for="key">{{__('Key')}}</label>
                    <input type="text" class="form-control" name="key" id="key" required>
                </div>
                <div class="col-12 mb-3">
                    <button class="btn btn-sm btn-primary">
                        <i class="fa fa-save"></i>
                        {{ __('Submit') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@push('js')
<script>
    $('#setting').addClass('menu-is-opening menu-open');
    $('#setting > a').addClass('active');
    $('#permission').addClass('active');
</script>
@endpush