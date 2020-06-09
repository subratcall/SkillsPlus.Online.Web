<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Admin Panel - @yield('title', '')</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="/assets/admin/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/admin/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="/assets/admin/modules/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="/assets/admin/modules/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="/assets/admin/modules/jquery-selectric/selectric.css">
    <link rel="stylesheet" href="/assets/admin/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">



    <!-- Template CSS -->
    <link rel="stylesheet" href="/assets/admin/css/style.css">
    <link rel="stylesheet" href="/assets/admin/css/components.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/assets/stylesheets/admin-custom.css">

    <style>
        .custom-switch-input:checked~.custom-switch-description {
            position: relative;
            top: 4px;
        }

        section.card div.card-body {
            padding-top: 0px !important;
            padding-bottom: 0px !important;
        }

        #form .error {
            border-color: red;
        }

        #form label.error {
            color: red;
        }

        .dataTables_filter,
        .dataTables_length {
            display: none;
        }

        .display-inline {
            display: inline;
        }

        .margin-bottom {
            margin-bottom: 10px;
        }

        .margin-left {
            margin-left: 10px;
        }

        .margin-right {
            margin-right: 10px;
        }

        .margin-top {
            margin-top: 10px;
        }

        .padding-top {
            padding-top: 10px;
        }

        .padding-bottom {
            padding-bottom: 10px;
        }

        .padding-left {
            padding-left: 10px;
        }

        .padding-right {
            padding-right: 10px;
        }

        .float-r {
            float: right;
        }

        .float-l {
            float: left;
        }

        .padding: {
            padding: 10px;   
        }
    </style>
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->

    @yield('style')

</head>

<body>
    <div class="main-wrapper main-wrapper-1">
        <div class="section-body">
            @yield('page')
        </div>

        @include('admin.newlayout.modals')
        @yield('modals')
    </div>
    <!-- General JS Scripts -->
    <script src="/assets/admin/modules/jquery.min.js"></script>
    <script src="/assets/admin/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="/assets/admin/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="/assets/admin/modules/moment.min.js"></script>
    <script src="/assets/admin/js/stisla.js"></script>
    <script src="/assets/admin/modules/cleave-js/dist/cleave.min.js"></script>
    <script src="/assets/admin/modules/cleave-js/dist/addons/cleave-phone.us.js"></script>
    <script src="/assets/admin/modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
    <script src="/assets/admin/modules/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="/assets/admin/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
    <script src="/assets/admin/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
    <script src="/assets/admin/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script src="/assets/admin/modules/select2/dist/js/select2.full.min.js"></script>
    <script src="/assets/admin/modules/jquery-selectric/jquery.selectric.min.js"></script>
    <script src="/assets/admin/modules/jquery.sparkline.min.js"></script>
    <script src="/assets/admin/modules/chart.min.js"></script>
    <script src="/assets/admin/modules/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="/assets/admin/modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="/assets/admin/modules/jqvmap/dist/maps/jquery.vmap.indonesia.js"></script>
    <script src="/assets/admin/modules/datatables/datatables.min.js"></script>
    <script src="/assets/admin/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/admin/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
    <script src="/assets/admin/modules/jquery-ui/jquery-ui.min.js"></script>
    <script src="/assets/admin/modules/summernote/summernote-bs4.js"></script>
    <script src="/assets/admin/modules/jquery-selectric/jquery.selectric.min.js"></script>
    <script src="/assets/admin/modules/upload-preview/assets/js/jquery.uploadPreview.min.js"></script>
    <script src="/assets/admin/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script src="/assets/admin/modules/select2/dist/js/select2.full.min.js"></script>
    <script src="/assets/admin/modules/jquery-selectric/jquery.selectric.min.js"></script>
    <script src="/assets/admin/js/scripts.js"></script>
    <script src="/assets/admin/js/custom.js"></script>
    <div id="footerScript">
    </div>
    <script>
        @if(isset($menu))
        $(function() {
            $('#{!! $menu !!}').addClass('active');
        });
        @endif
        @if(isset($url))
        $(function() {
            $('.nav-link').each(function() {
                if ('{!! url(' / ') !!}' + $(this).attr('href') == '{!! $url !!}') {
                    $(this).parent().addClass('active');
                }
            })
        });
        @endif
        
    </script>
    @section('scripts')
    @show

    @include('_revise.script')

    @yield('script')
</body>

</html>