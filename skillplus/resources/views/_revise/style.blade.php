<link href="{{ asset('assets/js/dataTables/media/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/_plugins/responsive.dataTable.css') }}" rel="stylesheet"> 
<link href="{{ asset('assets/_plugins/jquery.scrolling-tabs.min.css') }}" rel="stylesheet">
<script src="{{ asset('assets/_plugins/datatable.js') }}"></script>
<script>
    window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
    ]) !!};
</script>
<style>
    #form .error{
        border-color: red;
    }

    #form label.error {
        color: red;
    }

    .dataTables_filter, .dataTables_length {
        display: none;
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

    .card-body {
        padding-left: 15px !important;
        padding-right: 15px !important;
    }

    @media (min-width: 0px) and (max-width: 768px) {
        .main-content {
            padding-left: 10px;
            padding-right: 10px;
        }

        .card-body {
            padding-left: 5px !important;
            padding-right: 5px !important;
        }
    }
}​
</style>