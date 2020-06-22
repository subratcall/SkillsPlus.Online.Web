@extends('admin.newlayout.layout',['breadcom'=>['Report','Users']])
@section('title')
Add Question
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
        <form id="form" class="form-horizontal">
            <div class="row" id="f">       
                <div class="col-md-4">
                                <label class="col-md-6 control-label" for="">Title</label>      
                                <input type="text" id="title" name="title" class="form-control">
                                <input type="hidden" id="id" name="id" class="form-control">
                            </div>    
                            <div class="col-md-2">
                                            <label class=" control-label" for="">Timer (in minutes)</label>       
                                           <input type="text" id="timer" name="timer" class="form-control">
                                                
                            </div>
                                        <div class="col-md-12">
                                                        <label class="col-md-6 control-label" for="">&nbsp;</label>                                
                                                        <div class="col-md-6">
                                                            <button type="button" onclick="save()" class="btn btn-primary">Save</button>  
                                                            
                                                        </div>
                                                    </div>            
            </div>
            <br>
            <div class="form-group form-horizontal" id="btns">
            
            </div>
        </form>   
        <div class="bs-example">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="#questions" class="nav-link active" data-toggle="tab">Questions</a>
                </li>
                <li class="nav-item">
                    <a href="#selected" class="nav-link" data-toggle="tab">Selected</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="questions">
                    <h4 class="mt-2"></h4>
                    <div class="row">
                        <div class="col-lg-12">
                        <button type="button" id="btnAdd" disabled class="btn btn-success btn-sm" onclick="getcb()">Add</button>
                            <table id="tbl" class="table table-bordered table-striped mb-none display responsive nowrap" cellspacing="0"
                                width="100%">
                                    <thead>
                                        <tr>
                                            <th>Question</th>
                                            <th>Type</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="selected">
                    <!-- <h4 class="mt-2">Profile tab content</h4> -->
                    <div class="row">
                        <div class="col-lg-12">
                            <table id="tbl2"class="table table-bordered table-striped mb-none display responsive nowrap" cellspacing="0"
                                width="100%">
                                    <thead>
                                        <tr>
                                            <th>Question</th>
                                            <th>Type</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                            </table>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
        
    </div>
</section>
@endsection
@section('script')
<script>
var id = "{{request()->route('id')}}";
var cid = "{{request()->route('cid')}}";
var q = []
var tbl = '';
var tbl2 = '';
var isSave = 1;
var getqh;
    $(document).ready(function() {
        list();
        selectedList();
        loadQH();
    });

    function list() {
        tbl = $('#tbl').dtcustom({
                    "ajax": {
                        "type": "GET",
                        "url": "{{ url('/admin/user_vendor/vendor_question_list') }}/"+id,
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
                            "data": "cb"
                        },
                    ],
                }); 
    }

    function getcb(){
        $("input:checkbox[name=cb]:checked").each(function(){
            q.push({"lid":id,"cid":cid,"qh_id":getqh,"qid":$(this).val()});
            console.log($(this).val())
        });
        
        $.ajax({
            url: "{{ url('/admin/user_vendor/vendor_question_add_question') }}",
            type: "post",
            data: {
                data:q
            },
            dataType: 'JSON',
            success: function(data) {
                tbl.ajax.reload();   
                tbl2.ajax.reload();  
                q = [];              
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error! Contact IT Department.');
            }
        });
        console.log(q)
    }

    function selectedList() {
        tbl2 = $('#tbl2').dtcustom({
                    "ajax": {
                        "type": "GET",
                        "url": "{{ url('/admin/user_vendor/vendor_selected_question_list') }}/"+id,
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

    function delete_question(id){
        var result = confirm("Want to delete?");
        if (result) {
            $.ajax({
                url: "{{url('/admin/user_vendor/vendor_selected_question_delete')}}/" + id,
                type: 'get',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'JSON',
                success: function(data) {
                tbl.ajax.reload();   
                tbl2.ajax.reload();              
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error get data from ajax');
                }
            });
        }        
    }

    function save() {
        var datas = $('#form').serializeArray();
        
        datas.push({
            name: "lid",
            value: id,
        });
        datas.push({
            name: "cid",
            value: cid,
        });

        $.ajax({
            url: isSave==1?"{{ url('/admin/question/save_qh') }}":"{{ url('/admin/question/update_qh') }}",
            type: "post",
            data: datas,
            dataType: 'JSON',
            success: function(data) {                
                isSave = 0;
                $("#btnAdd").attr("disabled",false);
                $("#id").val(data.id);
                getqh = data.id
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error! Contact IT Department.');
            }
        });
    }

    function loadQH() {
        $.ajax({
            url: "{{ url('/admin/question/get_qh') }}/"+id,
            type: "get",
            dataType: 'JSON',
            success: function(data) {
                if(data){
                    isSave = 0;
                    $("#btnAdd").attr("disabled",false);
                }
                
                $("#title").val(data.title);
                $("#timer").val(data.timer);
                $("#id").val(data.id);
                getqh = data.id
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error! Contact IT Department.');
            }
        });
    }
</script>
@endsection