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

{{-- 
        <div class="video-tutorials">
            <video id="video" class="w-100 h-a" controls> </video>
            <div class="video-details">
             <button class="button buy-now" onclick="takeQuiz()">Take Quiz</button>
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
           </div> --}}
 <div class="row wrap-header">
  <div class="col-lg-12">
   <div class="col-lg-12 course-header text-left">
    <h1 id="titleData"></h1>
    <h6 id="subtitleData"></h6>
    <div class="col-xs-6">
     <div class="raty-product-section">
      <div class="raty"></div>
      <span class="raty-text"></span>
      {{-- <span class="">10 studens / vendors purchased this book</span> --}}
     </div>
    </div>
    <div class="col-xs-12">
     <div class="raty-product-section">
      <span class="vendor_name"></span>
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
     <ul id="wwil"></ul>
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

{{--  <div class="row">
    <div class="col-lg-12">
        <div class="panel-group" id="accordionx">

        </div>
    </div>
   </div> --}}


 <div class="row">
  <div class="col-lg-12">
   <div class="row" id="accordionx">
    {{-- <div class="col-lg-6 offset-lg-1 section-3">
     <div class="header-custom-border">
      <a class="btn" data-toggle="collapse" data-target="#demo" style="display:inline; font-size:15px"><i
        class="fas fa-plus" style="color: #007791"></i>&nbsp;&nbsp;Getting Started With This
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
         <a class="btn" data-toggle="collapse" data-target="#demo1" style="display:inline; font-size:15px"><i
           class="fas fa-plus" style="color: #007791"></i>&nbsp;&nbsp;Environment Setup: Get Your Project Started
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
   </div> --}}
  </div>
 </div>

 <div class="row">
  <div class="col-lg-12">
   <div class="row">
    <div class="col-lg-6 offset-lg-1 section-4" id="">
     <p class="section-4-header">Requirements</p>

     <ul  id="req">
     </ul>
    </div>
   </div>
  </div>
 </div>

{{--  <div class="row">
    <div class="col-lg-12">
        <div class="">
            <div class=" section-4">
                <p class="section-4-header">Requirements</p>

                <ul id="req">
                </ul>
            </div>
        </div>
    </div>
</div> --}}

{{--  <div class="row">
  <div class="col-lg-12">
   <div class="row">
    <div class="col-lg-6 offset-lg-1 section-5">
     <p class="section-5-header">Description</p>
     
    </div>
   </div>
  </div>
 </div> --}}

 <div class="row">
  <div class="col-lg-12">
   <div class="row">
    <div class="col-lg-6 section-6">
     <p class="section-6-header">Other related courses</p>

     <ul id="related_courses">
     </ul>
    </div>
   </div>
  </div>
 </div>

 <div class="row">
  <div class="col-lg-12">
   <div class="row">
    <div class="col-lg-6 offset-lg-1 section-7">
     <div class="row">
      <div class="col-lg-12">
       <p class="section-7-header">About the instructor</p>
      </div>
     </div>
     <div class="col-lg-12 row">
      <div class="col-lg-6">
       <img id="vendor_img" width="96">
       <ul>
        {{-- <li><i class="fas fa-comment"></i>&nbsp;5 Reviews</li>
        <li><i class="fas fa-user"></i>&nbsp;3 Students</li>
        <li><i class="fas fa-play-circle"></i>&nbsp;11 Courses</li> --}}
       </ul>
      </div>
      <div class="col-lg-6">
       <label id="vendor_name"></label>

       <p id="vendor_about"></p>
      </div>
     </div>
    </div>
   </div>
  </div>
 </div>

 <div class="row">
  {{-- <div class="col-lg-12">
   <div class="row">
    <div class="col-lg-6 offset-lg-1 section-8 row">
     <div class="col-lg-12">
      <p class="section-8-header">About the instructor</p>
     </div>
     <div class="col-lg-3">
      4
      <div class="rating">
       <i class="fas fa-star filled" style="color: #f5c85b;"></i>
       <i class="fas fa-star filled" style="color: #f5c85b;"></i>
       <i class="fas fa-star filled" style="color: #f5c85b;"></i>
       <i class="fas fa-star filled" style="color: #f5c85b;"></i>
       <i class="fas fa-star" style="color: #abb0bb;"></i>
      </div>
      Average rating
     </div>
     <div class="col-lg-9">
      <div class="individual-rating">
       <ul>
        <li>
         <div class="progress">
          <div class="progress-bar" style="width: 0%"></div>
         </div>
         <div>
          <span class="rating">
           <i class="fas fa-star"></i>
           <i class="fas fa-star"></i>
           <i class="fas fa-star"></i>
           <i class="fas fa-star"></i>
           <i class="fas fa-star filled"></i>

          </span>
          <span>0%</span>
         </div>
        </li>
        <li>
         <div class="progress">
          <div class="progress-bar" style="width: 0%"></div>
         </div>
         <div>
          <span class="rating">
           <i class="fas fa-star"></i>
           <i class="fas fa-star"></i>
           <i class="fas fa-star"></i>
           <i class="fas fa-star filled"></i>
           <i class="fas fa-star filled"></i>

          </span>
          <span>0%</span>
         </div>
        </li>
        <li>
         <div class="progress">
          <div class="progress-bar" style="width: 50%"></div>
         </div>
         <div>
          <span class="rating">
           <i class="fas fa-star"></i>
           <i class="fas fa-star"></i>
           <i class="fas fa-star filled"></i>
           <i class="fas fa-star filled"></i>
           <i class="fas fa-star filled"></i>

          </span>
          <span>50%</span>
         </div>
        </li>
        <li>
         <div class="progress">
          <div class="progress-bar" style="width: 50%"></div>
         </div>
         <div>
          <span class="rating">
           <i class="fas fa-star"></i>
           <i class="fas fa-star filled"></i>
           <i class="fas fa-star filled"></i>
           <i class="fas fa-star filled"></i>
           <i class="fas fa-star filled"></i>

          </span>
          <span>50%</span>
         </div>
        </li>
        <li>
         <div class="progress">
          <div class="progress-bar" style="width: 0%"></div>
         </div>
         <div>
          <span class="rating">
           <i class="fas fa-star filled"></i>
           <i class="fas fa-star filled"></i>
           <i class="fas fa-star filled"></i>
           <i class="fas fa-star filled"></i>
           <i class="fas fa-star filled"></i>

          </span>
          <span>0%</span>
         </div>
        </li>
       </ul>
      </div>
     </div>
    </div>
   </div>
  </div> --}}

 </div>

 <div class="row">
  <div class="col-lg-12">
   <div class="col-lg-6 offset-lg-1 section-8 row">
    <div class="col-lg-12">
     <p class="section-9-header">Reviews</p>
    </div>
    <div class="col-lg-12">
     <ul id='getcomments'>
      {{-- <li>
       <div class="row">
        <div class="col-lg-4">
         <div class="reviewer-details clearfix">
          <div class="reviewer-img float-left">
           <img src="https://demo.academy-lms.com/addon/uploads/user_image/6.jpg" width="46" alt="">
          </div>
          <div class="review-time">
           <div class="time">
            Sun, 07-Jul-2019 </div>
           <div class="reviewer-name">
            Jane Doe </div>
          </div>
         </div>
        </div>
        <div class="col-lg-8">
         <div class="review-details">
          <div class="rating">
           <i class="fas fa-star filled" style="color: #f5c85b;"></i>
           <i class="fas fa-star filled" style="color: #f5c85b;"></i>
           <i class="fas fa-star filled" style="color: #f5c85b;"></i>
           <i class="fas fa-star filled" style="color: #f5c85b;"></i>
           <i class="fas fa-star" style="color: #abb0bb;"></i>
          </div>
          <div class="review-text">
           This course taught me a lot. Very effective!! </div>
         </div>
        </div>
       </div>
      </li>
      <li>
       <div class="row">
        <div class="col-lg-4">
         <div class="reviewer-details clearfix">
          <div class="reviewer-img float-left">
           <img src="https://demo.academy-lms.com/addon/uploads/user_image/3.jpg" width="46" alt="">
          </div>
          <div class="review-time">
           <div class="time">
            Sun, 04-Aug-2019 </div>
           <div class="reviewer-name">
            Jane Doe </div>
          </div>
         </div>
        </div>
        <div class="col-lg-8">
         <div class="review-details">
          <div class="rating">
           <i class="fas fa-star filled" style="color: #f5c85b;"></i>
           <i class="fas fa-star filled" style="color: #f5c85b;"></i>
           <i class="fas fa-star filled" style="color: #f5c85b;"></i>
           <i class="fas fa-star" style="color: #abb0bb;"></i>
           <i class="fas fa-star" style="color: #abb0bb;"></i>
          </div>
          <div class="review-text">
           Nah! </div>
         </div>
        </div>
       </div>
      </li> --}}
     </ul>
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
                                '<div class="col-lg-4">'+
                               ' <div class="reviewer-details clearfix">'+
                               ' <div class="reviewer-img float-left">'+
                              '  </div>'+
                             '   <div class="review-time">'+
                             // '  <div class="time"> Sun, 07-Jul-2019 </div>'+
                              '  <div class="reviewer-name">  '+entry.name+' </div>'+
                              '  </div>'+
                              '  </div>'+
                               ' </div>'+
                                '<div class="col-lg-8">'+
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
                   $("#video-details").append(data.data.content)
                   $("#related_courses").empty();
                   data.related.forEach(function(entry,i) {
                        console.log(entry)
                        $("#related_courses").append(
                            '<li>'+entry.title+'</li>'
                        ); 
                    });

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
        '<div class="col-lg-6 offset-lg-1 section-3">'+
   '  <div class="header-custom-border">'+
     ' <a class="btn" data-toggle="collapse" data-target="#demo_'+index+'" style="display:inline; font-size:15px"><i class="fas fa-plus" style="color: #007791"></i>'
       + '&nbsp;&nbsp;'+data[index].title+
     ' </a>'+
     '</div>'+
   '  <div id="demo_'+index +'" class="collapse">'+
    
    '  <video id="video" class="w-100 h-a" controls src="'+data[index].upload_video+'"> </video>'+
      '<div class="list-custom-border"><i class="fas fa-play-circle"></i>'+data[index].shortdescription+'   </div>'+
      '<button type="button" class="btn btn-primary" onclick="takeQuiz('+data[index].id+","+id+')">Take Quiz</button></div>'+
    '</div>'
                            )
                        /* if(index==0){
                            $("#accordionx").append(
                                '<div class="panel panel-default">'+
                                    '<div class="panel-heading">'+
                                        '<h4 class="panel-title">'+
                                        '<a data-toggle="collapse" data-parent="#accordionx" href="#collapse'+index+'">  '+data[index].title+'</a> </h4>'+
                                    '</div>'+
                                    '<div id="collapse'+index+'" class="panel-collapse collapse in">'+
                                        '<div class="panel-body">'+
                                            data[index].desc+
                                        '</div>'+
                                    '</div>'+
                                '</div>'
                            )
                        }else{
                            $("#accordionx").append(
                                '<div class="panel panel-default">'+
                                    '<div class="panel-heading">'+
                                        '<h4 class="panel-title">'+
                                        '<a data-toggle="collapse" data-parent="#accordionx" href="#collapse'+index+'">  '+data[index].title+'</a> </h4>'+
                                    '</div>'+
                                    '<div id="collapse'+index+'" class="panel-collapse collapse">'+
                                        '<div class="panel-body">'+
                                            data[index].desc+
                                        '</div>'+
                                    '</div>'+
                                '</div>'
                            )
                        } */
                        
                        
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
</script>
@endsection