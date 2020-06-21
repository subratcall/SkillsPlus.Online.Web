<style>
    @media (max-width: 600px) {
.facet_sidebar {
    display: none;
}}

@media (max-width: @screen-xs) {
    body{font-size: 10px;}
}

@media (max-width: @screen-sm) {
    body{font-size: 14px;}
}


    .justify-content-center {
        justify-content: center !important;
        display: flex;
        flex-wrap: wrap;
        margin-right: -15px;
        margin-left: -15px;
    }

    .pro-content .pro-heading-title {
        padding-bottom: 30px;
        margin-top: -11px;
    }

    .pro-content .pro-heading-title h2 {
        font-family: "Montserrat-Bold", sans-serif;
        line-height: 1.5;
        text-transform: uppercase;
        text-align: center;
        margin: 0;
    }

    .pro-content .pro-heading-title p {
        text-align: center;
        line-height: 1.5;
        letter-spacing: 1.5px;
        font-size: 16px;
        color: #6c757d;
        margin: 0;
    }

   /*  h2, h3, h4, h5 {
        font-family: "Montserrat-Bold", sans-serif;
        font-weight: 700;
    }

    h2, .h2 {
        font-size: 1.75rem;
    } */
    #myCarousel .thumbnail animated fadeInRight {
	margin-bottom: 0;
}
.cc.left, .cc.right {
	background-image:none !important;
}
.cc {
	color:#fff;
	top:40%;
	color:#428BCA;
	bottom:auto;
	padding-top:4px;
	width:30px;
	height:30px;
	text-shadow:none;
	opacity:1;
}
.cc:hover {
	color: #d9534f;
}
.cc.left, .cc.right {
	background-image:none !important;
}
.cc.right {
	left:auto;
	right:-32px;
}
.cc.left {
	right:auto;
	left:-32px;
}
.carousel-indicators {
	bottom:-30px;
}
.carousel-indicators li {
	border-radius:0;
	width:10px;
	height:10px;
	background:#ccc;
	border:1px solid #ccc;
}
.carousel-indicators .active {
	width:12px;
	height:12px;
	background:#3276b1;
	border-color:#3276b1;
}

.pro-content {
    overflow: hidden;
    padding-top: 100px;
}

.fullwidth-banner {
    height: 500px;
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;
}

.fullwidth-banner .parallax-banner-text {
    text-align: center;
}

.fullwidth-banner .parallax-banner-text .hover-link {
    transform: translateY(-100px);
    transition: 1.2s ease-out;
    opacity: 0;
    margin-top: 15px;
}

.swipe-to-top {
    transform: perspective(1px) translateZ(0);
    position: relative;
    transition-property: color;
    transition-duration: 0.4s;
    overflow: hidden;
}

.fullwidth-banner .parallax-banner-text h2 {
    font-size: 5rem;
    line-height: 1;
    font-family: "Montserrat-Bold", sans-serif;
    color: #fff;
    margin: 0;
}

.fullwidth-banner .parallax-banner-text h4 {
    font-size: 40px;
    font-family: "Montserrat-Bold", sans-serif;
    font-weight: 600;
    color: #fff;
    line-height: 1.5;
    margin: 0;
}

.fullwidth-banner .parallax-banner-text .hover-link {
    transform: translateY(-100px);
    transition: 1.2s ease-out;
    opacity: 0;
    margin-top: 15px;
}

.fullwidth-banner .parallax-banner-text {
    text-align: center;
}

.swipe-to-top {
    transform: perspective(1px) translateZ(0);
    position: relative;
    overflow: hidden;
}
.featured_course{
    font-weight: bold !important;
}

/**
 * Change animation duration
 */
 .animated {
  -webkit-animation-duration: 1.5s;
  animation-duration: 1.5s;
}

@-webkit-keyframes fadeInRight {
  from {
    opacity: 0;
    -webkit-transform: translate3d(100px, 0, 0);
    transform: translate3d(100px, 0, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: none;
    transform: none;
  }
}

@keyframes fadeInRight {
  from {
    opacity: 0;
    -webkit-transform: translate3d(100px, 0, 0);
    transform: translate3d(100px, 0, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: none;
    transform: none;
  }
}

.fadeInRight {
  -webkit-animation-name: fadeInRight;
  animation-name: fadeInRight;
}


.pro-content .tabs-main .nav {
    display: flex;
    justify-content: center;
}
.nav {
    display: flex;
    flex-wrap: wrap;
    padding-left: 0;
    margin-bottom: 0;
    list-style: none;
}


.pro-content .tabs-main a.nav-link.active {
    color: #fff;
    background-color: #b7853f !important;
}

.pro-content .tabs-main .nav-link {
    font-family: "Montserrat-Bold", sans-serif;
    color: #212529;
    text-transform: uppercase;
    text-align: center;
}

.pro-content .tabs-main .nav-link {
    font-family: "Montserrat-Bold", sans-serif;
    color: #212529;
    text-transform: uppercase;
    text-align: center;
}

.pro-content .tabs-main .nav-link {
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: "Montserrat-Bold", sans-serif;
    background-color: #ced4da;
    border: 1px solid #dee2e6;
        border-top-width: 1px;
        border-right-width: 1px;
        border-bottom-width: 1px;
        border-left-width: 1px;
    color: #212529;
    text-transform: uppercase;
    width: 140px;
    height: 45px;
    margin-right: 30px;
    margin-bottom: 0;
    border-top-width: 0;
    border-left-width: 0;
    border-right-width: 0;
    border-bottom-width: 0;
    text-align: center;
    padding: 8px;
    box-shadow: none;
}



/* ** **/

.pro-content {
  overflow: hidden;
  padding-top: 100px;
}

.pro-content .slick-arrow {
  z-index: 2;
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: #ced4da !important;
  color: #212529 !important;
  border: 1px solid #ced4da !important;
  border-radius: 0;
  margin-left: 1px;
  height: 38px;
  width: 38px;
  text-align: center;
  line-height: 38px;
  text-decoration: none;
  outline: none;
  opacity: 0;
  top: 48%;
}

.pro-content .slick-arrow:hover {
  background-color: #28B293;
}

.pro-content .slick-arrow::after {
  background-color: #1f8871;
  opacity: 0;
}

.pro-content .slick-prev {
  transition: 1.2s ease-in-out;
  transform: translateX(-100px) !important;
  -webkit-transform: translateX(-100px) !important;
  overflow: hidden;
  opacity: 0;
  position: absolute;
  left: -53px;
}

.pro-content .slick-prev::before {
  margin-bottom: 5px;
  font-family: "revicons";
  line-height: 36px;
  font-size: 30px;
  opacity: 1;
}

.pro-content .slick-next {
  transition: 1.2s ease-in-out;
  transform: translateX(100px) !important;
  -webkit-transform: translateX(100px) !important;
  overflow: hidden;
  opacity: 0;
  position: absolute;
  right: -53px;
}

.pro-content .slick-next::before {
  margin-bottom: 5px;
  font-family: "revicons";
  line-height: 36px;
  font-size: 30px;
  opacity: 1;
}

.pro-content .general-product {
  overflow: hidden;
}

.pro-content .general-product:hover .slick-prev {
  transition: 0.4s ease-in-out;
  transform: translateX(0px) !important;
  -webkit-transform: translateX(0px) !important;
  opacity: 1 !important;
  overflow: hidden;
}

.pro-content .general-product:hover .slick-next {
  transition: 0.4s ease-in-out;
  transform: translateX(0px) !important;
  -webkit-transform: translateX(0px) !important;
  opacity: 1 !important;
  overflow: hidden;
}

.pro-content .blog-carousel-js:hover .slick-arrow {
  transition: 0.4s ease-in-out;
  transform: translateX(0px) !important;
  -webkit-transform: translateX(0px) !important;
  opacity: 1 !important;
}

.pro-content .tabs-main .nav {
  display: flex;
  justify-content: center;
}

.pro-content .tabs-main .nav h4 {
  position: absolute;
  right: 15px;
  top: 15px;
  font-size: 14px;
  font-weight: 600;
}

.pro-content .tabs-main .nav-link {
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
  font-family: "Montserrat-Bold", sans-serif;
  background-color: #ced4da;
  border: 1px solid #dee2e6;
  color: #212529;
  text-transform: uppercase;
  width: 140px;
  height: 45px;
  margin-right: 30px;
  margin-bottom: 0;
  border-top-width: 0;
  border-left-width: 0;
  border-right-width: 0;
  border-bottom-width: 0;
  text-align: center;
  padding: 8px;
  box-shadow: none;
}

.pro-content .tabs-main a.nav-link.active {
  color: #fff;
  background-color: #28B293 !important;
}

.pro-content .tabs-main a.nav-link.active::before {
  content: "";
  position: absolute;
  left: 62px;
  bottom: -18px;
  width: 0;
  height: 0;
  border: 8px solid transparent;
  border-top: 10px solid #28B293;
}




/* ** **/
.irs {
  position: relative;
  display: block;
  -webkit-touch-callout: none;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  height: 40px !important;
}

.irs-from {
  visibility: hidden !important;
}

.irs-to {
  visibility: hidden !important;
}

.irs-max {
  visibility: hidden !important;
}

.irs-min {
  visibility: hidden !important;
}

.irs-single {
  visibility: hidden !important;
}

.irs-line {
  position: relative;
  display: block;
  overflow: hidden;
  outline: none !important;
  border-radius: 200px;
  top: 14px !important;
}

.irs-line-left,
.irs-line-mid,
.irs-line-right {
  position: absolute;
  display: block;
  top: 0;
}

.irs-line-left {
  left: 0;
  width: 11%;
}

.irs-line-mid {
  left: 9%;
  width: 82%;
}

.irs-line-right {
  right: 0;
  width: 11%;
}

.irs-bar {
  position: absolute;
  display: block;
  left: 0;
  width: 0;
  top: 13px !important;
  background: #fff !important;
  border-top: 1px solid #fff !important;
  border-bottom: 1px solid #fff !important;
}

.irs-bar-edge {
  position: absolute;
  display: block;
  top: 0;
  left: 0;
}

.irs-shadow {
  position: absolute;
  display: none;
  left: 0;
  width: 0;
}

.irs-slider {
  position: absolute;
  display: block;
  cursor: default;
  z-index: 1;
  top: 10px !important;
  width: 15px !important;
  height: 15px !important;
}

.irs-slider.type_last {
  z-index: 2;
}

.irs-min {
  position: absolute;
  display: block;
  left: 0;
  cursor: default;
}

.irs-max {
  position: absolute;
  display: block;
  right: 0;
  cursor: default;
}

.irs-from,
.irs-to,
.irs-single {
  position: absolute;
  display: block;
  top: 0;
  left: 0;
  cursor: default;
  white-space: nowrap;
}

.irs-grid {
  position: absolute;
  display: none;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 20px;
}

.irs-with-grid .irs-grid {
  display: block;
}

.irs-grid-pol {
  position: absolute;
  top: 0;
  left: 0;
  width: 1px;
  height: 8px;
  background: #000;
}

.irs-grid-pol.small {
  height: 4px;
}

.irs-grid-text {
  position: absolute;
  bottom: 0;
  left: 0;
  white-space: nowrap;
  text-align: center;
  font-size: 9px;
  line-height: 9px;
  padding: 0 3px;
  color: #000;
}

.irs-disable-mask {
  position: absolute;
  display: block;
  top: 0;
  left: -1%;
  width: 102%;
  height: 100%;
  cursor: default;
  background: rgba(0, 0, 0, 0);
  z-index: 2;
}

.lt-ie9 .irs-disable-mask {
  background: #000;
  filter: alpha(opacity=0);
  cursor: not-allowed;
}

.irs-disabled {
  opacity: 0.4;
}

.irs-hidden-input {
  position: absolute !important;
  display: block !important;
  top: 0 !important;
  left: 0 !important;
  width: 0 !important;
  height: 0 !important;
  font-size: 0 !important;
  line-height: 0 !important;
  padding: 0 !important;
  margin: 0 !important;
  outline: none !important;
  z-index: -9999 !important;
  background: none !important;
  border-style: solid !important;
  border-color: transparent !important;
}

/* Ion.RangeSlider, Simple Skin
// css version 2.0.3
// Â© Denis Ineshin, 2014    https://github.com/IonDen
// Â© guybowden, 2014        https://github.com/guybowden
// ===================================================================================================================*/

/* =====================================================================================================================
// Skin details */

.irs {
  height: 55px;
}

.irs-with-grid {
  height: 75px;
}

.irs-line {
  height: 10px;
  top: 33px;
  background: #EEE;
  background: linear-gradient(to bottom, #DDD -50%, #FFF 150%);
  /* W3C */
  border: 1px solid #CCC;
  border-radius: 16px;
  -moz-border-radius: 16px;
}

.irs-line-left {
  height: 8px;
}

.irs-line-mid {
  height: 8px;
}

.irs-line-right {
  height: 8px;
}

.irs-bar {
  height: 10px;
  top: 33px;
  border-top: 1px solid #428bca;
  border-bottom: 1px solid #428bca;
  background: #428bca;
  background: linear-gradient(to top, #428bca 0%, #7fc3e8 100%);
  /* W3C */
}

.irs-bar-edge {
  height: 10px;
  top: 33px;
  width: 14px;
  border: 1px solid #428bca;
  border-right: 0;
  background: #428bca;
  background: linear-gradient(to top, #428bca 0%, #7fc3e8 100%);
  /* W3C */
  border-radius: 16px 0 0 16px;
  -moz-border-radius: 16px 0 0 16px;
}

.irs-shadow {
  height: 2px;
  top: 38px;
  background: #000;
  opacity: 0.3;
  border-radius: 5px;
  -moz-border-radius: 5px;
}

.lt-ie9 .irs-shadow {
  filter: alpha(opacity=30);
}

.irs-slider {
  top: 25px;
  width: 27px;
  height: 27px;
  border: 1px solid #AAA;
  background: #DDD;
  background: linear-gradient(to bottom, white 0%, gainsboro 20%, white 100%);
  /* W3C */
  border-radius: 27px;
  -moz-border-radius: 27px;
  box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
  cursor: pointer;
}

.irs-slider.state_hover,
.irs-slider:hover {
  background: #FFF;
}

.irs-min,
.irs-max {
  color: #333;
  font-size: 12px;
  line-height: 1.333;
  text-shadow: none;
  top: 0;
  padding: 1px 5px;
  background: rgba(0, 0, 0, 0.1);
  border-radius: 3px;
  -moz-border-radius: 3px;
}

.lt-ie9 .irs-min,
.lt-ie9 .irs-max {
  background: #ccc;
}

.irs-from,
.irs-to,
.irs-single {
  color: #fff;
  font-size: 14px;
  line-height: 1.333;
  text-shadow: none;
  padding: 1px 5px;
  background: #428bca;
  border-radius: 3px;
  -moz-border-radius: 3px;
}

.lt-ie9 .irs-from,
.lt-ie9 .irs-to,
.lt-ie9 .irs-single {
  background: #999;
}

.irs-grid {
  height: 27px;
}

.irs-grid-pol {
  opacity: 0.5;
  background: #428bca;
}

.irs-grid-pol.small {
  background: #999;
}

.irs-grid-text {
  bottom: 5px;
  color: #99a4ac;
}




@media only screen and (min-width: 992px) and (max-width: 1199px) {
  .top-bar .form-inline .form-group {
    margin-right: 10px;
    margin-bottom: 5px;
    margin-top: 5px;
  }
}






@media only screen and (max-width: 767px) { 

  .fullwidth-banner .hover-link {
    opacity: 1 !important;
    transition-timing-function: ease-in;
    transform: translateY(0px) !important;
    -webkit-transform: translateY(0px) !important;
  }

  .pro-content .tabs-main .tab-content .tab-pane .slick-arrow {
    transform: translateX(0px) !important;
    -webkit-transform: translateX(0px) !important;
    opacity: 1 !important;
  }

  .pro-content .pro-heading-title h2 {
    font-size: 20px;
  }

  .pro-content .pro-heading-title {
    padding-bottom: 0px !important;
  }

  .pro-content .tabs-main .nav-link {
    width: 27% !important;
    font-size: 11px;
    margin-right: 7px !important;
    margin-left: 7px;
  }

  .pro-content .tabs-main a.nav-link.active.show::before {
    left: 40% !important;
  }

  .pro-content {
    padding-top: 60px !important;
  }

  .fullwidth-banner {
    height: 320px !important;
  }

  .fullwidth-banner .parallax-banner-text h2 {
    font-size: 3rem !important;
  }

  .fullwidth-banner .parallax-banner-text h4 {
    font-size: 25px !important;
  }

  .product-ad article {
    flex-direction: column;
  }

}


</style>
<div class="container-fluid newest-container pro-content">
    
        <div class="container">            
            <div class="products-area">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-6">
                    <div class="pro-heading-title">
                        <h2>  WELCOME TO SKILLS READY
                        </h2>
                        <p> 
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi venenatis felis tempus feugiat maximus. 
                        </p>
                        </div>
                    </div>
                </div>
                
                </div>
        <!--    <div class="row">
                <div class="header">
                    <span class="pull-left">{{{ trans('main.newest_courses') }}}</span>
                    <a href="/category?order=new" class="more-link pull-right">{{{ trans('main.load_more') }}}</a>
                </div>
                <div class="body body-s-r" dir="ltr">
                    <span class="nav-right"></span>
                    <div class="owl-carousel">
                        @foreach($new_content as $new)
                            <?php $meta = arrayToList($new->metas,'option','value'); ?>
                            <div class="owl-car-s" dir="rtl">
                                <a href="/product/{{{ $new->id or '' }}}" title="{{{ $new->title or '' }}}" class="content-box">
                                    <img src="{{{ $meta['thumbnail animated fadeInRight'] or '' }}}"/>
									<h3>{!! str_limit($new->title,30,'...') !!}</h3>
                                    <div class="footer">
                                        <span class="avatar" title="{{{ $new->user->name or '' }}}" onclick="window.location.href = '/profile/{{{ $new->user->id or 0 }}}'"><img src="{{{ get_user_meta($new->user_id,'avatar',get_option('default_user_avatar','')) }}}"></span>
                                        <label class="pull-right content-clock">@if(isset($meta['duration'])){{{ convertToHoursMins($meta['duration']) }}}@else {{{ trans('main.not_defined') }}} @endif </label>
										<span class="boxicon mdi mdi-clock pull-right"></span>
										<span class="boxicon mdi mdi-wallet pull-left"></span>
                                        <label class="pull-left">@if(isset($meta['price']) && $meta['price']>0) {{{currencySign()}}}{{{ price($new->id,$new->category_id,$meta['price'])['price'] }}} @else {{{ trans('main.free') }}} @endif</label>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <span class="nav-left pull-right"></span>
                </div>
            </div> -->
            

            
            

            <div class="tabs-main">
                <div class="container">
                   <div class="row">
                      <div class="col-md-12 p-0">
                         <div class="nav" role="tablist" id="tabCarousel">
                            <a class="nav-link btn  active show" data-toggle="tab" href="#featured" role="tab"><span data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Top Sales">Top Sales</span></a>
                            <a class="nav-link btn" data-toggle="tab" href="#special" role="tab" aria-controls="special" aria-selected="true"><span data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Special">Special</span></a> 
                            <a class="nav-link btn" data-toggle="tab" href="#liked" role="tab" aria-controls="liked" aria-selected="true"><span data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Most Liked">Most Liked</span></a> 
                         </div>
                      </div>
                   </div>
                </div>
             </div>
             <br>
             <div class="row">
                <div class="well">
                   <div id="myCarousel2" class="carousel slide">
                      <div class="carousel-inner">
                        <?php 
                        
                          $arrayLen = count($new_content);
                          
                          $arrayDiv = array();
                          foreach($new_content as $k => $new)
                            if ($k % 4 == 0) {
                             // echo $k;
                              $arrayDiv[] = $k;
                          }
                         // dd($new_content);
                        ?>
                        @for ($i = 0; $i < sizeof($arrayDiv); $i++)      
                        {{-- {{$arrayDiv[$i]}} --}}
                          @if ($i == 0)      
                          {{-- {{$i.' only'}} --}}
                            <div class="item active">
                              <div class="row">                                
                                <?php 
                                  $arrSize =  $arrayDiv[0]+3;//get the very start
                                ?>
                                @for ($j = $arrayDiv[$i]; $j <= 3; $j++)
                                  <div class="col-md-3">
                                    <div class="thumbnail animated fadeInRight">
                                      <img src="http://placehold.it/300x200/" alt="Slide11">
                                      <div class="caption">
                                          <h3 class="">{!! str_limit($new_content[$j]->title,30,'...') !!}</h3>
                                          <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor</p>
                                          <p><a href="#" class="btn btn-primary" role="button">12,99 €</a> <a href="#" class="btn btn-default" role="button">Wishlist</a></p>
                                      </div>
                                    </div>
                                  </div>
                                @endfor                                
                              </div>
                            </div>  
                            @endif
                            @if ($i > 0)  
                            {{-- {{$i.' test'}} --}}
                            <div class="item">
                              <div class="row">                                 
                                <?php 
                                  $arrSize =  $arrayDiv[$i]+3;
                                  //echo 'array size '. $arrSize;
                                  $startArray = $arrSize-2;
                                  $getLastArray = count($new_content)-1;//end($arrayDiv);
                                  //echo ' end '.$getLastArray;
                                ?>
                                @for ($k = $arrayDiv[$i]; $k <= $arrSize ; $k++)
                              {{--   {{"sdadsfdsfsdf ".$arrSize."<=".$getLastArray}} --}}
                                @if($arrSize<=$getLastArray)
                                    <div class="col-md-3">
                                      <div class="thumbnail animated fadeInRight">
                                        <img src="http://placehold.it/300x200/" alt="Slide11">
                                        <div class="caption">
                                          <h3 class="">{!! str_limit($new_content[$k]->title,30,'...') !!}</h3>
                                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor</p>
                                            <p><a href="#" class="btn btn-primary" role="button">12,99 €</a> <a href="#" class="btn btn-default" role="button">Wishlist</a></p>
                                        </div>
                                      </div>
                                    </div>
                                  @else
                                  <?php $kk = $k-2;?>
                                  {{-- {{"xxxxxxxxx ".$k."<=".$getLastArray}} --}}
                                  @if($k<=$getLastArray)
                                    <div class="col-md-3">
                                      <div class="thumbnail animated fadeInRight">
                                        <img src="http://placehold.it/300x200/" alt="Slide11">
                                        <div class="caption">
                                          <h3 class="">{!! str_limit($new_content[$k]->title,30,'...') !!}</h3>
                                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor</p>
                                            <p><a href="#" class="btn btn-primary" role="button">12,99 €</a> <a href="#" class="btn btn-default" role="button">Wishlist</a></p>
                                        </div>
                                      </div>
                                    </div>
                                    @endif

                                  @endif
                                @endfor                                
                              </div>
                            </div> 
                          @endif
                        @endfor
                        {{-- @foreach($new_content as $k => $new)
                          @if ($k % 4 == 0) 
                              @if($k==0)
                                <div class="item active">
                                  <div class="row">
                                    <div class="col-md-3">
                                        <div class="thumbnail animated fadeInRight">
                                          <img src="http://placehold.it/300x200/" alt="Slide11">
                                          <div class="caption">
                                              <h3 class="">Product label {{$new->id}} a</h3>
                                              <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor</p>
                                              <p><a href="#" class="btn btn-primary" role="button">12,99 €</a> <a href="#" class="btn btn-default" role="button">Wishlist</a></p>
                                          </div>
                                        </div>
                                    </div>
                                  </div>
                                </div>   
                              @endif

                            @else  
                            <div class="item ">
                              <div class="row">
                                <div class="row">
                                  <div class="col-md-3">
                                      <div class="thumbnail animated fadeInRight">
                                        <img src="http://placehold.it/300x200/" alt="Slide11">
                                        <div class="caption">
                                            <h3 class="">Product label 1</h3>
                                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor</p>
                                            <p><a href="#" class="btn btn-primary" role="button">12,99 €</a> <a href="#" class="btn btn-default" role="button">Wishlist</a></p>
                                        </div>
                                      </div>
                                  </div>
                                  <div class="col-md-3">
                                      <div class="thumbnail animated fadeInRight">
                                        <img src="http://placehold.it/300x200/" alt="Slide11">
                                        <div class="caption">
                                            <h3 class="">Product label 1</h3>
                                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor</p>
                                            <p><a href="#" class="btn btn-primary" role="button">12,99 €</a> <a href="#" class="btn btn-default" role="button">Wishlist</a></p>
                                        </div>
                                      </div>
                                  </div>
                                  <div class="col-md-3">
                                      <div class="thumbnail animated fadeInRight">
                                        <img src="http://placehold.it/300x200/" alt="Slide11">
                                        <div class="caption">
                                            <h3 class="">Product label 1</h3>
                                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor</p>
                                            <p><a href="#" class="btn btn-primary" role="button">12,99 €</a> <a href="#" class="btn btn-default" role="button">Wishlist</a></p>
                                        </div>
                                      </div>
                                  </div>
                                  <div class="col-md-3">
                                      <div class="thumbnail animated fadeInRight">
                                        <img src="http://placehold.it/300x200/" alt="Slide11">
                                        <div class="caption">
                                            <h3 class="">Product label 1</h3>
                                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor</p>
                                            <p><a href="#" class="btn btn-primary" role="button">12,99 €</a> <a href="#" class="btn btn-default" role="button">Wishlist</a></p>
                                        </div>
                                      </div>
                                  </div>
                                </div>
                              </div>
                            </div>  
                          @endif
                        

                        @endforeach --}}
                         {{-- <div class="item active">
                            <div class="row">
                               <div class="col-md-3">
                                  <div class="thumbnail animated fadeInRight">
                                     <img src="http://placehold.it/300x200/" alt="Slide11">
                                     <div class="caption">
                                        <h3 class="">Product label 1</h3>
                                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor</p>
                                        <p><a href="#" class="btn btn-primary" role="button">12,99 €</a> <a href="#" class="btn btn-default" role="button">Wishlist</a></p>
                                     </div>
                                  </div>
                               </div>
                               <div class="col-md-3">
                                  <div class="thumbnail animated fadeInRight">
                                     <img src="http://placehold.it/300x200/" alt="Slide12">
                                     <div class="caption">
                                        <h3 class="">Product label 2</h3>
                                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor</p>
                                        <p><a href="#" class="btn btn-primary" role="button">12,99 €</a> <a href="#" class="btn btn-default" role="button">Wishlist</a></p>
                                     </div>
                                  </div>
                               </div>
                               <div class="col-md-3">
                                  <div class="thumbnail animated fadeInRight">
                                     <img src="http://placehold.it/300x200/" alt="Slide13">
                                     <div class="caption">
                                        <h3 class="">Product label 3</h3>
                                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor</p>
                                        <p><a href="#" class="btn btn-primary" role="button">12,99 €</a> <a href="#" class="btn btn-default" role="button">Wishlist</a></p>
                                     </div>
                                  </div>
                               </div>
                               <div class="col-md-3">
                                  <div class="thumbnail animated fadeInRight">
                                     <img src="http://placehold.it/300x200/" alt="Slide14">
                                     <div class="caption">
                                        <h3 class="">Product label 4</h3>
                                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor</p>
                                        <p><a href="#" class="btn btn-primary" role="button">12,99 €</a> <a href="#" class="btn btn-default" role="button">Wishlist</a></p>
                                     </div>
                                  </div>
                               </div>
                            </div>
                         </div>
                         <div class="item">
                            <div class="row">
                               <div class="col-md-3">
                                  <div class="thumbnail animated fadeInRight">
                                     <img src="http://placehold.it/300x200/" alt="Slide21">
                                     <div class="caption">
                                        <h3 class="">Product label 5</h3>
                                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor</p>
                                        <p><a href="#" class="btn btn-primary" role="button">12,99 €</a> <a href="#" class="btn btn-default" role="button">Wishlist</a></p>
                                     </div>
                                  </div>
                               </div>
                               <div class="col-md-3">
                                  <div class="thumbnail animated fadeInRight">
                                     <img src="http://placehold.it/300x200/" alt="Slide22">
                                     <div class="caption">
                                        <h3 class="">Product label 6</h3>
                                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor</p>
                                        <p><a href="#" class="btn btn-primary" role="button">12,99 €</a> <a href="#" class="btn btn-default" role="button">Wishlist</a></p>
                                     </div>
                                  </div>
                               </div>
                               <div class="col-md-3">
                                  <div class="thumbnail animated fadeInRight">
                                     <img src="http://placehold.it/300x200/" alt="Slide23">
                                     <div class="caption">
                                        <h3 class="">Product label 7</h3>
                                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor</p>
                                        <p><a href="#" class="btn btn-primary" role="button">12,99 €</a> <a href="#" class="btn btn-default" role="button">Wishlist</a></p>
                                     </div>
                                  </div>
                               </div>
                               <div class="col-md-3">
                                  <div class="thumbnail animated fadeInRight">
                                     <img src="http://placehold.it/300x200/" alt="Slide24">
                                     <div class="caption">
                                        <h3 class="">Product label 8</h3>
                                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor</p>
                                        <p><a href="#" class="btn btn-primary" role="button">12,99 €</a> <a href="#" class="btn btn-default" role="button">Wishlist</a></p>
                                     </div>
                                  </div>
                               </div>
                            </div>
                         </div>
                         <div class="item">
                            <div class="row">
                               <div class="col-md-3">
                                  <div class="thumbnail animated fadeInRight">
                                     <img src="http://placehold.it/300x200/" alt="Slide31">
                                     <div class="caption">
                                        <h3>Product label 9</h3>
                                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor</p>
                                        <p><a href="#" class="btn btn-primary" role="button">12,99 €</a> <a href="#" class="btn btn-default" role="button">Wishlist</a></p>
                                     </div>
                                  </div>
                               </div>
                               <div class="col-md-3">
                                  <div class="thumbnail animated fadeInRight">
                                     <img src="http://placehold.it/300x200/" alt="Slide32">
                                     <div class="caption">
                                        <h3>Product label 10</h3>
                                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor</p>
                                        <p><a href="#" class="btn btn-primary" role="button">12,99 €</a> <a href="#" class="btn btn-default" role="button">Wishlist</a></p>
                                     </div>
                                  </div>
                               </div>
                               <div class="col-md-3">
                                  <div class="thumbnail animated fadeInRight">
                                     <img src="http://placehold.it/300x200/" alt="Slide33">
                                     <div class="caption">
                                        <h3>Product label 11</h3>
                                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor</p>
                                        <p><a href="#" class="btn btn-primary" role="button">12,99 €</a> <a href="#" class="btn btn-default" role="button">Wishlist</a></p>
                                     </div>
                                  </div>
                               </div>
                               <div class="col-md-3">
                                  <div class="thumbnail animated fadeInRight">
                                     <img src="http://placehold.it/300x200/" alt="Slide34">
                                     <div class="caption">
                                        <h3>Product label 12</h3>
                                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor</p>
                                        <p><a href="#" class="btn btn-primary" role="button">12,99 €</a> <a href="#" class="btn btn-default" role="button">Wishlist</a></p>
                                     </div>
                                  </div>
                               </div>
                            </div>
                         </div> --}}
                      </div>
                      <a class="left carousel-control cc" href="#myCarousel2" data-slide="prev"><i class="fa fa-chevron-left fa-2x"></i></a>
                      <a class="right carousel-control cc" href="#myCarousel2" data-slide="next"><i class="fa fa-chevron-right fa-2x"></i></a>
                      <ol class="carousel-indicators">
                        @for ($l = 0; $l < sizeof($arrayDiv); $l++)
                          @if($l==0)                        
                            <li data-target="#myCarousel2" data-slide-to="{{$l}}" class="active"></li>
                            @else
                            <li data-target="#myCarousel2" data-slide-to="{{$l}}"></li>
                          @endif
                         @endfor
                      </ol>
                   </div>
                </div>
             </div>
            </div>
             
             
            
            <!-- -->
            
            <div class="tri-banners-content pro-content">   
              
                
                  <div class="fullwidth-banner" style="background-image: url('https://fiverr-res.cloudinary.com/q_auto,f_auto,w_1400,dpr_1.0/general_assets/logged_out_homepage/assets/pro/pro_banner_1400px-2x.jpg') ">
                    <div class="parallax-banner-text">
                        <h2>People “just like you” work here.</h2>
                        <h4>Build your dream job here!</h4>
                        {{-- <div class="hover-link\">
                            <a href="/shop\" class="btn btn-secondary swipe-to-top\" data-toggle="tooltip\" data-placement="bottom\" title="\" data-original-title="View All">
                        </div> --}}
                        <button type="button swipe-to-top" class="btn btn-success">Explore Jobs</button>
                        {{-- <div class="hover-link">
                            <button type="button swipe-to-top" class="btn btn-success">BUY NOW</button>
                            <a href="/shop" class="btn btn-secondary swipe-to-top" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="View All">
                        </div> --}}
                    </div>
                  </div> 
            
                    
              </div>

              <br>
              