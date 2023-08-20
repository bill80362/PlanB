<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>B計畫</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/template/AdminLTE-310/plugins/fontawesome-free/css/all.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/template/AdminLTE-310/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/template/AdminLTE-310/dist/css/adminlte.min.css">

    @yield("HeaderCSS")

</head>
<body class="hold-transition login-page">
<div class="login-box">
    @yield("Content")


</div>

<!-- jQuery -->
<script src="/template/AdminLTE-310/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/template/AdminLTE-310/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/template/AdminLTE-310/dist/js/adminlte.js"></script>


@yield("BodyJavascript")

</body>
</html>
