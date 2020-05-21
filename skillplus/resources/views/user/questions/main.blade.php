@extends($user['vendor'] == 1?'user.layout.videolayout':'user.layout_user.videolayout')
@section($user['vendor'] == 1?'tab2':'tab1','active')
@section('tab')
<link href="/assets/toggle/bootstrap-toggle.min.css" rel="stylesheet">
<script src="/assets/toggle/bootstrap-toggle.min.js"></script>


    <div class="h-20"></div>
 
    <div class="container-fluid">
        <div class="container">
            <div class="h-20"></div>
            <div class="col-md-6 col-xs-12 tab-con">
                <div class="ucp-section-box">
                    <div class="header back-red">{{{ trans('main.new_channel') }}}</div>
                    <div class="body">
                        <form method="post" id="form">

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
                                <button type="button" class="btn btn-custom pull-left" onclick="save()">{{{ trans('main.save_changes') }}}</button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xs-12 tab-con">
           
                    <div class="table-responsive">                           
                    <table id="tbl"class="table table-bordered table-striped mb-none display responsive nowrap" cellspacing="0"
                    width="100%">
                        <thead>
                            <tr>
                                <th>Question</th>
                                <th>Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                    </div>
              
            </div>

        </div>
    </div>
@endsection
@section('script')
<link rel='stylesheet' href="/assets/admin/modules/datatables/datatables.min.css">
<script type="application/javascript" src="/assets/admin/modules/datatables/datatables.min.js"></script>
<script>
    var id = "{{request()->route('id')}}";
    var inputId = 0;
    var inputIdCheck = 0;
    var selecetdMultipleAnswer = '';
    tbl = '';
    $(document).ready(function() {
              
        list();  
    });

    function list() {
        $('#tbl').dataTable().fnDestroy();
        tbl = $('#tbl').dataTable({
                    "ajax": {
                        "type": "GET",
                        "url": "{{ url('/user/question/list') }}",
                        "dataSrc": function(json) {
                            return json.data;
                        }
                    },
                    "columns": [{
                            "data": "question"
                        },{
                            "data": "type"
                        },
                        {
                            "data": "action"
                        },
                    ],
                }); 
    }

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
                    '<span class="input-group-btn">'+
                        '<button class="btn btn-warning" type="button" onclick="removeOption('+"'opts_"+inputId+"'"+')"><i class="fa fa-remove" aria-hidden="true"></i></button>'+
                    '</span>'+
                    '<span class="input-group-addon">'+
                       '<input type="radio" class="form-control btn-warning" name="checkbox" id="checkbox_'+inputId+'" onclick="selectAnswer('+"'option"+inputId+"',"+inputId+')" aria-label="...">'+
                   ' </span>'+
                '<input type="text" class="form-control" placeholder="" name="option[]" id="option'+inputId+'">'+
            '</div>'            
        );
        inputId++;
    }

    function addOptionCheck(){
        $("#checkDiv").append(
            '<div class="input-group" id="optscheck_'+inputIdCheck+'">'+
                    '<span class="input-group-btn">'+
                        '<button class="btn btn-warning" type="button" onclick="removeOptioncheck('+"'optscheck_"+inputIdCheck+"'"+')"><i class="fa fa-remove" aria-hidden="true"></i></button>'+
                    '</span>'+
                    '<span class="input-group-addon">'+
                       '<input type="checkbox" class="form-control btn-warning" name="checkboxcheck[]" id="checkboxcheck_'+inputIdCheck+'" onclick="selectAnswercheck('+"'optioncheck"+inputIdCheck+"',"+inputIdCheck+')" aria-label="...">'+
                   ' </span>'+
                '<input type="text" class="form-control" placeholder="" name="optioncheck[]" id="optioncheck'+inputIdCheck+'">'+
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
            url: "{{ url('/user/question/store') }}",
            type: "post",
            data: data,
            dataType: 'JSON',
            success: function(data) {
                //location = "/admin/user_channel/channel";
                // tbl.ajax.reload();
                //$('#tbl').data.reload();
                list();  
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
    <script>
        $('.star-rate').raty({
            starType: 'i',
            score: function () {
                return $(this).attr('data-score');
            },
            click:function (rate) {
                var id = $(this).attr('data-id');
                $.get('/user/video/buy/rate/'+ id +'/' + rate,function (data) {
                    if(data == 0){
                        $.notify({
                            message: 'Sorry feedback not send. Try again.'
                        },{
                            type: 'danger',
                            allow_dismiss: false,
                            z_index: '99999999',
                            placement: {
                                from: "bottom",
                                align: "right"
                            },
                            position:'fixed'
                        });
                    }
                    if(data == 1){
                        $('.btn-submit-confirm').removeAttr('disabled');
                        $.notify({
                            message: 'Your feedback sent successfully.'
                        },{
                            type: 'danger',
                            allow_dismiss: false,
                            z_index: '99999999',
                            placement: {
                                from: "bottom",
                                align: "right"
                            },
                            position:'fixed'
                        });
                    }
                })
            }
        });
    </script>
@endsection
