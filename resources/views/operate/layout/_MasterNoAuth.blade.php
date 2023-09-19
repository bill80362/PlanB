<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Sales</title>

    <link rel="icon" href="/template/Salessa/img/logo.png" type="image/png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/template/Salessa/css/bootstrap.min.css?v={{$SystemConfigService->versionJS}}" />
    <!-- themefy CSS -->
    <link rel="stylesheet" href="/template/Salessa/vendors/themefy_icon/themify-icons.css?v={{$SystemConfigService->versionJS}}" />
    <!-- select2 CSS -->
    <link rel="stylesheet" href="/template/Salessa/vendors/niceselect/css/nice-select.css?v={{$SystemConfigService->versionJS}}" />
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="/template/Salessa/vendors/owl_carousel/css/owl.carousel.css?v={{$SystemConfigService->versionJS}}" />
    <!-- gijgo css -->
    <link rel="stylesheet" href="/template/Salessa/vendors/gijgo/gijgo.min.css?v={{$SystemConfigService->versionJS}}" />
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="/template/Salessa/vendors/font_awesome/css/all.min.css?v={{$SystemConfigService->versionJS}}" />
    <link rel="stylesheet" href="/template/Salessa/vendors/tagsinput/tagsinput.css?v={{$SystemConfigService->versionJS}}" />

    <!-- date picker -->
    <link rel="stylesheet" href="/template/Salessa/vendors/datepicker/date-picker.css?v={{$SystemConfigService->versionJS}}" />
    <!-- scrollabe  -->
    <link rel="stylesheet" href="/template/Salessa/vendors/scroll/scrollable.css?v={{$SystemConfigService->versionJS}}" />
    <!-- datatable CSS -->
    <link rel="stylesheet" href="/template/Salessa/vendors/datatable/css/jquery.dataTables.min.css?v={{$SystemConfigService->versionJS}}" />
    <link rel="stylesheet" href="/template/Salessa/vendors/datatable/css/responsive.dataTables.min.css?v={{$SystemConfigService->versionJS}}" />
    <link rel="stylesheet" href="/template/Salessa/vendors/datatable/css/buttons.dataTables.min.css?v={{$SystemConfigService->versionJS}}" />
    <!-- text editor css -->
    <link rel="stylesheet" href="/template/Salessa/vendors/text_editor/summernote-bs4.css?v={{$SystemConfigService->versionJS}}" />
    <!-- morris css -->
    <link rel="stylesheet" href="/template/Salessa/vendors/morris/morris.css?v={{$SystemConfigService->versionJS}}">
    <!-- metarial icon css -->
    <link rel="stylesheet" href="/template/Salessa/vendors/material_icon/material-icons.css?v={{$SystemConfigService->versionJS}}" />



    <!-- menu css  -->
    <link rel="stylesheet" href="/template/Salessa/css/metisMenu.css?v={{$SystemConfigService->versionJS}}">
    <!-- style CSS -->
    <link rel="stylesheet" href="/template/Salessa/css/style.css?v={{$SystemConfigService->versionJS}}" />
    <link rel="stylesheet" href="/template/Salessa/css/colors/default.css?v={{$SystemConfigService->versionJS}}" id="colorSkinCSS">
</head>
<body class="crm_body_bg">


<section class="dashboard_part large_header_bg">

    <div class="main_content_iner ">
        @yield('Content')
    </div>

    <!-- footer part -->
    <div class="footer_part">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer_iner text-center">
                        <p>2020 © Influence - Designed by <a href="#"> <i class="ti-heart"></i> </a><a href="#"> Dashboard</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- main content part end -->

<div id="back-top" style="display: none;">
    <a title="Go to Top" href="#">
        <i class="ti-angle-up"></i>
    </a>
</div>

<!-- footer  -->
<script src="/template/Salessa/js/jquery-3.4.1.min.js?v={{$SystemConfigService->versionJS}}"></script>
<!-- popper js -->
<script src="/template/Salessa/js/popper.min.js?v={{$SystemConfigService->versionJS}}"></script>
<!-- bootstarp js -->
<script src="/template/Salessa/js/bootstrap.min.js?v={{$SystemConfigService->versionJS}}"></script>
<!-- sidebar menu  -->
<script src="/template/Salessa/js/metisMenu.js?v={{$SystemConfigService->versionJS}}"></script>
<!-- waypoints js -->
<script src="/template/Salessa/vendors/count_up/jquery.waypoints.min.js?v={{$SystemConfigService->versionJS}}"></script>
<!-- waypoints js -->
<script src="/template/Salessa/vendors/chartlist/Chart.min.js?v={{$SystemConfigService->versionJS}}"></script>
<!-- counterup js -->
<script src="/template/Salessa/vendors/count_up/jquery.counterup.min.js?v={{$SystemConfigService->versionJS}}"></script>

<!-- nice select -->
<script src="/template/Salessa/vendors/niceselect/js/jquery.nice-select.min.js?v={{$SystemConfigService->versionJS}}"></script>
<!-- owl carousel -->
<script src="/template/Salessa/vendors/owl_carousel/js/owl.carousel.min.js?v={{$SystemConfigService->versionJS}}"></script>

<!-- responsive table -->
<script src="/template/Salessa/vendors/datatable/js/jquery.dataTables.min.js?v={{$SystemConfigService->versionJS}}"></script>
<script src="/template/Salessa/vendors/datatable/js/dataTables.responsive.min.js?v={{$SystemConfigService->versionJS}}"></script>
<script src="/template/Salessa/vendors/datatable/js/dataTables.buttons.min.js?v={{$SystemConfigService->versionJS}}"></script>
<script src="/template/Salessa/vendors/datatable/js/buttons.flash.min.js?v={{$SystemConfigService->versionJS}}"></script>
<script src="/template/Salessa/vendors/datatable/js/jszip.min.js?v={{$SystemConfigService->versionJS}}"></script>
<script src="/template/Salessa/vendors/datatable/js/pdfmake.min.js?v={{$SystemConfigService->versionJS}}"></script>
<script src="/template/Salessa/vendors/datatable/js/vfs_fonts.js?v={{$SystemConfigService->versionJS}}"></script>
<script src="/template/Salessa/vendors/datatable/js/buttons.html5.min.js?v={{$SystemConfigService->versionJS}}"></script>
<script src="/template/Salessa/vendors/datatable/js/buttons.print.min.js?v={{$SystemConfigService->versionJS}}"></script>


<script src="/template/Salessa/js/chart.min.js?v={{$SystemConfigService->versionJS}}"></script>
<!-- progressbar js -->
<script src="/template/Salessa/vendors/progressbar/jquery.barfiller.js?v={{$SystemConfigService->versionJS}}"></script>
<!-- tag input -->
<script src="/template/Salessa/vendors/tagsinput/tagsinput.js?v={{$SystemConfigService->versionJS}}"></script>
<!-- text editor js -->
<script src="/template/Salessa/vendors/text_editor/summernote-bs4.js?v={{$SystemConfigService->versionJS}}"></script>
<script src="/template/Salessa/vendors/am_chart/amcharts.js?v={{$SystemConfigService->versionJS}}"></script>

<!-- scrollabe  -->
<script src="/template/Salessa/vendors/scroll/perfect-scrollbar.min.js?v={{$SystemConfigService->versionJS}}"></script>
<script src="/template/Salessa/vendors/scroll/scrollable-custom.js?v={{$SystemConfigService->versionJS}}"></script>


<script src="/template/Salessa/vendors/chart_am/core.js?v={{$SystemConfigService->versionJS}}"></script>
<script src="/template/Salessa/vendors/chart_am/charts.js?v={{$SystemConfigService->versionJS}}"></script>
<script src="/template/Salessa/vendors/chart_am/animated.js?v={{$SystemConfigService->versionJS}}"></script>
<script src="/template/Salessa/vendors/chart_am/kelly.js?v={{$SystemConfigService->versionJS}}"></script>
<script src="/template/Salessa/vendors/chart_am/chart-custom.js?v={{$SystemConfigService->versionJS}}"></script>
<!-- custom js -->
<script src="/template/Salessa/js/custom.js?v={{$SystemConfigService->versionJS}}"></script>
</body>
</html>
