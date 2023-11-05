<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="../../index3.html" class="brand-link">
        <img src="{{ asset(company()->logo) }}" alt="Logo"
            class="elevation-3 rounded-circle mx-2" style="opacity: .8" width="38" height="38">
        <span class="brand-text font-weight-light">{{ company()->name }}</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset( profile()->photo ) }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ profile()->name }}</a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.home') }}" class="nav-link {{ Route::is('admin.home') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-home"></i>
                        <p>{{__('Home')}}</p>
                    </a>
                </li>
                <li class="nav-item" id="setting">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tools"></i>
                        <p>
                            {{ __('Setting') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if(checkPermission('user','view'))
                            <li class="nav-item">
                                <a href="{{ route('admin.user') }}" class="nav-link" id="user">
                                    <i class="nav-icon fas fa-ellipsis-h"></i>
                                    <p>{{ __('User') }}</p>
                                </a>
                            </li>
                        @endif
                        @if(checkPermission('role','view'))
                        <li class="nav-item">
                            <a href="{{ route('admin.role') }}" class="nav-link" id="role">
                                <i class="nav-icon fas fa-ellipsis-h"></i>
                                <p>{{ __('Role') }}</p>
                            </a>
                        </li>
                        @endif
                        @if(profile()->id == 1)
                            <li class="nav-item">
                                <a href="{{ route('admin.permission') }}" class="nav-link" id="permission">
                                    <i class="nav-icon fas fa-ellipsis-h"></i>
                                    <p>{{ __('Permission') }}</p>
                                </a>
                            </li>
                        @endif
                        @if(checkPermission('company','view'))
                            <li class="nav-item">
                                <a href="{{ route('admin.company') }}" class="nav-link" id="company">
                                    <i class="nav-icon fas fa-ellipsis-h"></i>
                                    <p>{{ __('Company') }}</p>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
                {{-- <li class="nav-item">
                    <a href="../widgets.html" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Widgets
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li> --}}
                {{-- <li class="nav-header">MISCELLANEOUS</li>
                <li class="nav-item">
                    <a href="../../iframe.html" class="nav-link">
                        <i class="nav-icon fas fa-ellipsis-h"></i>
                        <p>Tabbed IFrame Plugin</p>
                    </a>
                </li> --}}
            </ul>
        </nav>

    </div>

</aside>