@extends('admin.newlayout.layout',['breadcom'=>['Lesson','Edit']])
@section('title')
<a href="/admin/user_student/student_lesson_list/{{request()->route('lid')}}" class="btn btn-warning btn-sm">Back</a>
Quiz
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
            <form id="form" class="form-horizontal">
                
            </form>       
                <button type="button" onclick="save()" class="btn btn-success">Submit</button>               
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
        loadData();               
    });

    function loadData() {
        if(id!=null||id!=""){
            $.ajax({
                url: "{{ url('/admin/user_student/student_lesson_take_quiz') }}/"+id,
                type: "get",
                dataType: 'JSON',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    data.data.forEach(function(entry,i) {
                        console.log(entry);
                        i++;
                        var cnt = 1;
                        if(entry.type=="CHECKBOX"){
                            var res = entry.options.split("|");
                            var g = '';
                            res.forEach(function(a) {
                                g+='<div class="checkbox"><input type="checkbox" value='+a+' name="checkbox_'+i+'" id="checkbox_'+i+'" class=""><label>'+a+'</label></div>'
                            })
                            $("#form").append(
                            '<div class="form-group">'+
                                '<div class="form-group">'+
                                    '<label class="col-md-2 control-label" for="inputDefault">'+i+'. '+entry.question+'</label>'+
                                    '<div class="col-md-1">'+
                                        g+
                                    '</div>'+
                                '</div>'+
                            '</div>');
                            cnt++;
                        }

                        if(entry.type=="MULTIPLE CHOICE"){
                            var res = entry.options.split("|");
                            var g = '';
                            res.forEach(function(a) {
                                g+='<div class="checkbox"><input type="radio" value='+a+' name="mc_'+i+'" id="mc_'+i+'" class=""><label>'+a+'</label></div>'
                            })
                            $("#form").append(
                            '<div class="form-group">'+
                                '<div class="form-group">'+
                                    '<label class="col-md-2 control-label" for="inputDefault">'+i+'. '+entry.question+'</label>'+
                                    '<div class="col-md-1">'+
                                        g+
                                    '</div>'+
                                '</div>'+
                            '</div>');
                        cnt++;
                        }

                        if(entry.type=="SHORT ANSWER"){
                            var res = entry.options.split("|");
                            $("#form").append(
                            '<div class="form-group">'+
                                '<div class="form-group">'+
                                    '<label class="col-md-2 control-label" for="inputDefault">'+i+'. '+entry.question+'</label>'+
                                    '<div class="col-md-6">'+
                                        '<input type="text" name="sa_'+i+'" id="sa_'+i+'" class="form-control">'+
                                    '</div>'+
                                '</div>'+
                            '</div>');
                        cnt++;
                        }

                        if(entry.type=="PARAGRAPH"){
                            var res = entry.options.split("|");
                            $("#form").append(
                            '<div class="form-group">'+
                                '<div class="form-group">'+
                                    '<label class="col-md-2 control-label" for="inputDefault">'+i+'. '+entry.question+'</label>'+
                                    '<div class="col-md-6">'+
                                        '<textarea name="pr_'+i+'" id="pr_'+i+'" class="form-control"></textarea>'+
                                    '</div>'+
                                '</div>'+
                            '</div>');
                        cnt++;
                        }

                        if(entry.type=="SWITCH"){
                            var res = entry.options.split("|");
                            $("#form").append(
                            '<div class="form-group">'+
                                '<div class="form-group">'+
                                    '<label class="col-md-2 control-label" for="inputDefault">'+i+'. '+entry.question+'</label>'+
                                    '<div class="col-md-6">'+
                                        '<textarea name="sw_'+i+'" id="sw_'+i+'" class="form-control"></textarea>'+
                                    '</div>'+
                                '</div>'+
                            '</div>');
                        cnt++;
                        }
                    });
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error! Contact IT Department.');
                }
            });
        }
    }

    function save() {
        var datas = $('#form').serializeArray();
        
        /* data.push({
            name: 'mode',
            value: id?"Update":"Save"
        });
        data.push({
            name: 'cid',
            value: "{{request()->route('cid')}}"
        }); */
        console.log(datas)
        $.ajax({
            url: "{{ url('/admin/user_vendor/vendor_lesson_saveLesson') }}",
            type: "post",
            data: datas,
            dataType: 'JSON',
            success: function(data) {
              // location = "/admin/user_vendor/vendor_lesson_list/{{request()->route('cid')}}";
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error! Contact IT Department.');
            }
        });
    }
</script>
@endsection