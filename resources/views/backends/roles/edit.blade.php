@extends('backends.layouts.master')
@push('title')
{{ __('User') }} / {{ __('Edit') }}
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
        <div class="row">
            <div class="col-12 mb-3">
                <a href="{{ route('admin.user') }}" class="btn btn-sm btn-danger">
                    <i class="fa fa-reply"></i>
                    {{ __('Back') }}
                </a>
            </div>
        </div>
        <form action="{{ route('admin.role.update', $role->id) }}" method="post">
            @csrf

            <div class="row">
                <div class="col-4 mb-3">
                    <label for="name">{{__('Name')}}</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $role->name }}" required>
                </div>
                <div class="col-4 mb-3">
                    <label for="note">{{__('Note')}}</label>
                    <input type="text" class="form-control" name="note" id="note" value="{{ $role->note }}">
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