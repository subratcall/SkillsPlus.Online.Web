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

    .course {
        font-family: 'Open Sans', sans-serif;
    }

    .course .course-header {
        margin-left: 100px;
        margin-top: 50px;
        margin-bottom: 50px;
        padding: 0px;
        min-width: 1980px;
    }

    .section.section-header {
        margin-top: -15px;
    }

    .wrap-header {
        background-color: #29303B;
        color: white;
    }

    .no-padding {
        padding: 0px;
    }

    .no-margin {
        margin: 0px;
    }

    .main-content.header {
        margin-top: 15px;
    }

    .section-1 {
        border: #DEDFE0 solid 1px;
        color: #29303B;
        padding: 30px;
    }

    .section-1 ul {
        list-style: none;
        padding: 0;
    }

    .section-1 ul>li {
        padding-left: 1.3em;
    }

    .section-1 li:before {
        content: "\f00c";
        font-family: FontAwesome;
        display: inline-block;
        margin-left: -1.3em;
        width: 1.3em;
        color: #a1a7b3;
    }

    .margin-top-next {
        margin-top: 40px;
    }

    .section-2 {
        font-size: 22px;
        padding: 10px 0px;
        color: #29303B;
    }

    .section-3 {
        padding: 2.5px 0px;
    }

    .header-custom-border {
        border-top: #DEDFE0 solid 1px;
        border-left: #DEDFE0 solid 1px;
        border-right: #DEDFE0 solid 1px;
        border-bottom: #DEDFE0 solid 1px;
        padding: 10px 0px;
    }

    .list-custom-border {
        border-bottom: #DEDFE0 solid 1px;
        border-left: #DEDFE0 solid 1px;
        border-right: #DEDFE0 solid 1px;
        font: 15px;
        color: #007791;
        padding-top: 10px;
        padding-left: 40px;
        padding-right: 5px;
        padding-bottom: 10px;
        text-indent: -0.8em;
    }

    .list-custom-border>i {
        opacity: 0.5;
        padding-right: 10px;
    }

    .section-4-header {
        font-size: 22px !important;
        padding-top: 10px !important;
        color: #29303B !important;
    }

    .section-4 ul>li {
        font-size: 15px;
        color: #29303B;
    }

    .section-4 p {
        font-size: 14px;
        color: #29303B;
    }

    .section-5-header {
        font-size: 22px;
        padding: 10px 0px;
        color: #29303B;
    }

    .section-5 {
        color: #29303b;
    }

    .video-tutorials {
        position: absolute;
        z-index: 1;
        right: 200px;
        top: 50px;
        background: white;
        border: 1px solid white;
        box-shadow: 0.5px 1px 5px 0.5px #00000080;
        border-radius: 2px;
        height: 700px;
    }

    .video-tutorials video {
        width: 400px;
        height: 300px;
        border: 10px solid white;
    }

    .video-tutorials.video-details {
        font-size: 16px;
    }

    .video-details {
        padding: 10px;
        padding-left:20px;
        text-align: center;
    }

    .video-details-header {
        font-size: 24px;
        font-weight: bold;
        text-align: left;
        padding-left:40px;
    }

    .video-details p {
        font-size: 32px;
    }

    .button {
        border-style: none;
        padding: 15px;
        width: 300px;
    }

    .add-to-cart {
        margin-top: 10px;
        border: black 1px solid;
        background-color: #ffffff;
        font-weight: bold;
        color: #686F7A;
    }

    .buy-now {
        background-color: #EC5252;
        color: #ffffff;
        font-weight: bold;
    }

    .video-descriptions {
        color: #686F7A;
        text-align: left;
        padding-left: 1
    }

    .video-descriptions p {
        font-size: 14px;
        padding-left:40px;
        font-weight: bold;
        padding-top: 10px;
    }

    .video-descriptions ul {
        padding-left: 60px;
    }

    .video-descriptions ul li {
        list-style: none;
        padding: 0;
    }

    /* font-size: 1.2em;
	padding-top: 5px;
	display: inline-block; */
</style>
@endsection

@section('page')

<link rel="stylesheet" href="/assets/vendor/jquery-te/jquery-te-1.4.0.css" />

{{--

<div class="row">
     <div class="col-xs-6 col-md-3 col-sm-6 text-center">
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
    <div class="col-xs-6 col-md-3 col-sm-6 text-center"></div> 
</div> --}}
{{-- <section class="card"> --}}
<section class="col-12 course">
    {{-- <div class="card-body"> --}}

        {{-- <legend>List of Lessons:</legend>
        <div class="accordion" id="accordionExample">
            <div class="card" id="secAc"></div>
        </div> --}}

    <div class="video-tutorials">
        <video class="padding-top video" id="video" width="100%" controls autoplay="false"
            poster="https://homepages.cae.wisc.edu/~ece533/images/monarch.png">
            {{-- <source src="http://192.168.110.16:8080/bin/admin/file_example_MP4_480_1_5MG.mp4" type="video/mp4"> --}}
            {{-- <source type="video/mp4"> --}}
            {{-- Your browser does not support HTML5 video. --}}

            <source src=http://techslides.com/demos/sample-videos/small.webm type=video/webm />
            <source src=http://techslides.com/demos/sample-videos/small.ogv type=video/ogg />
            <source src=http://techslides.com/demos/sample-videos/small.mp4 type=video/mp4 />
            <source src=http://techslides.com/demos/sample-videos/small.3gp type=video/3gp />
        </video>
        {{-- <div class="video-details" id="video-details"></div> --}}

        <div class="video-details">
            <p class="video-details-header">$10</p>
            {{-- <button class="button buy-now">Buy now</button><br />
            <button class="button add-to-cart">Add to cart</button> --}}
            <button class="button buy-now">Take Quiz</button><br />
            <div class="video-descriptions">
                <p>Includes:</p>
                <ul>
                    <li><i class="far fa-file-video"></i>&nbsp;Hours On demand videos</li>
                    <li><i class="far fa-file"></i>&nbsp;Lessons</li>
                    <li><i class="far fa-compass"></i>&nbsp;lifetime access</li>
                    <li><i class="fas fa-mobile-alt"></i>&nbsp;on mobile and tv</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row wrap-header">
        <div class="col-lg-12">
            <div class="col-lg-12 course-header text-left">
                <h1 id="titleData"></h1>
                <h6 id="subtitleData"></h6>
                <div class="col-xs-6">
                    <div class="raty-product-section">
                        <div class="raty"></div>
                        <span class="raty-text">3 ratings</span>
                        <span class="">10 studens / vendors purchased this book</span>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="raty-product-section">
                        <span class="">Vendor: John Carlo C. Lucasan</span>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-lg-12">
            <div class="row margin-top-next">
                <div class="col-lg-6 offset-lg-1 section-1">
                    <h5>What will i learn?</h5>
                    <ul>
                        <li>Have the skills to start making money on the side, as a casual freelancer, or full time as a
                            work-from-home freelancer</li>
                        <li>Convert any static HTML & CSS website into a Custom WordPress Theme</li>
                        <li>Feel comfortable with the process of turning static websites into dynamic WordPress websites
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-6 offset-lg-1 section-2">
                    Curriculum for this course <p style="display:inline; font-size:14px">17 Lessons 23:47:22 Hours</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-6 offset-lg-1 section-3">
                    <div class="header-custom-border">
                        <a class="btn" data-toggle="collapse" data-target="#demo"
                            style="display:inline; font-size:15px"><i class="fas fa-plus"
                                style="color: #007791"></i>&nbsp;&nbsp;Getting Started With This
                        </a>
                    </div>
                    <div id="demo" class="collapse">
                        <div class="list-custom-border"><i class="fas fa-play-circle"></i>Code The Basic Webpage Layout
                        </div>
                        <div class="list-custom-border"><i class="fas fa-play-circle"></i>Setting Up Your Project
                            Environment</div>
                        <div class="list-custom-border"><i class="fas fa-play-circle"></i>Code The Basic Webpage Layout
                        </div>
                        <div class="list-custom-border"><i class="fas fa-play-circle"></i>HTML 5</div>
                        <div class="list-custom-border"><i class="fas fa-play-circle"></i>Welcome To The Course! You
                            Made The Right Decision</div>
                        <div class="list-custom-border"><i class="fas fa-play-circle"></i>What is Bootstrap? And Why
                            Mastering It Will Save You Hundreds of Hours</div>
                    </div>
                </div>

                <div class="col-lg-6 offset-lg-1 section-3">
                    <div class="header-custom-border">
                        <a class="btn" data-toggle="collapse" data-target="#demo1"
                            style="display:inline; font-size:15px"><i class="fas fa-plus"
                                style="color: #007791"></i>&nbsp;&nbsp;Environment Setup: Get Your Project Started
                        </a>
                    </div>
                    <div id="demo1" class="collapse">
                        <div class="list-custom-border"><i class="fas fa-play-circle"></i>Free Download: The Bootstrap
                            Framework
                        </div>
                        <div class="list-custom-border"><i class="fas fa-play-circle"></i>Bootstrap Pop Quiz
                            Environment</div>
                        <div class="list-custom-border"><i class="fas fa-play-circle"></i>WordPress Pop Quiz
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-6 offset-lg-1 section-4">
                    <p class="section-4-header">Requirements</p>

                    <ul>
                        <li>Have a basic understanding of HTML, CSS and PHP (all courses I offer)</li>
                        <li>Have access to a code editor, free or otherwise. I suggest Coda 2, as that's the editor I
                            use exclusively.</li>
                        <li>An Internet connection is required.</li>
                        <li>A fresh copy of Bootstrap and WordPress (we will go over this in the beginning of the
                            course).</li>
                        <li>Download & Install MAMP (or alternatives — we cover this in the course)</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-6 offset-lg-1 section-5">
                    <p class="section-5-header">Description</p>

                    <p><strong>Do you want to supercharge your HTML, CSS & PHP knowledge and learn how to turn them into
                            a
                            real business that can make you more money as a freelancer?</strong></p>

                    <p>Whether you're a freelance designer, entrepreneur, employee for a company, code hobbyist, or
                        looking for a new career — this course gives you an immensely valuable skill that will enable
                        you to either:</p>

                    <p><strong>
                            Make money on the side
                        </strong>
                    </p>

                    <p>
                        So you can save up for that Hawaiian vacation you've been wanting, help pay off your debt, your
                        car, your mortgage, or simply just to have bonus cash laying around.
                    </p>

                    <p><strong>
                            Create a full-time income
                        </strong>
                    </p>

                    <p>
                        WordPress developers have options. Many developers make a generous living off of creating custom
                        WordPress themes and selling them on websites like ThemeForest. Freelance designers and
                        developers can also take on WordPress projects and make an extra $1,000 - $5,000+ per month.
                    </p>
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