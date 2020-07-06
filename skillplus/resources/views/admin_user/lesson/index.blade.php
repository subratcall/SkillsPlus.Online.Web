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
  <div class="col-lg-12">
   <div class="row">
    <div class="col-lg">

     <ul class="navigation nav nav-pills nav-tabs">
      <li class="nav-item">
       <a class="nav-link" href="#prev">
        <i class="fa fa-arrow-left" aria-hidden="true"></i>
       </a>
      </li>

      @if(count($contentPart) > 0)
      @foreach($contentPart as $key => $value)
      <li class="nav-item">
       <a class="nav-link {{ ($key == 0) ? 'active' : ''  }}" href="#tab-{{ $key }}" data-toggle="tab">
        {{ $value->lesson_type }}
       </a>
      </li>
      @endforeach
      @endif

      <li class="nav-item" id="next">
       <a class="nav-link" href="#">
        <i class="fa fa-arrow-right" aria-hidden="true"></i>
       </a>
      </li>
     </ul>
    </div>
   </div>

   <div class="tab-content mt-lg-1">

    @if(count($contentPart) > 0)
    @foreach($contentPart as $key => $value)
    <div class="tab-pane fade show {{ ($key == 0) ? 'active' : ''  }}" id="tab-{{ $key }}">

     <div class="row">
      <div class="col-lg-12">
       <h2><strong>{{ $value->title }}</strong></h2>
      </div>
      <div class="col-lg-12">
       <div class="row">
        <div class="col-lg-6">
         <video width="100%" controls>
          <source src="{{ $value->upload_video }}" type="video/mp4">
          Your browser does not support the video tag.
         </video>
        </div>
       </div>
      </div>
      <div class="col-lg-12">
       <div class="row">
        <div class="col-lg-6">
         {!! $value->description !!}
        </div>
       </div>
      </div>
     </div>

    </div>

    @endforeach
    @endif
   </div>
  </div>
 </div>
</section>


@endsection

@section('script')
<script>
 var cid = "{{request()->route('cid')}}";
 var cpid = "{{request()->route('cpid')}}";

 $(document).ready(function() {
  console.log("test");
  ShowContent();

 });

 $("#next").click(function() {
  console.log("test");
 });
 
 function ShowContent() {
  var lessonDescription = "<?php echo $contentPart[0]->description ?>";

   $("#lessonDescription").html(lessonDescription); 
 }
</script>
@endsection