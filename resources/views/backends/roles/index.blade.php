@extends('backends.layouts.master')
@push('title')
{{ __('Role') }}
@endpush

@section('content-body')
<div class="card">
    <div class="card-header">
        <h2 class="m-0 text-primary">
            <i class="fa fa-user"></i> {{ __('Role') }}
        </h2>
    </div>
    <div class="card-body">
        @if(checkPermission('role','create'))
            <a href="{{ route('admin.role.create') }}" class="btn btn-sm btn-primary">
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
                    <th style="width: 300px">{{__('Action')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $key => $role)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->note }}</td>
                        <td>
                            @if(checkPermission('role','edit'))
                                <a href="{{ route('admin.role_permission', $role->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fa fa-cogs"></i> {{ __('Permission') }}
                                </a>
                                <a href="{{ route('admin.role.edit', $role->id) }}" class="btn btn-sm btn-success">
                                    <i class="fa fa-edit"></i> {{ __('Edit') }}
                                </a>
                            @endif
                            @if(checkPermission('role','delete'))
                                <button class="btn btn-sm btn-danger" type="button" onclick="deleteItem('{{ route('admin.role.delete',$role->id) }}')">
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
                {{ $roles->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    $('#setting').addClass('menu-is-opening menu-open');
    $('#setting > a').addClass('active');
    $('#role').addClass('active');
</script>
@endpush