
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
.categories-content .cat-banner {
    margin-top: 30px;
}
.categories-content .cat-banner .categories-image {
    overflow: hidden;
    margin-bottom: 0;
    height: 100%;
    position: relative;
}
figure {
    margin: 0 0 1rem;
        margin-bottom: 1rem;
}
.categories-content .cat-banner .categories-image a {
    display: block;
    text-align: center;
    color: #fff;
    text-transform: uppercase;
}
.categories-content .cat-banner .categories-image a img {
    width: 100%;
}
.animation-s5 .categories-content .categories-image img {
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

.categories-content .cat-banner .categories-image a .categories-title:hover {
    opacity: 1;
}
.categories-content .cat-banner .categories-image a .categories-title {
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
</style>
<div class="container-fluid">
    <div class="container news-container">
<section class="categories-content pro-content" style="display: block !important;">
    <div class="container">
      <div class="products-area">
         <div class="row justify-content-center">
           <div class="col-12 col-lg-6">
             <div class="pro-heading-title">
               <h2> COURSE CATEGORIES  </h2>
               </div>
             </div>
         </div>
      
      </div>
    </div>
   <div class="row" id="catDiv">
                        
        {{--   <div class="col-12 col-md-6 col-lg-3 cat-banner">
            
            <figure class="categories-image">
              <a href="http://192.168.110.16:9091/shop?category=men-s">
                <img class="img-fluid" src="/bin/admin/files/cover(1).jpg" alt="Men's">
                <div class="categories-title">
                  <h4>Development</h4>
                </div>
              </a>
            </figure>

          </div>

                                    
          <div class="col-12 col-md-6 col-lg-3 cat-banner">
            
            <figure class="categories-image">
              <a href="http://192.168.110.16:9091/shop?category=women-s">
                <img class="img-fluid" src="/bin/admin/files/cover(3).jpg" alt="Women's">
                <div class="categories-title">
                  <h4>Business</h4>
                </div>
              </a>
            </figure>

          </div>

                                    
          <div class="col-12 col-md-6 col-lg-3 cat-banner">
            
            <figure class="categories-image">
              <a href="http://192.168.110.16:9091/shop?category=kid-s">
                <img class="img-fluid" src="/bin/admin/files/cover(3).jpg" alt="Kid's">
                <div class="categories-title">
                  <h4>Personal Development</h4>
                </div>
              </a>
            </figure>

          </div>

                                    
          <div class="col-12 col-md-6 col-lg-3 cat-banner">
            
            <figure class="categories-image">
              <a href="http://192.168.110.16:9091/shop?category=house-hold">
                <img class="img-fluid" src="/bin/admin/files/cover(3).jpg" alt="House Hold">
                <div class="categories-title">
                  <h4>Design</h4>
                </div>
              </a>
            </figure>

          </div>          

          <div class="col-12 col-md-6 col-lg-3 cat-banner">
            
            <figure class="categories-image">
              <a href="http://192.168.110.16:9091/shop?category=house-hold">
                <img class="img-fluid" src="/bin/admin/files/cover(4).jpg" alt="House Hold">
                <div class="categories-title">
                  <h4>Marketing</h4>
                </div>
              </a>
            </figure>

          </div>
          
          <div class="col-12 col-md-6 col-lg-3 cat-banner">
            
            <figure class="categories-image">
              <a href="http://192.168.110.16:9091/shop?category=house-hold">
                <img class="img-fluid" src="/bin/admin/files/cover(5).jpg" alt="House Hold">
                <div class="categories-title">
                  <h4>Lifestyle</h4>
                </div>
              </a>
            </figure>

          </div>
          
          <div class="col-12 col-md-6 col-lg-3 cat-banner">
            
            <figure class="categories-image">
              <a href="http://192.168.110.16:9091/shop?category=house-hold">
                <img class="img-fluid" src="/bin/admin/files/cover(6).jpg" alt="House Hold">
                <div class="categories-title">
                  <h4>Health & Fitness</h4>
                </div>
              </a>
            </figure>

          </div>

          
          <div class="col-12 col-md-6 col-lg-3 cat-banner">
            
            <figure class="categories-image">
              <a href="http://192.168.110.16:9091/shop?category=house-hold">
                <img class="img-fluid" src="/bin/admin/files/cover(7).jpg" alt="House Hold">
                <div class="categories-title">
                  <h4>Teaching & Academics</h4>
                </div>
              </a>
            </figure>

          </div> --}}

    </div>

  </section>
</div>
</div>
<br>
<script type="text/javascript">

  $(document).ready(function() { 
    course_categories();

  }); 

  function course_categories(){
        $.ajax({
            url: "{{url('/api/ParentCategories')}}/",
            type: 'get',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'JSON',
            success: function(data) {
              for (let index = 0; index < data.data.length; index++) {
                  $("#catDiv").append(
                    '<div class="col-12 col-md-6 col-lg-3 cat-banner">'   +         
                      '<figure class="categories-image">'+
                        '<a href="/category/'+data.data[index].category+'">'+
                          '<img class="img-fluid" src="'+data.data[index].image+'" alt="Mens">'+
                            '<div class="categories-title">'+
                              '<h4>'+data.data[index].category+'</h4>'+
                            '</div>'+
                        '</a>'+
                      '</figure>'+
                    '</div>'
                  )
                
              }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
  }
</script>
{{-- 
</div>
</div> --}}