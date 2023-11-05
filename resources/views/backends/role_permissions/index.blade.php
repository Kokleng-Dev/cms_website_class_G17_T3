@extends('backends.layouts.master')
@push('title')
{{ __('Role Permission') }}
@endpush

@section('content-body')
<div class="card">
    <div class="card-header">
        <h2 class="m-0 text-primary">
            <i class="fa fa-cogs"></i> {{ __('Role Permission') }}
        </h2>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 mb-3">
                <a href="{{ route('admin.role') }}" class="btn btn-sm btn-danger">
                    <i class="fa fa-reply"></i>
                    {{ __('Back') }}
                </a>
            </div>
        </div>
        @include('backends.alerts.index')
        <form action="{{ route('admin.role_permission.action', $role_id) }}" method="POST">
            @csrf
            <table class="table table-sm table-bordered text-center">
                <thead>
                    <tr>
                        <th>{{__("ID")}}</th>
                        <th>{{__("Name")}}</th>
                        <th>{{__("View")}}</th>
                        <th>{{__("Create")}}</th>
                        <th>{{__("Edit")}}</th>
                        <th>{{__("Delete")}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($role_permissions as $index => $role_permission)
                        <input type="hidden" value="{{ $role_permission->id }}" name="role_permission[{{ $index }}][role_permission_id]">
                        <input type="hidden" value="{{ $role_permission->permission_id }}" name="role_permission[{{ $index }}][permission_id]">
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $role_permission->name }}</td>
                            <td>
                                <input type="checkbox" name="role_permission[{{ $index }}][view]" value="1" {{ $role_permission->view == 1 ? 'checked' : '' }}>
                            </td>
                            <td>
                                <input type="checkbox" name="role_permission[{{ $index }}][create]" value="1" {{ $role_permission->create == 1 ? 'checked' : '' }}>
                            </td>
                            <td>
                                <input type="checkbox" name="role_permission[{{ $index }}][edit]" value="1" {{ $role_permission->edit == 1 ? 'checked' : '' }}>
                            </td>
                            <td>
                                <input type="checkbox" name="role_permission[{{ $index }}][delete]" value="1" {{ $role_permission->delete == 1 ? 'checked' : '' }}>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <button class="btn btn-primary float-right"><i class="fa fa-save"></i> Submit</button>
        </form>
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