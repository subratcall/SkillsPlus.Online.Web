<style>
    .carousel-indicators {
      right: 20%;
      left: 20%;
  }
</style>
<div class="container-fluid">
    {{-- <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    
        <ol class="carousel-indicators">
          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-example-generic" data-slide-to="1"></li>
          <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>
      
        <div class="carousel-inner" role="listbox">
          <div class="item active">
            <img class="d-block w-100"  alt="First slide [800x400]" src="/bin/admin/files/cover(7).jpg" data-holder-rendered="true">

            <div class="carousel-caption">
                <h3>lit. Repudiandae quisquam dicta, inventore consequuntur quasi accusam</h3>
                <p>Lorem ipsum dolor sit amemus numquam ab eligendi id esse explicabo quis nesciunt odit sequi quae voluptatem mollitia corrupti officia!</p>
            </div>
          </div>

          <div class="item">           
            <img class="d-block w-100"  alt="First slide [800x400]" src="/bin/admin/files/cover(6).jpg" data-holder-rendered="true">

            <div class="carousel-caption">
              2
            </div>
          </div>
          
          <div class="item">           
            <img class="d-block w-100"  alt="First slide [800x400]" src="/bin/admin/files/cover(9).jpg" data-holder-rendered="true">

            <div class="carousel-caption">
              3
            </div>
          </div>
        </div>
      
        
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
    </div> --}}

    <div id="myCarousel" class="carousel slide" data-ride="carousel">

      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
  
      <div class="carousel-inner">
  
        <div class="item active">
          <img class="d-block w-100"  alt="First slide [800x400]" src="/bin/admin/files/cover(7).jpg" data-holder-rendered="true">

          <div class="carousel-caption">
            <h3>Los Angeles</h3>
            <p>LA is always so much fun!</p>
          </div>
        </div>
  
        <div class="item">
         <img class="d-block w-100"  alt="First slide [800x400]" src="/bin/admin/files/cover(6).jpg" data-holder-rendered="true">
          <div class="carousel-caption">
            <h3>Chicago</h3>
            <p>Thank you, Chicago!</p>
          </div>
        </div>
      
        <div class="item">
         <img class="d-block w-100"  alt="First slide [800x400]" src="/bin/admin/files/cover(9).jpg" data-holder-rendered="true">
          <div class="carousel-caption">
            <h3>New York</h3>
            <p>We love the Big Apple!</p>
          </div>
        </div>
    
      </div>
  
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    {{-- <div class="row">
        <div class="parts-slider" style="background:url('{{{ get_option('main_page_slide','/assets/images/view/sample/slider-sample.png') }}}');">
            <div class="col-xs-12 col-md-4 col-md-offset-4 parts-slider-container">
                <h2>{{{ get_option('main_page_slide_title','') }}}</h2>
                <span>{{{ get_option('main_page_slide_text','') }}}</span>
                <div class="parts-slider-button">
                    <a href="{!! get_option('main_page_slide_btn_1_url','/')  !!}">{{{ get_option('main_page_slide_btn_1_text','') }}}</a>
                    <a href="{!! get_option('main_page_slide_btn_2_url','/')  !!}">{{{ get_option('main_page_slide_btn_2_text','') }}}</a>
                </div>
            </div>
            <i class="fa fa-angle-down down-flesh"></i>
        </div>        
    </div> --}}    
</div>
