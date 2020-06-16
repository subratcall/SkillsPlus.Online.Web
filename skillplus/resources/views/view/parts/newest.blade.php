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
            <div class="row">
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
            </div>

            <!-- -->
            {{-- <div class="container">
                <div class="row">
                    <div class="row">
                        <div class="col-md-9">
                        </div>
                        <div class="col-md-3">
                            <div class="controls pull-right hidden-xs">
                                <a class="left fa fa-chevron-left btn btn-success" href="#carousel-example"
                                    data-slide="prev"></a><a class="right fa fa-chevron-right btn btn-success" href="#carousel-example"
                                        data-slide="next"></a>
                            </div>
                        </div>
                    </div>
                    <div id="carousel-example" class="carousel slide hidden-xs" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="col-item">
                                            <div class="photo">
                                                <img src="http://placehold.it/350x260" class="img-responsive" alt="a" />
                                            </div>
                                            <div class="info">
                                                <div class="row">
                                                    <div class="price col-md-6">
                                                        <h5>
                                                            Sample Product</h5>
                                                        <h5 class="price-text-color">
                                                            $199.99</h5>
                                                    </div>
                                                    <div class="rating hidden-sm col-md-6">
                                                        <i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                                        </i><i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                                        </i><i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                                <div class="separator clear-left">
                                                    <p class="btn-add">
                                                        <i class="fa fa-shopping-cart"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">Add to cart</a></p>
                                                    <p class="btn-details">
                                                        <i class="fa fa-list"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">More details</a></p>
                                                </div>
                                                <div class="clearfix">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="col-item">
                                            <div class="photo">
                                                <img src="http://placehold.it/350x260" class="img-responsive" alt="a" />
                                            </div>
                                            <div class="info">
                                                <div class="row">
                                                    <div class="price col-md-6">
                                                        <h5>
                                                            Product Example</h5>
                                                        <h5 class="price-text-color">
                                                            $249.99</h5>
                                                    </div>
                                                    <div class="rating hidden-sm col-md-6">
                                                    </div>
                                                </div>
                                                <div class="separator clear-left">
                                                    <p class="btn-add">
                                                        <i class="fa fa-shopping-cart"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">Add to cart</a></p>
                                                    <p class="btn-details">
                                                        <i class="fa fa-list"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">More details</a></p>
                                                </div>
                                                <div class="clearfix">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="col-item">
                                            <div class="photo">
                                                <img src="http://placehold.it/350x260" class="img-responsive" alt="a" />
                                            </div>
                                            <div class="info">
                                                <div class="row">
                                                    <div class="price col-md-6">
                                                        <h5>
                                                            Next Sample Product</h5>
                                                        <h5 class="price-text-color">
                                                            $149.99</h5>
                                                    </div>
                                                    <div class="rating hidden-sm col-md-6">
                                                        <i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                                        </i><i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                                        </i><i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                                <div class="separator clear-left">
                                                    <p class="btn-add">
                                                        <i class="fa fa-shopping-cart"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">Add to cart</a></p>
                                                    <p class="btn-details">
                                                        <i class="fa fa-list"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">More details</a></p>
                                                </div>
                                                <div class="clearfix">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="col-item">
                                            <div class="photo">
                                                <img src="http://placehold.it/350x260" class="img-responsive" alt="a" />
                                            </div>
                                            <div class="info">
                                                <div class="row">
                                                    <div class="price col-md-6">
                                                        <h5>
                                                            Sample Product</h5>
                                                        <h5 class="price-text-color">
                                                            $199.99</h5>
                                                    </div>
                                                    <div class="rating hidden-sm col-md-6">
                                                        <i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                                        </i><i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                                        </i><i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                                <div class="separator clear-left">
                                                    <p class="btn-add">
                                                        <i class="fa fa-shopping-cart"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">Add to cart</a></p>
                                                    <p class="btn-details">
                                                        <i class="fa fa-list"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">More details</a></p>
                                                </div>
                                                <div class="clearfix">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="col-item">
                                            <div class="photo">
                                                <img src="http://placehold.it/350x260" class="img-responsive" alt="a" />
                                            </div>
                                            <div class="info">
                                                <div class="row">
                                                    <div class="price col-md-6">
                                                        <h5>
                                                            Product with Variants</h5>
                                                        <h5 class="price-text-color">
                                                            $199.99</h5>
                                                    </div>
                                                    <div class="rating hidden-sm col-md-6">
                                                        <i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                                        </i><i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                                        </i><i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                                <div class="separator clear-left">
                                                    <p class="btn-add">
                                                        <i class="fa fa-shopping-cart"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">Add to cart</a></p>
                                                    <p class="btn-details">
                                                        <i class="fa fa-list"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">More details</a></p>
                                                </div>
                                                <div class="clearfix">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="col-item">
                                            <div class="photo">
                                                <img src="http://placehold.it/350x260" class="img-responsive" alt="a" />
                                            </div>
                                            <div class="info">
                                                <div class="row">
                                                    <div class="price col-md-6">
                                                        <h5>
                                                            Grouped Product</h5>
                                                        <h5 class="price-text-color">
                                                            $249.99</h5>
                                                    </div>
                                                    <div class="rating hidden-sm col-md-6">
                                                    </div>
                                                </div>
                                                <div class="separator clear-left">
                                                    <p class="btn-add">
                                                        <i class="fa fa-shopping-cart"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">Add to cart</a></p>
                                                    <p class="btn-details">
                                                        <i class="fa fa-list"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">More details</a></p>
                                                </div>
                                                <div class="clearfix">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="col-item">
                                            <div class="photo">
                                                <img src="http://placehold.it/350x260" class="img-responsive" alt="a" />
                                            </div>
                                            <div class="info">
                                                <div class="row">
                                                    <div class="price col-md-6">
                                                        <h5>
                                                            Product with Variants</h5>
                                                        <h5 class="price-text-color">
                                                            $149.99</h5>
                                                    </div>
                                                    <div class="rating hidden-sm col-md-6">
                                                        <i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                                        </i><i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                                        </i><i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                                <div class="separator clear-left">
                                                    <p class="btn-add">
                                                        <i class="fa fa-shopping-cart"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">Add to cart</a></p>
                                                    <p class="btn-details">
                                                        <i class="fa fa-list"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">More details</a></p>
                                                </div>
                                                <div class="clearfix">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="col-item">
                                            <div class="photo">
                                                <img src="http://placehold.it/350x260" class="img-responsive" alt="a" />
                                            </div>
                                            <div class="info">
                                                <div class="row">
                                                    <div class="price col-md-6">
                                                        <h5>
                                                            Product with Variants</h5>
                                                        <h5 class="price-text-color">
                                                            $199.99</h5>
                                                    </div>
                                                    <div class="rating hidden-sm col-md-6">
                                                        <i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                                        </i><i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                                        </i><i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                                <div class="separator clear-left">
                                                    <p class="btn-add">
                                                        <i class="fa fa-shopping-cart"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">Add to cart</a></p>
                                                    <p class="btn-details">
                                                        <i class="fa fa-list"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">More details</a></p>
                                                </div>
                                                <div class="clearfix">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

         {{--    <div class="container">
                <div class="row" style="display: block">
                    <div class="col-md-4">
                        <button type="button" class="btn btn-success">MOST LIKED COURSE</button>
                    </div>
                    <div class="col-md-4">                                                
                        <button type="button" class="btn btn-success">SPECIAL COURSE</button>
                    </div>
                    <div class="col-md-4">
                        <button type="button" class="btn btn-success">TOP COURSE</button>
                    </div>
                </div>
 --}}
                
        <div class="row">
            <div class="col-md-12 p-0 text-center w-25 p-3">
                <div class="nav" role="tablist" id="tabCarousel">
                    <button type="button" class="btn btn-success featured_course">TOP COURSE</button>
                    <button type="button" class="btn btn-success featured_course">SPECIAL COURSE</button>
                    <button type="button" class="btn btn-success featured_course">MOST LIKED COURSE</button>
                </div>            
            </div>         
        </div> 

                <br>
                <div class="row">
                        <div class="well">                       
                        <div id="myCarousel2" class="carousel slide">
                            <div class="carousel-inner">
                                <div class="item active">
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
                                                <h3 class="">Product label</h3>
                                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor</p>
                                                <p><a href="#" class="btn btn-primary" role="button">12,99 €</a> <a href="#" class="btn btn-default" role="button">Wishlist</a></p>
                                              </div>
                                            </div> 
                                        </div>
                                        <div class="col-md-3">
                                            <div class="thumbnail animated fadeInRight">
                                              <img src="http://placehold.it/300x200/" alt="Slide24">
                                              <div class="caption">
                                                <h3 class="">Product label</h3>
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
                                                <h3>Product label</h3>
                                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor</p>
                                                <p><a href="#" class="btn btn-primary" role="button">12,99 €</a> <a href="#" class="btn btn-default" role="button">Wishlist</a></p>
                                              </div>
                                            </div>        
                                        </div>
                                        <div class="col-md-3">
                                            <div class="thumbnail animated fadeInRight">
                                              <img src="http://placehold.it/300x200/" alt="Slide32">
                                              <div class="caption">
                                                <h3>Product label</h3>
                                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor</p>
                                                <p><a href="#" class="btn btn-primary" role="button">12,99 €</a> <a href="#" class="btn btn-default" role="button">Wishlist</a></p>
                                              </div>
                                            </div> 
                                        </div>
                                        <div class="col-md-3">
                                            <div class="thumbnail animated fadeInRight">
                                              <img src="http://placehold.it/300x200/" alt="Slide33">
                                              <div class="caption">
                                                <h3>Product label</h3>
                                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor</p>
                                                <p><a href="#" class="btn btn-primary" role="button">12,99 €</a> <a href="#" class="btn btn-default" role="button">Wishlist</a></p>
                                              </div>
                                            </div> 
                                        </div>
                                        <div class="col-md-3">
                                            <div class="thumbnail animated fadeInRight">
                                              <img src="http://placehold.it/300x200/" alt="Slide34">
                                              <div class="caption">
                                                <h3>Product label</h3>
                                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor</p>
                                                <p><a href="#" class="btn btn-primary" role="button">12,99 €</a> <a href="#" class="btn btn-default" role="button">Wishlist</a></p>
                                              </div>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="left carousel-control cc" href="#myCarousel2" data-slide="prev"><i class="fa fa-chevron-left fa-2x"></i></a>
                            <a class="right carousel-control cc" href="#myCarousel2" data-slide="next"><i class="fa fa-chevron-right fa-2x"></i></a>
                            
                            <ol class="carousel-indicators">
                                <li data-target="#myCarousel2" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel2" data-slide-to="1"></li>
                                <li data-target="#myCarousel2" data-slide-to="2"></li>
                            </ol>                
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- -->
            
            <div class="tri-banners-content pro-content">   
              
                
                  <div class="fullwidth-banner" style="background-image: url('{{asset("")}}/bin/admin/images/douro_river_porto_portugal-wallpaper-5120x2880.jpg') ">
                    <div class="parallax-banner-text">
                        <h2>Learn on your schedule</h2>
                        <h4>Anywhere, anytime. Start learning today!</h4>
                        {{-- <div class="hover-link\">
                            <a href="/shop\" class="btn btn-secondary swipe-to-top\" data-toggle="tooltip\" data-placement="bottom\" title="\" data-original-title="View All">
                        </div> --}}
                        <button type="button swipe-to-top" class="btn btn-success">BUY NOW</button>
                        {{-- <div class="hover-link">
                            <button type="button swipe-to-top" class="btn btn-success">BUY NOW</button>
                            <a href="/shop" class="btn btn-secondary swipe-to-top" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="View All">
                        </div> --}}
                    </div>
                  </div> 
            
                    
              </div>

              <br>