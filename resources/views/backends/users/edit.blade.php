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
        <form action="{{ route('admin.user.update', $user->id) }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-4 mb-3">
                    <label for="name">{{__('Name')}}</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}" required>
                </div>
                <div class="col-4 mb-3">
                    <label for="email">{{__('Email')}}</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}" required>
                </div>
                <div class="col-4 mb-3">
                    <label for="password">{{__('Password')}}</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <div class="col-4 mb-3">
                    <label for="role">{{__('Role')}}</label>
                    <select name="role_id" id="role" class="form-control" required>
                        <option value="">{{__("Please Select")}}</option>
                        @foreach ($roles as $role)
                            <option {{ $role->id == $user->role_id ? 'selected' : ''}} value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-4 mb-3">
                    <label for="file">{{__('Photo')}}</label>
                    <input type="file" class="form-control" name="photo" id="file">
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