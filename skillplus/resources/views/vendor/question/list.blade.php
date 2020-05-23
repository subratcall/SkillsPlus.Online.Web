@extends('admin.newlayout.layout',['breadcom'=>['Report','Users']])
@section('title')
My Channels
@endsection

@section('style')
<link rel='stylesheet' href="{{ asset('assets/_plugins/jkanban.css') }}">
<style>
    #myKanban {
        overflow-x: auto;
        padding: 20px 0;
    }
    .success {
        background: #00B961;
        color: #fff
    }
    .info {
        background: #2A92BF;
        color: #fff
    }
    .warning {
        background: #F4CE46;
        color: #fff
    }
    .error {
        background: #FB7D44;
        color: #fff
    }
</style>
@endsection

@section('page')
<div class="row">
    <div class="col-xs-6 col-md-3 col-sm-6 text-center">
    
    </div>  
</div>
</div>
<section class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
            <a href="/admin/question/new" class="btn btn-success btn-sm">Add</a>
                <table id="tbl"class="table table-bordered table-striped mb-none display responsive nowrap" cellspacing="0"
                    width="100%">
                        <thead>
                            <tr>
                                <th>Question</th>
                                <th>Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        list();
    });

    function list() {
        $('#tbl').dataTable().fnDestroy();
        tbl = $('#tbl').dataTable({
                    "ajax": {
                        "type": "GET",
                        "url": "{{ url('/admin/question/list') }}",
                        "dataSrc": function(json) {
                            return json.data;
                        }
                    },
                    "columns": [{
                            "data": "question"
                        },{
                            "data": "type"
                        },
                        {
                            "data": "action"
                        },
                    ],
                }); 
    }
</script>
@endsection