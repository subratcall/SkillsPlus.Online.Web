@extends('admin.newlayout.layout',['breadcom'=>['Lesson','Edit']])
@section('title')
<p id="titleHeader">Course Content</p>
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
            <div class="col-lg-12" id="content">
                              
            </div>
            <div class="col-lg-12" id="content">

                <video id="video" class="w-100 h-a" controls>
                    {{-- <source src="http://192.168.110.16:8080/bin/admin/file_example_MP4_480_1_5MG.mp4" type="video/mp4"> --}}
                    <source type="video/mp4">
                    Your browser does not support HTML5 video.
                </video>
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
var getvideo;
    $(document).ready(function() {
        $('.editor-te').jqte({format: false});
        loadMetaData();
        loadData();               
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
                   $("#content").append(data.content)
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
</script>
@endsection