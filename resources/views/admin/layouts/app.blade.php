<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'GUI') }}</title>
    <!-- Google Font: Source Sans Pro -->
    <link href='https://fonts.googleapis.com/css?family=Manrope' rel='stylesheet'>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('themes/default/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('themes/default/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('themes/default/dist/css/cmsadmin.min.css')}}">
    <!-- Bootstrap 5.3.2 -->
    <link rel="stylesheet" href="{{asset('themes/default/dist/css/bootstrap.min.css')}}">
    <!-- admin custom css -->
    <link rel="stylesheet" href="{{asset('themes/default/css/admin-custom.css')}}">

    <link rel="stylesheet" href="{{asset('themes/default/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.min.css')}}">
    @yield('css')
    <!-- Scripts -->
    <!-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) -->
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">



    @include('admin.layouts.preloader.preloader')

    @include('admin.layouts.headers.header')

    @include('admin.layouts.sidebars.sidebar')

    <div class="content-wrapper vh-100 mt-5">
        @yield('content')
    </div>

    @include('admin.layouts.control_sidebar.control_sidebar')

    @include('admin.layouts.footers.footer')
</div>

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="{{asset('themes/default/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('themes/default/plugins/jquery-ui/jquery-ui.js')}}"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="{{asset('themes/default/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
    <script src="{{asset('themes/default/plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('themes/default/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
    <script src="{{asset('themes/default/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>

    <!-- ChartJS -->
    <script src="{{asset('themes/default/plugins/chart.js/Chart.min.js')}}"></script>

    <!-- Bootstrap 5.3.2-->
    <script src="{{asset('themes/default/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset('themes/default/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('themes/default/dist/js/cmsadmin.js')}}"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="{{asset('themes/default/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
    <script src="{{asset('themes/default/plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('themes/default/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
    <script src="{{asset('themes/default/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
    <!-- ChartJS -->
    <script src="{{asset('themes/default/plugins/chart.js/Chart.min.js')}}"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('themes/default/dist/js/cms.js')}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset('themes/default/dist/js/pages/dashboard2.js')}}"></script>
    <!-- Custom javascript jquery -->
    <script src="{{asset('themes/default/js/admin-custom.js')}}"></script>
    <!--Tags -->
    <script src="{{asset('themes/default/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js')}}"></script>

    @yield('scripts')


</body>

</html>
