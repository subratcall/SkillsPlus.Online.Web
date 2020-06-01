@extends('admin.newlayout.layout',['breadcom'=>['Report','Users']])
@section('title')
New Channel
@endsection

@section('style')
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
        display:none !important; 
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
            <form method="post" class="" id="form">
                <div class="form-group">
                    <label class="control-label" for="inputDefault">Type</label>
                    <select name="type" id="type" class="form-control" onchange="selectType()">
                        <option disabled selected>Choose...</option>
                        <option value="Multiple Choice">Multiple Choice</option>
                        <option value="Checkbox">Checkbox</option>
                        <option value="Short Answer">Short Answer</option>
                        <option value="Paragraph">Paragraph</option>
                        <option value="Switch">Switch</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label" for="inputDefault">Question</label>
                    <textarea name="question" id="question" cols="30" rows="5" class="form-control"></textarea>
                </div>
                <div class="form-group hidden">
                    <label class="control-label">{{{ trans('main.cover') }}}</label>
                    <div class="input-group">
                        <span class="input-group-addon view-selected img-icon-s" data-toggle="modal" data-target="#ImageModal" data-whatever="image"><span class="formicon mdi mdi-eye"></span></span>
                        <input type="text" name="image" dir="ltr" class="form-control">
                        <span class="input-group-addon click-for-upload img-icon-s"><span class="formicon mdi mdi-arrow-up-thick"></span></span>
                    </div>
                </div>
                <div class="form-group hidden" id="shortAnswer">
                    <label class="control-label">Short Answer</label>
                    <textarea class="form-control" name="short_ans" id="short_ans"></textarea>
                </div>
                <div class="form-group hidden" id="multipleDiv">
                    <button type="button" class="btn btn-success btn-xs" onclick="addOption()">Add Option</button>       
                </div>
                <div class="form-group hidden" id="checkDiv">
                    <button type="button" class="btn btn-success btn-xs" onclick="addOptionCheck()">Add Option</button>       
                </div>
                <div class="form-group hidden" id="paragraphDiv">
                    <label class="control-label">Paragraph</label>
                    <input type="text" name="paragraph" id="paragraph" class="form-control">
                </div>
                <div class="form-group hidden" id="swtichDiv">
                    <label class="control-label">Switch</label>
                    <input type="checkbox" checked  id="switchOpt"  name="switchOpt" data-toggle="toggle" data-on="True" data-off="False" data-onstyle="primary" data-offstyle="danger">
                </div>
                <div class="form-group">
                    <label class="control-label" for="inputDefault">Hint</label>
                    <textarea name="hint" id="hint" cols="30" rows="5" class="form-control"></textarea>
                </div>                
                <div class="form-group">
                    <label class="control-label" for="inputDefault">Remarks</label>
                    <textarea name="remarks" id="remarks" cols="30" rows="5" class="form-control"></textarea>
                </div>
                <div class="form-group col-12">
                    <label class="control-label">{{{ trans('main.video_file') }}}</label>
                    <div class="input-group">
                        <span class="input-group-prepend view-selected img-icon-s" data-toggle="modal" data-target="#VideoModal" data-whatever="upload_video" data-toggle="modal">
                            <span class="input-group-text"><i class="fa fa-eye" aria-hidden="true"></i></span>
                        </span>
                        <input type="text" name="file" id="file" dir="ltr" class="form-control">
                        <span class="input-group-append click-for-upload cu-p">
                            <span class="input-group-text"><i class="fa fa-upload" aria-hidden="true"></i></span>
                            </span>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label" for="inputDefault">Timer in Minutes</label>
                    <input type="number" name="timer" id="timer" class="form-control">
                </div>  
                <div class="form-group">
                    <button type="button" class="btn btn-success pull-left" onclick="save()">{{{ trans('main.save_changes') }}}</button>
                </div>
            </form>                        
            </div>
        </div>
    </div>
</section>


@endsection

@section('script')
<link href="/assets/toggle/bootstrap-toggle.min.css" rel="stylesheet">
<script src="/assets/toggle/bootstrap-toggle.min.js"></script>
<script>
    var id = "{{request()->route('id')}}";
    var inputId = 0;
    var inputIdCheck = 0;
    var selecetdMultipleAnswer = '';
    tbl = '';
    $(document).ready(function() {
        
    });
    function selectType(){
        if($("#type").val()=="Multiple Choice"){
            $("#multipleDiv").removeClass("hidden");
        }else{
            $("#multipleDiv").addClass("hidden");
        }

        if($("#type").val()=="Checkbox"){
            $("#checkDiv").removeClass("hidden");
        }else{
            $("#checkDiv").addClass("hidden");
        }

        if($("#type").val()=="Short Answer"){
            $("#shortAnswer").removeClass("hidden");
        }else{
            $("#shortAnswer").addClass("hidden");
        }

        if($("#type").val()=="Paragraph"){
            $("#paragraphDiv").removeClass("hidden");
        }else{
            $("#paragraphDiv").addClass("hidden");
        }

        if($("#type").val()=="Paragraph"){
            $("#paragraphDiv").removeClass("hidden");
        }else{
            $("#paragraphDiv").addClass("hidden");
        }

        if($("#type").val()=="Switch"){
            $("#swtichDiv").removeClass("hidden");
        }else{
            $("#swtichDiv").addClass("hidden");
        }
    }

    function addOption(){
        $("#multipleDiv").append(
            '<div class="input-group" id="opts_'+inputId+'">'+
                '<input type="text" class="form-control" placeholder="" name="option[]" id="option'+inputId+'">'+
                '<div class="input-group-append">'+
                    '<span class="input-group-text">'+
                       '<input type="radio" class="form-control" name="checkbox" id="checkbox_'+inputId+'" onclick="selectAnswer('+"'option"+inputId+"',"+inputId+')">'+
                   ' </span>'+
                        '<button class="btn btn-warning" type="button" onclick="removeOption('+"'opts_"+inputId+"'"+')"><i class="fa fa-trash" aria-hidden="true"></i></button>'+
                    '</div>'   +
            '</div>'            
        );
        inputId++;
    }

    function addOptionCheck(){
        $("#checkDiv").append(
            '<div class="input-group" id="optscheck_'+inputIdCheck+'">'+
                '<input type="text" class="form-control" placeholder="" name="optioncheck[]" id="optioncheck'+inputIdCheck+'">'+
                '<div class="input-group-append">'+                    
                    '<span class="input-group-text">'+
                       '<input type="checkbox" class="form-control btn-warning" name="checkboxcheck[]" id="checkboxcheck_'+inputIdCheck+'" onclick="selectAnswercheck('+"'optioncheck"+inputIdCheck+"',"+inputIdCheck+')" aria-label="...">'+
                   ' </span>'+
                    '<button class="btn btn-warning" type="button" onclick="removeOptioncheck('+"'optscheck_"+inputIdCheck+"'"+')"><i class="fa fa-trash" aria-hidden="true"></i></button>'+
                '</div>'   +
            '</div>'            
        );
        inputIdCheck++;
    }

    function removeOption(e){
        $("#"+e).remove();
    }

    function removeOptioncheck(e){
        $("#"+e).remove();
    }

    function save(){
        var data = $('#form').serializeArray();
        
        data.push({
            name: 'swtich',
            value: $("#switchOpt").prop("checked") == true?true:false
        });
        $.ajax({
            url: "{{ url('/admin/question/store') }}",
            type: "post",
            data: data,
            dataType: 'JSON',
            success: function(data) {
                //location = "/admin/question";                
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error! Contact IT Department.');
            }
        });
    }

    function selectAnswer(e,i){
        $("#checkbox_"+i).val($("#"+e).val())
    }

    function selectAnswercheck(e,i){
        $("#checkboxcheck_"+i).val($("#"+e).val())
    }
    
</script>
@endsection