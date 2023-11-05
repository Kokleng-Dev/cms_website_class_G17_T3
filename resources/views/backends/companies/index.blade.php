@extends('backends.layouts.master')
@push('title')
{{ __('Company') }}
@endpush
@push('css')
<style>
    .table tr td {
        vertical-align: middle !important;
    }
</style>
@endpush
@section('content-body')
<div class="card">
    <div class="card-header">
        <h2 class="m-0 text-primary">
            <i class="fa fa-user"></i> {{ __('Company') }}
        </h2>
    </div>
    <div class="card-body">
        {{-- @if(checkPermission('company','create'))
            <a href="{{ route('admin.company.create') }}" class="btn btn-sm btn-primary">
                <i class="fa fa-plus-circle"></i> {{ __('Create') }}
            </a>
            <br> <br>
        @endif --}}
        @include('backends.alerts.index')
        <div class="table-responsive">
            <table class="table table-sm table-bordered text-center" style="vertical-align: middle">
                <thead>
                    <tr>
                        <th>{{__("ID")}}</th>
                        <th>{{__("Name")}}</th>
                        <th>{{__("Phone")}}</th>
                        <th>{{__("Email")}}</th>
                        <th style="min-width: 250px">{{__("Address")}}</th>
                        <th>{{__("Facebook")}}</th>
                        <th>{{__("Twitter")}}</th>
                        <th>{{__("Instagram")}}</th>
                        <th>{{__("Linkedin")}}</th>
                        <th>{{__("Skpe")}}</th>
                        <th style="min-width:100px">{{__("Logo")}}</th>
                        <th style="min-width: 100px">{{__('Action')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($companies as $key => $company)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $company->name }}</td>
                            <td>{{ $company->phone }}</td>
                            <td>{{ $company->email }}</td>
                            <td>{{ $company->address }}</td>
                            <td><a href="{{ $company->facebook }}">Go</a></td>
                            <td><a href="{{ $company->twitter }}">Go</a></td>
                            <td><a href="{{ $company->instagram }}">Go</a></td>
                            <td><a href="{{ $company->linkedin }}">Go</a></td>
                            <td><a href="{{ $company->skype }}">Go</a></td>
                            <td>
                                <img src="{{ asset($company->logo) }}" alt="logo" width="50" height="50">
                            </td>
                            <td>
                                @if(checkPermission('company','edit'))
                                    <a href="{{ route('admin.company.edit', $company->id) }}" class="btn btn-sm btn-success">
                                        <i class="fa fa-edit"></i> {{ __('Edit') }}
                                    </a>
                                @endif
                                {{-- @if(checkPermission('company','delete'))
                                    <button class="btn btn-sm btn-danger" type="button" onclick="deleteItem('{{ route('admin.company.delete',$company->id) }}')">
                                        <i class="fa fa-trash"></i> {{ __('Delete') }}
                                    </button>
                                @endif --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    $('#setting').addClass('menu-is-opening menu-open');
    $('#setting > a').addClass('active');
    $('#company').addClass('active');
</script>
@endpush