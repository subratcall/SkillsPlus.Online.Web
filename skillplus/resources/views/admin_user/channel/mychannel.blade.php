@extends('admin.newlayout.layout',['breadcom'=>['Report','Users']])
@section('title')
New Channel
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

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="inputDefault">Title</label>
                        <div class="col-md-10">
                            <input type="hidden" name="id" id="id" class="form-control">
                            <input type="text" name="title" id="title" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="inputDefault">Link</label>
                        <div class="col-md-10">
                            <input type="text" name="username" id="username" class="form-control">
                        </div>
                    </div>           

                    <label class="col-md-2 control-label" for="inputDefault">Description</label>
                    <div class="form-group">
                        <div class="col-md-12">
                            <textarea class="form-control" name="description" id="description" required></textarea>
                        </div>
                    </div>     

                    <!-- <input type="text" name="test[]" class="form-control">
                    <input type="text" name="test[]" class="form-control">
                    <input type="text" name="test[]"  class="form-control"> -->
                               

                    <div class="form-group">
                        <div class="col-md-12">
                            <button class="btn btn-primary pull-left" onclick="save()" type="button">save</button>
                        </div>
                    </div>
                </form>                
            </div>
        </div>
    </div>
</section>


@endsection

@section('script')
<script>
var isSave = 1;
var id = "{{request()->route('id')}}";
    $(document).ready(function() {
        if(id){
            loadData();
        }                
    });

    function loadData() {
        if(id!=null||id!=""){
            $.ajax({
                url: "{{ url('/admin/user_channel/getmychannelbyid') }}/"+id,
                type: "get",
                dataType: 'JSON',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    isSave = 0;
                    $("#title").val(data.title);
                    $("#username").val(data.username);
                    $("#description").val(data.description);
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
            url: "{{ url('/admin/user_channel/savechannel') }}",
            type: "post",
            data: data,
            dataType: 'JSON',
            success: function(data) {
               location = "/admin/user_channel/channel";
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error! Contact IT Department.');
            }
        });
    }
</script>
@endsection