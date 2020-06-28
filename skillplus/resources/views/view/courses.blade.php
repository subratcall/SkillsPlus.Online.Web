@extends('view.layout.layout')
@section('title')
    {{{ get_option('site_title','') }}} - {{{ $category->title or 'Categories' }}}
@endsection
@section('page')

    <div class="container-fluid">
        <div class="row cat-search-section" style="background: url('{{{ $category->background or '' }}}');">
            <div class="container">
                <div class="col-md-6 col-sm-6 col-xs-12 tab-con cat-icon-container">
                    <span><img src="{{{ $category->icon or '' }}}" class="category-icon" /> </span>
                    <span><span>{{{ $category->title or '' }}}</span></span>
                </div>
                <div class="col-md-2 tab-con">
                    <div class="h-10"></div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="box box-s">
                        <div class="container-2">
                            <form>
                            <input type="search" id="search" name="q" value="{{{ $_GET['q'] or '' }}}" placeholder="Search in  {{{ $category->title or 'Search in all categories' }}}" />
                            <span class="icon"><i class="homeicon mdi mdi-magnify"></i></span>
                            </form>
                        </div>
                    </div>
                </div>
                  
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row cat-tag-section">
            <div class="container">
                <div class="col-md-2 col-xs-12 tab-con">
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary @if($pricing == 'all' || $pricing == '') active @endif">
                            <input type="radio" name="pricing" value="all" @if($pricing == 'all' || $pricing == '') checked @endif> {{{ trans('main.all') }}}
                        </label>
                        <label class="btn btn-primary @if($pricing == 'free') active @endif">
                            <input type="radio" name="pricing" value="free" @if($pricing == 'free') checked @endif> {{{ trans('main.free') }}}
                        </label>
                        <label class="btn btn-primary @if($pricing == 'price') active @endif">
                            <input type="radio" name="pricing" value="price" @if($pricing == 'price') checked @endif> {{{ trans('main.paid') }}}
                        </label>
                    </div>
                </div>
                <div class="col-md-3 col-xs-12 tab-con">
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary @if($course == 'all' || $course == '') active @endif">
                            <input type="radio" name="course" value="all" @if($course == 'all' || $course == '') checked @endif> {{{ trans('main.all') }}}
                        </label>
                        <label class="btn btn-primary @if($course == 'multi') active @endif">
                            <input type="radio" name="course" value="multi" @if($course == 'multi') checked @endif> {{{ trans('main.course') }}}
                        </label>
                        <label class="btn btn-primary @if($course == 'one') active @endif">
                            <input type="radio" name="course" value="one" @if($course == 'one') active @endif> {{{ trans('main.single') }}}
                        </label>
                    </div>
                </div>
                <div class="col-md-5 col-xs-12 text-left tab-con">
                    <div class="form-group">
                        <label class="control-label form-label-s" for="inputDefault">{{{ trans('main.postal_delivery') }}}</label>
                        <div class="switch switch-sm switch-primary sw-prim-s">
                            <input type="hidden" value="0" name="post-sell">
                            <input type="checkbox" name="post-sell" value="1" @if(isset($_GET['post-sell']) && $_GET['post-sell'] == 1) checked @endif data-plugin-ios-switch />
                        </div>
                        &nbsp;&nbsp;
                        <label class="control-label cont-lab-s" for="inputDefault">{{{ trans('main.supported_course') }}}</label>
                        <div class="switch switch-sm switch-primary sw-prim-s">
                            <input type="hidden" value="0" name="support">
                            <input type="checkbox" name="support" value="1" @if(isset($_GET['support']) && $_GET['support'] == 1) checked @endif data-plugin-ios-switch />
                        </div>
                        &nbsp;&nbsp;
                        <label class="control-label form-label-s" for="inputDefault">{{{ trans('main.discount') }}}</label>
                        <div class="switch switch-sm switch-primary sw-prim-s" >
                            <input type="hidden" value="0" name="post">
                            <input type="checkbox" name="off" value="1" @if($off == 1) checked @endif data-plugin-ios-switch />
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-xs-12 text-left tab-con">
                    <div class="form-group pull-left">
                        <select class="form-control" id="order order-s">
                            <option value="new" @if($order == 'new') selected @endif>{{{ trans('main.newest') }}}</option>
                            <option value="old" @if($order == 'old') selected @endif>{{{ trans('main.oldest') }}}</option>
                            <option value="price" @if($order == 'price') selected @endif>{{{ trans('main.price_ascending') }}}</option>
                            <option value="cheap" @if($order == 'cheap') selected @endif>{{{ trans('main.price_descending') }}}</option>
                            <option value="sell" @if($order == 'sell') selected @endif>{{{ trans('main.most_sold') }}}</option>
                            <option value="popular" @if($order == 'popular') selected @endif>{{{ trans('main.most_popular') }}}</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="h-20"></div>
<div class="container-fluid">
    <div class="row">
        <div class="container">
            <!-- <div class="col-md-3 col-xs-12 tab-con">
            
                    <div class="ucp-section-box sbox3">
                    <div class="header back-orange header-new"><span>{{{ trans('main.filters') }}}</span><input type="checkbox"  name="hh" id="hh"></div>
                    <div class="body">                              
                        <ul id="accordion" class="cat-filters-li accordion">
                            <li id="filter">
                                <div class="link">Level<i class="mdi mdi-chevron-down"></i></div>                                    
                                <ul class="submenu" style="display: block;">
                                    <li>
                                        <input type="checkbox" id="filter552" name="filters" value="Advance">
                                        <label for="filter552"><span></span>Advance {{-- <i class="fa fa-star" ></i> --}}</label>
                                        <input type="checkbox" id="filter553" name="filters" value="Moderate">
                                        <label for="filter553"><span></span>Moderate</label>
                                        <input type="checkbox" id="filter554" name="filters" value="Easy">
                                        <label for="filter554"><span></span>Easy</label>
                                    </li>
                                </ul>
                            </li>
                            <li id="filter">
                                <div class="link">Price<i class="mdi mdi-chevron-down"></i></div>                                    
                                <ul class="submenu" style="display: block;">
                                    <li>
                                        <input type="checkbox" id="filter555" name="filters" value="Free">
                                        <label for="filter555"><span></span>Free </label>
                                        <input type="checkbox" id="filter556" name="filters" value="Paid">
                                        <label for="filter556"><span></span>Paid</label>
                                    </li>
                                </ul>
                            </li>
                            <li id="filter">
                                <div class="link">Language<i class="mdi mdi-chevron-down"></i></div>                                    
                                <ul class="submenu" style="display: block;">
                                    <li>
                                        <input type="checkbox" id="filter557" name="filters" value="English">
                                        <label for="filter557"><span></span>English </label>
                                        <input type="checkbox" id="filter558" name="filters" value="Spanish">
                                        <label for="filter558"><span></span>Spanish</label>
                                        <input type="checkbox" id="filter607" name="filters" value="607">
                                        <label for="filter607"><span></span>Filipino</label>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                @if(isset($setting['site']['category_most_sell_container']) && $setting['site']['category_most_sell_container'] == 1)
                @endif
                    <div class="row">
                        @if(isset($ads))
                            @foreach($ads as $ad)
                                @if($ad->position == 'category-side')
                                    <a href="{{{ $ad->url or '#' }}}"><img src="{{{ $ad->image or '' }}}" class="{{{ $ad->size or '' }}}" id="cat-side"></a>
                                @endif
                            @endforeach
                        @endif
                    </div>
            </div> -->
            <div class="col-md-12 col-xs-12">
                <div class="newest-container newest-container-s">
                    <div class="row body body-target body-target-s">
                        <?php $vipIds[] = 0; ?>
                        @if(!empty($vip) && !isset($order) && !isset($pricing) && !isset($course) && !isset($off) && !isset($post_sell) && !isset($q) && !isset($support) && !isset($filters))
                            @foreach($vip as $content)123
                                @if(isset($content->content->id))
                                    <?php $vipIds[] = $content->content->id; ?>
                                    <?php $meta = arrayToList($content->content->metas,'option','value'); ?>
                                    <div class="col-md-4 col-sm-6 col-xs-12 pagi-content vip-content tab-con">
                                        <a href="/product/{{{ $content->content->id or '' }}}" title="{{{ $content->content->title or '' }}}" class="content-box pagi-content-box">
                                            <div class="img-container">
                                                <img src="{{{ $meta['thumbnail'] or '' }}}"/>
                                                <span class="off-badge vip-badge">
                                                    <label class="text-center">{{{ trans('main.vip_badge') }}}</label>
                                                </span>
                                            </div>
											<h3>{!! str_limit($content->content->title,35,'...') !!}</h3>
                                            <div class="footer">
                                                <span class="avatar" title="{{{ $content->user->name or '' }}}" onclick="window.location.href = '/profile/{{{ $content->user->id or 0 }}}'"><img src="{{{ get_user_meta($content['user_id'],'avatar',get_option('default_user_avatar','')) }}}"></span>
                                                @if(isset($metas['duration']))
                                                    <label class="pull-right content-clock">{{{ convertToHoursMins($meta['duration']) }}}</label>
													<span class="boxicon mdi mdi-clock pull-right"></span>
                                                @else
                                                    <label class="pull-right content-clock">{{{ trans('main.not_defined') }}}</label>
													<span class="boxicon mdi mdi-clock pull-right"></span>
                                                @endif
												<span class="boxicon mdi mdi-wallet pull-left"></span>
												<span class="boxicon mdi mdi-wallet pull-left"></span>
                                                <label class="pull-left">{{{ price($content->id,$content->category_id,$meta['price'])['price_txt'] }}}</label>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        @else
                            <?php $vipIds[] = 0; ?>
                        @endif
                        @foreach($contents as $content)
                            @if(!in_array($content['id'],$vipIds))
                                <div class="col-md-4 col-sm-6 col-xs-12 pagi-content tab-con">
                            <a href="/product/{{{ $content['id'] or '' }}}" title="{{{ $content['title'] or '' }}}" class="content-box pagi-content-box">
                                
                                <div class="img-container">
                                    <img src="{{{ $content['metas']['thumbnail'] or '' }}}"/>
                                    @if($content['discount'] != null)
                                        <span class="off-badge">
                                            <label class="text-center">%{{{ $content['discount']['off'] or 0 }}}<br><span>{{{ trans('main.discount') }}}</span></label>
                                        </span>
                                    @endif
                                </div>
								<h3>{!! str_limit($content['title'],35,'...') !!}</h3>
                                <div class="footer">
                                    <span class="avatar" title="{{{ $content['user']['name'] or '' }}}" onclick="window.location.href = '/profile/{{{ $content['user']['id'] or 0 }}}'"><img src="{{{ get_user_meta($content['user_id'],'avatar',get_option('default_user_avatar','')) }}}"></span>
                                    @if(isset($content['metas']['duration']))
                                        <label class="pull-right content-clock">{{{ convertToHoursMins($content['metas']['duration']) }}}</label>
										<span class="boxicon mdi mdi-clock pull-right"></span>
                                    @else
                                        <label class="pull-right content-clock">{{{ trans('main.not_defined') }}}</label>
										<span class="boxicon mdi mdi-clock pull-right"></span>
                                    @endif
									<span class="boxicon mdi mdi-wallet pull-left"></span>
                                    <label class="pull-left">{{{ price($content['id'],$content['category_id'],$content['metas']['price'])['price_txt'] }}}</label>
                                </div>
                            </a>
                        </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="h-10"></div>
                    <div class="pagi text-center center-block col-xs-12"></div>
                    <div class="row pagi-s">
                        @if(isset($ads))
                            @foreach($ads as $ad)
                                @if($ad->position == 'category-pagination-bottom')
                                    <a href="{{{ $ad->url or '#' }}}"><img src="{{{ $ad->image or '' }}}" class="{{{ $ad->size or '' }}}" id="cat-side"></a>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
    <script>
        $(function() {
            pagination('.body-target',@if(isset($setting['site']['category_content_count'])) {{{ $setting['site']['category_content_count'] or 6 }}} @endif,0);
            $('.pagi').pagination({
                items: {!! count($contents) !!},
                itemsOnPage: @if(isset($setting['site']['category_content_count'])) {{{ $setting['site']['category_content_count'] or 6 }}} @endif,
                cssStyle: 'light-theme',
                prevText: 'Pre.',
            	nextText:'Next',
                onPageClick:function(pageNumber, event) {
                    pagination('.body-target',@if(isset($setting['site']['category_content_count'])) {{{ $setting['site']['category_content_count'] or 6 }}} @endif,pageNumber-1);
                }
            });
        });
    </script>
    <script type="application/javascript" src="/assets/javascripts/category-page-custom.js"></script>
@endsection