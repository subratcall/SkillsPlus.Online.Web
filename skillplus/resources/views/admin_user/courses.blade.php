@extends('admin.newlayout.layout',['breadcom'=>['Report','Users']])
@section('title')
Courses Overview
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
        <!--  <canvas id="myChart" width="400" height="200"></canvas> -->
        <div class="row">
            <!-- <div class="col-lg-4">
                <label>Add board</label>
                <input type="text" id="kb-btitle" placeholder="Enter list board title"/>
                <button type="button" id="kb-addboard">Add</button>
            </div> -->
            <div class="col-lg-12">
                <table id="tblCourse" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Purchased Date</th>
                            <th>Vendor</th>
                            <th>Price</th>
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
        tabluc = $('#tblCourse').DataTable({
                    "ajax": {
                        "type": "GET",
                        "url": "{{ url('/admin/user_dashboard/mycourses') }}",
                        "dataSrc": function(json) {
                            return json.data;
                        }
                    },
                    "columns": [{
                            "data": "content_title"
                        },{
                            "data": "date"
                        },
                        {
                            "data": "vendor"
                        },
                        {
                            "data": "price"
                        },
                    ],
                });
        
    });
</script>
@endsection