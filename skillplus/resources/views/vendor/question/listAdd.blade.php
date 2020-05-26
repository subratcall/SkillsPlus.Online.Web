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
                        <button type="button" class="btn btn-success btn-sm" onclick="getcb()">Add</button>
                            <table id="tbl"class="table table-bordered table-striped mb-none display responsive nowrap" cellspacing="0"
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
                    <h4 class="mt-2">Profile tab content</h4>
                    <div class="row">
                        <div class="col-lg-12">
                        <button type="button" class="btn btn-danger btn-sm" onclick="getcb()">Remove</button>
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
var q = []
var tbl = '';
var tbl2 = '';
    $(document).ready(function() {
        list();
        selectedList();
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
            q.push({"lid":id,"qid":$(this).val()});
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
</script>
@endsection