@extends('backends.layouts.master')
@push('title')
{{ __('Permission') }}
@endpush

@section('content-body')
<div class="card">
    <div class="card-header">
        <h2 class="m-0 text-primary">
            <i class="fa fa-cogs"></i> {{ __('Permission') }}
        </h2>
    </div>
    <div class="card-body">
        <a href="{{ route('admin.permission.create') }}" class="btn btn-sm btn-primary">
            <i class="fa fa-plus-circle"></i> {{ __('Create') }}
        </a>
        <br> <br>
        @include('backends.alerts.index')
        <table class="table table-sm table-bordered text-center">
            <thead>
                <tr>
                    <th>{{__("ID")}}</th>
                    <th>{{__("Name")}}</th>
                    <th>{{__("Key")}}</th>
                    <th style="width: 200px">{{__('Action')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $key => $permission)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->key }}</td>
                        <td>
                            <a href="{{ route('admin.permission.edit', $permission->id) }}" class="btn btn-sm btn-success">
                                <i class="fa fa-edit"></i> {{ __('Edit') }}
                            </a>
                            <button class="btn btn-sm btn-danger" type="button" onclick="deleteItem('{{ route('admin.permission.delete',$permission->id) }}')">
                                <i class="fa fa-trash"></i> {{ __('Delete') }}
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row my-2">
            <div class="col-12">
                {{ $permissions->links() }}
            </div>
        </div>
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