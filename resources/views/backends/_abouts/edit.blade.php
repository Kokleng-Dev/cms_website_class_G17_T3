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
                <a href="{{ route('admin._about') }}" class="btn btn-sm btn-danger">
                    <i class="fa fa-reply"></i>
                    {{ __('Back') }}
                </a>
            </div>
        </div>
        <form action="{{ route('admin._about.update', $data->id) }}" method="post"  enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-4 mb-3">
                    <label for="title_1">{{__('Title 1')}}</label>
                    <input type="text" class="form-control" name="title_1" value="{{ $data->title_1 }}" id="title_1" required>
                </div>
                <div class="col-4 mb-3">
                    <label for="title_2">{{__('Title 2')}}</label>
                    <input type="text" class="form-control" name="title_2" value="{{ $data->titel_2 }}" id="title_2" required>
                </div>
                <div class="col-4 mb-3">
                    <label for="photo">{{__('Photo')}}</label>
                    <input type="file" class="form-control" name="photo" id="photo">
                </div>
                <div class="col-4 mb-3">
                    <label for="is_public">{{__('Public')}} ?</label>
                    <select name="is_public" id="is_public" class="form-control">
                        <option value="0">{{__('No')}}</option>
                        <option value="1" {{ $data->is_public == 1 ? 'selected' : '' }}>{{__('Yes')}}</option>
                    </select>
                </div>
                <div class="col-4 mb-3">
                    <label for="note">{{__('Note')}}</label>
                    <input type="text" class="form-control" name="note" id="note">
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