@extends('admin.newlayout.layout',['breadcom'=>['Courses',]])
@section('title')
Trainers
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
                <form id="form" class="form-horizontal form-bordered" method="post">

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="control-label">Lesson</label>
                            <div class="col-md-8">
                                <select name="users" id="users" class="form-control">
                                    
                                </select>
                            </div>
                        </div>

                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">&nbsp;</label>
                                <div class="col-md-8">
                                    <button class="btn btn-primary pull-left" onclick="save()" type="button">Add</button>
                                    <a href="/admin/class"
                                        class="btn btn-danger pull-left">Back</a>
                                </div>
                            </div>
                        </div>
                    </div>                     

                </form>

                <table id="tbl"class="table table-bordered table-striped mb-none display responsive nowrap" cellspacing="0"
                    width="100%">
                        <thead>
                            <tr>
                                <th>Name</th>
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
var id = "{{request()->route('id')}}";
    $(document).ready(function() {
        list();
        loadAllCourse();
    });

    function list() {
        tbl = $('#tbl').dtcustom({
                    "ajax": {
                        "type": "GET",
                        "url": "{{ url('/admin/class/vendor_trainors') }}/"+id,
                        "dataSrc": function(json) {
                            return json.data;
                        }
                    },
                    "columns": [{
                            "data": "name"
                        },{
                            "data": "desc"
                        },{
                            "data": "action"
                        },
                    ],
                }); 
    }
    
    

    function save() {
        var data = $('#form').serializeArray();
        
        data.push({
            name: 'class_id',
            value: id
        });
        $.ajax({
            url: "{{ url('/admin/class/vendor_store_trainors') }}",
            type: "post",
            data: {
                class_id: id,
                user_id: $("#users").val(),
            },
            dataType: 'JSON',
            success: function(data) {
                tbl.ajax.reload();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error! Contact IT Department.');
            }
        });
    }

    function delete_trainer(id){
        var result = confirm("Want to delete?");
        if (result) {
            $.ajax({
                url: "{{url('/admin/class/vendor_remove_trainer')}}/" + id,
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

    function loadAllCourse() {
        
        $.ajax({
                url: "{{ url('/admin/class/vendor_get_all_users') }}",
                type: "get",
                dataType: 'JSON',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {                    
                    $.each( data.data, function( key, value ) {
                        $('#users').append('<option value="'+value.user_id+'">'+value.name+'</option>');
                    }); 

                    $('#users').addClass("selectric");
                    $('#users').selectric();
                    //$('#precourse').prop('selectedIndex', [1,2,3]).selectric('refresh');
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error! Contact IT Department.');
                }
            });
        
    }
</script>
@endsection