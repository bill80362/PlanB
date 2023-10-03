<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Sales</title>

    <link rel="icon" href="/template/Salessa/img/logo.png" type="image/png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/template/Salessa/css/bootstrap.min.css" />
    <!-- themefy CSS -->
    <link rel="stylesheet" href="/template/Salessa/vendors/themefy_icon/themify-icons.css" />
    <!-- select2 CSS -->
    <link rel="stylesheet" href="/template/Salessa/vendors/niceselect/css/nice-select.css" />
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="/template/Salessa/vendors/owl_carousel/css/owl.carousel.css" />
    <!-- gijgo css -->
    <link rel="stylesheet" href="/template/Salessa/vendors/gijgo/gijgo.min.css" />
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="/template/Salessa/vendors/font_awesome/css/all.min.css" />
    <link rel="stylesheet" href="/template/Salessa/vendors/tagsinput/tagsinput.css" />

    <!-- date picker -->
    <link rel="stylesheet" href="/template/Salessa/vendors/datepicker/date-picker.css" />
    <!-- scrollabe  -->
    <link rel="stylesheet" href="/template/Salessa/vendors/scroll/scrollable.css" />
    <!-- datatable CSS -->
    <link rel="stylesheet" href="/template/Salessa/vendors/datatable/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="/template/Salessa/vendors/datatable/css/responsive.dataTables.min.css" />
    <link rel="stylesheet" href="/template/Salessa/vendors/datatable/css/buttons.dataTables.min.css" />
    <!-- text editor css -->
    <link rel="stylesheet" href="/template/Salessa/vendors/text_editor/summernote-bs4.css" />
    <!-- morris css -->
    <link rel="stylesheet" href="/template/Salessa/vendors/morris/morris.css">
    <!-- metarial icon css -->
    <link rel="stylesheet" href="/template/Salessa/vendors/material_icon/material-icons.css" />



    <!-- menu css  -->
    <link rel="stylesheet" href="/template/Salessa/css/metisMenu.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="/template/Salessa/css/style.css" />
    <link rel="stylesheet" href="/template/Salessa/css/colors/default.css" id="colorSkinCSS">

    {{--select2--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />


</head>
<body class="crm_body_bg">

@include('/admin/include/_Aside')


<section class="main_content dashboard_part large_header_bg">

    @include('/admin/include/_Nav')

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
<script src="/template/Salessa/js/jquery-3.4.1.min.js"></script>
<!-- popper js -->
<script src="/template/Salessa/js/popper.min.js"></script>
<!-- bootstarp js -->
<script src="/template/Salessa/js/bootstrap.min.js"></script>
<!-- sidebar menu  -->
<script src="/template/Salessa/js/metisMenu.js"></script>
<!-- waypoints js -->
<script src="/template/Salessa/vendors/count_up/jquery.waypoints.min.js"></script>
<!-- waypoints js -->
<script src="/template/Salessa/vendors/chartlist/Chart.min.js"></script>
<!-- counterup js -->
<script src="/template/Salessa/vendors/count_up/jquery.counterup.min.js"></script>

<!-- nice select -->
<script src="/template/Salessa/vendors/niceselect/js/jquery.nice-select.min.js"></script>
<!-- owl carousel -->
<script src="/template/Salessa/vendors/owl_carousel/js/owl.carousel.min.js"></script>

<!-- responsive table -->
<script src="/template/Salessa/vendors/datatable/js/jquery.dataTables.min.js"></script>
<script src="/template/Salessa/vendors/datatable/js/dataTables.responsive.min.js"></script>
<script src="/template/Salessa/vendors/datatable/js/dataTables.buttons.min.js"></script>
<script src="/template/Salessa/vendors/datatable/js/buttons.flash.min.js"></script>
<script src="/template/Salessa/vendors/datatable/js/jszip.min.js"></script>
<script src="/template/Salessa/vendors/datatable/js/pdfmake.min.js"></script>
<script src="/template/Salessa/vendors/datatable/js/vfs_fonts.js"></script>
<script src="/template/Salessa/vendors/datatable/js/buttons.html5.min.js"></script>
<script src="/template/Salessa/vendors/datatable/js/buttons.print.min.js"></script>


<script src="/template/Salessa/js/chart.min.js"></script>
<!-- progressbar js -->
<script src="/template/Salessa/vendors/progressbar/jquery.barfiller.js"></script>
<!-- tag input -->
<script src="/template/Salessa/vendors/tagsinput/tagsinput.js"></script>
<!-- text editor js -->
<script src="/template/Salessa/vendors/text_editor/summernote-bs4.js"></script>
<script src="/template/Salessa/vendors/am_chart/amcharts.js"></script>

<!-- scrollabe  -->
<script src="/template/Salessa/vendors/scroll/perfect-scrollbar.min.js"></script>
<script src="/template/Salessa/vendors/scroll/scrollable-custom.js"></script>


<script src="/template/Salessa/vendors/chart_am/core.js"></script>
<script src="/template/Salessa/vendors/chart_am/charts.js"></script>
<script src="/template/Salessa/vendors/chart_am/animated.js"></script>
<script src="/template/Salessa/vendors/chart_am/kelly.js"></script>
<script src="/template/Salessa/vendors/chart_am/chart-custom.js"></script>
<!-- custom js -->
<script src="/template/Salessa/js/custom.js"></script>

{{--select2--}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>


<script>
    {{--統一開啟的JS--}}
    //Initialize Select2 Elements
    $('.select2').select2()
    //Initialize Select2 Elements
    $('.select2bs5').select2({
        // theme: 'bootstrap-5'
    })
    /**
     * sends a request to the specified url from a form. this will change the window location.
     * @param {string} path the path to send the post request to
     * @param {object} params the parameters to add to the url
     * @param {string} [method=post] the method to use on the form
     */

    function postForm(path, params, method='post') {
        const form = document.createElement('form');
        form.method = method;
        form.action = path;
        for (const key in params) {
            if (params.hasOwnProperty(key)) {
                const hiddenField = document.createElement('input');
                hiddenField.type = 'hidden';
                hiddenField.name = key;
                hiddenField.value = params[key];

                form.appendChild(hiddenField);
            }
        }
        document.body.appendChild(form);
        form.submit();
    }
</script>

@yield("BodyJavascript")
</body>
</html>
