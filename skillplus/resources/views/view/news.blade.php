@extends('view.layout.layout')
@section('title')
    {{{ get_option('site_title','') }}} - {{{ $category->title or 'Categories' }}}
@endsection
@section('page')
<style>

.pro-content {
    overflow: hidden;
    padding-top: 100px;
}
.page-heading-title {
    margin-top: -7px;
    padding-bottom: 35px;
}
section {
    display: block;
}
.container {
    max-width: 1200px;
}
.d-xl-block {
    display: block !important;
}
.d-lg-block {
    display: block !important;
}
.col-lg-4 {
    flex: 0 0 33.3333333333%;
    max-width: 33.3333333333%;
}
.col-12 {
    flex: 0 0 100%;
    max-width: 100%;
}
.blog-menu .category-div {
    background-color: white;
    padding: 15px 15px 15px 15px;
    margin-bottom: 30px;
}
.blog-content .right-menu-categories .main-manu {
    display: block;
    background-color: #f2f2f2;
    color: #212529;
    border: 1px solid #dee2e6;
    padding: 5px 10px;
    text-decoration: none;
    font-family: "Montserrat-Regular", sans-serif;
    font-size: 0.875rem;
    font-weight: 600;
}
.blog-menu .category-div .main-manu {
    width: 100%;
    text-align: left;
    border: 1px solid #dce1e56e;
}
.blog-content .right-menu-categories .main-manu img {
    width: 16px;
    margin-right: 7px;
    margin-bottom: 4px;
}
.blog-menu .category-div .main-manu img {
    width: 16px;
    margin-right: 7px;
    margin-bottom: 4px;
}
img {
    vertical-align: middle;
    border-style: none;
}
.blog-menu .category-div {
    background-color: white;
    padding: 15px 15px 15px 15px;
    margin-bottom: 30px;
}
.blog-menu .category-div .media {
    height: 85px;
    overflow: hidden;
    margin-bottom: 15px;
}
.media {
    display: flex;
    align-items: flex-start;
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
.img-thumbnail {
    padding: 0.25rem;
    background-color: #f5f5f5;
    border: 1px solid #dee2e6;
    border-radius: 0;
    max-width: 100%;
    height: auto;
}
.blog .blog-detial {
    text-align: center;
}
* {
    box-sizing: border-box;
    -moz-box-sizing: border-box;
}
.blog p {
    line-height: 1.5;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
p {
    color: #212529;
    font-family: "Montserrat-Regular", sans-serif;
}
p {
    margin-top: 0;
    margin-bottom: 1rem;
}
.blog-menu .category-div {
    background-color: white;
    padding: 15px 15px 15px 15px;
    margin-bottom: 30px;
}
.blog-menu .category-div .media {
    height: 85px;
    overflow: hidden;
    margin-bottom: 15px;
}
.media {
    display: flex;
    align-items: flex-start;
}
.blog-menu .category-div .media .media-img {
    width: 30%;
    margin-right: 15px;
    overflow: hidden;
}
.blog-menu .category-div .media .media-body {
    width: 70%;
}
.blog-menu .category-div .media .media-body h5 {
    white-space: normal;
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
}
.blog-content .post-date {
    margin-bottom: 30px;
    font-family: "Montserrat-Bold", sans-serif;
}
</style>
<section class="pro-content">
	<div class="container">
	  <div class="page-heading-title">
		  <h2> News 
		  </h2>
	   
		  </div>
  </div>

<section class="blog-content">
	<div class="container"> 
	  
	  <div class="blog-area">

		<div class="row">
			<div class="col-12 col-lg-4  d-lg-block d-xl-block blog-menu"> 
								<div class="right-menu-categories category-div">
								<a class="main-manu" href="http://192.168.110.16:9091/news?category=tools-and-technology">
					<img class="img-fuild" src="http://192.168.110.16:9091/images/media/2019/09/ol2sB24311.jpg">
					Tools and Technology				
				</a>
								<a class="main-manu" href="http://192.168.110.16:9091/news?category=business">
					<img class="img-fuild" src="http://192.168.110.16:9091/images/media/2019/09/NySmM24311.jpg">
					Business				
				</a>
								  
						
				  </div>
							  <div class="category-div">
									
						<div class="media">
							<div class="media-img">  
								<img src="http://192.168.110.16:9091/images/media/2019/09/qotAc27710.jpg" alt="John Doe" width="100%">
						   	</div>
							<div class="media-body">
							<h5><a href="http://192.168.110.16:9091/news-detail/world-wide-networking">Tool and Technology</a></h5>
								<div class="post-date">
									<i class="fa fa-calendar" aria-hidden="true"></i>
									Sep 24, 2019 
								</div>
							
							</div>
						</div>

					
						<div class="media">
							<div class="media-img">  
								<img src="http://192.168.110.16:9091/images/media/2019/09/souUX27810.jpg" alt="John Doe" width="100%">
						   	</div>
							<div class="media-body">
							<h5><a href="http://192.168.110.16:9091/news-detail/fashion-week">Fashion Week</a></h5>
								<div class="post-date">
									<i class="fa fa-calendar" aria-hidden="true"></i>
									Sep 24, 2019 
								</div>
							
							</div>
						</div>

					
						<div class="media">
							<div class="media-img">  
								<img src="http://192.168.110.16:9091/images/media/2019/09/CLA2s27610.jpg" alt="John Doe" width="100%">
						   	</div>
							<div class="media-body">
							<h5><a href="http://192.168.110.16:9091/news-detail/manufacturing-tools">Why to choose this app for your Project?</a></h5>
								<div class="post-date">
									<i class="fa fa-calendar" aria-hidden="true"></i>
									Sep 24, 2019 
								</div>
							
							</div>
						</div>

					
						<div class="media">
							<div class="media-img">  
								<img src="http://192.168.110.16:9091/images/media/2019/09/laefk24511.jpg" alt="John Doe" width="100%">
						   	</div>
							<div class="media-body">
							<h5><a href="http://192.168.110.16:9091/news-detail/stock-exchange">Stock Exchange</a></h5>
								<div class="post-date">
									<i class="fa fa-calendar" aria-hidden="true"></i>
									Sep 24, 2019 
								</div>
							
							</div>
						</div>

					
						<div class="media">
							<div class="media-img">  
								<img src="http://192.168.110.16:9091/images/media/2019/09/CWYQi24511.jpg" alt="John Doe" width="100%">
						   	</div>
							<div class="media-body">
							<h5><a href="http://192.168.110.16:9091/news-detail/witn-news">World Information Technology</a></h5>
								<div class="post-date">
									<i class="fa fa-calendar" aria-hidden="true"></i>
									Sep 18, 2019 
								</div>
							
							</div>
						</div>

					
						<div class="media">
							<div class="media-img">  
								<img src="http://192.168.110.16:9091/images/media/2019/09/5xN6v24411.jpg" alt="John Doe" width="100%">
						   	</div>
							<div class="media-body">
							<h5><a href="http://192.168.110.16:9091/news-detail/world-business-news">World Business</a></h5>
								<div class="post-date">
									<i class="fa fa-calendar" aria-hidden="true"></i>
									Sep 18, 2019 
								</div>
							
							</div>
						</div>

											
					  
			  </div>
			  

			 
			</div>
		  <div class="col-12 col-lg-8">
			<div class="row">

															<div class="col-12 col-sm-12 col-md-6">
							<div class="blog">
							  <div class="blog-thumbnail">
								  <span class="date-tag badge">24-Sep-2019</span>
								  <a href="http://192.168.110.16:9091/news-detail/world-wide-networking">
								<img class="img-thumbnail" src="http://192.168.110.16:9091/images/media/2019/09/qotAc27710.jpg" alt="Tool and Technology" width="100%">
								</a>
							  </div>
							  <div class="blog-detial">
								  <span class="tag">
									 Tools and Technology                              
								  </span>
								  <h5><a href="http://192.168.110.16:9091/news-detail/world-wide-networking">
									Tool and Technology</a>
								  </h5>
								
									  <div>
										  <p>
										Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;rsquo;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.									  </p>
									  </div>
									  <span class="blink"><a href="http://192.168.110.16:9091/news-detail/world-wide-networking"> Read More .. </a></span>
							  </div>
							 
							</div>
						</div>

											<div class="col-12 col-sm-12 col-md-6">
							<div class="blog">
							  <div class="blog-thumbnail">
								  <span class="date-tag badge">24-Sep-2019</span>
								  <a href="http://192.168.110.16:9091/news-detail/fashion-week">
								<img class="img-thumbnail" src="http://192.168.110.16:9091/images/media/2019/09/souUX27810.jpg" alt="Fashion Week" width="100%">
								</a>
							  </div>
							  <div class="blog-detial">
								  <span class="tag">
									 Business                              
								  </span>
								  <h5><a href="http://192.168.110.16:9091/news-detail/fashion-week">
									Fashion Week</a>
								  </h5>
								
									  <div>
										  <p>
										Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;rsquo;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.									  </p>
									  </div>
									  <span class="blink"><a href="http://192.168.110.16:9091/news-detail/fashion-week"> Read More .. </a></span>
							  </div>
							 
							</div>
						</div>

											<div class="col-12 col-sm-12 col-md-6">
							<div class="blog">
							  <div class="blog-thumbnail">
								  <span class="date-tag badge">24-Sep-2019</span>
								  <a href="http://192.168.110.16:9091/news-detail/manufacturing-tools">
								<img class="img-thumbnail" src="http://192.168.110.16:9091/images/media/2019/09/CLA2s27610.jpg" alt="Why to choose this app for your Project?" width="100%">
								</a>
							  </div>
							  <div class="blog-detial">
								  <span class="tag">
									 Tools and Technology                              
								  </span>
								  <h5><a href="http://192.168.110.16:9091/news-detail/manufacturing-tools">
									Why to choose this app for your Project?</a>
								  </h5>
								
									  <div>
										  <p>
										Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;rsquo;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.									  </p>
									  </div>
									  <span class="blink"><a href="http://192.168.110.16:9091/news-detail/manufacturing-tools"> Read More .. </a></span>
							  </div>
							 
							</div>
						</div>

											<div class="col-12 col-sm-12 col-md-6">
							<div class="blog">
							  <div class="blog-thumbnail">
								  <span class="date-tag badge">24-Sep-2019</span>
								  <a href="http://192.168.110.16:9091/news-detail/stock-exchange">
								<img class="img-thumbnail" src="http://192.168.110.16:9091/images/media/2019/09/laefk24511.jpg" alt="Stock Exchange" width="100%">
								</a>
							  </div>
							  <div class="blog-detial">
								  <span class="tag">
									 Business                              
								  </span>
								  <h5><a href="http://192.168.110.16:9091/news-detail/stock-exchange">
									Stock Exchange</a>
								  </h5>
								
									  <div>
										  <p>
										Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;rsquo;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.									  </p>
									  </div>
									  <span class="blink"><a href="http://192.168.110.16:9091/news-detail/stock-exchange"> Read More .. </a></span>
							  </div>
							 
							</div>
						</div>

											<div class="col-12 col-sm-12 col-md-6">
							<div class="blog">
							  <div class="blog-thumbnail">
								  <span class="date-tag badge">18-Sep-2019</span>
								  <a href="http://192.168.110.16:9091/news-detail/witn-news">
								<img class="img-thumbnail" src="http://192.168.110.16:9091/images/media/2019/09/CWYQi24511.jpg" alt="World Information Technology" width="100%">
								</a>
							  </div>
							  <div class="blog-detial">
								  <span class="tag">
									 Tools and Technology                              
								  </span>
								  <h5><a href="http://192.168.110.16:9091/news-detail/witn-news">
									World Information Technology</a>
								  </h5>
								
									  <div>
										  <p>
										Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.									  </p>
									  </div>
									  <span class="blink"><a href="http://192.168.110.16:9091/news-detail/witn-news"> Read More .. </a></span>
							  </div>
							 
							</div>
						</div>

											<div class="col-12 col-sm-12 col-md-6">
							<div class="blog">
							  <div class="blog-thumbnail">
								  <span class="date-tag badge">18-Sep-2019</span>
								  <a href="http://192.168.110.16:9091/news-detail/world-business-news">
								<img class="img-thumbnail" src="http://192.168.110.16:9091/images/media/2019/09/5xN6v24411.jpg" alt="World Business" width="100%">
								</a>
							  </div>
							  <div class="blog-detial">
								  <span class="tag">
									 Business                              
								  </span>
								  <h5><a href="http://192.168.110.16:9091/news-detail/world-business-news">
									World Business</a>
								  </h5>
								
									  <div>
										  <p>
										Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.

&nbsp;

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.

&nbsp;

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.									  </p>
									  </div>
									  <span class="blink"><a href="http://192.168.110.16:9091/news-detail/world-business-news"> Read More .. </a></span>
							  </div>
							 
							</div>
						</div>

														   
			  </div>
		  </div>
 
		</div>
		
	  </div>
	</div>
  </section>
  </section>

@endsection
@section('script')
    <script>
        /* $(function() {
            pagination('.body-target',@if(isset($setting['site']['category_content_count'])) {{{ $setting['site']['category_content_count'] or 6 }}} @endif,0);
            
        }); */
    </script>
    <script type="application/javascript" src="/assets/javascripts/category-page-custom.js"></script>
@endsection