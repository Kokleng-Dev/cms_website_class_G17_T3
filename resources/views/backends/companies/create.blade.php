@extends('backends.layouts.master')
@push('title')
{{ __('Company') }} / {{ __('Create') }}
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
        <div class="row">
            <div class="col-12 mb-3">
                <a href="{{ route('admin.company') }}" class="btn btn-sm btn-danger">
                    <i class="fa fa-reply"></i>
                    {{ __('Back') }}
                </a>
            </div>
        </div>
        <form action="{{ route('admin.company.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-4 mb-3">
                    <label for="name">{{__('Name')}}</label>
                    <input type="text" class="form-control" name="name" id="name" required>
                </div>
                <div class="col-4 mb-3">
                    <label for="phone">{{__('Phone')}}</label>
                    <input type="text" class="form-control" name="phone" id="phone">
                </div>
                <div class="col-4 mb-3">
                    <label for="address">{{__('Address')}}</label>
                    <input type="text" class="form-control" name="address" id="address">
                </div>
                <div class="col-4 mb-3">
                    <label for="location">{{__('Location')}}</label>
                    <input type="text" class="form-control" name="location" id="location">
                </div>
                <div class="col-4 mb-3">
                    <label for="email">{{__('Email')}}</label>
                    <input type="text" class="form-control" name="email" id="email">
                </div>
                <div class="col-4 mb-3">
                    <label for="google_map">{{__('Google Map')}}</label>
                    <input type="text" class="form-control" name="google_map" id="google_map">
                </div>
                <div class="col-4 mb-3">
                    <label for="facebook">{{__('Facebook')}}</label>
                    <input type="text" class="form-control" name="facebook" id="facebook">
                </div>
                <div class="col-4 mb-3">
                    <label for="instagram">{{__('Instagram')}}</label>
                    <input type="text" class="form-control" name="instagram" id="instagram">
                </div>
                <div class="col-4 mb-3">
                    <label for="twitter">{{__('Twitter')}}</label>
                    <input type="text" class="form-control" name="twitter" id="twitter">
                </div>
                <div class="col-4 mb-3">
                    <label for="linkedin">{{__('Linkedin')}}</label>
                    <input type="text" class="form-control" name="linkedin" id="linkedin">
                </div>
                <div class="col-4 mb-3">
                    <label for="skype">{{__('Skype')}}</label>
                    <input type="text" class="form-control" name="skype" id="skype">
                </div>
                <div class="col-4 mb-3">
                    <label for="logo">{{__('Logo')}}</label>
                    <input type="file" class="form-control" name="logo" id="logo">
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