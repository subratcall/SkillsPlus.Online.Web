@extends('view.layout.layout')
@section('title')
    {{{ get_option('site_title','') }}} - {{{ $category->title or 'Categories' }}}
@endsection
@section('page')
<style>
    .categories-content {
    overflow: hidden;
}
.pro-content {
    overflow: hidden;
    padding-top: 100px;
}
.justify-content-center {
    justify-content: center !important;
}
.cat-banner {
    margin-top: 30px;
}
.cat-banner .categories-image {
    overflow: hidden;
    margin-bottom: 0;
    height: 100%;
    position: relative;
}
figure {
    margin: 0 0 1rem;
        margin-bottom: 1rem;
}
.cat-banner .categories-image a {
    display: block;
    text-align: center;
    color: #fff;
    text-transform: uppercase;
}
.cat-banner .categories-image a img {
    width: 100%;
}
.animation-s5 ..categories-image img {
    opacity: 1;
    transition: 0.3s ease-in-out;
}
.img-fluid {
    max-width: 100%;
    height: auto;
}
img {
    vertical-align: middle;
    border-style: none;
}

cat-banner .categories-image a .categories-title:hover {
    opacity: 1;
}
.cat-banner .categories-image a .categories-title {
    position: absolute;
    bottom: 0;
    width: 100%;
    height: 25px;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #28B293;
    opacity: 0.8;
    transform: translateX(0px);
    -webkit-transform: translateX(0px);
    transition: 0.2s;
    overflow: hidden;
    -webkit-transition: 0.2s;
    -moz-transition: 0.2s;
    -ms-transition: 0.2s;
    -o-transition: 0.2s;
    -moz-transform: translateX(0px);
    -ms-transform: translateX(0px);
    -o-transform: translateX(0px);
}

.contact-content .contact-info {
    list-style-type: none;
    padding-left: 0px;
}
.pl-0, .px-0 {
    padding-left: 0 !important;
}
.mb-0, .my-0 {
    margin-bottom: 0 !important;
}


.contactleft {
    font-size: 10px;
}
</style>
    <div class="container-fluid">
        <div class="row cat-search-section" style="background: url('{{{ $category->background or '' }}}');">
            <div class="container">
                {{-- <div class="col-md-6 col-sm-6 col-xs-12 tab-con cat-icon-container">
                    <span><img src="{{{ $category->icon or '' }}}" class="category-icon" /> </span>
                    <span><span>{{{ $category->title or '' }}}</span></span>
                </div>
                <div class="col-md-2 tab-con">
                    <div class="h-10"></div>
                </div> --}}
              <div class="row">
                <div class="col-md-6">
                    <div class="">
                        <ul class="contact-info pl-0 mb-0 contactleft">
                            <li> <span class="homeicon mdi mdi-cellphone">+123456789</span> </li>
                            <li> <span class="homeicon mdi mdi-crosshairs-gps">
                                Ecommerce
                                Demo Store 3654123 </span> </li>
                            <li> <span class="homeicon mdi mdi-email-open"> <a href="mailto:">skillsready@mail.com</a> </span> </li>
                            <li><span class="homeicon mdi mdi-phone-classic">+123456789</span> </li>
                       
                          </ul>         
                      </div>
                </div>
                <div class="col-md-6">
                    <form action="/action_page.php">
                        <div class="form-group">
                            <label for="fname">Full Name: </label>
                            <input type="text" id="fname" name="firstname" class="form-control" placeholder="Your name..">
                            <label for="lname">Email: </label>
                            <input type="text" id="fname" name="firstname" class="form-control" placeholder="Your email..">
                            <label for="subject">Message: </label>
                            <textarea id="subject" name="subject"  class="form-control" placeholder="Write something.." style="height:170px"></textarea>
                            <button class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
              </div>
                  
            </div>
        </div>
    </div>
    <div class="container-fluid">
        
    </div>
</div>
<div class="h-20"></div>
<div class="container-fluid">
    <div class="row">
        <div class="container">
           
            <div class="col-md-12 col-xs-12">
                <div class="newest-container newest-container-s">
                    <div class="row body body-target body-target-s">
                     
                     
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
    <script>
        /* $(function() {
            pagination('.body-target',@if(isset($setting['site']['category_content_count'])) {{{ $setting['site']['category_content_count'] or 6 }}} @endif,0);
            
        }); */
    </script>
    <script type="application/javascript" src="/assets/javascripts/category-page-custom.js"></script>
@endsection