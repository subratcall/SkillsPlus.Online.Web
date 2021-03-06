@extends('admin.newlayout.layout',['breadcom'=>['Lesson','Edit']])
@section('title')

@endsection

@section('style')
<link rel='stylesheet' href="{{ asset('assets/_plugins/jkanban.css') }}">


<link rel="stylesheet" href="/assets/vendor/jquery-te/jquery-te-1.4.0.css" />

<link rel="stylesheet" href="/assets/stylesheets/vendor/mdi/css/materialdesignicons.min.css" />
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

<style>
    @media (max-width: 1980px) {
     .video-tutorials {
      right: 5% !important;
      width: 400px !important;
     }
   
     .video-tablet {
      display: none;
     }
    }
   
    @media (max-width: 1600px) {
     .video-tutorials {
      right: 4% !important;
      width: 350px !important;
     }
    }
   
    @media (max-width: 1300px) {
     .video-tutorials {
      right: 1% !important;
      width: 350px !important;
     }
   
     .title {
      margin-left: -20px !important;
      width: 400px !important;
     }
    }
   
    @media (max-width: 1200px) {
     .video-tutorials {
      right: 0.5% !important;
      width: 40% !important;
     }
   
     .title {
      margin-left: -20px !important;
      width: 400px !important;
     }
    }
   
    @media (max-width: 1180.98px) {
     .video-tutorials {
      right: 0.1% !important;
      width: 38% !important;
     }
   
     .title {
      margin-left: -80px !important;
      width: 400px !important;
     }
    }
   
    @media (max-width: 991.98px) {
     .video-tutorials {
      display: none;
     }
   
     .title {
      margin-left: -80px !important;
      width: 500px;
     }
   
     .video-tablet {
      display: inline;
      padding: 0px;
      width: 100%;
     }
    }
   
    @media (max-width: 767.98px) {
     .video-tutorials {
      display: none;
     }
   
     .md-text-center {
      text-align: center !important;
     }
    }
   
    @media (max-width: 575.98px) {
     .video-tutorials {
      display: none;
     }
   
     .md-text-center {
      text-align: center !important;
     }
    }
   
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
     background: #00b961;
     color: #fff;
    }
   
    .info {
     background: #2a92bf;
     color: #fff;
    }
   
    .warning {
     background: #f4ce46;
     color: #fff;
    }
   
    .error {
     background: #fb7d44;
     color: #fff;
    }
   
    .raty-text {
     color: #e6d816 !important;
    }
   
    .raty {
     color: #e6d816 !important;
    }
   
    .course {
     font-family: "Open Sans", sans-serif;
    }
   
    .course a {
     color: #007791;
    }
   
    .course .course-header {
     margin-left: 100px;
     margin-top: 50px;
     margin-bottom: 50px;
     padding: 0px;
     min-width: 1980px;
    }
   
    .course-header .title {
     width: 600px;
    }
   
    .section.section-header {
     margin-top: -15px;
    }
   
    .wrap-header {
     background-color: #29303b;
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
   
    .margin-top-next {
     margin-top: 40px;
    }
   
    .header-custom-border {
     border-top: #dedfe0 solid 1px;
     border-left: #dedfe0 solid 1px;
     border-right: #dedfe0 solid 1px;
     border-bottom: #dedfe0 solid 1px;
     padding-top: 10px;
     padding-bottom: 10px;
     padding-right: 10px;
    }
   
    .video-done {
     color: black;
     font-size: 18px;
    }
   
    .list-custom-border {
     border-bottom: #dedfe0 solid 1px;
     border-left: #dedfe0 solid 1px;
     border-right: #dedfe0 solid 1px;
     font: 15px;
     color: #007791;
     padding-top: 10px;
     padding-left: 40px;
     padding-right: 5px;
     padding-bottom: 10px;
     text-indent: -0.8em;
    }
   
    .list-custom-border > i {
     opacity: 0.5;
     padding-right: 10px;
    }
   
    .section-1 {
     border: #dedfe0 solid 1px;
     color: #29303b;
     padding: 30px;
    }
   
    .section-1 ul {
     list-style: none;
     padding: 0;
    }
   
    .section-7 ul {
     list-style: none;
     padding: 0;
    }
   
    .section-7 {
     color: #29303b;
    }
   
    .section-7 .vendor-profile img {
     margin-bottom: 10px;
     width: 96px;
     height: 96px;
    }
   
    .section-7 ul li i {
     padding-right: 10px;
    }
   
    .section-1 ul > li {
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
   
    .section-2 {
     font-size: 22px;
     padding: 10px 0px;
     color: #29303b;
    }
   
    .section-3 {
     padding: 2.5px 0px;
    }
   
    .section-4-header {
     font-size: 22px !important;
     padding-top: 10px !important;
     color: #29303b !important;
    }
   
    .section-4 ul > li {
     font-size: 15px;
     color: #29303b;
    }
   
    .section-4 p {
     font-size: 14px;
     color: #29303b;
    }
   
    .section-5-header {
     font-size: 22px;
     padding: 10px 0px;
     color: #29303b;
    }
   
    .section-6-header {
     font-size: 22px;
     padding: 10px 0px;
     color: #29303b;
    }
   
    .section-6 .item-price {
     font-size: 14px;
    }
   
    .section-7-header {
     font-size: 22px;
     padding: 10px 0px;
     color: #29303b;
    }
   
    .section-8-header {
     font-size: 22px;
     padding: 10px 0px;
     color: #29303b;
    }
   
    .section-8 .average-rating {
     font-size: 72px;
     padding: 0px;
     margin-top: -20px;
    }
   
    .section-9-header {
     font-size: 22px;
     padding: 10px 0px;
     color: #29303b;
    }
   
    .section-8 .individual-rating ul {
     list-style-type: none;
     padding: 0px;
    }
   
    .section-9 ul {
     list-style-type: none;
     padding: 0px;
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
     width: 100%;
     height: 300px;
     border: 10px solid white;
    }
   
    .video-tutorials.video-details {
     font-size: 16px;
    }
   
    .video-details {
     padding: 10px;
     padding-left: 20px;
     text-align: center;
    }
   
    .video-details-header {
     font-size: 24px;
     font-weight: bold;
     text-align: left;
     padding-left: 40px;
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
     color: #686f7a;
    }
   
    .buy-now {
     background-color: #ec5252;
     color: #ffffff;
     font-weight: bold;
     width: 100% !important;
    }
   
    .video-descriptions {
     color: #686f7a;
     text-align: left;
     padding-left: 1;
    }
   
    .video-descriptions p {
     font-size: 14px;
     padding-left: 40px;
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
   
    .section-6 ul li {
     border-bottom: 2px solid #dedfe0;
     padding: 20px 0px;
    }
   
    .section-6 ul {
     list-style-type: none;
     padding: 0;
     border-bottom: 2px solid #dedfe0;
     border-top: 2px solid #dedfe0;
    }
   
    .raty-product-section i {
     margin-left: 5px;
     margin-bottom: 10px;
    }
   
    b {
     color: #29303b;
    }
   
    .fas.fa-star.star-live {
     color: rgb(245, 200, 91);
    }
   
    .fas.fa-star.star-dead {
     color: #abb0bb;
    }

    .course-sidebar {
    background-color: #fff;
    box-shadow: 0 0 1px 1px rgba(20,23,28,.1), 0 3px 1px 0 rgba(20,23,28,.1);
    border-radius: 4px;
    color: #505763;
    padding: 3px;
    position: relative;
    margin-top: -250px;
    z-index: 10;
}
.course-sidebar.fixed {
    position: fixed;
    margin-top: 0;
    width: 350px;
}
.course-sidebar.fixed .preview-video-box,
.course-sidebar.bottom .preview-video-box{
    display: none;
}
.course-sidebar.bottom {
    margin-top: 0;
}

.course-sidebar-text-box {
    padding: 15px 30px;
}

.course-sidebar-text-box .price .current-price {
    color: #505763;
    font-size: 36px;
    font-weight: 700;
    line-height: 40px;
    margin-right: 10px;
}

.course-sidebar-text-box .price span {
    vertical-align: middle;
    color: #a1a7b3;
    margin-right: 10px;
}

.course-sidebar-text-box .price .original-price {
    text-decoration: line-through;
}
.course-sidebar-text-box .offer-time {
    color: #208058;
    font-size: 14px;
    margin-bottom: 10px;
}
.course-sidebar-text-box .offer-time i {
    margin-right: 7px;
}
.course-sidebar-text-box .buy-btns .btn {
    display: block;
    width: 100%;
    margin: 0;
    border-radius: 2px;
    margin-top: 13px;
    padding: 15px 12px;
    font-size: 15px;
    font-weight: 600;
    margin-bottom: 10px;
}
.course-sidebar-text-box .buy-btns .btn-buy-now {
    color: #fff;
    background-color: #ec5252;
    border-color: #ec5252;
}
.course-sidebar-text-box .buy-btns .btn-buy-now:hover,.course-sidebar-text-box .buy-btns .btn-buy-now:focus {
    background-color: #992337;
    border-color: #992337;
}

.course-sidebar-text-box .buy-btns .btn-add-cart {
    background: transparent;
    border-color: #505763;
    color: #686f7a;
}
.course-sidebar-text-box .buy-btns .btn-add-cart:hover,.course-sidebar-text-box .buy-btns .btn-add-cart:focus {
    background-color: #f2f3f5;
}
.course-sidebar-text-box .money-back {
    display: block;
    font-size: 12px;
    font-weight: 400;
    margin-bottom: 12px;
    margin-top: 10px;
}
.course-sidebar-text-box .includes {
    margin-bottom: 15px;
}
.course-sidebar-text-box .includes ul {
    margin: 0;
    padding: 0;
    list-style: none;
}
.course-sidebar-text-box .includes ul li {
    font-size: 13px;
    padding: 3px;
}
.course-sidebar-text-box .includes ul li i {
    width: 19px;
    font-size: 12px;
}

.course-curriculum-box .course-curriculum-title .title {
    font-size: 22px;
    font-weight: 600;
    margin: 0 0 10px;
}

.course-curriculum-box .course-curriculum-title .total-time {
    width: 130px;
    display: inline-block;
    text-align: right;
}

.course-curriculum-box .course-curriculum-title {
    padding-right: 31px;
}

.clearfix::after {
  display: block;
  clear: both;
  content: ""; }

  .float-left {
    float: left !important;
}


.course-curriculum-accordion .lecture-group-title[aria-expanded="true"] .total-lectures {
    display: none;
}


.course-curriculum-box .course-curriculum-title .total-time {
    width: 130px;
    display: inline-block;
    text-align: right;
}

.course-curriculum-accordion .lecture-group-title .total-time {
    width: 130px;
    display: inline-block;
    text-align: right;
}

.float-right {
  float: right !important; }

  section.course-header-area {
    background-color: #29303b;
    color: #fff;
    padding: 60px 0;
}
</style>



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

 <!-- Template CSS -->
 <link rel="stylesheet" href="/assets/admin/css/style.css">
 <link rel="stylesheet" href="/assets/admin/css/components.css">

 <!-- Custom CSS -->
 <link rel="stylesheet" href="/assets/stylesheets/admin-custom.css">


@endsection

@section('page')

<link rel="stylesheet" href="/assets/vendor/jquery-te/jquery-te-1.4.0.css" />
<section class="course-header-area">
    <div class="container">
      <div class="row align-items-end">
        <div class="col-lg-8">
          <div class="course-header-wrap">
            <h1 class="titleData" id="titleData"></h1>
            <p class="subtitleData" id="subtitleData"></p>
            {{-- <div class="rating-row">
              <span class="course-badge best-seller">level</span>
             </div> --}}
             
             <div class="raty-product-section">
                <div class="raty"></div>
                <span class="raty-text"></span>
              {{-- $total_rating =  $this->crud_model->get_ratings('course', $course_details['id'], true)->row()->rating;
              $number_of_ratings = $this->crud_model->get_ratings('course', $course_details['id'])->num_rows();
              if ($number_of_ratings > 0) {
                $average_ceil_rating = ceil($total_rating / $number_of_ratings);
              }else {
                $average_ceil_rating = 0;
              }
  
              for($i = 1; $i < 6; $i++):?> --}}
              {{-- if ($i <= $average_ceil_rating): ?> --}}
               {{--  <i class="fas fa-star filled" style="color: #f5c85b;"></i> --}}
             {{-- else: ?>
                <i class="fas fa-star"></i>
              endif; ?>
             endfor; ?> --}}
            <span class="d-inline-block average-rating">{{--  p echo $average_ceil_rating; ?></span><span>(p echo $number_of_ratings.' '.get_phrase('ratings'); ?>) --}}</span>
            <span class="enrolled-num">
             
              {{-- $number_of_enrolments = $this->crud_model->enrol_history($course_details['id'])->num_rows();
              echo $number_of_enrolments.' '.get_phrase('students_enrolled');
              ?> --}}
            </span>
          </div>
          <div class="created-row">
            <span class="created-by">
               
                <div class="raty-product-section">
                    Created by:<span class="vendor_name"></span>
                 </div>
               {{-- echo get_phrase('created_by'); ?>
              <a href=" echo site_url('home/instructor_page/'.$course_details['user_id']); ?>"> echo $instructor_details['first_name'].' '.$instructor_details['last_name']; ?> --}}</a>
            </span>
          {{--  if ($course_details['last_modified'] > 0): ?> --}}
             
            {{-- else: ?>
              <span class="last-updated-date"> echo get_phrase('last_updated').' '.date('D, d-M-Y', $course_details['date_added']); ?></span>
            endif; ?> --}}
          </div>
        </div>
      </div>
      <div class="col-lg-4">
      </div>
    </div>
  </div>
</section>
<section class="course-content-area">
    <div class="container">
       <div class="row">
           <div class="col-lg-8">
                

 <div class="row">
    <div class="col-lg-12">
       <div class="row margin-top-next">
          <div class="col-lg-12  section-1">
             <h5>What will i learn?</h5>
             <ul id="wwil"></ul>
          </div>
       </div>
    </div>
 </div>

 <div class="row">
    <div class="col-lg-12">
       <div class="row margin-top-nex">
          <div class="col-lg-6  section-2">
              
            <div class="lecture-group-title clearfix">
                <div class="title text-left">Curriculum for this course </div>
                <div class="text-right">
                   {{-- <span class="total-lectures">
                    17 Lessons
                   </span>
                   <span class="total-time">
                    23:47:22 Hours
                   </span> --}}
                </div>
             </div>

             {{-- Curriculum for this course 
             <p style="display:inline; font-size:14px">17 Lessons 23:47:22 Hours</p> --}}
          </div>
       </div>
    </div>
 </div>

 
 <div class="col-lg-12">
    <div class="row" id="accordionx">
    </div>
 </div>

 <div class="row">
    <div class="col-lg-12">
       <div class="row">
          <div class="col-md-6 section-5" id="courseDesc">
          </div>
       </div>
    </div>
    <div class="col-md-12" id="">
       <p class="section-4-header">Requirements</p>
       <ul  id="req">
       </ul>
    </div>
    <div class="col-md-12">
       <p class="section-6-header">Other related courses</p>
       <ul id="related_courses">
       </ul>
    </div>
 </div>

 <div class="row">
    <div class="col-md-12">
       <div class="row">
          <div class="col-lg-12">
             <p class="section-7-header">About the instructor</p>
          </div>
          <div class="row">
             <div class="col-lg-6">
                <img id="vendor_img" width="96">
             </div>
             <div class="col-sm-3">
                <label id="vendor_name"></label>
                <p id="vendor_about"></p>
             </div>
          </div>
       </div>
    </div>
    <div class="col-md-12">
       <div class="col-lg-6 section-8 row">
          <div class="col-lg-12">
             <p class="section-9-header">Reviews</p>
          </div>
          <div class="col-lg-12">
             <ul id='getcomments'>
             </ul>
          </div>
       </div>
    </div>
 </div>
 
 
           </div>
            <div class="col-lg-4">
                <div class="course-sidebar natural">
                    <div class="preview-video-box">
                    <a data-toggle="modal" data-target="#CoursePreviewModal">
                        <video id="video" class="w-100 h-a" controls> </video>
                       {{--  <img src="http://192.168.1.22:8000/bin/Dustin%20Pitan/artboard_252.png" alt="" class="img-fluid"> --}}
                        <span class="preview-text"></span>
                        <span class="play-btn"></span>
                    </a>
                    </div>

                    <div class="course-sidebar-text-box">
                        <div class="price">
                            <span class = "current-price"><span class="current-price">FREE</span></span>
                        
                        </div>
                
                            <div class="buy-btns">
                               {{--  <a href = " echo site_url('home/get_enrolled_to_free_course/'.$course_details['id']); ?>" class="btn btn-buy-now">GET Enrolled</a> --}}
                            
                                <button type="button" class="btn btn-primary" onclick="viewAllVideos()">Start Lesson</button>
                            </div>
                
                
                        <div class="includes">
                        <div class="title"><b>Includes:</b></div>
                            <ul>
                                <li><i class="far fa-file-video"></i>on_demand_videos</li>
                                <li><i class="far fa-file"></i>lessons</li>
                                <li><i class="far fa-compass"></i>full_lifetime_access</li>
                                <li><i class="fas fa-mobile-alt"></i>access_on_mobile_and_tv</li>
                            </ul>
                        </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="col-12 course">


    {{-- <div class="video-tutorials">
        <video id="video" class="w-100 h-a" controls> </video>
        <div class="video-details">
           <button type="button" class="btn btn-primary" onclick="viewAllVideos()">Start Lesson</button>
           <br />
           <div class="video-descriptions">
              <p>Updates:</p>
              <ul>
                 <li>
                    <i class="far fa-file-video"></i>&nbsp;Hours On demand videos
                 </li>
                 <li>
                    <i class="far fa-file"></i>&nbsp;Lessons
                 </li>
                 <li>
                    <i class="far fa-compass"></i>&nbsp;lifetime access
                 </li>
                 <li>
                    <i class="fas fa-mobile-alt"></i>&nbsp;on mobile and tv
                 </li>
              </ul>
           </div>
        </div>
    </div>
    <div class="row wrap-header">
        <div class="col-lg-12">
           <div class="col-lg-12  text-left">
              <h1 id="titleData"></h1>
              <h6 id="subtitleData"></h6>
              <div class="col-xs-6">
                 <div class="raty-product-section">
                    <div class="raty"></div>
                    <span class="raty-text"></span>
                 </div>
              </div>
              <div class="col-xs-12">
                 <div class="raty-product-section">
                    <span class="vendor_name"></span>
                 </div>
              </div>
           </div>
        </div>
    </div> --}}
   


     
     
     
</section>






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
        loadWWIL();
        loadMetaData();
        //loadData();
        list();          

        $.ajax({
                url: "{{ url('/admin/user_vendor/vendor_get_course_comments') }}/"+id,
                type: "get",
                dataType: 'JSON',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    data.data.forEach(function(entry,i) {
                        console.log(entry)
                        $("#getcomments").append(
                           ' <div class="row">'+
                                '<div class="col-lg-6">'+
                               ' <div class="reviewer-details clearfix">'+
                               ' <div class="reviewer-img float-left">'+
                              '  </div>'+
                             '   <div class="review-time">'+
                             // '  <div class="time"> Sun, 07-Jul-2019 </div>'+
                              '  <div class="reviewer-name">  '+entry.name+' </div>'+
                              '  </div>'+
                              '  </div>'+
                               ' </div>'+
                                '<div class="col-lg-6">'+
                               ' <div class="review-details">'+
                                '<div class="review-text">'+
                                    entry.comment+'</div>'+
                               ' </div>'+
                              '  </div>'+
                          '  </div>'
                        ); 
                    });
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error! Contact IT Department.');
                }
        });  

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

        $.ajax({
                url: "{{url('/cr')}}/"+"{{ Request::route('id') }}",
                type: 'get',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'JSON',
                success: function(data) {
                    for (let index = 0; index < data.data.length; index++) {
                        $("#req").append(
                            '<li>'+
                                data.data[index].req+
                            '</li>'
                        )
                        
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error get data from ajax');
                }
            });

            $.ajax({
                url: "{{url('/admin/user_dashboard/getCourseDetail')}}/"+"{{ Request::route('id') }}",
                type: 'get',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'JSON',
                success: function(data) {
                    
                   $("#titleData").text(data.data.title)
                   $("#subtitleData").text(data.data.subTitle)
                   //$("#video-details").append(data.data.content)
                   $("#related_courses").empty();
                   data.related.forEach(function(entry,i) {
                        console.log(entry)
                        $("#related_courses").append(
                            '<li>'+entry.title+'</li>'
                        ); 
                    });

                    
                   $("#courseDesc").empty();
                   $("#courseDesc").append(
                        '<p class="section-5-header">Description</p>'+
                        data.data.content
                   )

                    $.ajax({
                            url: "{{ url('/admin/user_vendor/vendor_course_vendor') }}/"+data.data.user_id+"/"+id,
                            type: "get",
                            dataType: 'JSON',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data) {
                                $(".raty-text").text(data.rate+" ratings")
                                $(".vendor_name").text(data.data[0].name+" ratings")
                                $("#vendor_img").attr("src",data.data[0].avatar)
                                $("#vendor_about").text(data.data[0].biography)
                                $("#vendor_name").text(data.data[0].name+" "+data.data[0].short_biography)
                                
                                
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                alert('Error! Contact IT Department.');
                            }
                    }); 
                   
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error get data from ajax');
                }
            });

        $('.raty').raty({ starType: 'i',score:3,click:function (rate) {
            window.location = window.location.href+'/rate/'+rate;
        }});
    });

    
    function loadData() {
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

    function loadWWIL() {
            $.ajax({
                url: "{{ url('/admin/user_vendor/vendor_course_get_all_cl') }}/"+id,
                type: "get",
                dataType: 'JSON',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {

                    $("#wwil").empty();
                    data.data.forEach(function(entry,i) {
                        console.log(entry)
                        $("#wwil").append(
                            '<li>'+entry.description+'</li>'
                        ); 
                    });

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error! Contact IT Department.');
                }
            });
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
                        
                        for (let index = 0; index < data.length; index++) {
                            
                                $("#accordionx").append(
                                    '<div class="col-lg-12  section-3">'+
                            '  <div class="header-custom-border">'+
                                ' <a class="btn" data-toggle="collapse" data-target="#demo_'+index+'" style="display:inline; font-size:15px"><i class="fas fa-plus" style="color: #007791"></i>'
                                + '&nbsp;&nbsp;'+data[index].title+
                                ' </a>'+
                                '</div>'+
                            '  <div id="demo_'+index +'" class="collapse">'+
                                
                                //'  <video id="video" class="w-100 h-a" controls src="'+data[index].upload_video+'"> </video>'+
                                '<div class="list-custom-border"><i class="fas fa-play-circle"></i>'+data[index].shortdescription+' '+data[index].duration+' Hours <br> '+
                                '<button type="button" class="btn btn-primary" onclick="takeQuiz('+data[index].id+","+id+')">Take Quiz</button></div></div>'+
                                '</div>'
                            )
                 
                        
                        
                    }

                        
                   
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error! Contact IT Department.');
                    }
                });

    }

    function takeQuiz(lid,cid){
        location = '/admin/user_student/student_lesson_quiz/'+lid+'/'+cid;
    }

    function viewAllVideos() {
        location = '/admin/user_student/student_view_videos/'+id;
    }
</script>
@endsection