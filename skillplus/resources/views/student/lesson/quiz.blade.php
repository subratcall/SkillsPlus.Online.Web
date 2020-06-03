@extends('student.layout.quiz',['breadcom'=>['Lesson','Edit']])

@section('title')
<div class="col-md-4">
    <button type="button" onclick="start()" class="btn btn-success btn-sm">Start</button>
</div>
@endsection

<div class="row">
    <div class="col-12">
        {{-- <div class="col-md-4">
            <a href="/admin/user_student/student_show_course/{{request()->route('lid')}}"
        class="btn btn-warning btn-sm">Back</a><br>
    </div>
    <div class="col-md-4">
        <p id="titleQuiz"></p>
    </div>
    <div class="col-md-2">
        <div><span>
                <h4 id="time">
            </span> </h4>
        </div>
        <div class="col-md-2">
            <button type="button" onclick="start()" class="btn btn-success btn-sm">Start</a><br>
        </div>
        --}}
    </div>
</div>


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

    .hidden {
        display: none;
    }

    .card {
        margin-left: 20px;
        margin-right: 20px;
    }

    .margin-top-lg {
        margin-top: 100px;
    }

    #start-quiz .modal-dialog {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
    }

    #start-quiz .modal-dialog {
        height: auto;
        min-height: 100%;
        border-radius: 0;
    }

    .modal-dialog-full-width {
        width: 100% !important;
        height: 100% !important;
        margin: 0 !important;
        padding: 0 !important;
        max-width: none !important;

    }

    .modal-content-full-width {
        height: auto !important;
        min-height: 100% !important;
        border-radius: 0 !important;
        background-color: #ececec !important
    }

    .modal-header-full-width {
        border-bottom: 1px solid #9ea2a2 !important;
    }

    .modal-footer-full-width {
        border-top: 1px solid #9ea2a2 !important;
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
            <div class="col-12" id="div">
                <div class="row">
                    <div class="col-md-6">
                        <h1>Quiz title: <div class="display-inline" id="titleQuiz"></div>
                        </h1>
                    </div>

                    <div class="col-md-6 text-right">
                        <h4 class="padding-top">Timer: <div class="display-inline" id="time"></div>
                        </h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <form id="form" class="form-horizontal">
                            <div class="row" id="f"></div>
                            {{-- <div class="col-md-12">
                                            <label class="col-md-6 control-label" for="">dsfgfdgfdgdfgfdg</label>                                
                                            <div class="col-md-6">
                                                <input type="checkbox" checked id="sw2">
                                                <input type="checkbox" checked id="sw1">
                                                <input type="checkbox" checked id="sw3">
                                                
                                            </div>
                                            <div style="border:solid;width: 50%">
                                                <p>Correct Answer:12</p>
                                                <p>Remarks: safdsfsdfsdfsdfdfd</p>
                                            </div>
                                        </div> --}}

                            <br>
                            <div class="form-group form-horizontal margin-top-lg" id="btns"></div>
                        </form>
                    </div>
                </div>

                <!-- <button type="button" onclick="save()" class="btn btn-success">Submit</button> -->
            </div>
        </div>
    </div>
</section>

@endsection

@section('modals')

<div class="modal fade right" id="start-quiz" tabindex="-1" role="dialog" aria-labelledby="start-quiz"
    aria-hidden="true">
    <div class="modal-dialog-full-width modal-dialog momodel modal-fluid" role="document">
        <div class="modal-content-full-width modal-content ">
            <div class=" modal-header-full-width   modal-header text-center">
                <h5 class="modal-title w-100" id="exampleModalPreviewLabel">Course: <div id="course-name"
                        class="display-inline"></div>
                </h5>
                {{-- <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                    <span style="font-size: 1.3em;" aria-hidden="true">&times;</span>
                </button> --}}
            </div>
            <div class="modal-body">

                <h1 class="section-heading text-center wow fadeIn my-5 pt-3">Start Quiz</h1>
                <h1 class="section-heading text-center wow fadeIn my-5 pt-3">
                    <div id="quiz-name"></div>
                </h1>
            </div>
            <div class="modal-footer-full-width  modal-footer">
                <button type="button" class="btn btn-primary btn-md btn-rounded" onclick="start()"
                    data-dismiss="modal">Start</button>
                <a type="button" class="btn btn-danger btn-md btn-rounded"
                    href="/admin/user_student/student_show_course/{{request()->route('lid')}}">Cancel</a>
            </div>
        </div>
    </div>
</div>

<div id="myModal" class="modal fade" role="dialog" id="start-quiz">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <p>Some text in the modal.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

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
var getCorrectData;
var cnt_sw = 0;
var getsws;
var isskip = false;

// default
$("#time").text("00:00");
$("#start-quiz").modal('show');


    // function getCourseName() {
    //     if(id!=null||id!=""){
    //         $.ajax({
    //             url: "{{ url('/admin/user_vendor/vendor_course_show') }}/"+id,
    //             type: "get",
    //             dataType: 'JSON',
    //             headers: {
    //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //             },
    //             success: function(data) {
    //                 $("#course-name").append(data.content)
    //             },
    //             error: function(jqXHR, textStatus, errorThrown) {
    //                 alert('Error! Contact IT Department.');
    //             }
    //         });
    //     }
    // }


    $(document).ready(function() {

        $.ajax({
            url: "{{ url('/admin/user_vendor/vendor_course_show') }}/"+lid,
            type: "get",
            dataType: 'JSON',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                $("#course-name").append(data.content)
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error! Contact IT Department.');
            }
        });


        $.ajax({
            url: "{{ url('/admin/question/get_qh') }}/"+id,
                type: "get",
                dataType: 'JSON',
                success: function(data) {                
                $("#quiz-name").text(data.title);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error! Contact IT Department.');
            }
        });



        $('.editor-te').jqte({format: false});
        loadData2();     
        /* $('#sw2').bootstrapToggle(); */
        //loadQH();
       window.addEventListener('beforeunload', function(e) {
        var myPageIsDirty = true; //you implement this logic...
        if(myPageIsDirty) {
            //following two lines will cause the browser to ask the user if they
            //want to leave. The text of this dialog is controlled by the browser.
            e.preventDefault(); //per the standard
            e.returnValue = ''; //required for Chrome
        }
        //else: user is allowed to leave without a warning dialog
        });


        $.ajax({
            url: "{{ url('/admin/question/get_qh') }}/"+id,
            type: "get",
            dataType: 'JSON',
            success: function(data) {                
                $("#titleQuiz").text(data.title);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error! Contact IT Department.');
            }
        });

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
                                        '<img src='+entry.attachment+'>'+                                                          
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
                                        '<img src='+entry.attachment+'>'+                                                                                           
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
                                        '<img src='+entry.attachment+'>'+                                                                                          
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
                                        //'<label class="col-md-6 control-label" for="">'+i+'. '+entry.question+'</label>'     +   

                                    `
                                    <input type="hidden" name="qid${entry.id}" value="${entry.id}">
                                    <input type="hidden" name="type" value="PARAGRAPH">                                         
                                    <input type="hidden" name="qid" value="${entry.id}">

                                    <div class="col-md-12 margin-top-lg">
                                        <div class="row justify-content-center">  
                                            <div class="col-md-12">
                                                <div class="row justify-content-center">
                                                    <div class="col-md-6">
                                                        <p class="control-label" for="">${cnt} . ${entry.question}</p>
                                                    </div>
                                                </div>
                                            </div>                                                                          
                                            <div class="col-md-12">
                                                <div class="row justify-content-center">
                                                    <div class="col-md-6">
                                                        <img src="${(entry.attachment == true)? entry.attachment:'https://bostonparkingspaces.com/wp-content/themes/classiera/images/nothumb/nothumb370x300.png'}"'>      
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 margin-top">
                                                <textarea name="paragraph" id="paragraph" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>`                           
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

                                    '<div class="col-md-12 margin-top-lg">'+
                                        '<div class="row justify-content-center">'+       
                                            '<div class="col-md-12">'+
                                                '<label class="col-md-6 control-label" for="">'+cnt+'. '+entry.question+'</label>'     +                                   
                                                '<div class="col-md-6">'+
                                                ' <input type="checkbox"  id="sws_'+cnt+'"  name="sws_'+cnt+'" checked data-toggle="toggle" data-onstyle="primary" data-offstyle="danger">'+
                                                '<input type="hidden" name="type" value="SWITCH">'+                                        
                                                '<input type="hidden" name="qid" value="'+entry.id+'">'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'                
                                );
                                getsws = "sws_"+cnt;                                
                               // $('#sws_'+cnt).bootstrapToggle();
                                cnt++;
                            }
                            ii++;
                            //$("#btns").append('<button type="button" id="nextBtn" disabled onclick="next('+ii+","+cnt+')" class="btn btn-primary">Next</button> ');  
                            $("#btns").append(`
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12 text-right">
                                            <button type="button" id="skipBtn" disabled onclick="skip(${ii}, ${cnt})" class="btn btn-danger btn-lg">Skip</button>
                                            <button type="button" id="hintBtn" disabled onclick="hint(${entry.id})" class="btn btn-warning btn-lg">Hint</button>
                                            <button type="button" id="submitBtn" disabled onclick="save(${ii}, ${cnt})" class="btn btn-success btn-lg">Submit</button>
                                        </div>
                                    </div> 
                                </div>
                            `); 
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
                                    '<div class="col-md-12 margin-top-lg">'+
                                        '<label class="col-md-6 control-label" for="">'+cnt+'. '+item.question+'</label>'     +       
                                        '<img src='+item.attachment+'>'+                            
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
                                    '<div class="col-md-12 margin-top-lg">'+
                                        '<label class="col-md-6 control-label" for="">'+cnt+'. '+item.question+'</label>'     +      
                                        '<img src='+item.attachment+'><br>'+                                                                                  
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
                                    '<div class="col-md-12 margin-top-lg">'+
                                        '<label class="col-md-6 control-label" for="">'+cnt+'. '+item.question+'</label>'     +    
                                        '<img src='+item.attachment+'><br>'+                                                                                         
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
                                    '<div class="col-md-12 margin-top-lg">'+
                                        '<label class="col-md-6 control-label" for="">'+cnt+'. '+item.question+'</label>'     +     
                                        '<img src='+item.attachment+'><br>'+                                                                                   
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
                                    '<div class="col-md-12 margin-top-lg">'+
                                        '<label class="col-md-6 control-label" for="">'+cnt+'. '+item.question+'</label>'     +      
                                        '<img src='+item.attachment+'><br>'+                                                                                  
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
                            

                            var btns;

                            btns = ` <div class="col-12">
                                        <div class="row">
                                            <div class="col-12 text-right">`

                            if(origcnt>1){
                                // $("#btns").append('<button type="button" id="prevBtn" onclick="next('+prev_counter+","+prev_cnt+')" class="btn btn-primary">Prev</button> ');  

                                btns += `<button type="button" id="prevBtn" onclick="next(${prev_counter}, ${prev_cnt})" class="btn btn-primary btn-lg">Prev</button>`;
                            }

                            if(origcnt<getData.length){
                                //$("#btns").append('<button type="button" id="nextBtn" disabled onclick="next('+nxt_counter+","+nxt_cnt+')" class="btn btn-primary">Next</button> '); 
                               btns += `<button type="button" id="skipBtn" onclick="skip(${nxt_counter}, ${nxt_cnt})" class="btn btn-danger btn-lg">Skip</button>`;
                            }  
                            
                            // $("#btns").append('<button type="button" id="hintBtn" onclick="hint('+item.id+')" class="btn btn-warning">Hint</button> ');  
                            // $("#btns").append('<button type="button" id="submitBtn" onclick="save('+nxt_counter+","+nxt_cnt+')" class="btn btn-success">Submit</button> '); 

                            btns += `<button type="button" id="hintBtn" onclick="hint(${item.id})" class="btn btn-warning btn-lg">Hint</button>`;
                            btns += `<button type="button" id="submitBtn" onclick="save(${nxt_counter}, ${nxt_cnt})" class="btn btn-success btn-lg">Submit</button>`;

                            btns += `</div></div></div>`;

                            $("#btns").append(btns);
                     
                            /* if((counter+1)==getData.length){
                                $("#btns").append('<button type="button" btn="donetBtn" onclick="setDone()" class="btn btn-success">Finish Quiz</button> ');
                            } */ 



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
              $("#nextBtn").attr("disabled",false);
              $("#skipBtn").attr("disabled",true);

              if(counter==getData.length){
                $("#btns").append(`
                    <button type="button" id="donetBtn" onclick="setDone()" class="btn btn-success btn-lg">Finish Quiz</button>
                `);
                }
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
        $.ajax({
            url: "{{ url('/admin/user_student/student_quiz_check_submit_answers') }}/"+id,
            type: "get",
            dataType: 'JSON',
            success: function(data) {       
                
              $("#prevBtn").addClass("hidden");
              $("#hintBtn").addClass("hidden");
              $("#submitBtn").addClass("hidden");  
              $("#donetBtn").addClass("hidden");  
                $("#f").empty();
                                $("#f").append(                                      
                                    '<div class="col-md-12 margin-top-lg">'+
                                        '<label class="col-md-6 control-label" for="">No. of Questions: '+data.number_of_questions+'</label><br>'     +  
                                        '<label class="col-md-6 control-label" for="">No. of Correct Answer: '+data.number_of_correct+'</label><br>'     +  
                                        '<label class="col-md-6 control-label" for="">Marks:</label><ul>'     +  
                                        '<li><label class="col-md-6 control-label" for="">Total: '+data.total_points+'</label></li>'     +  
                                        '<li><label class="col-md-6 control-label" for="">Achieve: '+data.total_correct_points+'</label></li>'     +  
                                        '<li><label class="col-md-6 control-label" for="">Total: '+data.avg+'</label></li></ul>'     +   
                                    '</div>'                            
                                );
                                
                $("#btns").append('<button type="button" btn="summarytBtn" onclick="displayanswer(0,1)" class="btn btn-danger">View Summary</button> ');
                
                     loadAnswers()
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
                $("#titleQuiz").text(data.title);

                var fiveMinutes = 60 * data.timer,
                    display = $('#time');
                startTimer(fiveMinutes, display);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error! Contact IT Department.');
            }
        });
    }

    function startTimer(duration, display) {
        var timer = duration, minutes, seconds;
       var x = setInterval(function () {
            minutes = parseInt(timer / 60, 10);
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            if(timer==0){
                clearInterval(x); 
            }

            display.text(minutes + ":" + seconds);
            
            if (--timer < 0) {
                timer = duration;
            }
        }, 1000);
    }

    function start(){
        loadQH();
        $("#skipBtn").attr("disabled",false)
        $("#hintBtn").attr("disabled",false)
        $("#submitBtn").attr("disabled",false)


    }

    function displayanswer(counter,cnt) {
        
        $("#nextBtn").attr("disabled",true)
        $("#skipBtn").attr("disabled",false)
        var origcnt = cnt;
            var item = getData[counter];              
            var getCorrectAnswers = getCorrectData[counter];              
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
                                var gc = getCorrectAnswers.answer.split("|");
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
                                    '<div class="col-md-12 margin-top-lg">'+
                                        '<label class="col-md-6 control-label" for="">'+cnt+'. '+item.question+'</label>'     +        
                                        '<img src='+item.attachment+'>'+                                                            
                                        '<div class="col-md-6">'+
                                        '<input type="hidden" name="qid" value="'+item.id+'">'+
                                        '<input type="hidden" id="cb_update_id" name="cb_update_id">'+
                                        '<input type="hidden" name="type" value="CHECKBOX">'+
                                            g+
                                        '</div>'+
                                        '<div style="border:solid;width: 50%">'+
                                            '<p>Correct Answer: '+getCorrectAnswers.answer+'</p>'+
                                            '<p>Remarks: '+getCorrectAnswers.remarks+'</p>'+
                                       ' </div>'+
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
                                    '<div class="col-md-12 margin-top-lg">'+
                                        '<label class="col-md-6 control-label" for="">'+cnt+'. '+item.question+'</label>'     +       
                                        '<img src='+item.attachment+'>'+                                                             
                                        '<div class="col-md-6">'+
                                        '<input type="hidden" name="qid" value="'+item.id+'">'+
                                        '<input type="hidden" id="mc_update_id" name="mc_update_id">'+
                                        '<input type="hidden" name="type" value="MULTIPLE CHOICE">'+
                                            g+
                                        '</div>'+
                                        '<div style="border:solid;width: 50%">'+
                                            '<p>Correct Answer: '+getCorrectAnswers.answer+'</p>'+
                                            '<p>Remarks: '+getCorrectAnswers.remarks+'</p>'+
                                       ' </div>'+
                                    '</div>'                            
                                );
                            }

                            if(item.type=="SHORT ANSWER"){
                                if(item.id){
                                    showAnswer(item.id,'',"sa")
                                }  
                                $("#f").empty();
                                $("#f").append(                                      
                                    '<div class="col-md-12 margin-top-lg">'+
                                        '<label class="col-md-6 control-label" for="">'+cnt+'. '+item.question+'</label>'     +      
                                        '<img src='+item.attachment+'>'+                                                              
                                        '<div class="col-md-6">'+
                                            '<input type="hidden" name="qid" value="'+item.id+'">'+
                                            '<input type="hidden" id="sa_update_id" name="sa_update_id">'+
                                            '<input type="text" name="shortanswer" id="shortanswer" class="form-control">'+
                                            '<input type="hidden" name="type" value="SHORT ANSWER">'+
                                        '</div>'+
                                        '<div style="border:solid;width: 50%">'+
                                            '<p>Correct Answer: '+getCorrectAnswers.answer+'</p>'+
                                            '<p>Remarks: '+getCorrectAnswers.remarks+'</p>'+
                                       ' </div>'+
                                    '</div>'                            
                                );
                            }

                            if(item.type=="PARAGRAPH"){
                                if(item.id){
                                    showAnswer(item.id,'',"pr")
                                }  
                                $("#f").empty();
                                $("#f").append(                                      
                                    '<div class="col-md-12 margin-top-lg">'+
                                        '<label class="col-md-6 control-label" for="">'+cnt+'. '+item.question+'</label>'     +      
                                        '<img src='+item.attachment+'>'+                                                              
                                        '<div class="col-md-6">'+
                                            '<input type="hidden" name="qid" value="'+item.id+'">'+
                                            '<input type="hidden" id="pr_update_id" name="pr_update_id">'+
                                            '<textarea name="paragraph" id="paragraph" class="form-control"></textarea>'+
                                            '<input type="hidden" name="type" value="PARAGRAPH">'+
                                        '</div>'+
                                        '<div style="border:solid;width: 50%">'+
                                            '<p>Correct Answer: '+getCorrectAnswers.answer+'</p>'+
                                            '<p>Remarks: '+getCorrectAnswers.remarks+'</p>'+
                                       ' </div>'+
                                    '</div>'                            
                                );
                            }

                            if(item.type=="SWITCH"){
                                if(item.id){
                                    showAnswer(item.id,'',"sw")
                                }  
                                   $("#f").empty();
                                $("#f").append(                                      
                                    '<div class="col-md-12 margin-top-lg">'+
                                        '<label class="col-md-6 control-label" for="">'+cnt+'. '+item.question+'</label>'     +         
                                        '<img src='+item.attachment+'>'+                                                           
                                        '<div class="col-md-6">'+
                                            '<input type="hidden" name="qid" value="'+item.id+'">'+
                                            '<input type="hidden" id="sw_update_id" name="sw_update_id">'+
                                            ' <input type="checkbox"  id="sws_'+cnt+'"  name="sws_'+cnt+'" data-toggle="toggle" data-onstyle="primary" data-offstyle="danger">'+
                                            '<input type="hidden" name="type" value="SWITCH">'+
                                            '</div>'+
                                        '<div style="border:solid;width: 50%">'+
                                            '<p>Correct Answer: '+getCorrectAnswers.answer+'</p>'+
                                            '<p>Remarks: '+getCorrectAnswers.remarks+'</p>'+
                                       ' </div>'+
                                    '</div>'                           
                                );
                                $('#sws_'+cnt).bootstrapToggle();
                                getsws = "sws_"+cnt;
                            }
                            cnt++;
                            $("#btns").empty();


                            var btns;

                            if(origcnt>1){
                                btns = `<button type="button" id="prevBtn" onclick="displayanswer($${prev_counter}, ${prev_cnt})" class="btn btn-primary">Prev</button>`
                            }

                            if(origcnt<getData.length){
                                btns += `<button type="button" id="nextBtn" disabled onclick="displayanswer(${nxt_counter}, ${nxt_cnt})" class="btn btn-primary">Next</button>`;
                            }

                            if(origcnt==getData.length){
                                btns += `<button type="button" id="donetBtn" onclick="setDone()" class="btn btn-success">View Score</button>`;
                            }
                            
                            $("#btns").append(btns);
                           

                            // if(origcnt>1){
                            //     $("#btns").append('
                            //         <button type="button" id="prevBtn" onclick="displayanswer('+prev_counter+","+prev_cnt+')" class="btn btn-primary">Prev</button> '
                            //     );  
                            // }

                            // if(origcnt<getData.length){
                            //     $("#btns").append('<button type="button" id="nextBtn" disabled onclick="displayanswer('+nxt_counter+","+nxt_cnt+')" class="btn btn-primary">Next</button> '); 
                            // }  

                            // if(origcnt==getData.length){
                            //     $("#btns").append('<button type="button" id="donetBtn" onclick="setDone()" class="btn btn-success">View Score</button> ');
                            // }

    }

    function loadAnswers() {
        $.ajax({
            url: "{{ url('/admin/user_student/student_quiz_get_answers') }}/"+id,
            type: "get",
            dataType: 'JSON',
            success: function(data) {                
                getCorrectData = data.data
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error! Contact IT Department.');
            }
        });
    }
</script>


@endsection