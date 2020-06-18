<div class="tri-banners-content pro-content">   
              
                
    <div class="fullwidth-banner" style="background-image: url('https://fiverr-res.cloudinary.com/w_iw_div_2.0,q_100,f_auto/general_assets/pro_experience/assets/images/f1/Banner_Curated.png') ">
      <div class="parallax-banner-text">
          <h2>Come for the job… stay for the challenge</h2>
          <h4>You can actually invent things here!</h4>
          {{-- <div class="hover-link\">
              <a href="/shop\" class="btn btn-secondary swipe-to-top\" data-toggle="tooltip\" data-placement="bottom\" title="\" data-original-title="View All">
          </div> --}}
          <button type="button swipe-to-top" class="btn btn-success">Explore Services</button>
          {{-- <div class="hover-link">
              <button type="button swipe-to-top" class="btn btn-success">BUY NOW</button>
              <a href="/shop" class="btn btn-secondary swipe-to-top" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="View All">
          </div> --}}
      </div>
    </div> 

      
</div>

<br>

<div class="container-fluid newest-container">
        <div class="container">
            <div class="row">
                <div class="header">
                    <span class="pull-left">Services</span>
                </div>
                <div class="body body-s-r"  dir="ltr">
                    <span class="nav-right"></span>
                    <div class="owl-carousel">
                        @foreach($sell_content as $new)
                            <?php $meta = arrayToList($new->metas,'option','value'); ?>
                            <div class="owl-car-s" dir="rtl">
                                <a href="/product/{{{ $new->id or '' }}}" title="{{{ $new->title or '' }}}" class="content-box">
                                    <img src="{{{ $meta['thumbnail'] or '' }}}"/>
									<h3>{!! str_limit($new->title,30,'...') !!}</h3>
                                    <div class="footer">
                                        <span class="avatar" title="{{{ $new->user->name or '' }}}" onclick="window.location.href = '/profile/{{{ $new->user->id or 0 }}}'"><img src="{{{ get_user_meta($new->user_id,'avatar',get_option('default_user_avatar','')) }}}"></span>
                                        <label class="pull-right">@if(isset($meta['duration'])){{{ convertToHoursMins($meta['duration']) }}}@else {{{ trans('main.not_defined') }}} @endif </label>
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
        </div>
</div>
