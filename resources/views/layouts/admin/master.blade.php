<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="/admin" class="nav-link">Home</a>
            </li>

        </ul>


    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/admin" class="brand-link">
            <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Alexander Pierce</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->

                    <li class="nav-item">
                        <a href="{{ route('requesters')  }}" class="nav-link">
                            <i class="nav-icon fa fa-th"></i>
                            <p>
                                Requesters
                            </p>
                        </a>
                    </li><li class="nav-item">
                        <a href="{{ route('requests') }}" class="nav-link">
                            <i class="nav-icon fa fa-th"></i>
                            <p>
                                Submitted Requests
                            </p>
                        </a>
                    </li><li class="nav-item">
                        <a href="{{ route('receiver.types') }}" class="nav-link">
                            <i class="nav-icon fa fa-th"></i>
                            <p>
                                Receiver Types
                            </p>
                        </a>
                    </li><li class="nav-item">
                        <a href="{{ route('receiver.sub.types') }}" class="nav-link">
                            <i class="nav-icon fa fa-th"></i>
                            <p>
                                Receiver Sub Type
                            </p>
                        </a>
                    </li><li class="nav-item">
                        <a href="{{ route('receivers') }}" class="nav-link">
                            <i class="nav-icon fa fa-th"></i>
                            <p>
                                Receivers
                            </p>
                        </a>
                    </li><li class="nav-item">
                        <a href="{{ route('lines') }}" class="nav-link">
                            <i class="nav-icon fa fa-th"></i>
                            <p>
                                Request Lines
                            </p>
                        </a>
                    </li><li class="nav-item">
                        <a href="{{ route('links') }}" class="nav-link">
                            <i class="nav-icon fa fa-th"></i>
                            <p>
                                Request Links
                            </p>
                        </a>
                    </li><li class="nav-item">
                        <a href="{{ route('advertisers') }}" class="nav-link">
                            <i class="nav-icon fa fa-th"></i>
                            <p>
                                Advertisers
                            </p>
                        </a>
                    </li><li class="nav-item">
                        <a href="{{ route('companies') }}" class="nav-link">
                            <i class="nav-icon fa fa-th"></i>
                            <p>
                                Receiver Companies
                            </p>
                        </a>
                    </li><li class="nav-item">
                        <a href="{{ route('priorities') }}" class="nav-link">
                            <i class="nav-icon fa fa-th"></i>
                            <p>
                                Priorities
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('states') }}" class="nav-link">
                            <i class="nav-icon fa fa-th"></i>
                            <p>
                                States
                            </p>
                        </a>
                    </li><li class="nav-item">
                        <a href="{{ route('towns') }}" class="nav-link">
                            <i class="nav-icon fa fa-th"></i>
                            <p>
                                Towns
                            </p>
                        </a>
                    </li><li class="nav-item">
                        <a href="{{ route('backgrounds') }}" class="nav-link">
                            <i class="nav-icon fa fa-th"></i>
                            <p>
                                Background Images
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="flash-message">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))
                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
                @endif
            @endforeach
        </div>


        @yield('content')
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2014-2018 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>
</div>
<!-- ./wrapper -->

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>