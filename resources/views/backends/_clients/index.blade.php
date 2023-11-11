@extends('backends.layouts.master')
@push('title')
{{ __('Client Section') }}
@endpush

@section('content-body')
<div class="card">
    <div class="card-header">
        <h2 class="m-0 text-primary">
            <i class="fa fa-user"></i> {{ __('Client Section') }}
        </h2>
    </div>
    <div class="card-body">
        @if(checkPermission('_client','create'))
            <a href="{{ route('admin._client.create') }}" class="btn btn-sm btn-primary">
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
                    <th>{{__("Name")}}</th>
                    <th>{{__('Website')}}</th>
                    <th style="width: 300px">{{__('Action')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $key => $data)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td><img src="{{ asset($data->logo) }}" alt="" width="100"></td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->website }}</td>
                        <td>
                            @if(checkPermission('_client','edit'))
                                <a href="{{ route('admin._client.edit', $data->id) }}" class="btn btn-sm btn-success">
                                    <i class="fa fa-edit"></i> {{ __('Edit') }}
                                </a>
                            @endif
                            @if(checkPermission('_client','delete'))
                                <button class="btn btn-sm btn-danger" type="button" onclick="deleteItem('{{ route('admin._client.delete',$data->id) }}')">
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
                {{ $datas->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
@endpush