@extends('admin.newlayout.layout-vue',['breadcom'=>['Lesson','Edit']])
@section('title')
<!-- <a href="/admin/user_dashboard/courses" class="btn btn-warning btn-sm">Back</a>
Course Content -->
@endsection

@section('style')

<link rel='stylesheet' href="{{ asset('assets/_plugins/jkanban.css') }}">
<link rel="stylesheet" href="/assets/vendor/jquery-te/jquery-te-1.4.0.css" />
<link rel="stylesheet" href="/assets/stylesheets/vendor/mdi/css/materialdesignicons.min.css" />
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

@endsection

@section('page')

<link rel="stylesheet" href="/assets/vendor/jquery-te/jquery-te-1.4.0.css" />

<course-component></course-component>

@endsection

@section('modals')
@endsection


@section('script')

<script type="application/javascript" src="/assets/vendor/jquery-te/jquery-te-1.4.0.min.js"></script>
<link rel="stylesheet" href="/assets/vendor/raty/jquery.raty.css" />
<script type="application/javascript" src="/assets/vendor/raty/jquery.raty.js"></script>
<script>
 var isSave = 1;
    var id = "{{request()->route('id')}}";
    var getvideo;

    $(document).ready(function() {

        $('.editor-te').jqte({format: false});
        loadMetaData();
        loadData();
        list();             
        $.ajax({
                url: "{{ url('/admin/user_dashboard/course_progress') }}/"+id,
                type: "get",
                dataType: 'JSON',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error! Contact IT Department.');
                }
        });  

        $('.raty').raty({ starType: 'i',score:3,click:function (rate) {
            window.location = window.location.href+'/rate/'+rate;
        }});
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
                  // console.log(data);
                   $("#titleData").text(data.title)
                   $("#subtitleData").text(data.subTitle)
                   $("#video-details").append(data.content)
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error! Contact IT Department.');
                }
            });
        }
    }

    function loadMetaData() {
        if(id!=null||id!=""){
            $.ajax({
                url: "{{ url('/admin/user_vendor/vendor_course_show_meta') }}/"+id,
                type: "get",
                dataType: 'JSON',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    
                    data.data.forEach(function(entry,i) {
                        if(entry.option=="video"){
                            getvideo = entry.value
                        }
                    });
                    var video = document.getElementById('video');
                    var source = document.createElement('source');
                    source.setAttribute('src', getvideo);

                    video.appendChild(source);
                    video.play();

                    setTimeout(function() {  
                        video.pause();
                        source.setAttribute('src', getvideo); 
                        video.load();
                        video.play();
                    }, 3000);

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
        data.push({
            name: 'cid',
            value: "{{request()->route('cid')}}"
        });
        $.ajax({
            url: "{{ url('/admin/user_vendor/vendor_lesson_saveLesson') }}",
            type: "post",
            data: data,
            dataType: 'JSON',
            success: function(data) {
               location = "/admin/user_vendor/vendor_lesson_list/{{request()->route('cid')}}";
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error! Contact IT Department.');
            }
        });
    }

    function list() {

                $.ajax({
                    url: "{{ url('/admin/user_student/student_lesson_get_list') }}/"+id,
                    type: "get",
                    dataType: 'JSON',
                    success: function(data) {
                        
                        data.data.forEach(function(a,i) {
                            dr = a.duration?a.duartion:'N/A';
                            size = a.size?a.size:'N/A';
                            
                            $("#secAc").append(
                                '<div class="card-header" id="heading_"'+i+'>'+
                                   ' <h2 class="mb-0">'+
                                       ' <button class="btn btn-link" type="button" data-toggle="collapse"'+
                                           ' data-target="#col_'+i+'" aria-expanded="true" aria-controls="col_'+i+'"> <i class="fas fa-plus"></i> '+
                                            a.title+
                                       ' </button>'+
                                   ' </h2>'+
                                '</div>'+

                               ' <div id="col_'+i+'" class="collapse" aria-labelledby="heading_'+i+'"'+
                                   ' data-parent="#accordionExample">'+
                                    '<div class="card-body"><ul>'+
                                       /*  '<li>Duration: '+dr+'</li>'+
                                        '<li>Size: '+size+'</li>'+
                                        '</ul>'+
                                        '<a href="/admin/user_student/student_lesson_quiz/'+a.id+'/'+id+'" class="btn  btn-success btn-xs" title="Edit">Take quiz</a>'+
                                        ' <a href="/admin/user_student/student_show_lesson/'+a.id+'/'+id+'" type="button" class="btn btn-primary">View Full Lesson</a>'+ */
                                        '<div class="row">'+
                                            '<div class="col-md-6">Sample Description 1'+
                                            '</div>'+
                                            '<div class="col-md-6">'+
                                            '<a href="/admin/user_student/student_lesson_quiz/'+a.id+'/'+id+'" class="btn  btn-success btn-xs" title="Edit">Take quiz</a>'+
                                            '</div>'+
                                        '</div>'+
                                   ' </div>'+
                              '  </div>'
                            );

                        });

                        
                   
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error! Contact IT Department.');
                    }
                });

    }
</script>
@endsection