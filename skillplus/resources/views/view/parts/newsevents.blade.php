<link rel="stylesheet" type="text/css" href="/assets/slick/slick.css"/>

<link rel="stylesheet" type="text/css" href="/assets/slick/slick-theme.css"/>
{{-- <link rel="stylesheet" type="text/css" href="http://192.168.110.16:8001/web/css/app.css"> --}}
<style>
   
    .pro-fs-content .general-product {
    margin-top: 30px;
}
.pro-content .general-product {
    overflow: hidden;
}
.container {
    max-width: 1200px;
}
.container {
    max-width: 1200px;
}
.p-0 {
    padding: 0 !important;
}
.slick-slider {
    position: relative;
    display: block;
    box-sizing: border-box;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    -webkit-touch-callout: none;
    -khtml-user-select: none;
    touch-action: pan-y;
    -webkit-tap-highlight-color: transparent;
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
button:not(:disabled), [type="button"]:not(:disabled), [type="reset"]:not(:disabled), [type="submit"]:not(:disabled) {
    cursor: pointer;
}
button, [type="button"], [type="reset"], [type="submit"] {
    -webkit-appearance: button;
}
.slick-prev {
    left: -25px;
}
.slick-prev, .slick-next {
    font-size: 0;
    line-height: 0;
    position: absolute;
    top: 50%;
    display: block;
    width: 20px;
    height: 20px;
    padding: 0;
    transform: translate(0, -50%);
    cursor: pointer;
    color: transparent;
    border: none;
    outline: none;
    background: transparent;
        background-color: transparent;
}
.slick-list {
    transform: translate3d(0, 0, 0);
}
.slick-list {
    position: relative;
    display: block;
    overflow: hidden;
    margin: 0;
    padding: 0;
}
.slick-slider .slick-track, .slick-slider .slick-list {
    transform: translate3d(0, 0, 0);
}
.slick-track {
    position: relative;
    top: 0;
    left: 0;
    display: block;
    margin-left: auto;
    margin-right: auto;
}
.slick-initialized .slick-slide {
    display: block;
}
.slick-slide {
    outline: none;
    padding: 0 15px;
}
.slick-slide {
    display: none;
    float: left;
    height: 100%;
    min-height: 1px;
}
.pro-fs-content .product {
    overflow: hidden;
    background-color: #ffffff;
    padding-top: 0;
}
.pro-fs-content .product article {
    overflow: hidden;
    display: block;
    box-shadow: none;
}
.product article {
    display: block;
    background-color: #fff;
    border-radius: 0;
    width: 100%;
    position: relative;
    overflow: hidden;
}

.pro-fs-content .product article {
  overflow: hidden;
  display: block;
  box-shadow: none;
}

.pro-fs-content .product article:hover .pro-btn {
  transform: translateY(0px);
  transition: 0.4s ease-out;
  opacity: 1;
}

.pro-fs-content .product article:hover .product-flash-hover {
  overflow: hidden;
  opacity: 1;
  transition-timing-function: ease-in;
  transform: translateY(0px) !important;
  -webkit-transform: translateY(0px) !important;
  /* A litttttle slower on the way in */
  transition: 0.4s;
  /* Move into place */
  transform: translateY(0);
}


article, aside, figcaption, figure, footer, header, hgroup, main, nav, section {
    display: block;
}
.pro-fs-content .product .flash-p {
    z-index: 99;
    display: flex;
    justify-content: space-between;
    padding: 15px;
}
.pro-fs-content .pro-description {
    z-index: 2;
    width: 64%;
}
.pro-fs-content .pro-thumb {
    width: 36%;
    overflow: hidden;
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 0;
    position: relative;
}


.slider {
        width: 50%;
        margin: 100px auto;
    }

    /* .slick-slide {
      margin: 0px 20px;
    }

    .slick-slide img {
      width: 100%;
    }

    .slick-prev:before,
    .slick-next:before {
      color: black;
    } */


   /*  .slick-slide {
      transition: all ease-in-out .3s;
      opacity: .2;
    } */
    
   /*  .slick-active {
      opacity: .5;
    }

    .slick-current {
      opacity: 1;
    } */
/* *1* */
    .slick-initialized .slick-slide {
    display: block;
}
.slick-slide {
    outline: none;
    padding: 0 15px;
}
.slick-slide {
    display: none;
    float: left;
    height: 100%;
    min-height: 1px;
}

.pro-fs-content .product {
    overflow: hidden;
    background-color: #ffffff;
    padding-top: 0;
}

.pro-fs-content .product article {
    overflow: hidden;
    display: block;
    box-shadow: none;
}
.product article {
    display: block;
    background-color: #fff;
    border-radius: 0;
    width: 100%;
    position: relative;
    overflow: hidden;
}

.pro-fs-content .product .flash-p {
    z-index: 99;
    display: flex;
    justify-content: space-between;
    padding: 15px;
}

.pro-fs-content .pro-description {
    z-index: 2;
    width: 64%;
}

.pro-fs-content .pro-description .pro-info {
    font-family: "Montserrat-Bold", sans-serif;
    font-size: 20px;
    line-height: 1.5;
    color: #dc3545;
    z-index: 2;
    font-weight: 600;
    margin-bottom: 12px;
    text-transform: uppercase;
}
.blink {
    text-decoration: blink;
    -webkit-animation-name: blinker;
    -webkit-animation-duration: 0.6s;
    -webkit-animation-iteration-count: infinite;
    -webkit-animation-timing-function: ease-in-out;
    -webkit-animation-direction: alternate;
    animation-name: blinker;
    animation-duration: 0.6s;
    animation-iteration-count: infinite;
    animation-timing-function: ease-in-out;
    animation-direction: alternate;
}

.pro-fs-content .pro-description .tag {
    font-family: "Montserrat-Regular", sans-serif;
    font-size: 0.875rem;
    color: #6c757d;
    text-transform: uppercase;
    overflow: hidden;
    text-align: left;
    line-height: 1.5;
}

.pro-fs-content .pro-description .pro-title {
    font-family: "Montserrat-Bold", sans-serif;
    z-index: 2;
    white-space: normal;
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    line-height: 1.5;
    margin-bottom: 0;
}

.pro-fs-content .pro-description .price {
    font-family: "Montserrat-Bold", sans-serif;
    display: flex;
    align-items: center;
    font-size: 1.6rem;
    font-weight: 700;
    color: #28B293;
    margin-bottom: 10px;
}

.pro-timer {
    z-index: 1;
    display: flex;
    bottom: 0px;
    position: relative;
}

.pro-fs-content .pro-thumb {
    width: 36%;
    overflow: hidden;
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 0;
    position: relative;
}

.pro-fs-content .pro-thumb .product-flash-hover {
    overflow: hidden;
    opacity: 0;
    transition: 1.2s ease-out;
    position: absolute;
    top: 0;
    left: 0;
    background-color: #dadadaa6;
    border-radius: 0;
    height: 100%;
    width: 100%;
    z-index: 2;
    transform: translateY(-40px) !important;
    -webkit-transform: translateY(-40px) !important;
    display: flex;
    justify-content: center;
    align-items: flex-end;
}

.pro-fs-content .pro-thumb .product-flash-hover .btn {
    width: 80%;
    padding: 0.6rem 1.6rem;
    margin-bottom: 15px;
    padding: 0.6rem 0rem;
    font-size: 13px;
}

.slick-slide img {
    display: block;
}
.img-fluid {
    max-width: 100%;
    height: auto;
}

.slider {
        width: 50%;
        margin: 100px auto;
    }

    .slick-slide {
      margin: 0px 20px;
    }

    .slick-slide img {
      width: 100%;
    }

    .slick-prev:before,
    .slick-next:before {
      color: black;
    }

    
    .slick-initialized .slick-slide {
    display: block;
}
.slick-slide {
    outline: none;
    padding: 0 15px;
}
.slick-slide {
    display: none;
    float: left;
    height: 100%;
    min-height: 1px;
}

.blog {
    padding-bottom: 30px;
}


.blog .blog-thumbnail {
    position: relative;
    margin-bottom: 15px;
    height: 240px;
    overflow: hidden;
}

.badge {
    line-height: 1.5;
}
.date-tag {
    background-color: #fff;
    z-index: 2;
    left: 10px;
    font-size: 0.875rem;
    color: #212529;
    font-weight: 600;
    border-radius: 0;
    position: absolute;
    top: 10px;
    min-width: 40px;
    text-align: center;
}
.badge {
    display: inline-block;
    padding: 0.25em 0.4em;
    font-size: 75%;
    font-weight: 600;
    line-height: 1;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: 0;
    transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.blog .blog-thumbnail a {
    display: block;
}

.blog .blog-thumbnail .img-thumbnail {
    padding: 0;
    border: none;
}
.slick-slide img {
    display: block;
}
.img-thumbnail {
    padding: 0.25rem;
    background-color: #f5f5f5;
    border: 1px solid #dee2e6;
    border-radius: 0;
    max-width: 100%;
    height: auto;
}

.blog .blog-thumbnail .over {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    overflow: hidden;
    transform: translateY(-100px);
    transition: 1.2s ease-out;
    opacity: 0;
    background-color: #dadadaa6;
}

.blog .blog-detial {
    text-align: center;
}

.blog .blog-detial .tag {
    font-family: "Montserrat-Regular", sans-serif;
    font-size: 0.875rem;
    color: #6c757d;
    text-transform: uppercase;
    display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    -webkit-box-align: center;
    overflow: hidden;
    line-height: 15px;
    margin-bottom: 10px;
}

.blog .blog-detial h5 {
    display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    -webkit-box-align: center;
    overflow: hidden;
}

.blog .blog-detial .blog-description div, .blog .blog-detial .blog-description p {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    -webkit-box-align: center;
    overflow: hidden;
}
.blog p {
    line-height: 1.5;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.blink {
    text-decoration: blink;
    -webkit-animation-name: blinker;
    -webkit-animation-duration: 0.6s;
    -webkit-animation-iteration-count: infinite;
    -webkit-animation-timing-function: ease-in-out;
    -webkit-animation-direction: alternate;
    animation-name: blinker;
    animation-duration: 0.6s;
    animation-iteration-count: infinite;
    animation-timing-function: ease-in-out;
    animation-direction: alternate;
}

</style>

{{--   <section class="pro-content pro-blog">
    <div class="container">
      <div class="row justify-content-center">
          <div class="col-12 col-lg-6">
            <div class="pro-heading-title">
                <h2>News & Events 
                </h2>
            </div>
          </div>
      </div>
    </div>
    <div class="general-product">
      <div class="container  p-0">
          <div class="blog-carousel-js">  
                <div class="slick-slide slick-cloned" data-slick-index="-3" aria-hidden="true" style="width: 400px;" tabindex="-1">
                    <div class="blog">
                        <div class="blog-thumbnail">
                        <span class="date-tag badge">24-Sep-2019</span>
                        <a href="#" tabindex="-1">
                        <img class="img-thumbnail" src="http://192.168.110.16:8001/images/media/2019/09/souUX27810.jpg" alt="Fashion Week" width="100%">
                        </a>
                        <div class="over"></div>
                        </div>
                        <div class="blog-detial">
                        <span class="tag">
                        Business                              
                        </span>
                        <h5><a href="#" tabindex="-1">
                            Fashion Week</a>
                        </h5>
                        <div class="blog-description">
                            <p>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;rsquo;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.                      
                            </p>
                        </div>
                        <span class="blink"><a href="#" tabindex="-1"> Read More .. </a></span>
                        </div>
                    </div>
                </div>
                <div class="slick-slide slick-cloned" data-slick-index="-2" aria-hidden="true" style="width: 400px;" tabindex="-1">
                    <div class="blog">
                        <div class="blog-thumbnail">
                        <span class="date-tag badge">24-Sep-2019</span>
                        <a href="#" tabindex="-1">
                        <img class="img-thumbnail" src="http://192.168.110.16:8001/images/media/2019/09/CLA2s27610.jpg" alt="Why to choose this app for your Project?" width="100%">
                        </a>
                        <div class="over"></div>
                        </div>
                        <div class="blog-detial">
                        <span class="tag">
                        Tools and Technology                              
                        </span>
                        <h5><a href="#" tabindex="-1">
                            Why to choose this app for your Project?</a>
                        </h5>
                        <div class="blog-description">
                            <p>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;rsquo;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.                      
                            </p>
                        </div>
                        <span class="blink"><a href="#" tabindex="-1"> Read More .. </a></span>
                        </div>
                    </div>
                </div>
                <div class="slick-slide slick-cloned" data-slick-index="-1" aria-hidden="true" style="width: 400px;" tabindex="-1">
                    <div class="blog">
                        <div class="blog-thumbnail">
                        <span class="date-tag badge">18-Sep-2019</span>
                        <a href="#" tabindex="-1">
                        <img class="img-thumbnail" src="http://192.168.110.16:8001/images/media/2019/09/5xN6v24411.jpg" alt="World Business" width="100%">
                        </a>
                        <div class="over"></div>
                        </div>
                        <div class="blog-detial">
                        <span class="tag">
                        Business                              
                        </span>
                        <h5><a href="#" tabindex="-1">
                            World Business</a>
                        </h5>
                        <div class="blog-description">
                            <p>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                &nbsp;
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                &nbsp;
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.                      
                            </p>
                        </div>
                        <span class="blink"><a href="#" tabindex="-1"> Read More .. </a></span>
                        </div>
                    </div>
                </div>
                <div class="slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" style="width: 400px;" tabindex="0">
                    <div class="blog">
                        <div class="blog-thumbnail">
                        <span class="date-tag badge">24-Sep-2019</span>
                        <a href="#" tabindex="0">
                        <img class="img-thumbnail" src="http://192.168.110.16:8001/images/media/2019/09/qotAc27710.jpg" alt="Tool and Technology" width="100%">
                        </a>
                        <div class="over"></div>
                        </div>
                        <div class="blog-detial">
                        <span class="tag">
                        Tools and Technology                              
                        </span>
                        <h5><a href="#" tabindex="0">
                            Tool and Technology</a>
                        </h5>
                        <div class="blog-description">
                            <p>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;rsquo;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.                      
                            </p>
                        </div>
                        <span class="blink"><a href="#" tabindex="0"> Read More .. </a></span>
                        </div>
                    </div>
                </div>
                <div class="slick-slide slick-active" data-slick-index="1" aria-hidden="false" style="width: 400px;" tabindex="0">
                    <div class="blog">
                        <div class="blog-thumbnail">
                        <span class="date-tag badge">24-Sep-2019</span>
                        <a href="#" tabindex="0">
                        <img class="img-thumbnail" src="http://192.168.110.16:8001/images/media/2019/09/souUX27810.jpg" alt="Fashion Week" width="100%">
                        </a>
                        <div class="over"></div>
                        </div>
                        <div class="blog-detial">
                        <span class="tag">
                        Business                              
                        </span>
                        <h5><a href="#" tabindex="0">
                            Fashion Week</a>
                        </h5>
                        <div class="blog-description">
                            <p>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;rsquo;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.                      
                            </p>
                        </div>
                        <span class="blink"><a href="#" tabindex="0"> Read More .. </a></span>
                        </div>
                    </div>
                </div>
                <div class="slick-slide slick-active" data-slick-index="2" aria-hidden="false" style="width: 400px;" tabindex="0">
                    <div class="blog">
                        <div class="blog-thumbnail">
                        <span class="date-tag badge">24-Sep-2019</span>
                        <a href="#" tabindex="0">
                        <img class="img-thumbnail" src="http://192.168.110.16:8001/images/media/2019/09/CLA2s27610.jpg" alt="Why to choose this app for your Project?" width="100%">
                        </a>
                        <div class="over"></div>
                        </div>
                        <div class="blog-detial">
                        <span class="tag">
                        Tools and Technology                              
                        </span>
                        <h5><a href="#" tabindex="0">
                            Why to choose this app for your Project?</a>
                        </h5>
                        <div class="blog-description">
                            <p>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;rsquo;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.                      
                            </p>
                        </div>
                        <span class="blink"><a href="#" tabindex="0"> Read More .. </a></span>
                        </div>
                    </div>
                </div>
                <div class="slick-slide" data-slick-index="3" aria-hidden="true" style="width: 400px;" tabindex="-1">
                    <div class="blog">
                        <div class="blog-thumbnail">
                        <span class="date-tag badge">18-Sep-2019</span>
                        <a href="#" tabindex="-1">
                        <img class="img-thumbnail" src="http://192.168.110.16:8001/images/media/2019/09/5xN6v24411.jpg" alt="World Business" width="100%">
                        </a>
                        <div class="over"></div>
                        </div>
                        <div class="blog-detial">
                        <span class="tag">
                        Business                              
                        </span>
                        <h5><a href="#" tabindex="-1">
                            World Business</a>
                        </h5>
                        <div class="blog-description">
                            <p>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                &nbsp;
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                &nbsp;
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.                      
                            </p>
                        </div>
                        <span class="blink"><a href="#" tabindex="-1"> Read More .. </a></span>
                        </div>
                    </div>
                </div>
                <div class="slick-slide slick-cloned" data-slick-index="4" aria-hidden="true" style="width: 400px;" tabindex="-1">
                    <div class="blog">
                        <div class="blog-thumbnail">
                        <span class="date-tag badge">24-Sep-2019</span>
                        <a href="#" tabindex="-1">
                        <img class="img-thumbnail" src="http://192.168.110.16:8001/images/media/2019/09/qotAc27710.jpg" alt="Tool and Technology" width="100%">
                        </a>
                        <div class="over"></div>
                        </div>
                        <div class="blog-detial">
                        <span class="tag">
                        Tools and Technology                              
                        </span>
                        <h5><a href="#" tabindex="-1">
                            Tool and Technology</a>
                        </h5>
                        <div class="blog-description">
                            <p>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;rsquo;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.                      
                            </p>
                        </div>
                        <span class="blink"><a href="#" tabindex="-1"> Read More .. </a></span>
                        </div>
                    </div>
                </div>
                <div class="slick-slide slick-cloned" data-slick-index="5" aria-hidden="true" style="width: 400px;" tabindex="-1">
                    <div class="blog">
                        <div class="blog-thumbnail">
                        <span class="date-tag badge">24-Sep-2019</span>
                        <a href="#" tabindex="-1">
                        <img class="img-thumbnail" src="http://192.168.110.16:8001/images/media/2019/09/souUX27810.jpg" alt="Fashion Week" width="100%">
                        </a>
                        <div class="over"></div>
                        </div>
                        <div class="blog-detial">
                        <span class="tag">
                        Business                              
                        </span>
                        <h5><a href="#" tabindex="-1">
                            Fashion Week</a>
                        </h5>
                        <div class="blog-description">
                            <p>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;rsquo;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.                      
                            </p>
                        </div>
                        <span class="blink"><a href="#" tabindex="-1"> Read More .. </a></span>
                        </div>
                    </div>
                </div>
                <div class="slick-slide slick-cloned" data-slick-index="6" aria-hidden="true" style="width: 400px;" tabindex="-1">
                    <div class="blog">
                        <div class="blog-thumbnail">
                        <span class="date-tag badge">24-Sep-2019</span>
                        <a href="#" tabindex="-1">
                        <img class="img-thumbnail" src="http://192.168.110.16:8001/images/media/2019/09/CLA2s27610.jpg" alt="Why to choose this app for your Project?" width="100%">
                        </a>
                        <div class="over"></div>
                        </div>
                        <div class="blog-detial">
                        <span class="tag">
                        Tools and Technology                              
                        </span>
                        <h5><a href="#" tabindex="-1">
                            Why to choose this app for your Project?</a>
                        </h5>
                        <div class="blog-description">
                            <p>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;rsquo;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.                      
                            </p>
                        </div>
                        <span class="blink"><a href="#" tabindex="-1"> Read More .. </a></span>
                        </div>
                    </div>
                </div>
                <div class="slick-slide slick-cloned" data-slick-index="7" aria-hidden="true" style="width: 400px;" tabindex="-1">
                    <div class="blog">
                        <div class="blog-thumbnail">
                        <span class="date-tag badge">18-Sep-2019</span>
                        <a href="#" tabindex="-1">
                        <img class="img-thumbnail" src="http://192.168.110.16:8001/images/media/2019/09/5xN6v24411.jpg" alt="World Business" width="100%">
                        </a>
                        <div class="over"></div>
                        </div>
                        <div class="blog-detial">
                        <span class="tag">
                        Business                              
                        </span>
                        <h5><a href="#" tabindex="-1">
                            World Business</a>
                        </h5>
                        <div class="blog-description">
                            <p>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                &nbsp;
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                &nbsp;
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.                      
                            </p>
                        </div>
                        <span class="blink"><a href="#" tabindex="-1"> Read More .. </a></span>
                        </div>
                    </div>
                </div>  
          </div>  
      </div>
    </div>  
</section> --}}


<section class="pro-content pro-fs-content">
    <div class="container">
       <div class="products-area ">
          <div class="row justify-content-center">
             <div class="col-12 col-lg-6">
                <div class="pro-heading-title">
                   <h2> News & Events          </h2>
                </div>
             </div>
          </div>
       </div>
    </div>
    <div class="general-product">
       <div class="container  p-0">
          <div class="popular-carousel-js" >
            <div class="slick-slide slick-cloned" data-slick-index="-3" aria-hidden="true" style="width: 400px;" tabindex="-1">
                <div class="blog">
                    <div class="blog-thumbnail">
                    <span class="date-tag badge">24-Sep-2019</span>
                    <a href="#" tabindex="-1">
                    <img class="img-thumbnail" src="http://192.168.110.16:8001/images/media/2019/09/souUX27810.jpg" alt="Fashion Week" width="100%">
                    </a>
                    <div class="over"></div>
                    </div>
                    <div class="blog-detial">
                    <span class="tag">
                    Business                              
                    </span>
                    <h5><a href="#" tabindex="-1">
                        Fashion Week</a>
                    </h5>
                    <div class="blog-description">
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;rsquo;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.                      
                        </p>
                    </div>
                    <span class="blink"><a href="#" tabindex="-1"> Read More .. </a></span>
                    </div>
                </div>
            </div>
            <div class="slick-slide slick-cloned" data-slick-index="-2" aria-hidden="true" style="width: 400px;" tabindex="-1">
                <div class="blog">
                    <div class="blog-thumbnail">
                    <span class="date-tag badge">24-Sep-2019</span>
                    <a href="#" tabindex="-1">
                    <img class="img-thumbnail" src="http://192.168.110.16:8001/images/media/2019/09/CLA2s27610.jpg" alt="Why to choose this app for your Project?" width="100%">
                    </a>
                    <div class="over"></div>
                    </div>
                    <div class="blog-detial">
                    <span class="tag">
                    Tools and Technology                              
                    </span>
                    <h5><a href="#" tabindex="-1">
                        Why to choose this app for your Project?</a>
                    </h5>
                    <div class="blog-description">
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;rsquo;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.                      
                        </p>
                    </div>
                    <span class="blink"><a href="#" tabindex="-1"> Read More .. </a></span>
                    </div>
                </div>
            </div>
            <div class="slick-slide slick-cloned" data-slick-index="-1" aria-hidden="true" style="width: 400px;" tabindex="-1">
                <div class="blog">
                    <div class="blog-thumbnail">
                    <span class="date-tag badge">18-Sep-2019</span>
                    <a href="#" tabindex="-1">
                    <img class="img-thumbnail" src="http://192.168.110.16:8001/images/media/2019/09/5xN6v24411.jpg" alt="World Business" width="100%">
                    </a>
                    <div class="over"></div>
                    </div>
                    <div class="blog-detial">
                    <span class="tag">
                    Business                              
                    </span>
                    <h5><a href="#" tabindex="-1">
                        World Business</a>
                    </h5>
                    <div class="blog-description">
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                            &nbsp;
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                            &nbsp;
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.                      
                        </p>
                    </div>
                    <span class="blink"><a href="#" tabindex="-1"> Read More .. </a></span>
                    </div>
                </div>
            </div>
            <div class="slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" style="width: 400px;" tabindex="0">
                <div class="blog">
                    <div class="blog-thumbnail">
                    <span class="date-tag badge">24-Sep-2019</span>
                    <a href="#" tabindex="0">
                    <img class="img-thumbnail" src="http://192.168.110.16:8001/images/media/2019/09/qotAc27710.jpg" alt="Tool and Technology" width="100%">
                    </a>
                    <div class="over"></div>
                    </div>
                    <div class="blog-detial">
                    <span class="tag">
                    Tools and Technology                              
                    </span>
                    <h5><a href="#" tabindex="0">
                        Tool and Technology</a>
                    </h5>
                    <div class="blog-description">
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;rsquo;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.                      
                        </p>
                    </div>
                    <span class="blink"><a href="#" tabindex="0"> Read More .. </a></span>
                    </div>
                </div>
            </div>
            <div class="slick-slide slick-active" data-slick-index="1" aria-hidden="false" style="width: 400px;" tabindex="0">
                <div class="blog">
                    <div class="blog-thumbnail">
                    <span class="date-tag badge">24-Sep-2019</span>
                    <a href="#" tabindex="0">
                    <img class="img-thumbnail" src="http://192.168.110.16:8001/images/media/2019/09/souUX27810.jpg" alt="Fashion Week" width="100%">
                    </a>
                    <div class="over"></div>
                    </div>
                    <div class="blog-detial">
                    <span class="tag">
                    Business                              
                    </span>
                    <h5><a href="#" tabindex="0">
                        Fashion Week</a>
                    </h5>
                    <div class="blog-description">
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;rsquo;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.                      
                        </p>
                    </div>
                    <span class="blink"><a href="#" tabindex="0"> Read More .. </a></span>
                    </div>
                </div>
            </div>
            <div class="slick-slide slick-active" data-slick-index="2" aria-hidden="false" style="width: 400px;" tabindex="0">
                <div class="blog">
                    <div class="blog-thumbnail">
                    <span class="date-tag badge">24-Sep-2019</span>
                    <a href="#" tabindex="0">
                    <img class="img-thumbnail" src="http://192.168.110.16:8001/images/media/2019/09/CLA2s27610.jpg" alt="Why to choose this app for your Project?" width="100%">
                    </a>
                    <div class="over"></div>
                    </div>
                    <div class="blog-detial">
                    <span class="tag">
                    Tools and Technology                              
                    </span>
                    <h5><a href="#" tabindex="0">
                        Why to choose this app for your Project?</a>
                    </h5>
                    <div class="blog-description">
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;rsquo;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.                      
                        </p>
                    </div>
                    <span class="blink"><a href="#" tabindex="0"> Read More .. </a></span>
                    </div>
                </div>
            </div>
            <div class="slick-slide" data-slick-index="3" aria-hidden="true" style="width: 400px;" tabindex="-1">
                <div class="blog">
                    <div class="blog-thumbnail">
                    <span class="date-tag badge">18-Sep-2019</span>
                    <a href="#" tabindex="-1">
                    <img class="img-thumbnail" src="http://192.168.110.16:8001/images/media/2019/09/5xN6v24411.jpg" alt="World Business" width="100%">
                    </a>
                    <div class="over"></div>
                    </div>
                    <div class="blog-detial">
                    <span class="tag">
                    Business                              
                    </span>
                    <h5><a href="#" tabindex="-1">
                        World Business</a>
                    </h5>
                    <div class="blog-description">
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                            &nbsp;
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                            &nbsp;
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.                      
                        </p>
                    </div>
                    <span class="blink"><a href="#" tabindex="-1"> Read More .. </a></span>
                    </div>
                </div>
            </div>
            <div class="slick-slide slick-cloned" data-slick-index="4" aria-hidden="true" style="width: 400px;" tabindex="-1">
                <div class="blog">
                    <div class="blog-thumbnail">
                    <span class="date-tag badge">24-Sep-2019</span>
                    <a href="#" tabindex="-1">
                    <img class="img-thumbnail" src="http://192.168.110.16:8001/images/media/2019/09/qotAc27710.jpg" alt="Tool and Technology" width="100%">
                    </a>
                    <div class="over"></div>
                    </div>
                    <div class="blog-detial">
                    <span class="tag">
                    Tools and Technology                              
                    </span>
                    <h5><a href="#" tabindex="-1">
                        Tool and Technology</a>
                    </h5>
                    <div class="blog-description">
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;rsquo;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.                      
                        </p>
                    </div>
                    <span class="blink"><a href="#" tabindex="-1"> Read More .. </a></span>
                    </div>
                </div>
            </div>
            <div class="slick-slide slick-cloned" data-slick-index="5" aria-hidden="true" style="width: 400px;" tabindex="-1">
                <div class="blog">
                    <div class="blog-thumbnail">
                    <span class="date-tag badge">24-Sep-2019</span>
                    <a href="#" tabindex="-1">
                    <img class="img-thumbnail" src="http://192.168.110.16:8001/images/media/2019/09/souUX27810.jpg" alt="Fashion Week" width="100%">
                    </a>
                    <div class="over"></div>
                    </div>
                    <div class="blog-detial">
                    <span class="tag">
                    Business                              
                    </span>
                    <h5><a href="#" tabindex="-1">
                        Fashion Week</a>
                    </h5>
                    <div class="blog-description">
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;rsquo;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.                      
                        </p>
                    </div>
                    <span class="blink"><a href="#" tabindex="-1"> Read More .. </a></span>
                    </div>
                </div>
            </div>
            <div class="slick-slide slick-cloned" data-slick-index="6" aria-hidden="true" style="width: 400px;" tabindex="-1">
                <div class="blog">
                    <div class="blog-thumbnail">
                    <span class="date-tag badge">24-Sep-2019</span>
                    <a href="#" tabindex="-1">
                    <img class="img-thumbnail" src="http://192.168.110.16:8001/images/media/2019/09/CLA2s27610.jpg" alt="Why to choose this app for your Project?" width="100%">
                    </a>
                    <div class="over"></div>
                    </div>
                    <div class="blog-detial">
                    <span class="tag">
                    Tools and Technology                              
                    </span>
                    <h5><a href="#" tabindex="-1">
                        Why to choose this app for your Project?</a>
                    </h5>
                    <div class="blog-description">
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;rsquo;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.                      
                        </p>
                    </div>
                    <span class="blink"><a href="#" tabindex="-1"> Read More .. </a></span>
                    </div>
                </div>
            </div>
            <div class="slick-slide slick-cloned" data-slick-index="7" aria-hidden="true" style="width: 400px;" tabindex="-1">
                <div class="blog">
                    <div class="blog-thumbnail">
                    <span class="date-tag badge">18-Sep-2019</span>
                    <a href="#" tabindex="-1">
                    <img class="img-thumbnail" src="http://192.168.110.16:8001/images/media/2019/09/5xN6v24411.jpg" alt="World Business" width="100%">
                    </a>
                    <div class="over"></div>
                    </div>
                    <div class="blog-detial">
                    <span class="tag">
                    Business                              
                    </span>
                    <h5><a href="#" tabindex="-1">
                        World Business</a>
                    </h5>
                    <div class="blog-description">
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                            &nbsp;
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                            &nbsp;
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.                      
                        </p>
                    </div>
                    <span class="blink"><a href="#" tabindex="-1"> Read More .. </a></span>
                    </div>
                </div>
            </div>
                   {{-- <div class="slick-slide slick-cloned" data-slick-index="-1" aria-hidden="true" style="width: 600px;" tabindex="-1">
                      <div class="product">
                         <article>
                            <div class="flash-p">
                               <div class="pro-description">
                                  <div class="pro-info blink">
                                     Super deal of the Month                       
                                  </div>
                                  <span class="tag">
                                  Women's Tops                                 
                                  </span>
                                  <h4 class="pro-title">
                                     <span>Printed Rose Petal Shirt </span>                           
                                  </h4>
                                  <div class="price">            
                                     $65
                                     <span>$92</span>
                                  </div>
                                  <div class="countdown pro-timer" id="" data-placement="bottom" title="Countdown Timer">                               
                                     <span class="days">0<small>Days </small></span>
                                     <span class="hours">0<small>Hours</small></span>
                                     <span class="mintues">0<small>Min</small></span>
                                     <span class="seconds">0<small>Sec</small></span>
                                  </div>
                               </div>
                               <div class="pro-thumb">
                                  <div class="product-flash-hover">   
                                     <a class="btn btn-block btn-secondary swipe-to-top" href="http://estore.skillsready.online/product-detail/printed-rose-petal-shirt" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="View Detail" tabindex="-1">View Detail</a>
                                  </div>
                                  <img class="img-fluid" src="http://estore.skillsready.online/images/media/2019/09/pCDlz19109.jpg" alt="Printed Rose Petal Shirt">  
                               </div>
                            </div>
                         </article>
                      </div>
                   </div>
                   <div class="slick-slide " data-slick-index="0" aria-hidden="false" style="width: 600px;" tabindex="0">
                      <div class="product">
                         <article>
                            <div class="flash-p">
                               <div class="pro-description">
                                  <div class="pro-info blink">
                                     Super deal of the Month                       
                                  </div>
                                  <span class="tag">
                                  Men's Shoes                                 
                                  </span>
                                  <h4 class="pro-title">
                                     <span>Mesh Breathable Men's Sneakers </span>                           
                                  </h4>
                                  <div class="price">            
                                     $35
                                     <span>$52</span>
                                  </div>
                                  <div class="countdown pro-timer" id="counter_16" data-placement="bottom" title="Countdown Timer"><span class="days">1260<small>Days</small></span> <span class="hours">1<small>Hours</small></span> <span class="mintues"> 50<small>Min</small></span> <span class="seconds">41<small>Sec</small></span> </div>
                               </div>
                               <div class="pro-thumb">
                                  <div class="product-flash-hover">   
                                     <button type="button" class="btn btn-block btn-secondary cart swipe-to-top" products_id="16" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Add to Cart" tabindex="0">Add to Cart</button>
                                  </div>
                                  <img class="img-fluid" src="http://estore.skillsready.online/images/media/2019/09/phUDg19511.jpg" alt="Mesh Breathable Men's Sneakers">  
                               </div>
                            </div>
                         </article>
                      </div>
                   </div>
                   <div class="slick-slide slick-active" data-slick-index="1" aria-hidden="false" style="width: 600px;" tabindex="0">
                      <div class="product">
                         <article>
                            <div class="flash-p">
                               <div class="pro-description">
                                  <div class="pro-info blink">
                                     Super deal of the Month                       
                                  </div>
                                  <span class="tag">
                                  Kid's Shoes                                 
                                  </span>
                                  <h4 class="pro-title">
                                     <span>Casual Breathable Outdoor Kids Sneakers </span>                           
                                  </h4>
                                  <div class="price">            
                                     $30
                                     <span>$45</span>
                                  </div>
                                  <div class="countdown pro-timer" id="counter_5" data-placement="bottom" title="Countdown Timer"><span class="days">1321<small>Days</small></span> <span class="hours">0<small>Hours</small></span> <span class="mintues"> 35<small>Min</small></span> <span class="seconds">41<small>Sec</small></span> </div>
                               </div>
                               <div class="pro-thumb">
                                  <div class="product-flash-hover">   
                                     <button type="button" class="btn btn-block btn-secondary cart swipe-to-top" products_id="5" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Add to Cart" tabindex="0">Add to Cart</button>
                                  </div>
                                  <img class="img-fluid" src="http://estore.skillsready.online/images/media/2019/09/MVmBl19211.jpg" alt="Casual Breathable Outdoor Kids Sneakers">  
                               </div>
                            </div>
                         </article>
                      </div>
                   </div>
                   <div class="slick-slide" data-slick-index="2" aria-hidden="true" style="width: 600px;" tabindex="-1">
                      <div class="product">
                         <article>
                            <div class="flash-p">
                               <div class="pro-description">
                                  <div class="pro-info blink">
                                     Super deal of the Month                       
                                  </div>
                                  <span class="tag">
                                  Women's Bottoms                                 
                                  </span>
                                  <h4 class="pro-title">
                                     <span>Cotton skirt with Buttons </span>                           
                                  </h4>
                                  <div class="price">            
                                     $70
                                     <span>$90</span>
                                  </div>
                                  <div class="countdown pro-timer" id="counter_20" data-placement="bottom" title="Countdown Timer"><span class="days">1046<small>Days</small></span> <span class="hours">1<small>Hours</small></span> <span class="mintues"> 5<small>Min</small></span> <span class="seconds">42<small>Sec</small></span> </div>
                               </div>
                               <div class="pro-thumb">
                                  <div class="product-flash-hover">   
                                     <button type="button" class="btn btn-block btn-secondary cart swipe-to-top" products_id="20" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Add to Cart" tabindex="-1">Add to Cart</button>
                                  </div>
                                  <img class="img-fluid" src="http://estore.skillsready.online/images/media/2019/09/iDMNz19310.jpg" alt="Cotton skirt with Buttons">  
                               </div>
                            </div>
                         </article>
                      </div>
                   </div>
                   <div class="slick-slide" data-slick-index="3" aria-hidden="true" style="width: 600px;" tabindex="-1">
                      <div class="product">
                         <article>
                            <div class="flash-p">
                               <div class="pro-description">
                                  <div class="pro-info blink">
                                     Super deal of the Month                       
                                  </div>
                                  <span class="tag">
                                  Women's Tops                                 
                                  </span>
                                  <h4 class="pro-title">
                                     <span>Printed Rose Petal Shirt </span>                           
                                  </h4>
                                  <div class="price">            
                                     $65
                                     <span>$92</span>
                                  </div>
                                  <div class="countdown pro-timer" id="counter_28" data-placement="bottom" title="Countdown Timer"><span class="days">895<small>Days</small></span> <span class="hours">7<small>Hours</small></span> <span class="mintues"> 20<small>Min</small></span> <span class="seconds">42<small>Sec</small></span> </div>
                               </div>
                               <div class="pro-thumb">
                                  <div class="product-flash-hover">   
                                     <a class="btn btn-block btn-secondary swipe-to-top" href="http://estore.skillsready.online/product-detail/printed-rose-petal-shirt" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="View Detail" tabindex="-1">View Detail</a>
                                  </div>
                                  <img class="img-fluid" src="http://estore.skillsready.online/images/media/2019/09/pCDlz19109.jpg" alt="Printed Rose Petal Shirt">  
                               </div>
                            </div>
                         </article>
                      </div>
                   </div>
                   <div class="slick-slide slick-cloned" data-slick-index="4" aria-hidden="true" style="width: 600px;" tabindex="-1">
                      <div class="product">
                         <article>
                            <div class="flash-p">
                               <div class="pro-description">
                                  <div class="pro-info blink">
                                     Super deal of the Month                       
                                  </div>
                                  <span class="tag">
                                  Men's Shoes                                 
                                  </span>
                                  <h4 class="pro-title">
                                     <span>Mesh Breathable Men's Sneakers </span>                           
                                  </h4>
                                  <div class="price">            
                                     $35
                                     <span>$52</span>
                                  </div>
                                  <div class="countdown pro-timer" id="" data-placement="bottom" title="Countdown Timer">                               
                                     <span class="days">0<small>Days </small></span>
                                     <span class="hours">0<small>Hours</small></span>
                                     <span class="mintues">0<small>Min</small></span>
                                     <span class="seconds">0<small>Sec</small></span>
                                  </div>
                               </div>
                               <div class="pro-thumb">
                                  <div class="product-flash-hover">   
                                     <button type="button" class="btn btn-block btn-secondary cart swipe-to-top" products_id="16" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Add to Cart" tabindex="-1">Add to Cart</button>
                                  </div>
                                  <img class="img-fluid" src="http://estore.skillsready.online/images/media/2019/09/phUDg19511.jpg" alt="Mesh Breathable Men's Sneakers">  
                               </div>
                            </div>
                         </article>
                      </div>
                   </div>
                   <div class="slick-slide slick-cloned" data-slick-index="5" aria-hidden="true" style="width: 600px;" tabindex="-1">
                      <div class="product">
                         <article>
                            <div class="flash-p">
                               <div class="pro-description">
                                  <div class="pro-info blink">
                                     Super deal of the Month                       
                                  </div>
                                  <span class="tag">
                                  Kid's Shoes                                 
                                  </span>
                                  <h4 class="pro-title">
                                     <span>Casual Breathable Outdoor Kids Sneakers </span>                           
                                  </h4>
                                  <div class="price">            
                                     $30
                                     <span>$45</span>
                                  </div>
                                  <div class="countdown pro-timer" id="" data-placement="bottom" title="Countdown Timer">                               
                                     <span class="days">0<small>Days </small></span>
                                     <span class="hours">0<small>Hours</small></span>
                                     <span class="mintues">0<small>Min</small></span>
                                     <span class="seconds">0<small>Sec</small></span>
                                  </div>
                               </div>
                               <div class="pro-thumb">
                                  <div class="product-flash-hover">   
                                     <button type="button" class="btn btn-block btn-secondary cart swipe-to-top" products_id="5" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Add to Cart" tabindex="-1">Add to Cart</button>
                                  </div>
                                  <img class="img-fluid" src="http://estore.skillsready.online/images/media/2019/09/MVmBl19211.jpg" alt="Casual Breathable Outdoor Kids Sneakers">  
                               </div>
                            </div>
                         </article>
                      </div>
                   </div>
                   <div class="slick-slide slick-cloned" data-slick-index="6" aria-hidden="true" style="width: 600px;" tabindex="-1">
                      <div class="product">
                         <article>
                            <div class="flash-p">
                               <div class="pro-description">
                                  <div class="pro-info blink">
                                     Super deal of the Month                       
                                  </div>
                                  <span class="tag">
                                  Women's Bottoms                                 
                                  </span>
                                  <h4 class="pro-title">
                                     <span>Cotton skirt with Buttons </span>                           
                                  </h4>
                                  <div class="price">            
                                     $70
                                     <span>$90</span>
                                  </div>
                                  <div class="countdown pro-timer" id="" data-placement="bottom" title="Countdown Timer">                               
                                     <span class="days">0<small>Days </small></span>
                                     <span class="hours">0<small>Hours</small></span>
                                     <span class="mintues">0<small>Min</small></span>
                                     <span class="seconds">0<small>Sec</small></span>
                                  </div>
                               </div>
                               <div class="pro-thumb">
                                  <div class="product-flash-hover">   
                                     <button type="button" class="btn btn-block btn-secondary cart swipe-to-top" products_id="20" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Add to Cart" tabindex="-1">Add to Cart</button>
                                  </div>
                                  <img class="img-fluid" src="http://estore.skillsready.online/images/media/2019/09/iDMNz19310.jpg" alt="Cotton skirt with Buttons">  
                               </div>
                            </div>
                         </article>
                      </div>
                   </div>
                   <div class="slick-slide slick-cloned" data-slick-index="7" aria-hidden="true" style="width: 600px;" tabindex="-1">
                      <div class="product">
                         <article>
                            <div class="flash-p">
                               <div class="pro-description">
                                  <div class="pro-info blink">
                                     Super deal of the Month                       
                                  </div>
                                  <span class="tag">
                                  Women's Tops                                 
                                  </span>
                                  <h4 class="pro-title">
                                     <span>Printed Rose Petal Shirt </span>                           
                                  </h4>
                                  <div class="price">            
                                     $65
                                     <span>$92</span>
                                  </div>
                                  <div class="countdown pro-timer" id="" data-placement="bottom" title="Countdown Timer">                               
                                     <span class="days">0<small>Days </small></span>
                                     <span class="hours">0<small>Hours</small></span>
                                     <span class="mintues">0<small>Min</small></span>
                                     <span class="seconds">0<small>Sec</small></span>
                                  </div>
                               </div>
                               <div class="pro-thumb">
                                  <div class="product-flash-hover">   
                                     <a class="btn btn-block btn-secondary swipe-to-top" href="http://estore.skillsready.online/product-detail/printed-rose-petal-shirt" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="View Detail" tabindex="-1">View Detail</a>
                                  </div>
                                  <img class="img-fluid" src="http://estore.skillsready.online/images/media/2019/09/pCDlz19109.jpg" alt="Printed Rose Petal Shirt">  
                               </div>
                            </div>
                         </article>
                      </div>
                   </div> --}}
                   
          </div>
       </div>
    </div>
</section>
@section('script')

<script type="text/javascript">
    $(document).ready(function() {       
  
        $(".blog-carousel-js").slick({
        lazyLoad: 'progressive',
          dots: false,
          arrows: true,
          infinite: true,
          //rtl:true,
          speed: 300,
          slidesToShow:  2,
          slidesToScroll:  2,
          adaptiveHeight: true,
          responsive: [{
            breakpoint: 1025,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }, {
            breakpoint: 791,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }, {
            breakpoint: 650,
            settings: {
              slidesToShow:  1,
              slidesToScroll:  1
            }
          }]
      });

}); 
  </script>
@endsection
