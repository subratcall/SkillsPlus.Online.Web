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
                                            '<input class="form-check-input" type="radio" value="'+a+'" name="mc" id="mc">'+
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
                                        '<label class="col-md-6 control-label" for="">'+i+'. '+entry.question+'</label>'     +                                   
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
                                        '<label class="col-md-6 control-label" for="">'+i+'. '+entry.question+'</label>'     +                                   
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
                                        '<label class="col-md-6 control-label" for="">'+i+'. '+entry.question+'</label>'     +                                   
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
                            
                            getii = ii;
                            getcnt = cnt;
                            $("#btns").append('<button type="button" onclick="next('+ii+","+cnt+')" class="btn btn-primary">Next</button> ');  
                        }else{
                            
                        }
                                               
                        
                    });
                    $("#btns").append('<button type="button" onclick="skip('+getii+","+getcnt+')" class="btn btn-danger">Skip</button> ');  
                    $("#btns").append('<button type="button" onclick="save()" class="btn btn-warning">Hint</button> ');  
                    $("#btns").append('<button type="button" onclick="save()" class="btn btn-success">Submit</button> ');  
                    
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
        var origcnt = cnt;
            var item = getData[counter];//getData.find(item => item.id === counter);                
            var nxt_counter = counter+1;
            var prev_counter = counter-1;                  
            var nxt_cnt = cnt+1;
            var prev_cnt = cnt-1;           
                            if(item.type=="CHECKBOX"){
                                $("#f").empty();
                                var res = item.options.split("|");
                                var g = '';
                                res.forEach(function(a) {
                                g+= '<div class="form-check">'+
                                                        '<input class="form-check-input" type="checkbox" value="'+a+'" name="checkbox[]" id="checkbox">'+
                                                        '<label class="form-check-label" for="">'+
                                                        a+
                                                        '</label>'+
                                                    '</div>'
                                })
                                $("#f").append(                                      
                                    '<div class="col-md-12">'+
                                        '<label class="col-md-6 control-label" for="">'+cnt+'. '+item.question+'</label>'     +                                   
                                        '<div class="col-md-6">'+
                                        '<input type="hidden" name="qid" value="'+item.id+'">'+
                                        '<input type="hidden" name="type" value="CHECKBOX">'+
                                            g+
                                        '</div>'+
                                    '</div>'                            
                                );   
                                //cnt++;
                            } 

                            if(item.type=="MULTIPLE CHOICE"){
                                $("#f").empty();
                                var res = item.options.split("|");
                                var g = '';
                                res.forEach(function(a) {
                                     g+= '<div class="form-check">'+
                                            '<input class="form-check-input" type="radio" value="'+a+'" name="mc" id="mc">'+
                                            '<label class="form-check-label" for="">'+
                                                a+
                                            '</label>'+
                                        '</div>'
                                })
                                $("#f").append(                                      
                                    '<div class="col-md-12">'+
                                        '<label class="col-md-6 control-label" for="">'+cnt+'. '+item.question+'</label>'     +                                   
                                        '<div class="col-md-6">'+
                                        '<input type="hidden" name="qid" value="'+item.id+'">'+
                                        '<input type="hidden" name="type" value="MULTIPLE CHOICE">'+
                                            g+
                                        '</div>'+
                                    '</div>'                            
                                );
                                //cnt++;
                            }

                            if(item.type=="SHORT ANSWER"){
                                $("#f").empty();
                                $("#f").append(                                      
                                    '<div class="col-md-12">'+
                                        '<label class="col-md-6 control-label" for="">'+cnt+'. '+item.question+'</label>'     +                                   
                                        '<div class="col-md-6">'+
                                            '<input type="hidden" name="qid" value="'+item.id+'">'+
                                            '<input type="text" name="shortanswer" id="shortanswer" class="form-control">'+
                                            '<input type="hidden" name="type" value="SHORT ANSWER">'+
                                        '</div>'+
                                    '</div>'                            
                                );
                            }

                            if(item.type=="PARAGRAPH"){
                                $("#f").empty();
                                $("#f").append(                                      
                                    '<div class="col-md-12">'+
                                        '<label class="col-md-6 control-label" for="">'+cnt+'. '+item.question+'</label>'     +                                   
                                        '<div class="col-md-6">'+
                                            '<input type="hidden" name="qid" value="'+item.id+'">'+
                                            '<textarea name="paragraph" id="paragraph" class="form-control"></textarea>'+
                                            '<input type="hidden" name="type" value="PARAGRAPH">'+
                                        '</div>'+
                                    '</div>'                            
                                );
                            }

                            if(item.type=="SWITCH"){
                                $("#f").empty();
                                $("#f").append(                                      
                                    '<div class="col-md-12">'+
                                        '<label class="col-md-6 control-label" for="">'+cnt+'. '+item.question+'</label>'     +                                   
                                        '<div class="col-md-6">'+
                                            '<input type="hidden" name="qid" value="'+item.id+'">'+
                                        ' <input type="checkbox"  id="sws_'+cnt+'"  name="sws_'+cnt+'" data-toggle="toggle" data-onstyle="primary" data-offstyle="danger">'+
                                        '<input type="hidden" name="type" value="SWITCH">'+
                                        '</div>'+
                                    '</div>'                           
                                );
                                $('#sws_'+cnt).bootstrapToggle();
                                getsws = "sws_"+cnt;
                                //cnt_sw++;
                                //cnt++;
                            }
                            cnt++;
                            $("#btns").empty();
                            //$("#btns").append('<button type="button" onclick="next('+prev_counter+","+prev_cnt+')" class="btn btn-primary">Prev</button>');  
                            

                            if(origcnt>1){
                                $("#btns").append('<button type="button" onclick="next('+prev_counter+","+prev_cnt+')" class="btn btn-primary">Prev</button> ');  
                            }

                            if(origcnt<getData.length){
                                $("#btns").append('<button type="button" onclick="next('+nxt_counter+","+nxt_cnt+')" class="btn btn-primary">Next</button> '); 
                            }  
                            
                            $("#btns").append('<button type="button" onclick="skip('+prev_counter+","+prev_cnt+')" class="btn btn-danger">Skip</button> ');  
                            $("#btns").append('<button type="button" onclick="save()" class="btn btn-warning">Hint</button> ');  
                            $("#btns").append('<button type="button" onclick="save()" class="btn btn-success">Submit</button> ');      
                                         
                  /*   $("#footerScript").empty();    
                    $("#headerStyle").empty();        
                    
                            $('<script/>',{type:'text/javascript', src:'/assets/toggle/bootstrap-toggle.min.js'}).appendTo('#footerScript');   
                            $('#headerStyle').append( $('<link rel="stylesheet" type="text/css" />').attr('href', '/assets/toggle/bootstrap-toggle.min.css') ); */
      
    }

    function save() {
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
</script>


@endsection