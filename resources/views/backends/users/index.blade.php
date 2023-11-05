@extends('backends.layouts.master')
@push('title')
{{ __('User') }}
@endpush

@section('content-body')
<div class="card">
    <div class="card-header">
        <h2 class="m-0 text-primary">
            <i class="fa fa-user"></i> User
        </h2>
    </div>
    <div class="card-body">
        @if(checkPermission('user','create'))
            <a href="{{ route('admin.user.create') }}" class="btn btn-sm btn-primary">
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
                    <th>{{__("Email")}}</th>
                    <th>{{__('Role')}}</th>
                    <th style="width: 200px">{{__('Action')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $key => $user)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role_name }}</td>
                        <td>
                            @if(checkPermission('user','edit'))
                                <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-sm btn-success">
                                    <i class="fa fa-edit"></i> {{ __('Edit') }}
                                </a>
                            @endif
                            @if(checkPermission('user','delete'))
                                <button class="btn btn-sm btn-danger" type="button" onclick="deleteItem('{{ route('admin.user.delete',$user->id) }}')">
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
                {{ $users->links() }}
            </div>
        </div>
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