@extends('admin.newlayout.layout',['breadcom'=>['Courses',]])
@section('title')
Classes
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
            <a href="/admin/class/vendor_class_new" class="btn btn-success btn-sm">Add Class</a>
                <table id="tbl"class="table table-bordered table-striped mb-none display responsive nowrap" cellspacing="0"
                    width="100%">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Code</th>
                                <th>Lesson</th>
                                <th>Start Date</th>
                                <th>Due Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                </table>
            </div>
        </div>
    </div>
</section>


<div class="modal fade" id="modal_traianors" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <table id="tbl_trainors"class="table table-bordered table-striped mb-none display responsive nowrap" cellspacing="0"
                width="100%">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Description</th>
                        </tr>
                    </thead>
            </table>
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="saveListToLearn()">Save</button>
        </div>
      </div>
    </div>
   </div>
@endsection
@section('script')
<script>
var tbl = '';
    $(document).ready(function() {
        list();
    });

    function list() {
        tbl = $('#tbl').dtcustom({
                    "ajax": {
                        "type": "GET",
                        "url": "{{ url('/admin/class/vendor_get_class') }}",
                        "dataSrc": function(json) {
                            return json.data;
                        }
                    },
                    "columns": [{
                            "data": "title"
                        },{
                            "data": "code"
                        },{
                            "data": "lesson_title"
                        },
                        {
                            "data": "sd"
                        },
                        {
                            "data": "dd"
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
                url: "{{url('/admin/user_vendor/vendor_course_destroy')}}/" + id,
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
    
    function viewTrainors(vid){
        $("#modal_traianors").modal("show")
        /* .modal-backdrop {
            position: inherit;
        } */
        $('#tbl_trainors').dataTable().fnDestroy();
                    $('#tbl_trainors').dtcustom({
                    "ajax": {
                        "type": "GET",
                        "url": "{{ url('/admin/class/vendor_get_class_trainors') }}/"+vid,
                        "dataSrc": function(json) {
                            //$('#modal_traianors').css('position', 'inherit');
                            $('.modal-backdrop').css('position', 'inherit');
                            return json.data;
                        }
                    },
                    "columns": [{
                            "data": "code"
                        },{
                            "data": "name"
                        },
                        {
                            "data": "desc"
                        }
                    ],
                });
    }
</script>
@endsection