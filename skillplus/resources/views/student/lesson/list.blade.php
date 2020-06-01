@extends('admin.newlayout.layout',['breadcom'=>['Courses','Lessons']])
@section('title')
<a href="/admin/user_dashboard/courses" class="btn btn-warning btn-sm">Back</a>
Student Lessons
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
            <!-- <a href="/admin/user_vendor/vendor_lesson_new/{{request()->route('id')}}" class="btn btn-success btn-sm">Add Lesson</a> -->
            <!-- <button type="button" class="btn btn-success btn-sm" onclick="getcb()">Get</button> -->
                <table id="tbl"class="table table-bordered table-striped mb-none display responsive nowrap" cellspacing="0"
                    width="100%">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
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
var tbl = '';
var id = "{{request()->route('cid')}}";
    $(document).ready(function() {
        list();
    });

    function list() {
        tbl = $('#tbl').dtcustom({
                    "ajax": {
                        "type": "GET",
                        "url": "{{ url('/admin/user_student/student_lesson_get_list') }}/"+id,
                        "dataSrc": function(json) {
                            return json.data;
                        }
                    },
                    "columns": [{
                            "data": "title"
                        },{
                            "data": "desc"
                        },
                        {
                            "data": "action"
                        },
                    ],
                }); 
    }
    

    function delete_course(id){
        var result = confirm("Want to delete?");
        if (result) {
            $.ajax({
                url: "{{url('/admin/user_vendor/vendor_lesson_destroy')}}/" + id,
                type: 'get',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'JSON',
                success: function(data) {
                    tbl.ajax.reload();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error get data from ajax');
                }
            });
        }        
    }

    function getcb(){


        $("input:checkbox[name=cb]:checked").each(function(){
            //yourArray.push($(this).val());
            console.log($(this).val())
        });
    }
</script>
@endsection