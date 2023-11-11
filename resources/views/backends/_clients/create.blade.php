@extends('backends.layouts.master')
@push('title')
{{ __('User') }} / {{ __('Create') }}
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
                <a href="{{ route('admin._client') }}" class="btn btn-sm btn-danger">
                    <i class="fa fa-reply"></i>
                    {{ __('Back') }}
                </a>
            </div>
        </div>
        <form action="{{ route('admin._client.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-4 mb-3">
                    <label for="name">{{__('Name')}}</label>
                    <input type="text" class="form-control" name="name" id="name" required>
                </div>
                <div class="col-4 mb-3">
                    <label for="website">{{__('Website')}}</label>
                    <input type="text" class="form-control" name="website" id="website" required>
                </div>
                <div class="col-4 mb-3">
                    <label for="photo">{{__('Logo')}}</label>
                    <input type="file" class="form-control" name="logo" id="photo">
                </div>
                <div class="col-4 mb-3">
                    <label for="is_public">{{__('Public')}} ?</label>
                    <select name="is_public" id="is_public" class="form-control">
                        <option value="0">{{__('No')}}</option>
                        <option value="1" selected>{{__('Yes')}}</option>
                    </select>
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
</script>
@endpush