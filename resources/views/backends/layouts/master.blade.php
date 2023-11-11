<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@stack('title')</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}?v=3.2.0">
    <style>
        table tr td, table tr th {
            vertical-align: middle !important
        }
    </style>
    @stack('css')
</head>

<body class="hold-transition sidebar-mini">

    <div class="wrapper">

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"
                        role="button">
                    </a>
                </li> --}}
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-th-large"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fa fa-user mr-2"></i> {{ __('My Profile') }}
                        </a>
                        <div class="dropdown-divider"></div>
                        <button type="button" onclick="logout()" class="dropdown-item text-danger">
                            <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                        </button>
                    </div>
                </li>
            </ul>
        </nav>


        @include('backends.layouts.sidebar')

        <div class="content-wrapper">

            <section class="content-header">
                <div class="container-fluid">
                    @yield('content-header')
                </div>
            </section>

            <section class="content">
                @yield('content-body')
            </section>
        </div>

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.2.0
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>

        {{-- <aside class="control-sidebar control-sidebar-dark">

        </aside> --}}

    </div>


    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>

    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}?v=3.2.0"></script>

    {{-- <script src="{{ asset('adminlte/dist/js/demo.js') }}"></script> --}}
    <script>
        function logout(){
            let url = "{{ route('admin.logout') }}";
            let c = confirm('Are you sure ?');
            if(c){
                window.location.href = url;
            }
        }

        function deleteItem(url){
            let c = confirm('Are you sure ?');
            if(c){
                window.location.href = url;
            }
        }
    </script>
    @stack('js')
</body>

</html>
