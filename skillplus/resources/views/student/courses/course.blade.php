@extends('admin.newlayout.layout-vue',['breadcom'=>['Lesson','Edit']])
@section('title')
<!-- <a href="/admin/user_dashboard/courses" class="btn btn-warning btn-sm">Back</a>
Course Content -->
@endsection

@section('style')
<link rel='stylesheet' href="{{ asset('assets/_plugins/jkanban.css') }}">


<link rel="stylesheet" href="/assets/vendor/jquery-te/jquery-te-1.4.0.css" />

<link rel="stylesheet" href="/assets/stylesheets/vendor/mdi/css/materialdesignicons.min.css" />
<style>
    .custom-card {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.03);
        background-color: #fff;
        border-radius: 3px;
        border: none;
        position: relative;
        margin-bottom: 30px;
    }

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

    .raty-text {
        color: #e6d816 !important;
        /* font-size: 1.7em;
        font-weight: bold;
        display: inline-block;
        padding-right: 2px;
        position: relative;
        top: -6px; */
    }

    .raty {
        color: #e6d816 !important;
        /* font-size: 1.7em;
        font-weight: bold;
        display: inline-block;
        padding-right: 2px;
        position: relative;
        top: -6px; */
    }

    /* font-size: 1.2em;
	padding-top: 5px;
	display: inline-block; */
</style>
@endsection

@section('page')

<link rel="stylesheet" href="/assets/vendor/jquery-te/jquery-te-1.4.0.css" />

<div class="row">
    {{-- <div class="col-xs-6 col-md-3 col-sm-6 text-center">
        <course-component></course-component>
    </div>
</div>
</div>
<section>
    <div class="col-12">
        <div class="row">
            <div class="col-8">
                <div class="custom-card">
                    <div class="accordion" id="accordionExample">
                        <div id="secAc"></div>
                    </div>
                </div>
            </div>
            <div class="col-4 custom-card" id="content">
                <div class="custom-card">
                    <video id="video" class="w-100 h-a" controls>
                        {{-- <source src="http://192.168.110.16:8080/bin/admin/file_example_MP4_480_1_5MG.mp4" type="video/mp4"> --}}
    {{-- <source type="video/mp4">
                        Your browser does not support HTML5 video.
                    </video>
                </div>
            </div>
        </div>
    <div class="col-xs-6 col-md-3 col-sm-6 text-center"></div> --}}
</div>
{{-- <section class="card"> --}}
<section class="col-12">
    {{-- <div class="card-body"> --}}
    <div class="row">
        <br />
        <div class="col-8" class="padding-right" style="padding-left:0px;">
            <div class="custom-card padding">
                <div class="text-center">
                    <h4 id="titleData"></h4>
                    <h6 id="subtitleData"></h6>
                    <div class="col-xs-6 text-center">
                        <div class="raty-product-section">
                            <div class="raty"></div>
                            <span class="raty-text">3 ratings</span>
                            <span class="">10 studens / vendors purchased this book</span>
                        </div>
                    </div>
                    <div class="col-xs-12 text-center">
                        <div class="raty-product-section">
                            <span class="">Vendor: John Carlo C. Lucasan</span>
                        </div>
                    </div>
                </div>

                <hr>
                <legend>What you'll learn</legend>
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="list-group">
                            <li class="list-group-item disabled">Cras justo odio</li>
                            <li class="list-group-item">Dapibus ac facilisis in</li>
                            <li class="list-group-item">Morbi leo risus</li>
                            <li class="list-group-item">Porta ac consectetur ac</li>
                            <li class="list-group-item">Vestibulum at eros</li>
                            <li class="list-group-item">Porta ac consectetur ac</li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <ul class="list-group">
                            <li class="list-group-item disabled">Cras justo odio</li>
                            <li class="list-group-item">Dapibus ac facilisis in</li>
                            <li class="list-group-item">Morbi leo risus</li>
                            <li class="list-group-item">Porta ac consectetur ac</li>
                            <li class="list-group-item">Vestibulum at eros</li>
                            <li class="list-group-item">Vestibulum at eros</li>
                            <li class="list-group-item">Porta ac consectetur ac</li>
                            <li class="list-group-item">Vestibulum at eros</li>
                        </ul>
                    </div>

                    <!-- <div class="col-lg-12" id="content"></div>
                        <div class="col-lg-12" id="content">
                            <video id="video" class="w-100 h-a" controls>
                                {{--
                                <source src="http://192.168.110.16:8080/bin/admin/file_example_MP4_480_1_5MG.mp4" type="video/mp4" />
                                --}}
                                <source type="video/mp4" />
                                Your browser does not support HTML5 video.
                            </video>
                        </div> -->
                </div>

                <hr>
                <legend>Prerequisite</legend>
                <ul>
                    <li>Lorem ipsum dolor sit .</li>
                    <li>Lorem ipsum dolor sit amet consectetur.</li>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
                </ul>

                <hr>
                <legend>List of Lessons:</legend>
                <div class="accordion" id="accordionExample">
                    <div class="card" id="secAc"></div>
                </div>
            </div>

        </div>

        <div class="col-4">
            <div class="row justified-content-center">
                <div class="col-12 custom-card">
                    <video class="padding-top video" id="video" width="100%" controls
                        poster="https://homepages.cae.wisc.edu/~ece533/images/monarch.png">
                        {{-- <source src="http://192.168.110.16:8080/bin/admin/file_example_MP4_480_1_5MG.mp4" type="video/mp4"> --}}
                        {{-- <source type="video/mp4"> --}}
                        {{-- Your browser does not support HTML5 video. --}}

                        <source src=http://techslides.com/demos/sample-videos/small.webm type=video/webm />
                        <source src=http://techslides.com/demos/sample-videos/small.ogv type=video/ogg />
                        <source src=http://techslides.com/demos/sample-videos/small.mp4 type=video/mp4 />
                        <source src=http://techslides.com/demos/sample-videos/small.3gp type=video/3gp />
                    </video>
                    <div class="video-details" id="video-details"></div>
                </div>
            </div>
        </div>


    </div>
</section>

<!-- <section class="card">
    <div class="accordion" id="accordionExample">
        <div class="card" id="secAc"></div>
    </div>
</section> -->


<!-- <section class="card">                    
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <table id="tbl"class="table table-bordered table-striped mb-none display responsive nowrap" cellspacing="0"
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
</section> -->



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