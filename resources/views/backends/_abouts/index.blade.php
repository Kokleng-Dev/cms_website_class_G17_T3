@extends('backends.layouts.master')
@push('title')
{{ __('About Section') }}
@endpush

@section('content-body')
<div class="card">
    <div class="card-header">
        <h2 class="m-0 text-primary">
            <i class="fa fa-user"></i> {{ __('About Section') }}
        </h2>
    </div>
    <div class="card-body">
        @if(checkPermission('_about','create'))
            <a href="{{ route('admin._about.create') }}" class="btn btn-sm btn-primary">
                <i class="fa fa-plus-circle"></i> {{ __('Create') }}
            </a>
            <br> <br>
        @endif
        @include('backends.alerts.index')
        <table class="table table-sm table-bordered text-center">
            <thead>
                <tr>
                    <th>{{__("ID")}}</th>
                    <th>{{__("Photo")}}</th>
                    <th>{{__("Title 1")}}</th>
                    <th>{{__("Title 2")}}</th>
                    <th>{{__("Public")}}</th>
                    <th>{{__('Note')}}</th>
                    <th style="width: 300px">{{__('Action')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($abouts as $key => $about)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td><img src="{{ asset($about->photo) }}" alt="" width="100"></td>
                        <td>{{ $about->title_1 }}</td>
                        <td>{{ $about->titel_2 }}</td>
                        <td>
                            @if($about->is_public)
                                <span class="badge bg-primary">Yes</span>
                            @else
                                <span class="badge bg-danger">No</span>
                            @endif
                        </td>
                        <td>{{ $about->note }}</td>
                        <td>
                            @if(checkPermission('_about','edit'))
                                <a href="{{ route('admin._about.edit', $about->id) }}" class="btn btn-sm btn-success">
                                    <i class="fa fa-edit"></i> {{ __('Edit') }}
                                </a>
                            @endif
                            @if(checkPermission('_about','delete'))
                                <button class="btn btn-sm btn-danger" type="button" onclick="deleteItem('{{ route('admin._about.delete',$about->id) }}')">
                                    <i class="fa fa-trash"></i> {{ __('Delete') }}
                                </button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row my-2">
            <div class="col-12">
                {{ $abouts->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
@endpush