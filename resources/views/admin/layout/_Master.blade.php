<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin管理系統</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/template/AdminLTE-310/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
          href="/template/AdminLTE-310/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/template/AdminLTE-310/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="/template/AdminLTE-310/plugins/jqvmap/jqvmap.min.css">

    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/template/AdminLTE-310/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/template/AdminLTE-310/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="/template/AdminLTE-310/plugins/summernote/summernote-bs4.min.css">

{{--    <link rel="stylesheet" href="/template/Admin/css/global.css">--}}
    <!-- select2 -->
    <link rel="stylesheet" href="/template/AdminLTE-310/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/template/AdminLTE-310/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="/template/AdminLTE-310/dist/css/adminlte.min.css">

    @yield("HeaderCSS")
</head>

<body class="sidebar-mini">
<div class="wrapper">


    @include('/admin/include/_Nav')
    @include('/admin/include/_Aside')



    <div class="content-wrapper">
        @yield('Content')
    </div>

    <footer class="main-footer d-print-none">
        <div class="float-right">
            <b>Admin管理系統</b>
        </div>
    </footer>

</div>

<!-- jQuery -->
<script src="/template/AdminLTE-310/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/template/AdminLTE-310/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- Bootstrap 4 -->
<script src="/template/AdminLTE-310/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="/template/AdminLTE-310/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="/template/AdminLTE-310/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="/template/AdminLTE-310/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/template/AdminLTE-310/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="/template/AdminLTE-310/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/template/AdminLTE-310/plugins/moment/moment.min.js"></script>
<script src="/template/AdminLTE-310/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/template/AdminLTE-310/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="/template/AdminLTE-310/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/template/AdminLTE-310/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<script src="/template/AdminLTE-310/dist/js/adminlte.js?v=3.2.0"></script>
<!-- select2 -->
<script src="/template/AdminLTE-310/plugins/select2/js/select2.full.min.js"></script>

@yield("BodyJavascript")
<script>
    {{--統一開啟的JS--}}
    //Initialize Select2 Elements
    $('.select2').select2()
    //Initialize Select2 Elements
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })
</script>
</body>

</html>
