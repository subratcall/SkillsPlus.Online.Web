<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
 <title>Admin Panel - @yield('title', '')</title>

 <!-- General CSS Files -->
 <link rel="stylesheet" href="/assets/admin/modules/bootstrap/css/bootstrap.min.css">
 <link rel="stylesheet" href="/assets/admin/modules/fontawesome/css/all.min.css">

 <!-- CSS Libraries -->
 <link rel="stylesheet" href="/assets/admin/modules/summernote/summernote-bs4.css">
 <link rel="stylesheet" href="/assets/admin/modules/select2/dist/css/select2.min.css">
 <link rel="stylesheet" href="/assets/admin/modules/jquery-selectric/selectric.css">
 <link rel="stylesheet" href="/assets/admin/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">



 <!-- Template CSS -->
 <link rel="stylesheet" href="/assets/admin/css/style.css">
 <link rel="stylesheet" href="/assets/admin/css/components.css">

 <!-- Custom CSS -->
 <link rel="stylesheet" href="/assets/stylesheets/admin-custom.css">
 <script src="/assets/admin/modules/jquery.min.js"></script>

 <style>
  .custom-switch-input:checked~.custom-switch-description {
   position: relative;
   top: 4px;
  }

  .loading-modal {
       position: fixed;
       background-color: rgba(255, 255, 255, 0.459);
       width: 100%;
       height: 100%;
       top: 0;
       left: 0;
       z-index: 9999999;
      }

      .loading-modal .loading-gif {
       background-image: url("https://i.ya-webdesign.com/images/transparent-bars-loading-1.gif");
       background-repeat: no-repeat;
       width: 100%;
       height: 100%;
       margin-left: 40%;
       margin-right: auto;
       margin-top: 15%;
      }
 </style>
 <!-- Start GA -->
 <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
 <script>
  window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-94034622-3');
 </script>
 <!-- /END GA -->


</head>

<body>



<link rel='stylesheet' href="{{ asset('assets/_plugins/jkanban.css') }}">
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

    <section class="card">
        <div class="row">
            <div class="col-md-10">
                <header class="card-heading">
                    <h2 class="card-title"> </h2>
                </header>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-warning" onclick="backtocourse()">Course Detail</button>
            </div>
        </div>
    </section>
<div class="row">
    <div class="col-md-9">
        <video id="video" class="w-100 h-a" controls> </video>
    </div>
    <div class="col-md-3">
        <section class="card">
            <div class="card-body">
                {{-- <div class="panel-group" id="accordionx">
                    
                </div>  --}}
                <div class="accordion" id="accordionx">
                    
                  </div> 
            </div>
        </section>
    </div>
</div>

<div class="modal fade" id="modal_loading" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="">Loading Please Wait.</h5>
          
        </div>
        <div class="modal-body">
            <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
              </div>
        </div>
        <div class="modal-footer">
            
        </div>
      </div>
    </div>
   </div>

 <script src="/assets/admin/modules/popper.js"></script>
 <script src="/assets/admin/modules/tooltip.js"></script>
 <script src="/assets/admin/modules/bootstrap/js/bootstrap.min.js"></script>
 <script src="/assets/admin/modules/nicescroll/jquery.nicescroll.min.js"></script>
 <script src="/assets/admin/modules/moment.min.js"></script>
 <script src="/assets/admin/js/stisla.js"></script>
 <script src="/assets/admin/modules/cleave-js/dist/cleave.min.js"></script>
 <script src="/assets/admin/modules/cleave-js/dist/addons/cleave-phone.us.js"></script>
 <script src="/assets/admin/modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
 <script src="/assets/admin/modules/bootstrap-daterangepicker/daterangepicker.js"></script>
 <script src="/assets/admin/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
 <script src="/assets/admin/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
 <script src="/assets/admin/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
 <script src="/assets/admin/modules/select2/dist/js/select2.full.min.js"></script>
 <script src="/assets/admin/modules/jquery-selectric/jquery.selectric.min.js"></script>
 <script src="/assets/admin/modules/jquery.sparkline.min.js"></script>
 <script src="/assets/admin/modules/chart.min.js"></script>
 <script src="/assets/admin/modules/jqvmap/dist/jquery.vmap.min.js"></script>
 <script src="/assets/admin/modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
 <script src="/assets/admin/modules/jqvmap/dist/maps/jquery.vmap.indonesia.js"></script>
 <script src="/assets/admin/modules/datatables/datatables.min.js"></script>
 <script src="/assets/admin/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
 <script src="/assets/admin/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
 <script src="/assets/admin/modules/jquery-ui/jquery-ui.min.js"></script>
 <script src="/assets/admin/modules/summernote/summernote-bs4.js"></script>
 <script src="/assets/admin/modules/jquery-selectric/jquery.selectric.min.js"></script>
 <script src="/assets/admin/modules/upload-preview/assets/js/jquery.uploadPreview.min.js"></script>
 <script src="/assets/admin/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
 <script src="/assets/admin/modules/select2/dist/js/select2.full.min.js"></script>
 <script src="/assets/admin/modules/jquery-selectric/jquery.selectric.min.js"></script>
 <script src="/assets/admin/js/scripts.js"></script>
 <script src="/assets/admin/js/custom.js"></script>

 <script type="application/javascript" src="/assets/vendor/bootstrap-notify-master/bootstrap-notify.min.js"></script>
 <div id="footerScript">
 </div>
 <script>
  @if(isset($menu))
        $(function() {
            $('#{!! $menu !!}').addClass('active');
        });
        @endif
        @if(isset($url))
        $(function() {
            $('.nav-link').each(function() {
                if ('{!! url(' / ') !!}' + $(this).attr('href') == '{!! $url !!}') {
                    $(this).parent().addClass('active');
                }
            })
        });
        @endif

        $(document).ready(function() {
          $(".loading-modal").hide("fade");
        });
 </script>


<script>
    var tbl = '';
    var id = "{{request()->route('cid')}}";
    
    var video = document.getElementById('video');
    var source = document.createElement('source');
        $(document).ready(function() {
            loadMetaData();
            list();
        });
    
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
                        
                        /* data.data.forEach(function(entry,i) {
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
                        }, 3000); */
    
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error! Contact IT Department.');
                    }
                });
    
                $.ajax({
                    url: "{{url('/admin/user_dashboard/getCourseDetail')}}/"+id,
                    type: 'get',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: 'JSON',
                    success: function(data) {
                        
                       $(".card-title").text(data.data.title)
                       
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error get data from ajax');
                    }
                });
            }
        }
    
        function list() {
    
            $.ajax({
                url: "{{ url('/admin/user_student/student_lesson_get_list') }}/"+id,
                type: "get",
                dataType: 'JSON',
                success: function(data) {
                    
                    for (let index = 0; index <  data.length; index++) {
                        console.log(data[index].upload_video)
                            $("#accordionx").append(
                               '<div class="card"> '+
                        '  <div class="header-custom-border">'+
                            '<h2 class="mb-0">'+
                                        '<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#demo_'+index+'" aria-expanded="true" aria-controls="collapseOne">'+   
                                            data[index].title+
                                        '</button>'+
                                   ' </h2>'+
                            '</div>'+

                            '<div id="demo_'+index+'" class="collapse" aria-labelledby="headingOne" data-parent="#accordionx">'+
                                    '<div class="card-body">'+
                                        '<div class="row">'+
                                            '<div class="col-md-6">'+
                                                '<a href="#" onclick="playVid('+"'"+data[index].upload_video+"'"+')">'+data[index].shortdescription+'</a>'+
                                            '</div>'+
                                            '<div class="col-md-6">'+
                                                data[index].duration+' Hours'   +
                                            '</div>'+
                                                '<button type="button" class="btn btn-primary" onclick="takeQuiz('+data[index].id+","+id+')">Take Quiz</button></div></div>'+
                                        '</div>'+
                                        //data[index].shortdescription+' '+data[index].duration+' Hours'   +                                
                                   ' </div>'+
                               ' </div>'+
                               '</div>'

                            /* '<div class="panel panel-default">'+
                                '<div class="panel-heading">'+
                                ' <h4 class="panel-title">'+
                                    '<a data-toggle="collapse" data-parent="#accordionx" href="#collapse1">'+data[index].title+'</a>'+
                                    '</h4>'+
                                '</div>'+
                                '<div id="collapse1" class="panel-collapse collapse in">'+
                                ' <div class="panel-body">'+
                                    data[index].shortdescription+
                                ' </div>'+
                                '</div>'+
                            ' </div>' */
    
                            /* '<div class="card">'+
                               ' <div class="card-header" id="headingOne">'+
                                    '<h2 class="mb-0">'+
                                        '<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">'+   
                                            'Collapsible Group Item #1' +
                                        '</button>'+
                                   ' </h2>'+
                                '</div>'+
                            
                                '<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionx">'+
                                    '<div class="card-body">'+
                                        'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.'+
                                   ' </div>'+
                               ' </div>'+
                           ' </div>' */
                        ) 
                }
    
                    
            
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error! Contact IT Department.');
                }
            });
    
        }

        function playVid(params) {
            /* data.data.forEach(function(entry,i) {
                            if(entry.option=="video"){
                                getvideo = entry.value
                            }
                        }); */
                        $("#modal_loading").modal("show")
                        source.setAttribute('src', '');
                        source.setAttribute('src', params);
    
                        video.appendChild(source);
                        video.play();
    
                        setTimeout(function() {  
                            video.pause();
                            source.setAttribute('src', ''); 
                            source.setAttribute('src', params); 
                            video.load();
                            video.play();
                        $("#modal_loading").modal("hide")
                        }, 3000);
        }

        function backtocourse() {
        location = '/admin/user_student/student_show_course/'+id;
        }
    
    </script>
</body>

</html>