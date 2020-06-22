@extends('admin.newlayout.layout',['breadcom'=>['Report','Users']])
@section('title')
<p id="titleHeader">New Question</p>
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
  display: none !important;
 }

 .input-group.answer_id_radio,
 .input-group.answer_id_checkbox {
  margin-top: 10px;
 }
</style>
@endsection

@section('page')
<div class="row">
 <div class="col-xs-6 col-md-3 col-sm-6 text-center">
  <div id="test"></div>
 </div>
</div>
</div>
<section class="card">
 <div class="card-body">
  <div class="row">
   <div class="col-lg-12">
    <form method="post" id="form" method="POST">
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
       <span class="input-group-addon view-selected img-icon-s" data-toggle="modal" data-target="#ImageModal"
        data-whatever="image"><span class="formicon mdi mdi-eye"></span></span>
       <input type="text" name="image" dir="ltr" class="form-control">
       <span class="input-group-addon click-for-upload img-icon-s"><span
         class="formicon mdi mdi-arrow-up-thick"></span></span>
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
      <input type="checkbox" checked id="switchOpt" name="switchOpt" data-toggle="toggle" data-on="True"
       data-off="False" data-onstyle="primary" data-offstyle="danger">
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
       <span class="input-group-prepend view-selected img-icon-s" data-toggle="modal" data-target="#VideoModal"
        data-whatever="upload_video" data-toggle="modal">
        <span class="input-group-text"><i class="fa fa-eye" aria-hidden="true"></i></span>
       </span>
       <input type="text" name="file" id="file" dir="ltr" class="form-control">
       <span class="input-group-append click-for-upload cu-p">
        <span class="input-group-text"><i class="fa fa-upload" aria-hidden="true"></i></span>
       </span>
      </div>
     </div>

     <div class="form-group">
      <label class="control-label" for="inputDefault">Points</label>
      <input type="number" name="points" id="points" class="form-control">
     </div>
     <div class="form-group">
      {{-- <button type="button" class="btn btn-success pull-left" onclick="save()">{{{ trans('main.save_changes') }}}</button>
      --}}
      <button type="submit" class="btn btn-success pull-left"
       onclick="save()">{{{ trans('main.save_changes') }}}</button>
     </div>

     <input type="hidden" name="answer_id" id="answer_id">

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
        if(id){
            $("#titleHeader").text("Edit Question");
            loadData();
        }
    });

    function getOptionRadio() {
     $.ajax({
          url: "{{ url('/admin/question/get_option_detail') }}/"+id,
          type: "get",
          dataType: 'JSON',
          success: function(data) { 

           var radio = "";

           data.forEach(function(value, index) {

            radio += `<div class="input-group answer_id_radio" id="opts_${index}">
                <input type="text" class="form-control" placeholder="" value="${value.description}" name="option[]" id="option${index}">
                  <div class="input-group-append">
                     <span class="input-group-text">
                       <input type="radio" class="" name="checkbox" id="checkbox_${index}" onclick="selectAnswer('option${index}',${index})"  ${(value.is_correct == 1) ? "checked" : ""}>
                    </span>
                       <button class="btn btn-warning" type="button" onclick="removeOption(opts_${index})"><i class="fa fa-trash" aria-hidden="true"></i></button>
                     </div>        
             </div>`;
          
             inputId = index;
           });

           $("#multipleDiv").append(radio);
           insert_id_value();
              }    
            });
    }
     
     
    function getOptionCheckbox() {
     
     $.ajax({
          url: "{{ url('/admin/question/get_option_detail') }}/"+id,
          type: "get",
          dataType: 'JSON',
          success: function(data) { 

           var checkbox = "";

           data.forEach(function(value, index) {

            checkbox += `<div class="input-group answer_id_checkbox" id="optscheck_${index}">
                                <input type="text" class="form-control" placeholder="" name="optioncheck[]" value="${value.description}" id="optioncheck${index}">
                                <div class="input-group-append">           
                                    <span class="input-group-text">
                                    <input type="checkbox" class=" btn-warning" name="checkboxcheck[]" value="${value.index}" id="checkboxcheck_${index}" onclick="selectAnswercheck('optioncheck${index}',${index})" aria-label="..." ${(value.is_correct == 1) ? "checked" : ""}>
                                </span>
                                    <button class="btn btn-warning" type="button" onclick="removeOptioncheck("optscheck_"${index}")"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </div>
                                    
                            </div>`;
             
             inputIdCheck = index;
           });

           $("#checkDiv").append(checkbox);
           insert_id_value();
              }      
      });
  }
         
    function loadData(){

        $.ajax({
            url: "{{ url('/admin/question/get_question_detail') }}/"+id,
            type: "get",
            dataType: 'JSON',
            success: function(data) { 
                $("#type").val(data.type);
                $("#question").val(data.question);
                $("#hint").val(data.hint);
                $("#remarks").val(data.correctremarks);
                $("#points").val(data.points);
                selectType()
                if(data.type=="Checkbox"){
                 getOptionCheckbox();
                }
                
                if(data.type=="Multiple Choice"){
                   getOptionRadio();            
                }

                if(data.type=="Short Answer"){
                    $("#short_ans").val(data.answer);
                }

                if(data.type=="Paragraph"){
                    $("#paragraph").val(data.answer);
                }

                if(data.type=="Switch"){
                    if(data.answer=="true"){
                        $("#switchOpt").bootstrapToggle('on')
                    }else{
                        $("#switchOpt").bootstrapToggle('off')
                    }
                }
                
                
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error! Contact IT Department.');
            }
        });
    }


    function insert_id_value() {
         $("#answer_id").val("");
         var answer_id = "";

         var type = $("#type").val();

         if (type == "Multiple Choice") {
           $(".answer_id_radio input[type=radio]").each(function(index) {
            if ($(this).is(":checked")) {
              answer_id += index+"-";
             }
            });
         }

         if (type == "Checkbox") {
          $(".answer_id_checkbox input[type=checkbox]").each(function(index) {
            if ($(this).is(":checked")) {
             answer_id += index+"-";
            }
          });
         }

         $("#answer_id").val(answer_id.slice(0, -1));
    }


    $("#type").change(function() {
     insert_id_value();
    });

    function selectType(){

     var answer_id = $("#answer_id").val();
     $("#answer_id").val(answer_id.slice(0, -1));
     
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
     inputId++;

        $("#multipleDiv").append(
            '<div class="input-group answer_id_radio" id="opts_'+inputId+'">'+
                '<input type="text" class="form-control" placeholder="" name="option[]" id="option'+inputId+'">'+
                '<div class="input-group-append">'+
                    '<span class="input-group-text">'+
                       '<input type="radio" class="" name="checkbox" id="checkbox_'+inputId+'" onclick="selectAnswer('+"'option"+inputId+"',"+inputId+')">'+
                   ' </span>'+
                        '<button class="btn btn-warning" type="button" onclick="removeOption('+"'opts_"+inputId+"'"+')"><i class="fa fa-trash" aria-hidden="true"></i></button>'+
                    '</div>'   +
                       
            '</div>'            
        );
    }

    function addOptionCheck(){
     inputIdCheck++;

        $("#checkDiv").append(
            '<div class="input-group answer_id_checkbox" id="optscheck_'+inputIdCheck+'">'+
                '<input type="text" class="form-control" placeholder="" name="optioncheck[]" id="optioncheck'+inputIdCheck+'">'+
                '<div class="input-group-append">'+                    
                    '<span class="input-group-text">'+
                       '<input type="checkbox" class=" btn-warning" name="checkboxcheck[]" id="checkboxcheck_'+inputIdCheck+'" onclick="selectAnswercheck('+"'optioncheck"+inputIdCheck+"',"+inputIdCheck+')" aria-label="...">'+
                   ' </span>'+
                    '<button class="btn btn-warning" type="button" onclick="removeOptioncheck('+"'optscheck_"+inputIdCheck+"'"+')"><i class="fa fa-trash" aria-hidden="true"></i></button>'+
                '</div>'   +
                
            '</div>'            
        );
    }

    function removeOption(e){
        $("#"+e).remove();
    }

    function removeOptioncheck(e){
        $("#"+e).remove();
    }
    
    $("#form").submit(function(event) {
     event.preventDefault();

     var data = $('#form').serializeArray();

     if (id == "") {
      $.ajax({
             url: "{{ url('/admin/question/store') }}",
             type: "post",
             data: data,
             dataType: 'JSON',
             success: function(data) {
                 location = "/admin/question";                
             },
             error: function(jqXHR, textStatus, errorThrown) {
                 alert('Error! Contact IT Department.');
             }
       });
     
     } else {

      $.ajax({
             url: "{{ url('/admin/question/update') }}/"+id,
             type: "post",
             data: data,
             dataType: 'JSON',
             success: function(data) {
                 location = "/admin/question";                
             },
             error: function(error) {
                 alert('Error! Contact IT Department.', error);
             }
       });
       
     }

            
    });

    function save(event){

        // var data = $('#form').serializeArray();
        
        // data.push({
        //     name: 'swtich',
        //     value: $("#switchOpt").prop("checked") == true?true:false
        // });
        // data.push({
        //     name: 'id',
        //     value: id
        // });

        // $.ajax({
        //     url: id!=null?"{{ url('/admin/question/update') }}":"{{ url('/admin/question/store') }}",
        //     type: "post",
        //     data: data,
        //     dataType: 'JSON',
        //     success: function(data) {
        //         location = "/admin/question";                
        //     },
        //     error: function(jqXHR, textStatus, errorThrown) {
        //         alert('Error! Contact IT Department.');
        //     }
        // });
    }

    function selectAnswer(e,i){
       $("#answer_id").val(i);
          $("#checkbox_"+i).val($("#"+e).val())
      }

      function selectAnswercheck(e,i){
         var answer_id = "";
         
         $(".answer_id_checkbox input[type=checkbox]").each(function(index) {
           if ($(this).is(":checked")) {
             answer_id += index+"-";
           }
         });

         $("#answer_id").val(answer_id.slice(0, -1));
        $("#checkboxcheck_"+i).val($("#"+e).val())
    }



    // function loadData(){
    //     $.ajax({
    //         url: "{{ url('/admin/question/get_question_detail') }}/"+id,
    //         type: "get",
    //         dataType: 'JSON',
    //         success: function(data) { 
    //             $("#type").val(data.type);
    //             $("#question").val(data.question);
    //             $("#hint").val(data.hint);
    //             $("#remarks").val(data.correctremarks);
    //             $("#points").val(data.points);
    //             selectType()
    //             if(data.type=="Checkbox"){
    //                 var o = data.options.split("|");
    //                 var ans = data.answer.split("|");
    //                 console.log(ans)
    //                 o.forEach(function(a) {
    //                     var b = ans.indexOf(a);   
    //                     var d = -Math.abs(1);
    //                     var c =  b>d?'checked':'';
    //                     console.log(a) 
    //                     console.log(b) 
    //                     $("#checkDiv").append(
    //                         '<div class="input-group" id="optscheck_'+inputIdCheck+'">'+
    //                             '<input type="text" class="form-control" placeholder="" name="optioncheck[]" value="'+a+'" id="optioncheck'+inputIdCheck+'">'+
    //                             '<div class="input-group-append">'+                    
    //                                 '<span class="input-group-text">'+
    //                                 '<input type="checkbox" class=" btn-warning" '+c+' name="checkboxcheck[]" value="'+a+'" id="checkboxcheck_'+inputIdCheck+'" onclick="selectAnswercheck('+"'optioncheck"+inputIdCheck+"',"+inputIdCheck+')" aria-label="...">'+
    //                             ' </span>'+
    //                                 '<button class="btn btn-warning" type="button" onclick="removeOptioncheck('+"'optscheck_"+inputIdCheck+"'"+')"><i class="fa fa-trash" aria-hidden="true"></i></button>'+
    //                             '</div>'   +
                                    
    //                         '</div>'            
    //                     );
    //                     inputIdCheck++;
    //                 })
    //             }
                
    //             if(data.type=="Multiple Choice"){
    //                 var o = data.options.split("|");
    //                 o.forEach(function(a) {
    //                     var b = a==data.answer?'checked':'';
    //                     $("#multipleDiv").append(
    //                         '<div class="input-group" id="opts_'+inputId+'">'+
    //                             '<input type="text" class="form-control" placeholder="" value="'+a+'" name="option[]" id="option'+inputId+'">'+
    //                             '<div class="input-group-append">'+
    //                                 '<span class="input-group-text">'+
    //                                 '<input type="radio" class="" name="checkbox" '+b+' id="checkbox_'+inputId+'" onclick="selectAnswer('+"'option"+inputId+"',"+inputId+')">'+
    //                             ' </span>'+
    //                                     '<button class="btn btn-warning" type="button" onclick="removeOption('+"'opts_"+inputId+"'"+')"><i class="fa fa-trash" aria-hidden="true"></i></button>'+
    //                                 '</div>'   +
                                    
    //                         '</div>'            
    //                     );
    //                     inputId++;
    //                 })                    
    //             }

    //             if(data.type=="Short Answer"){
    //                 $("#short_ans").val(data.answer);
    //             }

    //             if(data.type=="Paragraph"){
    //                 $("#paragraph").val(data.answer);
    //             }

    //             if(data.type=="Switch"){
    //                 if(data.answer=="true"){
    //                     $("#switchOpt").bootstrapToggle('on')
    //                 }else{
    //                     $("#switchOpt").bootstrapToggle('off')
    //                 }
    //             }
                
                
    //         },
    //         error: function(jqXHR, textStatus, errorThrown) {
    //             alert('Error! Contact IT Department.');
    //         }
    //     });
    // }
    
</script>
@endsection