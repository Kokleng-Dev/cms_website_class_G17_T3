@extends('backends.layouts.master')
@push('title')
{{ __('Hero Section') }}
@endpush

@section('content-body')
<div class="card">
    <div class="card-header">
        <h2 class="m-0 text-primary">
            <i class="fa fa-info"></i> {{ __('Hero Section') }}
        </h2>
    </div>
    <div class="card-body">
        @if(checkPermission('_hero','create'))
            <a href="{{ route('admin._hero.create') }}" class="btn btn-sm btn-primary">
                <i class="fa fa-plus-circle"></i> {{ __('Create') }}
            </a>
            <br> <br>
        @endif
        @include('backends.alerts.index')
        <table class="table table-sm table-bordered text-center">
            <thead>
                <tr>
                    <th>{{__("ID")}}</th>
                    <th>{{__("Name")}}</th>
                    <th>{{__('Note')}}</th>
                    <th>{{__('Public')}}</th>
                    <th style="width: 300px">{{__('Action')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $key => $data)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->note }}</td>
                        <td>
                            @if($data->is_public)
                                <span class="badge bg-primary">Yes</span>
                            @else
                                <span class="badge bg-danger">No</span>
                            @endif
                        </td>
                        <td>
                            @if(checkPermission('_hero_detail','view'))
                                <a href="{{ route('admin._hero.detail', $data->id) }}" class="btn btn-sm btn-success">
                                    <i class="fa fa-eye"></i> {{ __('View Detail') }}
                                </a>
                            @endif
                            @if(checkPermission('_hero','edit'))
                                <a href="{{ route('admin._hero.edit', $data->id) }}" class="btn btn-sm btn-success">
                                    <i class="fa fa-edit"></i> {{ __('Edit') }}
                                </a>
                            @endif
                            @if(checkPermission('_hero','delete'))
                                <button class="btn btn-sm btn-danger" type="button" onclick="deleteItem('{{ route('admin._hero.delete',$data->id) }}')">
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