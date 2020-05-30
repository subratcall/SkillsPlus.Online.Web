@extends('admin.newlayout.layout',['breadcom'=>['Lesson','Edit']])
@section('title')
<p id="titleHeader">New Lesson</p>
@endsection

@section('style')
<link rel='stylesheet' href="{{ asset('assets/_plugins/jkanban.css') }}">


<link rel="stylesheet" href="/assets/vendor/jquery-te/jquery-te-1.4.0.css" />

<link rel="stylesheet" href="/assets/stylesheets/vendor/mdi/css/materialdesignicons.min.css" />
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

                <!-- <form id="form" class="form-horizontal form-bordered" method="post">                    

                    <div class="form-group">

                        <label class="control-label tab-con col-md-2">{{{ trans('main.video_file') }}}</label>
                        <div class="col-md-7 tab-con">
                            <div class="input-group">
                                <span class="input-group-addon view-selected img-icon-s" data-toggle="modal" data-target="#VideoModal" data-whatever="upload_video"><span class="formicon mdi mdi-eye"></span></span>
                                <input type="text" name="upload_video" dir="ltr" class="form-control">
                                <span class="input-group-addon click-for-upload img-icon-s"><span class="formicon mdi mdi-arrow-up-thick"></span></span>
                            
                            </div>
                        </div>


                        <label class="control-label col-md-1 tab-con">{{{ trans('main.sort') }}}</label>
                        <div class="col-md-2 tab-con">
                            <input name="sort" type="number" class="spinner-input form-control" maxlength="3" min="0" max="100">
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
                        </div>
                    </div>
                </form>   -->


                <form id="form" method="post" class="form-horizontal">

                    <input type="hidden" name="id" id="id">

                    <div class="row col-md-6">

                        <div class="form-group col-12">

                            {{-- <label class="control-label tab-con">{{{ trans('main.video_file') }}}</label>

                            <div class="tab-con">
                                <div class="input-group">

                                    <span class="input-group-prepend view-selected img-icon-s" data-toggle="modal"
                                        data-target="#VideoModal" data-whatever="upload_video"><span
                                            class="formicon mdi mdi-eye"></span></span>

                                    <input type="text" name="upload_video" id="upload_video" dir="ltr"
                                        class="form-control">

                                    <span class="input-group-append click-for-upload img-icon-s"><span
                                            class="formicon mdi mdi-arrow-up-thick"></span></span>
                                </div>
                            </div> --}}


                            <label class="control-label">{{{ trans('main.video_file') }}}</label>
                            <div class="input-group">
                                <span class="input-group-prepend view-selected img-icon-s" data-toggle="modal"
                                    data-target="#VideoModal" data-whatever="upload_video" data-toggle="modal">
                                    <span class="input-group-text"><i class="fa fa-eye" aria-hidden="true"></i></span>
                                </span>
                                <input type="text" name="upload_video" id="upload_video" dir="ltr" class="form-control">

                                <span class="input-group-append click-for-upload cu-p">
                                    <span class="input-group-text"><i class="fa fa-upload"
                                            aria-hidden="true"></i></span>
                                </span>
                            </div>

                        </div>

                        <div class="form-group col-12">
                            <label class="control-label tab-con">{{{ trans('main.sort') }}}</label>
                            <div class="tab-con">
                                <input name="sort" id="sort" type="number" class="spinner-input form-control"
                                    maxlength="3" min="0" max="100">
                            </div>
                        </div>

                        <div class="form-group col-12">
                            <label class="control-label tab-con">{{{ trans('main.volume') }}}</label>
                            <div class="tab-con">
                                <div class="input-group">
                                    <input type="number" min="0" name="size" id="size" class="form-control text-center">
                                    <span class="input-group-addon img-icon-s">{{{ trans('main.mb') }}}</span>
                                </div>
                            </div>

                        </div>
                        <div class="form-group col-12">
                            <label class="control-label tab-con">{{{ trans('main.duration') }}}</label>
                            <div class="tab-con">
                                <div class="input-group">
                                    <input type="number" min="0" name="duration" id="duration"
                                        class="form-control text-center">
                                    <span class="input-group-addon img-icon-s">{{{ trans('main.minute') }}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-12">
                            <label class="control-label tab-con">{{{ trans('main.free') }}}</label>
                            <div class="tab-con">
                                <div class="switch switch-sm switch-primary pull-left free-edit-check-state">
                                    <input type="hidden" value="0" name="free" id="free">
                                    <input type="checkbox" name="free" value="1" data-plugin-ios-switch />
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-12">
                            <label class="control-label tab-con" for="inputDefault">{{{ trans('main.title') }}}</label>
                            <div class="tab-con">
                                <input type="text" name="title" id="title" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group col-12">
                            <label class="control-label tab-con"
                                for="inputDefault">{{{ trans('main.description') }}}</label>
                            <div class="tab-con te-10">
                                <textarea class="form-control editor-te oflows" rows="12" placeholder="Description..."
                                    name="desc" id="description" required></textarea>
                            </div>
                        </div>

                        <div class="form-group col-12">

                            <div class="tab-con">
                                <button class="btn btn-success pull-left" id="edit-part-submit" onclick="save()"
                                    type="button">Save</button>
                                <a href="/admin/user_vendor/vendor_lesson_list/{{request()->route('cid')}}"
                                    class="btn btn-danger pull-left">Cancel</a>
                            </div>

                        </div>

                        <div>

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
                url: "{{ url('/admin/user_vendor/vendor_lesson_show') }}/"+id,
                type: "get",
                dataType: 'JSON',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    $("#titleHeader").text("Edit Lesson")
                    isSave = 0;
                    $("#title").val(data.title);
                    $("#upload_video").val(data.upload_video);
                    $("#sort").val(data.sort);
                    $("#size").val(data.size);
                    $("#duration").val(data.duration);
                    $(".jqte_editor").html(data.description)
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
        data.push({
            name: 'cid',
            value: "{{request()->route('cid')}}"
        });
        $.ajax({
            url: "{{ url('/admin/user_vendor/vendor_lesson_saveLesson') }}",
            type: "post",
            data: data,
            dataType: 'JSON',
            success: function(data) {
               location = "/admin/user_vendor/vendor_lesson_list/{{request()->route('cid')}}";
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error! Contact IT Department.');
            }
        });
    }
</script>
@endsection