@extends('admin.newlayout.layout',['breadcom'=>['Lesson','Users']])
@section('title')
@endsection

@section('style')
<style>

</style>
@endsection

@section('page')
<section class="card">
 <div class="card-body">

  {{-- 

  <div id="tabs">
   <div class="row">
    <div class="col-lg-4">
     <div class="col-lg">
      <div class="row">
       <div class="col-lg">
        <a href="#tabs-1"  data-toggle="tab">Introduction</a>
       </div>
       <div class="col-lg">
        <a href="#tabs-2"  data-toggle="tab">Video</a>
       </div>
      </div>
     </div>
    </div>
   </div>
   <div class="row">
    <div class="col-lg">
     <div id="tabs-1">
      <h1>{{ $contentPart[0]->title }}</h1>
  <div id="lessonContent">{{ $contentPart[0]->description }}</div>
 </div>
 <div id="tabs-2">
  <video width="320" height="240" controls>
   <source src="{{ $contentPart[0]->upload_video }}" type="video/mp4">
   Your browser does not support the video tag.
  </video>
 </div>
 </div>
 </div>
 --}}

 <div class="row">
  <div class="col-lg-12">
   <div class="row">
    <div class="col-lg">
     <ul class="navigation nav nav-pills nav-tabs">
      <li class="nav-item">
       <a class="nav-link" href="#prev" data-toggle="tab">
        <i class="fa fa-arrow-left" aria-hidden="true"></i>
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link active" href="#tab-1" data-toggle="tab">
        Introduction
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link" href="#tab-2" data-toggle="tab">
        Video
       </a>
      </li>
      <li class="nav-item">
       <a href="#next" class="nav-link">
        <i class="fa fa-arrow-right" aria-hidden="true"></i>
       </a>
      </li>
     </ul>
    </div>
   </div>

   <div class="tab-content mt-lg-1">
    <div class="tab-pane fade show active" id="tab-1">
     <h1>{{ $contentPart[0]->title }}</h1>

     <div id="lessonDescription"></div>

    </div>
    <div class="tab-pane fade" id="tab-2">
     <div class="row justify-content-center">
      <div class="col-lg-6">
       <div class="col-lg">
        <video width="100%" controls>
         <source src="{{ $contentPart[0]->upload_video }}" type="video/mp4">
         Your browser does not support the video tag.
        </video>
       </div>
       <div class="col-lg">
        Video description
       </div>
      </div>
     </div>
    </div>
   </div>


  </div>
 </div>


 </div>
</section>


@endsection

@section('script')
<script>
 $(document).ready(function() {
  console.log("test");
  ShowContent();
 });

 function ShowContent() {
  var lessonDescription = "<?php echo $contentPart[0]->description ?>";

   $("#lessonDescription").html(lessonDescription); 
 }
</script>
@endsection