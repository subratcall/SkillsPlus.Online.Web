@extends('admin.newlayout.layout',['breadcom'=>['Lesson','Edit']])
@section('title')
<a href="/admin/user_student/student_show_course/{{request()->route('lid')}}" class="btn btn-warning btn-sm">Back</a>
Quiz
@endsection

@section('style')
<link rel='stylesheet' href="{{ asset('assets/_plugins/jkanban.css') }}">


    <link rel="stylesheet" href="/assets/vendor/jquery-te/jquery-te-1.4.0.css" />
    
	<link rel="stylesheet" href="/assets/stylesheets/vendor/mdi/css/materialdesignicons.min.css" />

    
<!-- <link href="/assets/toggle/bootstrap-toggle.min.css" rel="stylesheet"> -->
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

<div id="headerStyle">
    </div>
<!-- <link href="/assets/toggle/bootstrap-toggle.min.css" rel="stylesheet">
<script src="/assets/toggle/bootstrap-toggle.min.js"></script> -->
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
                    <div class="row" id="f">       
                        <!-- <div class="col-md-12">
                                        <label class="col-md-6 control-label" for="">dsfgfdgfdgdfgfdg</label>                                
                                        <div class="col-md-6">
                                       <input type="checkbox" checked id="sw2">
                                            
                                        </div>
                                    </div>         -->                    
                    </div>
                    <br>
                    <div class="form-group form-horizontal" id="btns">
                    
                    </div>
                </form>       
                <!-- <button type="button" onclick="save()" class="btn btn-success">Submit</button> -->               
            </div>
        </div>
    </div>
</section>

@endsection

@section('modals')
<div class="modal fade" role="dialog" id="hintModal">
    <div class="modal-dialog" style="z-index: 1050">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
            </div>
            <div class="modal-body">
                <p id="hint"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">{{{ trans('admin.close') }}}</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" role="dialog" id="msgModal">
    <div class="modal-dialog" style="z-index: 1050">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
            </div>
            <div class="modal-body">
                <p id="hint">Answer Submitted!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">{{{ trans('admin.close') }}}</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')




<script type="application/javascript" src="/assets/vendor/jquery-te/jquery-te-1.4.0.min.js"></script>

<!-- <script type="application/javascript" src="/assets/toggle/bootstrap-toggle.min.js"></script> -->

<script>
var isSave = 1;
var id = "{{request()->route('id')}}";
var lid = "{{request()->route('lid')}}";
var getData;
var cnt_sw = 0;
var getsws;
var isskip = false;
    $(document).ready(function() {
        $('.editor-te').jqte({format: false});
        loadData2();     
                                /* $('#sw2').bootstrapToggle(); */
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
                               // g+='<div class="checkbox"><input type="checkbox" value='+a+' name="checkbox_'+i+'" id="checkbox_'+i+'" class=""><label>'+a+'</label></div>'
                               g+= '<div class="form-check">'+
                                                    '<input class="form-check-input" type="checkbox" value="'+a+'*'+entry.id+'" name="checkbox[]" id="checkbox_'+entry.id+'">'+
                                                    '<label class="form-check-label" for="defaultCheck1">'+
                                                     a+
                                                    '</label>'+
                                                '</div>'
                            })
                            $("#f").append(                                      
                                '<div class="col-md-6">'+
                                    '<label class="col-md-6 control-label" for="">'+i+'. '+entry.question+'</label>'     +                                   
                                    '<div class="col-md-6">'+
                                    '<input type="hidden" name="checkbox_qid[]" value="'+entry.id+'">'+
                                    '<input type="hidden" name="type[]" value="ckb">'+
                                        g+
                                    '</div>'+
                                '</div>'                            
                            );
                            cnt++;
                        }
                        
                        /* if(entry.type=="CHECKBOX"){
                            var res = entry.options.split("|");
                            var g = '';
                            res.forEach(function(a) {
                                g+='<div class="checkbox"><input type="checkbox" value='+a+' name="checkbox_'+i+'" id="checkbox_'+i+'" class=""><label>'+a+'</label></div>'
                            })
                            $("#form").append(
                            '<div class="form-group">'+
                                '<div class="form-group">'+
                                    '<label class="col-md-2 control-label" for="">'+i+'. '+entry.question+'</label>'+
                                    '<div class="col-md-1">'+
                                        g+
                                    '</div>'+
                                '</div>'+
                            '</div>');
                            cnt++;
                        } */

                        if(entry.type=="MULTIPLE CHOICE"){
                            var res = entry.options.split("|");
                            var g = '';
                            res.forEach(function(a) {
                                //g+='<div class="checkbox"><input type="radio" value='+a+' name="mc_'+i+'" id="mc_'+i+'" class=""><label>'+a+'</label></div>'
                                g+= '<div class="form-check">'+
                                        '<input class="form-check-input" type="radio" value="'+a+'" name="mc_'+entry.id+'" id="mc_'+entry.id+'">'+
                                        '<label class="form-check-label" for="'+a+'">'+
                                            a+
                                        '</label>'+
                                    '</div>'
                            })
                            /* $("#form").append(
                            '<div class="form-group">'+
                                '<div class="form-group">'+
                                    '<label class="col-md-2 control-label" for="">'+i+'. '+entry.question+'</label>'+
                                    '<div class="col-md-1">'+
                                        g+
                                    '</div>'+
                                '</div>'+
                            '</div>'); */
                            $("#f").append(                                      
                                '<div class="col-md-6">'+
                                    '<label class="col-md-6 control-label" for="">'+i+'. '+entry.question+'</label>'     +                                   
                                    '<div class="col-md-6">'+
                                    '<input type="hidden" name="mc_qid_'+entry.id+'" value="'+entry.id+'">'+
                                    '<input type="hidden" name="type[]" value="rd">'+
                                        g+
                                    '</div>'+
                                '</div>'                            
                            );
                            cnt++;
                        }

                        if(entry.type=="SHORT ANSWER"){
                            //var res = entry.options.split("|");
                            /* $("#form").append(
                            '<div class="form-group">'+
                                '<div class="form-group">'+
                                    '<label class="col-md-2 control-label" for="">'+i+'. '+entry.question+'</label>'+
                                    '<div class="col-md-6">'+
                                        '<input type="text" name="sa_'+i+'" id="sa_'+i+'" class="form-control">'+
                                    '</div>'+
                                '</div>'+
                            '</div>'); */
                            $("#f").append(                                      
                                '<div class="col-md-6">'+
                                    '<label class="col-md-6 control-label" for="">'+i+'. '+entry.question+'</label>'     +                                   
                                    '<div class="col-md-6">'+
                                        '<input type="hidden" name="sa_qid_'+entry.id+'" value="'+entry.id+'">'+
                                        '<input type="text" name="sa_'+entry.id+'" id="sa_'+entry.id+'" class="form-control">'+
                                    '<input type="hidden" name="type[]" value="sa">'+
                                    '</div>'+
                                '</div>'                            
                            );
                        cnt++;
                        }

                        if(entry.type=="PARAGRAPH"){
                            //var res = entry.options.split("|");
                            /* $("#form").append(
                            '<div class="form-group">'+
                                '<div class="form-group">'+
                                    '<label class="col-md-2 control-label" for="">'+i+'. '+entry.question+'</label>'+
                                    '<div class="col-md-6">'+
                                        '<textarea name="pr_'+i+'" id="pr_'+i+'" class="form-control"></textarea>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'); */
                            $("#f").append(                                      
                                '<div class="col-md-6">'+
                                    '<label class="col-md-6 control-label" for="">'+i+'. '+entry.question+'</label>'     +                                   
                                    '<div class="col-md-6">'+
                                        '<input type="hidden" name="pr_qid_'+entry.id+'" value="'+entry.id+'">'+
                                        '<textarea name="pr_'+entry.id+'" id="pr_'+entry.id+'" class="form-control"></textarea>'+
                                    '<input type="hidden" name="type[]" value="pr">'+
                                    '</div>'+
                                '</div>'                            
                            );
                        cnt++;
                        }

                        if(entry.type=="SWITCH"){
                            /* var res = entry.options.split("|");
                            $("#form").append(
                            '<div class="form-group">'+
                                '<div class="form-group">'+
                                    '<label class="col-md-2 control-label" for="">'+i+'. '+entry.question+'</label>'+
                                    '<div class="col-md-6">'+
                                        '<textarea name="sw_'+i+'" id="sw_'+i+'" class="form-control"></textarea>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'); */
                            $("#f").append(                                      
                                '<div class="col-md-6">'+
                                    '<label class="col-md-6 control-label" for="">'+i+'. '+entry.question+'</label>'     +                                   
                                    '<div class="col-md-6">'+
                                        //'<textarea name="sw_'+i+'" id="sw_'+i+'" class="form-control"></textarea>'+
                                        '<input type="hidden" name="swopt_qid_'+entry.id+'" value="'+entry.id+'">'+
                                        '<input type="checkbox" checked  id="sws_'+cnt_sw+'"  name="sws_'+cnt_sw+'" data-toggle="toggle"'+
                                        '<input type="hidden" name="type[]" value="sw">'+
                                        ' data-on="True" data-off="False" data-onstyle="primary" data-offstyle="danger">'+
                                    '</div>'+
                                '</div>'                           
                            );
                            cnt_sw++;
                        cnt++;
                        }
                    });
                    $("#form").append('<button type="button" onclick="save()" class="btn btn-success">Submit</button>');                    
                    //$('<script/>',{type:'text/javascript', src:'/assets/toggle/bootstrap-toggle.min.js'}).appendTo('head');               
                   // $('<script/>',{type:'text/javascript', src:'/assets/toggle/bootstrap-toggle.min.js'}).appendTo('head');   
                    $('head').append( $('<link rel="stylesheet" type="text/css" />').attr('href', '/assets/toggle/bootstrap-toggle.min.css') );
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error! Contact IT Department.');
                }
            });
        }
    }

    function loadData2() {
        if(id!=null||id!=""){
            $.ajax({
                url: "{{ url('/admin/user_student/student_lesson_take_quiz') }}/"+id,
                type: "get",
                dataType: 'JSON',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    getData = data.data;
                    var getii = 0;
                    var getcnt = 0;
                    var gethint = '';
                    data.data.forEach(function(entry,ii) {
                        //console.log(ii);
                        //i++;
                        var cnt = 1;
                        if(ii==0){
                            if(entry.type=="CHECKBOX"){
                                var res = entry.options.split("|");
                                var g = '';
                                res.forEach(function(a) {
                                g+= '<div class="form-check">'+
                                                        '<input class="form-check-input" type="checkbox" value="'+a+'" name="checkbox[]" id="checkbox">'+
                                                        '<label class="form-check-label" for="defaultCheck1">'+
                                                        a+
                                                        '</label>'+
                                                    '</div>'
                                })
                                $("#f").append(                                      
                                    '<div class="col-md-12">'+
                                        '<label class="col-md-6 control-label" for="">'+cnt+'. '+entry.question+'</label>'     +                                   
                                        '<div class="col-md-6">'+
                                        '<input type="hidden" name="checkbox_qid" value="'+entry.id+'">'+
                                        '<input type="hidden" name="type" value="CHECKBOX">'+
                                        '<input type="hidden" name="qid" value="'+entry.id+'">'+
                                            g+
                                        '</div>'+
                                    '</div>'                            
                                );   
                                cnt++;
                            } 

                            if(entry.type=="MULTIPLE CHOICE"){
                                var res = entry.options.split("|");
                                var g = '';
                                res.forEach(function(a) {
                                    //g+='<div class="checkbox"><input type="radio" value='+a+' name="mc_'+i+'" id="mc_'+i+'" class=""><label>'+a+'</label></div>'
                                    g+= '<div class="form-check">'+
                                            '<input class="form-check-input" type="radio" value="'+a+'" name="mc" id="mc_'+a+'">'+
                                            '<label class="form-check-label" for="'+a+'">'+
                                            '<input type="hidden" name="type" value="MULTIPLE CHOICE">'+
                                            '<input type="hidden" name="qid" value="'+entry.id+'">'+
                                                a+
                                            '</label>'+
                                        '</div>'
                                })
                                /* $("#form").append(
                                '<div class="form-group">'+
                                    '<div class="form-group">'+
                                        '<label class="col-md-2 control-label" for="">'+i+'. '+entry.question+'</label>'+
                                        '<div class="col-md-1">'+
                                            g+
                                        '</div>'+
                                    '</div>'+
                                '</div>'); */
                                $("#f").append(                                      
                                    '<div class="col-md-12">'+
                                        //'<label class="col-md-6 control-label" for="">'+i+'. '+entry.question+'</label>'     +     
                                        '<label class="col-md-6 control-label" for="">'+cnt+'. '+entry.question+'</label>'     +                                   
                                        '<div class="col-md-6">'+
                                        '<input type="hidden" name="qid'+entry.id+'" value="'+entry.id+'">'+
                                            g+
                                        '</div>'+
                                    '</div>'                            
                                );
                                cnt++;
                            }

                            if(entry.type=="SHORT ANSWER"){
                                //var res = entry.options.split("|");
                                /* $("#form").append(
                                '<div class="form-group">'+
                                    '<div class="form-group">'+
                                        '<label class="col-md-2 control-label" for="">'+i+'. '+entry.question+'</label>'+
                                        '<div class="col-md-6">'+
                                            '<input type="text" name="sa_'+i+'" id="sa_'+i+'" class="form-control">'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'); */
                                $("#f").append(                                      
                                    '<div class="col-md-12">'+
                                        //'<label class="col-md-6 control-label" for="">'+i+'. '+entry.question+'</label>'     +   
                                        '<label class="col-md-6 control-label" for="">'+cnt+'. '+entry.question+'</label>'     +                                   
                                        '<div class="col-md-6">'+
                                            '<input type="hidden" name="qid'+entry.id+'" value="'+entry.id+'">'+
                                            '<input type="text" name="shortanswer" id="shortanswer" class="form-control">'+
                                            '<input type="hidden" name="type" value="SHORT ANSWER">'+
                                            '<input type="hidden" name="qid" value="'+entry.id+'">'+
                                        '</div>'+
                                    '</div>'                            
                                );
                                cnt++;
                            }

                            if(entry.type=="PARAGRAPH"){
                                //var res = entry.options.split("|");
                                /* $("#form").append(
                                '<div class="form-group">'+
                                    '<div class="form-group">'+
                                        '<label class="col-md-2 control-label" for="">'+i+'. '+entry.question+'</label>'+
                                        '<div class="col-md-6">'+
                                            '<textarea name="pr_'+i+'" id="pr_'+i+'" class="form-control"></textarea>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'); */
                                $("#f").append(                                      
                                    '<div class="col-md-12">'+
                                        //'<label class="col-md-6 control-label" for="">'+i+'. '+entry.question+'</label>'     +   
                                        '<label class="col-md-6 control-label" for="">'+cnt+'. '+entry.question+'</label>'     +                                   
                                        '<div class="col-md-6">'+
                                            '<input type="hidden" name="qid'+entry.id+'" value="'+entry.id+'">'+
                                            '<textarea name="paragraph" id="paragraph" class="form-control"></textarea>'+
                                            '<input type="hidden" name="type" value="PARAGRAPH">'+                                            
                                            '<input type="hidden" name="qid" value="'+entry.id+'">'+
                                        '</div>'+
                                    '</div>'                            
                                );
                                cnt++;
                            }

                            if(entry.type=="SWITCH"){
                                /* $("#footerScript").empty();    
                                $("#headerStyle").empty();
                                $('<script/>',{type:'text/javascript', src:'/assets/toggle/bootstrap-toggle.min.js'}).appendTo('#footerScript');   
                                $('#headerStyle').append( $('<link rel="stylesheet" type="text/css" />').attr('href', '/assets/toggle/bootstrap-toggle.min.css') ); */
                                /* $("#f").append(                                      
                                    '<div class="col-md-12">'+
                                        '<label class="col-md-6 control-label" for="">'+CNT+'. '+entry.question+'</label>'     +                                   
                                        '<div class="col-md-6">'+
                                            '<input type="hidden" name="swopt_qid_'+entry.id+'" value="'+entry.id+'">'+
                                            '<input type="checkbox" checked  id="sws_'+cnt_sw+'"  name="sws_'+cnt_sw+'" data-toggle="toggle"'+
                                            ' data-on="True" data-off="False" data-onstyle="primary" data-offstyle="danger">'+
                                            '<input type="hidden" name="type" value="sw">'+

                                        '</div>'+
                                    '</div>'                           
                                );
                                cnt_sw++; */
                                $("#f").empty();
                                $("#f").append(                                      
                                    '<div class="col-md-12">'+
                                        '<label class="col-md-6 control-label" for="">'+cnt+'. '+entry.question+'</label>'     +                                   
                                        '<div class="col-md-6">'+
                                        ' <input type="checkbox"  id="sws_'+cnt+'"  name="sws_'+cnt+'" checked data-toggle="toggle" data-onstyle="primary" data-offstyle="danger">'+
                                        '<input type="hidden" name="type" value="SWITCH">'+                                        
                                        '<input type="hidden" name="qid" value="'+entry.id+'">'+
                                        '</div>'+
                                    '</div>'                           
                                );
                                getsws = "sws_"+cnt;                                
                               // $('#sws_'+cnt).bootstrapToggle();
                                cnt++;
                            }
                            ii++;
                            $("#btns").append('<button type="button" id="nextBtn" disabled onclick="next('+ii+","+cnt+')" class="btn btn-primary">Next</button> ');  
                            $("#btns").append('<button type="button" id="skipBtn" onclick="skip('+ii+","+cnt+')" class="btn btn-danger">Skip</button> '); 
                            $("#btns").append('<button type="button" id="hintBtn" onclick="hint('+gethint+')" class="btn btn-warning">Hint</button> ');  
                            $("#btns").append('<button type="button" btn="submitBtn" onclick="save('+ii+","+cnt+')" class="btn btn-success">Submit</button> ');  
                            getii = ii;
                            getcnt = cnt;
                            gethint=entry.id;
                        }else{
                            
                        }
                                               
                        
                    });
                    /* $("#btns").append('<button type="button" id="skipBtn" onclick="skip('+getii+","+getcnt+')" class="btn btn-danger">Skip</button> ');   */
                    /* $("#btns").append('<button type="button" id="hintBtn" onclick="hint('+gethint+')" class="btn btn-warning">Hint</button> ');  
                    $("#btns").append('<button type="button" btn="submitBtn" onclick="save()" class="btn btn-success">Submit</button> ');   */
                    
                    $("#footerScript").empty();    
                    $("#headerStyle").empty();
                    $('<script/>',{type:'text/javascript', src:'/assets/toggle/bootstrap-toggle.min.js'}).appendTo('#footerScript');   
                    $('#headerStyle').append( $('<link rel="stylesheet" type="text/css" />').attr('href', '/assets/toggle/bootstrap-toggle.min.css') );
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error! Contact IT Department.');
                }
            });
        }
    }

    function next(counter,cnt) {
        
        $("#nextBtn").attr("disabled",true)
        $("#skipBtn").attr("disabled",false)
        var origcnt = cnt;
            var item = getData[counter];//getData.find(item => item.id === counter);                
            var nxt_counter = counter+1;
            var prev_counter = counter-1;                  
            var nxt_cnt = cnt+1;
            var prev_cnt = cnt-1; 
            /* if(item.id){
                showAnswer(item.id)
            }   */  
            console.log(counter)
            console.log(counter+" prev counter")
            console.log(item.type+" type")
                            if(item.type=="CHECKBOX"){
                                $("#f").empty();
                                var res = item.options.split("|");
                                var g = '';
                                res.forEach(function(a) {
                                g+= '<div class="form-check">'+
                                                        '<input class="form-check-input" type="checkbox" value="'+a+'" name="checkbox[]" id="checkbox_'+a+'">'+
                                                        '<label class="form-check-label" for="">'+
                                                            a+
                                                        '</label>'+
                                                    '</div>'
                                })
                                if(item.id){
                                    showAnswer(item.id,res,"cb")
                                }  
                                $("#f").append(                                      
                                    '<div class="col-md-12">'+
                                        '<label class="col-md-6 control-label" for="">'+cnt+'. '+item.question+'</label>'     +                                   
                                        '<div class="col-md-6">'+
                                        '<input type="hidden" name="qid" value="'+item.id+'">'+
                                        '<input type="hidden" id="cb_update_id" name="cb_update_id">'+
                                        '<input type="hidden" name="type" value="CHECKBOX">'+
                                            g+
                                        '</div>'+
                                    '</div>'                            
                                );   
                            } 

                            if(item.type=="MULTIPLE CHOICE"){
                                $("#f").empty();
                                var res = item.options.split("|");
                                var g = '';
                                res.forEach(function(a) {
                                     g+= '<div class="form-check">'+
                                            '<input class="form-check-input" type="radio" value="'+a+'" name="mc" id="mc_'+a+'">'+
                                            '<label class="form-check-label" for="">'+
                                                a+
                                            '</label>'+
                                        '</div>'
                                })
                                if(item.id){
                                    showAnswer(item.id,res,"mc")
                                }  
                                $("#f").append(                                      
                                    '<div class="col-md-12">'+
                                        '<label class="col-md-6 control-label" for="">'+cnt+'. '+item.question+'</label>'     +                                   
                                        '<div class="col-md-6">'+
                                        '<input type="hidden" name="qid" value="'+item.id+'">'+
                                        '<input type="hidden" id="mc_update_id" name="mc_update_id">'+
                                        '<input type="hidden" name="type" value="MULTIPLE CHOICE">'+
                                            g+
                                        '</div>'+
                                    '</div>'                            
                                );
                            }

                            if(item.type=="SHORT ANSWER"){
                                if(item.id){
                                    showAnswer(item.id,'',"sa")
                                }  
                                $("#f").empty();
                                $("#f").append(                                      
                                    '<div class="col-md-12">'+
                                        '<label class="col-md-6 control-label" for="">'+cnt+'. '+item.question+'</label>'     +                                   
                                        '<div class="col-md-6">'+
                                            '<input type="hidden" name="qid" value="'+item.id+'">'+
                                            '<input type="hidden" id="sa_update_id" name="sa_update_id">'+
                                            '<input type="text" name="shortanswer" id="shortanswer" class="form-control">'+
                                            '<input type="hidden" name="type" value="SHORT ANSWER">'+
                                        '</div>'+
                                    '</div>'                            
                                );
                            }

                            if(item.type=="PARAGRAPH"){
                                if(item.id){
                                    showAnswer(item.id,'',"pr")
                                }  
                                $("#f").empty();
                                $("#f").append(                                      
                                    '<div class="col-md-12">'+
                                        '<label class="col-md-6 control-label" for="">'+cnt+'. '+item.question+'</label>'     +                                   
                                        '<div class="col-md-6">'+
                                            '<input type="hidden" name="qid" value="'+item.id+'">'+
                                            '<input type="hidden" id="pr_update_id" name="pr_update_id">'+
                                            '<textarea name="paragraph" id="paragraph" class="form-control"></textarea>'+
                                            '<input type="hidden" name="type" value="PARAGRAPH">'+
                                        '</div>'+
                                    '</div>'                            
                                );
                            }

                            if(item.type=="SWITCH"){
                                if(item.id){
                                    showAnswer(item.id,'',"sw")
                                }  
                                   $("#f").empty();
                                $("#f").append(                                      
                                    '<div class="col-md-12">'+
                                        '<label class="col-md-6 control-label" for="">'+cnt+'. '+item.question+'</label>'     +                                   
                                        '<div class="col-md-6">'+
                                            '<input type="hidden" name="qid" value="'+item.id+'">'+
                                            '<input type="hidden" id="sw_update_id" name="sw_update_id">'+
                                            ' <input type="checkbox"  id="sws_'+cnt+'"  name="sws_'+cnt+'" data-toggle="toggle" data-onstyle="primary" data-offstyle="danger">'+
                                            '<input type="hidden" name="type" value="SWITCH">'+
                                            '</div>'+
                                    '</div>'                           
                                );
                                $('#sws_'+cnt).bootstrapToggle();
                                getsws = "sws_"+cnt;
                            }
                            cnt++;
                            $("#btns").empty();
                           

                            if(origcnt>1){
                                $("#btns").append('<button type="button" id="prevBtn" onclick="next('+prev_counter+","+prev_cnt+')" class="btn btn-primary">Prev</button> ');  
                            }

                            if(origcnt<getData.length){
                                $("#btns").append('<button type="button" id="nextBtn" disabled onclick="next('+nxt_counter+","+nxt_cnt+')" class="btn btn-primary">Next</button> '); 
                               $("#btns").append('<button type="button" id="skipBtn" onclick="skip('+nxt_counter+","+nxt_cnt+')" class="btn btn-danger">Skip</button> ');  
                            }  
                            
                            $("#btns").append('<button type="button" id="hintBtn" onclick="hint('+item.id+')" class="btn btn-warning">Hint</button> ');  
                            $("#btns").append('<button type="button" btn="submitBtn" onclick="save('+nxt_counter+","+nxt_cnt+')" class="btn btn-success">Submit</button> ');      
                     
                            if((counter+1)==getData.length){
                                $("#btns").append('<button type="button" btn="donetBtn" onclick="setDone()" class="btn btn-success">Finish Quiz</button> ');
                            } 

     }

    function save(counter,cnt) {
        var datas = $('#form').serializeArray();
        datas.push({
            name: "swopt",
            value: $("#"+getsws).prop("checked") == true?true:false,
        });   
        datas.push({
            name: "lid",
            value: id,
        });
        datas.push({
            name: "cid",
            value: lid,
        });
        datas.push({
            name: "isskip",
            value: isskip,
        });
        
        $.ajax({
            url: "{{ url('/admin/user_student/student_quiz_submit_answers') }}",
            type: "post",
            data: datas,
            dataType: 'JSON',
            success: function(data) {
              // location = "/admin/user_vendor/vendor_lesson_list/{{request()->route('cid')}}";
              isskip = false;
              $("#nextBtn").attr("disabled",false)
              $("#skipBtn").attr("disabled",true)
              next(counter,cnt)
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error! Contact IT Department.');
            }
        });
    }

    function skip(i,cnt){
        isskip = true;
        var result = confirm("Want to skip?");
        if (result) {
            save();
            next(i,cnt)
        }
    }

    function hint(id){
        $("#hintModal").modal('show');
        i = getData.find(item => item.id === id);     
        $("#hint").text(i.hint) 
    }

    function showAnswer(thisLid,val,type) {
        console.log(val)
        $.ajax({
            url: "{{ url('/admin/user_student/student_quiz_show_submit_answers') }}/"+thisLid,
            type: "get",
            dataType: 'JSON',
            success: function(data) {
                if(data.data){
                    $("#nextBtn").attr("disabled",false);
                    $("#skipBtn").attr("disabled",true);
                }else{
                    $("#nextBtn").attr("disabled",true);
                    $("#skipBtn").attr("disabled",false);
                }
                if(type=="cb")
                {
                    $("#cb_update_id").val(data.data.id)
                    var ans = data.data.answer.split("|");
                    val.forEach(function(a) {
                        ans.forEach(function(b) {
                            if(a==b){
                                $("#checkbox_"+a).prop("checked", true);
                            }
                        })                  
                    })
                }

                if(type=="mc")
                {
                    $("#mc_update_id").val(data.data.id)
                    val.forEach(function(a) {

                        if(a==data.data.answer){
                            $("#mc_"+a).prop("checked", true);
                        }             
                    });
                }

                if(type=="sa")
                {
                    $("#sa_update_id").val(data.data.id);
                    $("#shortanswer").val(data.data.answer);
                }

                if(type=="pr")
                {
                    $("#pr_update_id").val(data.data.id);
                    $("#paragraph").val(data.data.answer);
                }

                if(type=="sw")
                {
                    $("#sw_update_id").val(data.data.id);
                    if(data.data.answer=='true'){
                        $("#"+getsws).bootstrapToggle('on')
                    }else{
                        $("#"+getsws).bootstrapToggle('off')
                    }                
                }

            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error! Contact IT Department.');
            }
        });
    }

    function setDone() {
        
        $("#f").empty();
                                $("#f").append(                                      
                                    '<div class="col-md-12">'+
                                        '<label class="col-md-6 control-label" for="">No. of Questions: 5</label><br>'     +  
                                        '<label class="col-md-6 control-label" for="">No. of Correct Answer: 6</label><br>'     +  
                                        '<label class="col-md-6 control-label" for="">Marks:</label><ul>'     +  
                                        '<li><label class="col-md-6 control-label" for="">Total: 100</label></li>'     +  
                                        '<li><label class="col-md-6 control-label" for="">Achieve: 80</label></li>'     +  
                                        '<li><label class="col-md-6 control-label" for="">Total: 80%</label></li></ul>'     +   
                                    '</div>'                            
                                );
    }
</script>


@endsection