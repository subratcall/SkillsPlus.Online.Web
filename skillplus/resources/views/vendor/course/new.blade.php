@extends('admin.newlayout.layout',['breadcom'=>['Course','Edit']])
@section('title')
 New Course
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
            <div class="col-12">

                <form id="form" class="form-horizontal form-bordered" method="post">

                    <div class="row">

                        <div class="form-group col-3">
                            <label class="control-label tab-con" for="inputDefault">Course Type</label>
                            <div class="tab-con">
                                <select name="type" id="type" class="form-control font-s">
                                    <option value="single">Single Part</option>
                                    <option value="course">Course</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-3">
                            <label class="control-label tab-con"
                                for="inputDefault">{{{ trans('main.publish_type') }}}</label>
                            <div class="tab-con">
                                <select name="private" id="private" class="form-control font-s">
                                    <option value="1">Exclusive</option>
                                    <option value="0">Open</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-3">
                            <label class="control-label" for="inputDefault">Course Title</label>
                            <div class="">
                                <input type="hidden" name="id" id="id" class="form-control">
                                <input type="text" name="title" id="title" class="form-control">
                            </div>
                        </div>

                        <div class="form-group col-3">
                            <label class="control-label" for="inputDefault">Sub Title</label>
                            <div class="">
                                <input type="text" name="subtitle" id="subtitle" class="form-control">
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-12">

                            <label class="control-label" for="inputDefault">Description</label>
                            <div class="form-group">
                                <textarea class="form-control editor-te" rows="12" placeholder="Description..."
                                    name="content" id="content" required></textarea>
                            </div>

                        </div>
                    </div>

                    <div id="meta" class="tab-pane ">
                        <form action="/admin/content/store/meta" class="form-horizontal form-bordered" method="post">


                            <div class="form-group">
                                <label class="col-md-2 control-label">{{{ trans('admin.course_cover') }}}</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-prepend view-selected cu-p" data-toggle="modal" data-target="#ImageModal" data-whatever="cover">
                                            <span class="input-group-text"><i class="fa fa-eye" aria-hidden="true"></i></span>
                                        </span>
                                        <input type="text" name="cover" dir="ltr" value="" class="form-control">
                                        <span class="input-group-append click-for-upload cu-p">
                                            <span class="input-group-text"><i class="fa fa-upload" aria-hidden="true"></i></span>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">{{{ trans('admin.course_thumbnail') }}}</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-prepend view-selected cu-p" data-toggle="modal" data-target="#ImageModal" data-whatever="thumbnail">
                                            <span class="input-group-text"><i class="fa fa-eye" aria-hidden="true"></i></span>
                                        </span>
                                        <input type="text" name="thumbnail" dir="ltr" value="" class="form-control">
                                        <span class="input-group-append click-for-upload cu-p">
                                            <span class="input-group-text"><i class="fa fa-upload" aria-hidden="true"></i></span>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">{{{ trans('admin.demo') }}}</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-prepend view-selected cu-p" data-toggle="modal" data-target="#VideoModal" data-whatever="video" >
                                            <span class="input-group-text"><i class="fa fa-eye" aria-hidden="true"></i></span>
                                        </span>
                                        <input type="text" name="video" dir="ltr" value="" class="form-control">
                                        <span class="input-group-append click-for-upload cu-p">
                                            <span class="input-group-text"><i class="fa fa-upload" aria-hidden="true"></i></span>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">{{{ trans('admin.duration') }}}</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <input type="number" min="0" name="duration" value="" class="form-control text-center">
                                        <span class="input-group-append click-for-upload cu-p">
                                            <span class="input-group-text">{{{ trans('admin.minutes') }}}</span>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">{{{ trans('admin.price') }}}</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <input type="text" name="price" value="" class="form-control text-center" id="product_price" >
                                        <span class="input-group-append click-for-upload cu-p" >
                                            <span class="input-group-text"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">{{{ trans('admin.postal_price') }}}</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <input type="text" name="post_price" value="" class="form-control text-center numtostr">
                                        <span class="input-group-append click-for-upload cu-p">
                                            <span class="input-group-text"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>



                          
                            <div class="form-group">
                                <label class="col-md-2 control-label">{{{ trans('admin.prerequisites') }}}</label>
                                <div class="col-md-8">
                                    <select name="precourse[]" id="precourse" multiple="multiple" class="form-control selectric">
                                        
                                    </select>
                                </div>
                            </div>


                        </form>
                    </div>

                    
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <button class="btn btn-primary pull-left" onclick="save()" type="button">save</button>
                                <a href="/admin/user_vendor/vendor_course_list"
                                    class="btn btn-danger pull-left">Cancel</a>
                            </div>
                        </div>
                    </div>

                </form>

            </div>
        </div>


    </div>
</section>

<section class="card">                 
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <br>
                <legend>List to learn</legend>      
                <table id="tbl" class="table table-bordered table-striped mb-none display responsive nowrap" cellspacing="0"
                    width="100%">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                </table>
            </div>
        </div>
    </div>
</section>

@endsection

@section("modals")
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
 <div class="modal-dialog" role="document">
   <div class="modal-content">
     <div class="modal-header">
       <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>
     <div class="modal-body">
       ...
     </div>
     <div class="modal-footer">
       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       <button type="button" class="btn btn-primary">Save changes</button>
     </div>
   </div>
 </div>
</div>
@endsection

@section('script')
<link rel="stylesheet" href="/assets/admin/modules/jquery-selectric/selectric.css">
<script type="application/javascript" src="/assets/vendor/jquery-te/jquery-te-1.4.0.min.js"></script>
<script src="/assets/admin/modules/jquery-selectric/jquery.selectric.min.js"></script>
<script>
    var isSave = 1;
var id = "{{request()->route('id')}}";
    $(document).ready(function() {
        $('#precourse').selectric();
        $('.editor-te').jqte({format: false});
        if(id){
            loadData();
        }          
        loadAllCourse();      
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
                    $("#subtitle").val(data.subtitle);
                    $("#id").val(data.id);           
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error! Contact IT Department.');
                }
            });


            $('#tbl').DataTable({
               "ajax": {
                "url": "/admin/user_vendor/vendor_course_get_all_cl/"+id,
                "type": "GET",
             },
              "columns": [{
                 "data": "description",
               }, {
                "data": null
               }],
              "columnDefs": [{
               "targets": -1,
                 "render": function(row, data, type, meta) {
                  return `
                  <button type='button' class='btn btn-primary' onclick="action('edit', ${row.id})">Edit</button>
                  <button type='button' class='btn btn-danger' onclick="action('delete', ${row.id})">Delete</button>
                  `;
                 }
                }]
            });         
        }
    }

    function action(type, id) {
     $("#modal").modal("show");
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
               //location = "/admin/user_vendor/vendor_course_list";
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error! Contact IT Department.');
            }
        });
    }

    function loadAllCourse() {
        
        $.ajax({
                url: "{{ url('/admin/user_vendor/vendor_course_getAllCourses') }}/",
                type: "get",
                dataType: 'JSON',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {                    
                    $.each( data.data, function( key, value ) {
                        console.log(value.title)
                        $('#precourse').append('<option value="'+value.id+'">'+value.title+'</option>');
                    });
                    $('#precourse').prop('selectedIndex', 0).selectric('refresh');
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error! Contact IT Department.');
                }
            });
        
    }
</script>
@endsection