@extends('admin.newlayout.layout',['breadcom'=>['Course','Edit']])
@section('title')
 Class
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
                        <div class="form-group col-md-6">
                            <label class="control-label" for="inputDefault">Course Title</label>
                            <div class="">
                                <input type="hidden" name="id" id="id" class="form-control">
                                <input type="text" name="title" id="title" class="form-control">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">Lesson</label>
                            <div class="col-md-8">
                                <select name="precourse" id="precourse" class="form-control">
                                    
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">                       


                        <div class="form-group col-3">
                            <label class="control-label" for="inputDefault">Start Date</label>
                            <div class="">
                                <input type="date" name="startDate" id="startDate" class="form-control">
                            </div>
                        </div>

                        <div class="form-group col-3">
                            <label class="control-label" for="inputDefault">Due Date</label>
                            <div class="">
                                <input type="date" name="dueDate" id="dueDate" class="form-control">

                               {{--  <input type="date" name="birthday" id="birthday"
                                value="{{{ $meta['birthday'] or '' }}}" class="form-control text-center"
                                id="inputDefault"> --}}
                            </div>
                        </div>


                    </div>

                    

                    {{-- <div class="row">
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
                                        <input type="text" name="cover" id="cover" dir="ltr" class="form-control">
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
                                        <input type="text" name="thumbnail" id="thumbnail" dir="ltr" value="" class="form-control">
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
                                        <input type="text" name="video" id="video" dir="ltr" value="" class="form-control">
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
                                        <input type="number" min="0" name="duration"  id="duration" value="" class="form-control text-center">
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
                                        <input type="text" name="price" id="price" value="" class="form-control text-center" id="product_price" >
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
                                        <input type="text" name="post_price" id="post_price" value="" class="form-control text-center numtostr">
                                        <span class="input-group-append click-for-upload cu-p">
                                            <span class="input-group-text"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>



                          
                            <div class="form-group">
                                <label class="col-md-2 control-label">{{{ trans('admin.prerequisites') }}}</label>
                                <div class="col-md-8">
                                    <select name="precourse[]" id="precourse" multiple="multiple" class="form-control">
                                        
                                    </select>
                                </div>
                            </div>


                        </form>
                    </div> --}}

                    
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <button class="btn btn-primary pull-left" onclick="save()" type="button">save</button>
                                <a href="/admin/class"
                                    class="btn btn-danger pull-left">Cancel</a>
                            </div>
                        </div>
                    </div>

                </form>

            </div>
        </div>


    </div>
</section>

{{-- <section class="card">                 
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <br>
                <legend>List to learn</legend>      <button class="btn btn-success pull-left" onclick="add_list_to_lear()" type="button">Add</button>
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

<section class="card">                 
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <br>
                <legend>Requirements</legend>      <button class="btn btn-success pull-left" onclick="add_req()" type="button">Add</button>
                <table id="tbl_req" class="table table-bordered table-striped mb-none display responsive nowrap" cellspacing="0"
                    width="100%">
                        <thead>
                            <tr>
                                <th>Requirements</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                </table>
            </div>
        </div>
    </div>
</section> --}}

@endsection

@section("modals")
<div class="modal fade" id="modal_list_to_learn" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
 <div class="modal-dialog" role="document">
   <div class="modal-content">
     <div class="modal-header">
       <h5 class="modal-title" id="exampleModalLabel"></h5>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>
     <div class="modal-body">
        <form id="form_list_to_learn" class="form-horizontal form-bordered" method="post">
            <div class="row">
                <div class="form-group col-md-12">
                    <label class="control-label tab-con" for="inputDefault">Description</label>
                    <div class="tab-con">
                        <input type="hidden" id="learn_id" name="learn_id">
                        <textarea name="title_learn" id="title_learn" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                </div>
            </div>
        </form>
     </div>
     <div class="modal-footer">
       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       <button type="button" class="btn btn-primary" onclick="saveListToLearn()">Save</button>
     </div>
   </div>
 </div>
</div>

<div class="modal fade" id="modal_req" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="title_modal_req"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           <form id="form_req" class="form-horizontal form-bordered" method="post">
               <div class="row">
                   <div class="form-group col-md-12">
                       <label class="control-label tab-con" for="inputDefault">Description</label>
                       <div class="tab-con">
                           <input type="hidden" id="req_id" name="req_id">
                           <textarea name="title_req" id="title_req" cols="30" rows="10" class="form-control"></textarea>
                       </div>
                   </div>
               </div>
           </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="saveReq()">Save</button>
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
    var tbl;
    var tbl_req;
    var getLearnId=0;
    var getReqId=0;
    var spl = [];
    $(document).ready(function() {
        $('.editor-te').jqte({format: false});
       /*  if(id){
            loadData();
        }   */        
        loadAllCourse(); 
            loadData();    
    });

    function loadData() {       
     
        if(id){
            $.ajax({
                url: "{{ url('/admin/class/edit') }}/"+id,
                type: "get",
                dataType: 'JSON',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    isSave = 0;
                    $("#title").val(data.title);
                    $("#startDate").val(moment(data.startDate).format('YYYY-MM-DD'));
                    $("#dueDate").val(moment(data.dueDate).format('YYYY-MM-DD'));
                    $("#precourse").val(data.lesson_id);

                    $('#precourse').addClass("selectric");
                    $('#precourse').selectric();
                    $("#id").val(data.id);           
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error! Contact IT Department.');
                }
            });

            $.ajax({
                url: "{{ url('/admin/user_vendor/vendor_course_show_meta') }}/"+id,
                type: "get",
                dataType: 'JSON',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {         
                    //http://192.168.110.3:8085/images/images/employee/3914-1545804862.JPG    
                    
                           
                    $.each( data.data, function( key, value ) {
                        if(value.option=="video"){
                         $("#video").val(value.value);
                        }
                        if(value.option=="cover"){
                        $("#cover").val(value.value);
                        }
                        if(value.option=="thumbnail"){
                    $("#thumbnail").val(value.value);
                        }
                        if(value.option=="duration"){
                    $("#duration").val(value.value);
                        }
                        if(value.option=="price"){
                    $("#price").val(value.value);
                        }
                        if(value.option=="post_price"){
                    $("#post_price").val(value.value);
                            
                        }
                       if(value.option=="precourse"){
                         spl = value.value.split(",");
                        }                        
                    });

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error! Contact IT Department.');
                }
            });


            tbl = $('#tbl').DataTable({
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

            tbl_req = $('#tbl_req').DataTable({
            "ajax": {
                "url": "{{ url('/admin/user_vendor/cr') }}/"+id,
                "type": "GET",
            },
            "columns": [{
                "data": "req",
            }, {
                "data": null
            }],
            "columnDefs": [{
            "targets": -1,
                "render": function(row, data, type, meta) {
                return `
                <button type='button' class='btn btn-primary' onclick="action2('edit', ${row.id})">Edit</button>
                <button type='button' class='btn btn-danger' onclick="action2('delete', ${row.id})">Delete</button>
                `;
                }
                }]
            });    
      
        }
    }

function action(type, id) {
    if(type=="edit"){
        getLearnId = id;
        $("#learn_id").val(id);
        $("#exampleModalLabel").text("Edit List to Learn");
            $.ajax({
                url: "{{ url('/admin/user_vendor/vendor_learn_show') }}/"+id,
                type: "get",
                dataType: 'JSON',
                success: function(data) {
                $("#modal_list_to_learn").modal("show");
                    $("#title_learn").val(data.description);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error! Contact IT Department.');
                }
            });
    }else if(type=="delete"){   

        var result = confirm("Want to delete?");
        if (result) {
            $.ajax({
                url: "{{ url('/admin/user_vendor/vendor_learn_delete') }}/"+id,
                type: "get",
                dataType: 'JSON',
                success: function(data) {
                    tbl.ajax.reload();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error! Contact IT Department.');
                }
            });
        }   
    }
}

function action2(type, id) {
    if(type=="edit"){
        getReqId = id;
        $("#req_id").val(id);
        $("#title_modal_req").text("Edit Rrequirement");
            $.ajax({
                url: "{{ url('/admin/user_vendor/vendor_req_show') }}/"+id,
                type: "get",
                dataType: 'JSON',
                success: function(data) {
                $("#modal_req").modal("show");
                    $("#title_req").val(data.requirement);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error! Contact IT Department.');
                }
            });
    }else if(type=="delete"){   

        var result = confirm("Want to delete?");
        if (result) {
            $.ajax({
                url: "{{ url('/admin/user_vendor/vendor_req_delete') }}/"+id,
                type: "get",
                dataType: 'JSON',
                success: function(data) {
                    tbl_req.ajax.reload();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error! Contact IT Department.');
                }
            });
        }   
    }
}

    function save() {
        var data = $('#form').serializeArray();
        
        data.push({
            name: 'mode',
            value: id?"Update":"Save"
        });
        $.ajax({
            url: isSave==1?"{{ url('/admin/class/store') }}":"{{ url('/admin/class/update') }}",
            type: "post",
            data: data,
            dataType: 'JSON',
            success: function(data) {
               location = "/admin/class";
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error! Contact IT Department.');
            }
        });
    }

    function loadAllCourse() {
        
        $.ajax({
                url: "{{ url('/admin/class/vendor_get_all_lessons') }}",
                type: "get",
                dataType: 'JSON',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {                    
                    $.each( data.data, function( key, value ) {
                        $('#precourse').append('<option value="'+value.id+'">'+value.title+'</option>');
                    }); 

                    $('#precourse').addClass("selectric");
                    $('#precourse').selectric();
                    //$('#precourse').prop('selectedIndex', [1,2,3]).selectric('refresh');
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error! Contact IT Department.');
                }
            });
        
    }

    function add_list_to_lear(){
        getLearnId = 0;
        $("#learn_id").val('');
        $("#title_learn").val('');
        $("#exampleModalLabel").text("Add List to Learn");
        $("#modal_list_to_learn").modal("show");
    }

    function add_req(){
        getReqId = 0;
        $("#req_id").val('');
        $("#title_req").val('');
        $("#title_modal_req").text("Add Requirement");
        $("#modal_req").modal("show");
    }
    
    function saveListToLearn() {
        var data = $('#form_list_to_learn').serializeArray();        
        data.push({
            name: 'content_id',
            value: id
        });
        data.push({
            name: 'mode',
            value: getLearnId!=0?"Update":"Save"
        });
        $.ajax({
            url: "{{ url('/admin/user_vendor/vendor_learn_save') }}",
            type: "post",
            data: data,
            dataType: 'JSON',
            success: function(data) {
                    tbl.ajax.reload();
                $("#modal_list_to_learn").modal("hide");
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error! Contact IT Department.');
            }
        });
    }

    function saveReq() {
        var data = $('#form_req').serializeArray();        
        data.push({
            name: 'content_id',
            value: id
        });
        data.push({
            name: 'mode',
            value: getReqId!=0?"Update":"Save"
        });
        $.ajax({
            url: "{{ url('/admin/user_vendor/vendor_req_save') }}",
            type: "post",
            data: data,
            dataType: 'JSON',
            success: function(data) {
                    tbl_req.ajax.reload();
                $("#modal_req").modal("hide");
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error! Contact IT Department.');
            }
        });
    }
</script>
@endsection