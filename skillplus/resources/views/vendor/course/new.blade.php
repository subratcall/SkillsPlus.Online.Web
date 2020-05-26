@extends('admin.newlayout.layout',['breadcom'=>['Course','Edit']])
@section('title')
<p id="titleHeader">New Course</p>
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

<link rel="stylesheet" href="/assets/vendor/jquery-te/jquery-te-1.4.0.css" />

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

                    <div class="form-group">
                        <label class="control-label col-md-2 tab-con" for="inputDefault">Course Type</label>
                            <div class="col-md-10 tab-con">
                                <select name="type" id="type" class="form-control font-s">
                                    <option value="single">Single Part</option>
                                    <option value="course">Course</option>
                                </select>
                            </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2 tab-con" for="inputDefault">{{{ trans('main.publish_type') }}}</label>
                            <div class="col-md-10 tab-con">
                                <select name="private" id="private" class="form-control font-s">
                                    <option value="1">Exclusive</option>
                                    <option value="0">Open</option>
                                </select>
                            </div>
                    </div> 

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="inputDefault">Course Title</label>
                        <div class="col-md-10">
                            <input type="hidden" name="id" id="id" class="form-control">
                            <input type="text" name="title" id="title" class="form-control">
                        </div>
                    </div>          

                    <label class="col-md-2 control-label" for="inputDefault">Description</label>
                    <div class="form-group">
                        <div class="col-md-12">
                        <textarea class="form-control editor-te" rows="12" placeholder="Description..." name="content" id="content" required></textarea>
                        </div>
                    </div>                                    

                    <div class="form-group">
                        <div class="col-md-12">
                            <button class="btn btn-primary pull-left" onclick="save()" type="button">save</button>
                            <a href="/admin/user_vendor/vendor_course_list"  class="btn btn-danger pull-left">Cancel</a>
                        </div>
                    </div>
                </form>                
            </div>
        </div>
    </div>
</section>


@endsection

@section('script')

<script type="application/javascript" src="/assets/vendor/jquery-te/jquery-te-1.4.0.min.js"></script>

<script>
var isSave = 1;
var id = "{{request()->route('id')}}";
    $(document).ready(function() {
        $('.editor-te').jqte({format: false});
        if(id){
            loadData();
        }                
    });

    function loadData() {
        if(id!=null||id!=""){
            $.ajax({
                url: "{{ url('/admin/user_vendor/vendor_course_show') }}/"+id,
                type: "get",
                dataType: 'JSON',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    $("#titleHeader").text("Edit Course");
                    isSave = 0;
                    $("#title").val(data.title);
                    $("#type").val(data.type);
                    $(".jqte_editor").html(data.content)
                    $("#private").val(data.private);
                    $("#id").val(data.id);                    
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error! Contact IT Department.');
                }
            });
        }
    }

    function save() {
        var data = $('#form').serializeArray();
        
        data.push({
            name: 'mode',
            value: id?"Update":"Save"
        });
        $.ajax({
            url: "{{ url('/admin/user_vendor/vendor_course_saveCourse') }}",
            type: "post",
            data: data,
            dataType: 'JSON',
            success: function(data) {
               location = "/admin/user_vendor/vendor_course_list";
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error! Contact IT Department.');
            }
        });
    }
</script>
@endsection