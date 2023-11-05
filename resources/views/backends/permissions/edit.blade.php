@extends('backends.layouts.master')
@push('title')
{{ __('Permission') }} / {{ __('Edit') }}
@endpush

@section('content-body')
<div class="card">
    <div class="card-header">
        <h4 class="m-0 text-primary">
            <i class="fa fa-edit"></i>
            {{ __('Edit') }}
        </h4>
    </div>
    <div class="card-body">
        @include('backends.alerts.index')
        <div class="row">
            <div class="col-12 mb-3">
                <a href="{{ route('admin.permission') }}" class="btn btn-sm btn-danger">
                    <i class="fa fa-reply"></i>
                    {{ __('Back') }}
                </a>
            </div>
        </div>
        <form action="{{ route('admin.permission.update', $permission->id) }}" method="post">
            @csrf

            <div class="row">
                <div class="col-4 mb-3">
                    <label for="name">{{__('Name')}}</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $permission->name }}" required>
                </div>
                <div class="col-4 mb-3">
                    <label for="key">{{__('Key')}}</label>
                    <input type="text" class="form-control" name="key" id="key" value="{{ $permission->key }}">
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
    $('#user').addClass('active');
</script>
@endpush