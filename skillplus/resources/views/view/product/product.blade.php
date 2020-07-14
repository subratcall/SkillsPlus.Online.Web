@extends('view.layout.layout')
@section('title')
    {{{ $setting['site']['site_title'] or '' }}}
    - {{{ $product->title or '' }}}
@endsection
@section('page')
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap" rel="stylesheet">
<link rel='stylesheet' href="{{ asset('assets/_plugins/jkanban.css') }}">
<link rel="stylesheet" href="/assets/stylesheets/vendor/mdi/css/materialdesignicons.min.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<style>
    .custom-card {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.03);
        background-color: #fff;
        border-radius: 3px;
        border: none;
        position: relative;
        margin-bottom: 30px;
    }

    #myKanban {
        overflow-x: auto;
        padding: 20px 0;
    }

    .success {
        background: #00B961;
        color: #fff
    }

    .info {
        background: #2A92BF;
        color: #fff
    }

    .warning {
        background: #F4CE46;
        color: #fff
    }

    .error {
        background: #FB7D44;
        color: #fff
    }

    .raty-text {
        color: #e6d816 !important;
        /* font-size: 1.7em;
        font-weight: bold;
        display: inline-block;
        padding-right: 2px;
        position: relative;
        top: -6px; */
    }

    .raty {
        color: #e6d816 !important;
        /* font-size: 1.7em;
        font-weight: bold;
        display: inline-block;
        padding-right: 2px;
        position: relative;
        top: -6px; */
    }

    .course {
        font-family: 'Open Sans', sans-serif;
    }

    .course .course-header {
        margin-left: 100px;
        margin-top: 50px;
        margin-bottom: 50px;
        padding: 0px;
        min-width: 1980px;
    }

    .section.section-header {
        margin-top: -15px;
    }

    .wrap-header {
        background-color: #29303B;
        color: white;
    }

    .no-padding {
        padding: 0px;
    }

    .no-margin {
        margin: 0px;
    }

    .main-content.header {
        margin-top: 15px;
    }

    .section-1 {
        border: #DEDFE0 solid 1px;
        color: #29303B;
        padding: 30px;
    }

    .section-1 ul {
        list-style: none;
        padding: 0;
    }

    .section-1 ul>li {
        padding-left: 1.3em;
    }

    .section-1 li:before {
        content: "\f00c";
        font-family: FontAwesome;
        display: inline-block;
        margin-left: -1.3em;
        width: 1.3em;
        color: #a1a7b3;
    }

    .margin-top-next {
        margin-top: 40px;
    }

    .section-2 {
        font-size: 22px;
        padding: 10px 0px;
        color: #29303B;
    }

    .section-3 {
        padding: 2.5px 0px;
    }

    .header-custom-border {
        border-top: #DEDFE0 solid 1px;
        border-left: #DEDFE0 solid 1px;
        border-right: #DEDFE0 solid 1px;
        border-bottom: #DEDFE0 solid 1px;
        padding: 10px 0px;
    }

    .list-custom-border {
        border-bottom: #DEDFE0 solid 1px;
        border-left: #DEDFE0 solid 1px;
        border-right: #DEDFE0 solid 1px;
        font: 15px;
        color: #007791;
        padding-top: 10px;
        padding-left: 40px;
        padding-right: 5px;
        padding-bottom: 10px;
        text-indent: -0.8em;
    }

    .list-custom-border>i {
        opacity: 0.5;
        padding-right: 10px;
    }

    .section-4-header {
        font-size: 22px !important;
        padding-top: 10px !important;
        color: #29303B !important;
    }

    .section-4 ul>li {
        font-size: 15px;
        color: #29303B;
    }

    .section-4 p {
        font-size: 14px;
        color: #29303B;
    }

    .section-5-header {
        font-size: 22px;
        padding: 10px 0px;
        color: #29303B;
    }

    .section-5 {
        color: #29303b;
    }

    .video-tutorials {
        position: absolute;
        z-index: 1;
        right: 200px;
        top: 50px;
        background: white;
        border: 1px solid white;
        box-shadow: 0.5px 1px 5px 0.5px #00000080;
        border-radius: 2px;
        height: 700px;
    }

    .video-tutorials video {
        width: 400px;
        height: 300px;
        border: 10px solid white;
    }

    .video-tutorials.video-details {
        font-size: 16px;
    }

    .video-details {
        padding: 10px;
        padding-left:20px;
        text-align: center;
    }

    .video-details-header {
        font-size: 24px;
        font-weight: bold;
        text-align: left;
        padding-left:40px;
    }

    .video-details p {
        font-size: 32px;
    }

    .button {
        border-style: none;
        padding: 15px;
        width: 300px;
    }

    .add-to-cart {
        margin-top: 10px;
        border: black 1px solid;
        background-color: #ffffff;
        font-weight: bold;
        color: #686F7A;
    }

    .buy-now {
        background-color: #EC5252;
        color: #ffffff;
        font-weight: bold;
    }

    .video-descriptions {
        color: #686F7A;
        text-align: left;
        padding-left: 1
    }

    .video-descriptions p {
        font-size: 14px;
        padding-left:40px;
        font-weight: bold;
        padding-top: 10px;
    }

    .video-descriptions ul {
        padding-left: 60px;
    }

    .video-descriptions ul li {
        list-style: none;
        padding: 0;
    }



    
    .product-header {
    background: #29303b/*linear-gradient(to left, #0f8e6c, #13ce9c);*/
};

    /* font-size: 1.2em;
	padding-top: 5px;
	display: inline-block; */
</style>
    <div class="container-fluid">
        <div class="row product-header">
            <div class="container">
                <div class="col-xs-12 col-md-10 tab-con">
                    <h2>{{{ $product->title or '' }}}</h2>
                    <p>{{{ $product->subTitle or '' }}}</p>
                    {{-- </div>
                    <div class="col-xs-12 col-md-4 text-left"> --}}
                    <div class="raty-product-section">
                        <div class="raty"></div>
                        <span class="raty-text">({{{ count($product->rates) }}} {{{ trans('main.votes') }}})</span><br>                        
                        {{-- <span class="raty-text">3 ratings</span><br> --}}
                        <span class="">10 studens / vendors purchased this book</span><br>
                        <span class="">Vendor: {{{ $product->user->name or '' }}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="h-20"></div>
    @if($product['discount'] != null)
        <div class="container">
            <div class="col-xs-12 col-md-12">
                <div class="product-discount-container">
                    <div class="col-md-4 col-xs-12 tab-con">
                        <div class="container-s-r">
                            <strong class="red-r">@if($product->discount->last_date-time()>86400) {{{ (floor(($product->discount->last_date-time()) / (60 * 60 * 24))) }}} @else 0 @endif</strong>
                            <strong>{{{ trans('main.days') }}}</strong>
                            <strong>{{{ trans('main.special_offer') }}}</strong>
                        </div>
                    </div>
                    <div class="col-md-2 col-xs-12 tab-con">
                        <div class="row">
                            <span class="off-btn">
                                <label>%{{{ $product->discount->off or 0 }}}</label>
                                <label>{{{ trans('main.discount') }}}</label>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12 tab-con">
                        <div class="countdown" dir="ltr">
                            <div class="bloc-time hours" data-init-value="{{{ 24-date('H',time()) }}}">
                                <div class="figure hours hours-1">
                                    <span class="top">2</span>
                                    <span class="top-back">
                                        <span>2</span>
                                    </span>
                                    <span class="bottom">2</span>
                                    <span class="bottom-back">
                                        <span>2</span>
                                    </span>
                                </div>
                                <div class="figure hours hours-2">
                                    <span class="top">4</span>
                                    <span class="top-back">
                                        <span>4</span>
                                    </span>
                                    <span class="bottom">4</span>
                                    <span class="bottom-back">
                                        <span>4</span>
                                    </span>
                                </div>
                            </div>
                            <div class="bloc-time min" data-init-value="{{{ 60-date('m',time()) }}}">
                                <div class="figure min min-1">
                                    <span class="top"></span>
                                    <span class="top-back">
                                        <span>0</span>
                                    </span>
                                    <span class="bottom">0</span>
                                    <span class="bottom-back">
                                        <span>0</span>
                                    </span>
                                </div>
                                <div class="figure min min-2">
                                    <span class="top">0</span>
                                    <span class="top-back">
                                        <span>0</span>
                                    </span>
                                    <span class="bottom">0</span>
                                    <span class="bottom-back">
                                        <span>0</span>
                                    </span>
                                </div>
                            </div>
                            <div class="bloc-time sec" data-init-value="{{{ 60-date('s',time()) }}}">
                                <div class="figure sec sec-1">
                                    <span class="top">0</span>
                                    <span class="top-back">
                                        <span>0</span>
                                    </span>
                                    <span class="bottom">0</span>
                                    <span class="bottom-back">
                                        <span>0</span>
                                    </span>
                                </div>
                                <div class="figure sec sec-2">
                                    <span class="top">0</span>
                                    <span class="top-back">
                                        <span>0</span>
                                    </span>
                                    <span class="bottom">0</span>
                                    <span class="bottom-back">
                                        <span>0</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="h-20"></div>
    @elseif($product->category->discount != null)
        <div class="container">
            <div class="col-xs-12 col-md-12">
                <div class="product-discount-container">
                    <div class="col-md-4 col-xs-12">
                        <div class="container-s-r">
                            <strong class="red-r">@if($product->category->discount->last_date-time()>86400) {{{ (floor(($product->category->discount->last_date-time()) / (60 * 60 * 24)))+1 }}} @else 0 @endif Day</strong>
                            <strong>{{{ trans('main.days') }}}</strong>
                            <strong>{{{ trans('main.special_offer') }}}</strong>
                        </div>
                    </div>
                    <div class="col-md-2 col-xs-12">
                        <div class="row">
                            <span class="off-btn">
                                <label>%{{{ $product->category->discount->off or 0 }}}</label>
                                <label>{{{ trans('main.discount') }}}</label>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="countdown" dir="ltr">
                            <div class="bloc-time hours" data-init-value="{{{ 24-date('H',time()) }}}">
                                <div class="figure hours hours-1">
                                    <span class="top">2</span>
                                    <span class="top-back">
                                        <span>2</span>
                                    </span>
                                    <span class="bottom">2</span>
                                    <span class="bottom-back">
                                        <span>2</span>
                                    </span>
                                </div>
                                <div class="figure hours hours-2">
                                    <span class="top">4</span>
                                    <span class="top-back">
                                        <span>4</span>
                                    </span>
                                    <span class="bottom">4</span>
                                    <span class="bottom-back">
                                        <span>4</span>
                                    </span>
                                </div>
                            </div>
                            <div class="bloc-time min" data-init-value="{{{ 60-date('m',time()) }}}">
                                <div class="figure min min-1">
                                    <span class="top"></span>
                                    <span class="top-back">
                                        <span>0</span>
                                    </span>
                                    <span class="bottom">0</span>
                                    <span class="bottom-back">
                                        <span>0</span>
                                    </span>
                                </div>
                                <div class="figure min min-2">
                                    <span class="top">0</span>
                                    <span class="top-back">
                                        <span>0</span>
                                    </span>
                                    <span class="bottom">0</span>
                                    <span class="bottom-back">
                                        <span>0</span>
                                    </span>
                                </div>
                            </div>
                            <div class="bloc-time sec" data-init-value="{{{ 60-date('s',time()) }}}">
                                <div class="figure sec sec-1">
                                    <span class="top">0</span>
                                    <span class="top-back">
                                        <span>0</span>
                                    </span>
                                    <span class="bottom">0</span>
                                    <span class="bottom-back">
                                        <span>0</span>
                                    </span>
                                </div>
                                <div class="figure sec sec-2">
                                    <span class="top">0</span>
                                    <span class="top-back">
                                        <span>0</span>
                                    </span>
                                    <span class="bottom">0</span>
                                    <span class="bottom-back">
                                        <span>0</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="h-20"></div>
    @endif
    <div class="container-fluid">
        <div class="row product-body">
            <div class="container">
                <div class="col-md-4 col-xs-12 video-details">
                    {{{ $meta['video'] }}}
                    {{{ $partVideoxx }}}
                    <video id="myDiv" controls>
                        <source src="{{{$partVideo or $meta['video']}}}" type="video/mp4"/> 
                     {{--    <source src="{{{ $meta['video']  }}}" type="video/mp4"/>  --}}
                    </video>
                    <div class="video-details-section">
                        @if(count($product->favorite)>0)
                            <a title="Remove from favorites" href="/product/unfav/{{{ $product->id }}}">
                                <span class="playericon mdi mdi-star-off"></span>
                            </a>
                        @else
                            <a title="Add to favorites" href="/product/fav/{{{ $product->id }}}">
                                <span class="playericon mdi mdi-star"></span>
                            </a>
                        @endif
                            <a href="" title="Share">
                                <span class="playericon mdi mdi-share-variant"></span>
                            </a>
                            <a href="javascript:void(0);" class="course-id-s" title="Course Id.">
                                <span class="playericon mdi mdi-library-video"></span>
                                vt-{{{ $product->id or 0 }}}
                            </a>
                            <a class="pull-left views-s" title="Views" href="javascript:void(0)">
                                <span >{{{ $product->view or '0' }}}</span>
                                <span class="playericon mdi mdi-eye"></span>
                            </a>

                            @if(!$buy)

                    
                            <div class="product-price-box">
                                <span class="proicon mdi mdi-wallet"></span>
                                @if(isset($meta['price']) && $product->price != 0)
                                <span  id="buy-price">{{{ currencySign() }}}{{{ price($product->id,$product->category_id,$meta['price'])['price']  }}}</span>
                            @else
                                <span  id="buy-price">{{{ trans('main.free') }}}</span>
                            @endif
                        </div> 
                    
               
                                        
                                        @if($product->price != 0)<a class="btn btn-orange product-btn-buy sbox3" id="buy-btn" data-toggle="modal" data-target="#buyModal" href="">{{{ trans('main.pay') }}}</a>@endif
                                @else
                                        @if($product->price != 0)<a class="btn btn-orange product-btn-buy sbox3" href="javascript:void(0);">{{{ trans('main.purchased_item') }}}</a>@endif
                                @endif


                    </div>
                   

                                


                </div>
                <div id="buyModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">{{{ trans('main.purchase') }}}</h4>
                            </div>
                            <div class="modal-body">
                                <p>{{{ trans('main.select_payment_method') }}}</p>
                                <p>
                                <input type="hidden" id="buy_method" value="download">
                                <div class="radio">
                                    <input type="radio" class="buy-mode" id="mode-1" value="credit" name="buyMode">
                                    &nbsp;
                                    <label class="radio-label" for="mode-1">{{{ trans('main.account_charge') }}}&nbsp;<b id="credit-remain-modal">({{{ currencySign() }}}{{{ $user['credit'] or 0 }}})</b></label>
                                </div>
                                @if(get_option('gateway_paypal') == 1)
                                <div class="radio">
                                    <input type="radio" class="buy-mode" id="mode-2" value="paypal" name="buyMode">
                                    &nbsp;
                                    <label class="radio-label" for="mode-2"> Paypal </label>
                                </div>
                                @endif
                                @if(get_option('gateway_paystack',0) == 1)
                                    <div class="radio">
                                        <input type="radio" class="buy-mode" id="mode-2" value="paystack" name="buyMode">
                                        &nbsp;
                                        <label class="radio-label" for="mode-2"> Paystack </label>
                                    </div>
                                @endif
                                @if(get_option('gateway_paytm') == 1)
                                    <div class="radio">
                                        <input type="radio" class="buy-mode" id="mode-2" value="paytm" name="buyMode">
                                        &nbsp;
                                        <label class="radio-label" for="mode-2"> Paytm </label>
                                    </div>
                                @endif
                                @if(get_option('gateway_payu') == 1)
                                    <div class="radio">
                                        <input type="radio" class="buy-mode" id="mode-2" value="payu" name="buyMode">
                                        &nbsp;
                                        <label class="radio-label" for="mode-2"> Payu </label>
                                    </div>
                                @endif
                                    <div class="radio">
                                        <input type="radio" class="buy-mode" id="mode-6" value="CCVS" name="buyMode">
                                        &nbsp;
                                        <label class="radio-label" for="mode-6"> Credit Card/ Visa </label>
                                    </div>
                                <div class="h-10"></div>
                                <div class="table-responsive table-base-price">
                                    <table class="table table-hover table-factor-modal">
                                        <thead>
                                        <tr>
                                            <th class="text-center">{{{ trans('main.amount') }}}</th>
                                            <th class="text-center">{{{ trans('main.discount') }}}</th>
                                            <th class="text-center">{{{ trans('main.tax') }}}</th>
                                            <th class="text-center">{{{ trans('main.total_amount') }}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="text-center">{{{ $meta['price'] or 0 }}}</td>
                                            @if(isset($meta['price']) && $meta['price']>0 && price($product->id,$product->category->id,$meta['price'])>0)
                                                <td class="text-center">{{{ round((($meta['price']-price($product->id,$product->category->id,$meta['price'])['price'])*100)/$meta['price']) }}}</td>
                                            @endif
                                            <td class="text-center">0</td>
                                            <td class="text-center">{{{ price($product->id,$product->category->id,$meta['price'])['price'] }}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="table-responsive table-post-price table-post-price-s">
                                    <table class="table table-hover table-factor-modal" style="margin-bottom: 0;padding-bottom: 0;">
                                        <thead>
                                        <tr>
                                            <th class="text-center">{{{ trans('main.amount') }}}</th>
                                            <th class="text-center">{{{ trans('main.discount') }}}</th>
                                            <th class="text-center">{{{ trans('main.tax') }}}</th>
                                            <th class="text-center">{{{ trans('main.total_amount') }}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="text-center">{{{ $meta['post_price'] or 0 }}}</td>
                                            @if(isset($meta['post_price']) && $meta['post_price']>0)
                                                <td class="text-center">{{{ round((($meta['post_price']-price($product->id,$product->category->id,$meta['post_price'])['price'])*100)/$meta['post_price']) }}}</td>
                                                <td class="text-center">۰</td>
                                                <td class="text-center">۰</td>
                                                <td class="text-center">{{{ price($product->id,$product->category->id,$meta['post_price'])['price'] }}}</td>
                                            @endif
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                </p>
                            </div>
                            <div class="modal-body">
                                <div id="postAddressText">
                                    @if(isset($user))
                                        <p><b>{{{ trans('main.address') }}}</b>{!!  userAddress($user['id']) !!}</p>
                                    @endif
                                </div>
                                <div id="postAddress">
                                    @if(isset($userMeta))
                                    <form method="post" class="form-horizontal" action="/user/profile/meta/store">
                                        <div class="form-group">
                                            <label class="control-label col-md-1 tab-con">{{{ trans('main.province') }}}</label>
                                            <div class="col-md-5 tab-con">
                                                <input type="text" class="form-control" name="state"/>
                                            </div>
                                            <label class="control-label col-md-1 tab-con">{{{ trans('main.city') }}}</label>
                                            <div class="col-md-5 tab-con">
                                                <input type="text" name="city" value="{{{ $userMeta['city'] or '' }}}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-1 tab-con">{{{ trans('main.address') }}}</label>
                                            <div class="col-md-5 tab-con">
                                                <textarea name="address" rows="4" class="form-control">{{{ $userMeta['address'] or '' }}}</textarea>
                                            </div>
                                            <label class="control-label col-md-1 tab-con">{{{ trans('main.zip_code') }}}</label>
                                            <div class="col-md-5 tab-con">
                                                <input type="text" name="postalcode" value="{{{ $userMeta['postalcode'] or '' }}}" class="form-control text-center">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <input type="submit" name="submit" class="btn btn-orange pull-left" value="Save">
                                            </div>
                                        </div>
                                    </form>
                                    @endif
                                </div>
                                <div id="giftCard">
                                    <form method="post" class="form-horizontal">
                                        <div class="form-group">
                                            <div class="col-md-9 tab-con">
                                                <input type="text" dir="ltr" class="form-control text-center" placeholder="Discount or Gift code" name="gift-card" id="gift-card">
                                            </div>
                                            <div class="col-md-3 tab-con">
                                                <button type="button" name="gift-card-check" id="gift-card-check" class="btn btn-custom pull-left">{{{ trans('main.validate') }}}</button>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12 text-center" id="gift-card-result"></div>
                                        </div>
                                    </form>
                                </div>
                                @if(isset($user))
                                    <div id="modal-user-category">
                                        <span>{{{ trans('main.you_are_in') }}}</span>
                                        <b>{{{ $user['category']['title'] or '' }}}</b>
                                        <span>{{{ trans('main.group_and') }}}</span>
                                        <b>{{{ $user['category']['off'] or 0 }}}٪</b>
                                        <span> {{{ trans('main.extra_discount') }}}</span>
                                    </div>
                                @endif
                            </div>
                            @if(checkSubscribeSell($product))
                                <div class="modal-body">
                                    <h6 style="font-weight:bold;">You Can Subscribe..... Select Items</h6>
                                    <div class="h-10"></div>
                                    @if($product->price_3 > 0)<a href="/product/subscribe/{!! $product->id !!}/3/credit" p-id="{!! $product->id !!}" s-type="3" class="btn-subscribe btn btn-custom">3 month : {!! currencySign() !!}{!! $product->price_3 or '' !!}</a>@endif
                                    @if($product->price_6 > 0)<a href="/product/subscribe/{!! $product->id !!}/6/credit" p-id="{!! $product->id !!}" s-type="6" class="btn-subscribe btn btn-custom">6 month : {!! currencySign() !!}{!! $product->price_6 or '' !!}</a>@endif
                                    @if($product->price_9 > 0)<a href="/product/subscribe/{!! $product->id !!}/9/credit" p-id="{!! $product->id !!}" s-type="9" class="btn-subscribe btn btn-custom">9 month : {!! currencySign() !!}{!! $product->price_9 or '' !!}</a>@endif
                                    @if($product->price_12 > 0)<a href="/product/subscribe/{!! $product->id !!}/12/credit" p-id="{!! $product->id !!}" s-type="12" class="btn-subscribe btn btn-custom">12 month : {!! currencySign() !!}{!! $product->price_12 or '' !!}</a>@endif
                                </div>
                            @endif
                            <div class="modal-footer">
                                <button type="button" class="btn btn-custom pull-left" data-dismiss="modal">{{{ trans('main.cancel') }}}</button>
                                <a href="javascript:void(0);" class="btn btn-custom pull-left" id="buyBtn" >{{{ trans('main.purchase') }}}</a>
                                <a href="javascript:void(0);" class="btn btn-custom pull-right" id="btn-address" onclick="$('#postAddress').slideToggle(200);">{{{ trans('main.change_address') }}}</a>
                                <a href="javascript:void(0);" class="btn btn-custom pull-right" onclick="$('#giftCard').slideToggle(200);">{{{ trans('main.have_giftcard') }}}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-xs-12 course_details">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class=" margin-top-next">
                                <div class="section-1">
                                    <legend>WHAT WILL I LEARN?</legend>
                                    <ul id="wwil">
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="">
                                <div class="section-2">
                                   <legend> Lessons for this course {{-- <p style="display:inline; font-size:14px">17 Lessons 23:47:22 Hours</p> --}}</legend>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel-group" id="accordionx">

                                {{-- <div class="panel panel-default">
                                  <div class="panel-heading">
                                    <h4 class="panel-title">
                                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                      Collapsible Group 1</a>
                                    </h4>
                                  </div>
                                  <div id="collapse1" class="panel-collapse collapse in">
                                    <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                    minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                    commodo consequat.</div>
                                  </div>
                                </div>

                                <div class="panel panel-default">
                                  <div class="panel-heading">
                                    <h4 class="panel-title">
                                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                      Collapsible Group 2</a>
                                    </h4>
                                  </div>
                                  <div id="collapse2" class="panel-collapse collapse">
                                    <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                    minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                    commodo consequat.</div>
                                  </div>
                                </div>

                                <div class="panel panel-default">
                                  <div class="panel-heading">
                                    <h4 class="panel-title">
                                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                                      Collapsible Group 3</a>
                                    </h4>
                                  </div>
                                  <div id="collapse3" class="panel-collapse collapse">
                                    <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                    minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                    commodo consequat.</div>
                                  </div>
                                </div> --}}

                              </div> 
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="">
                                <div class=" section-4">
                                    <p class="section-4-header">Requirements</p>
                
                                    <ul id="req">
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="">
                                <div class=" section-5">
                                    <p class="section-5-header">Description</p>
                                    {!! $product->courseDescription !!}
                                    {{-- <p><strong>Do you want to supercharge your HTML, CSS & PHP knowledge and learn how to turn them into
                                            a
                                            real business that can make you more money as a freelancer?</strong></p>
                
                                    <p>Whether you're a freelance designer, entrepreneur, employee for a company, code hobbyist, or
                                        looking for a new career — this course gives you an immensely valuable skill that will enable
                                        you to either:</p>
                
                                    <p><strong>
                                            Make money on the side
                                        </strong>
                                    </p>
                
                                    <p>
                                        So you can save up for that Hawaiian vacation you've been wanting, help pay off your debt, your
                                        car, your mortgage, or simply just to have bonus cash laying around.
                                    </p>
                
                                    <p><strong>
                                            Create a full-time income
                                        </strong>
                                    </p>
                
                                    <p>
                                        WordPress developers have options. Many developers make a generous living off of creating custom
                                        WordPress themes and selling them on websites like ThemeForest. Freelance designers and
                                        developers can also take on WordPress projects and make an extra $1,000 - $5,000+ per month.
                                    </p> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6 offset-lg-1 section-2">
                                    Curriculum for this course <p style="display:inline; font-size:14px">17 Lessons 23:47:22 Hours</p>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6 offset-lg-1 section-3">
                                    <div class="header-custom-border">
                                        <a class="btn" data-toggle="collapse" data-target="#demo"
                                            style="display:inline; font-size:15px"><i class="fas fa-plus"
                                                style="color: #007791"></i>&nbsp;&nbsp;Getting Started With This
                                        </a>
                                    </div>
                                    <div id="demo" class="collapse">
                                        <div class="list-custom-border"><i class="fas fa-play-circle"></i>Code The Basic Webpage Layout
                                        </div>
                                        <div class="list-custom-border"><i class="fas fa-play-circle"></i>Setting Up Your Project
                                            Environment</div>
                                        <div class="list-custom-border"><i class="fas fa-play-circle"></i>Code The Basic Webpage Layout
                                        </div>
                                        <div class="list-custom-border"><i class="fas fa-play-circle"></i>HTML 5</div>
                                        <div class="list-custom-border"><i class="fas fa-play-circle"></i>Welcome To The Course! You
                                            Made The Right Decision</div>
                                        <div class="list-custom-border"><i class="fas fa-play-circle"></i>What is Bootstrap? And Why
                                            Mastering It Will Save You Hundreds of Hours</div>
                                    </div>
                                </div>
                
                                <div class="col-lg-6 offset-lg-1 section-3">
                                    <div class="header-custom-border">
                                        <a class="btn" data-toggle="collapse" data-target="#demo1"
                                            style="display:inline; font-size:15px"><i class="fas fa-plus"
                                                style="color: #007791"></i>&nbsp;&nbsp;Environment Setup: Get Your Project Started
                                        </a>
                                    </div>
                                    <div id="demo1" class="collapse">
                                        <div class="list-custom-border"><i class="fas fa-play-circle"></i>Free Download: The Bootstrap
                                            Framework
                                        </div>
                                        <div class="list-custom-border"><i class="fas fa-play-circle"></i>Bootstrap Pop Quiz
                                            Environment</div>
                                        <div class="list-custom-border"><i class="fas fa-play-circle"></i>WordPress Pop Quiz
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    {{-- <div class="product-details-box">
                        <span class="proicon mdi mdi-apps"></span><span class="pn-category">{{{ $product->category->title or '' }}}</span>
                    </div>
                    @if(isset($meta['duration']))
                    <div class="product-details-box">
                        <span class="proicon mdi mdi-alarm"></span><span>{{{ convertToHoursMins($meta['duration'],'%01d hour %02d min') }}}</span>
                    </div>
                    @endif
                    <div class="product-details-box">
                        <span class="proicon mdi mdi-calendar-month"></span><span>{{{ date('d F Y',$product->create_at) }}}</span>
                    </div>
                    <div class="product-details-box">
                        <span class="proicon mdi mdi-database"></span><span>
                            @php $MB = 0; @endphp
                            @foreach($parts as $part)
                                @php $MB = $MB + $part['size']; @endphp
                            @endforeach
                            {{{ $MB or '0' }}}
                            {{{ trans('main.mb') }}}
                        </span>
                    </div>
                    <div class="product-details-box">
						<span class="proicon mdi mdi-headset"></span>
                        <span>
                            @if($product->support == 1)
                                {{{ 'Vendor supports this course' }}}
                            @else
                                {{{ 'Vendor doesnt support this course' }}}
                            @endif
                        </span>
                    </div>  @if(isset($meta['price']) && $product->price != 0)
                            <span  id="buy-price">{{{ currencySign() }}}{{{ price($product->id,$product->category_id,$meta['price'])['price']  }}}</span>
                        @else
                            <span  id="buy-price">{{{ trans('main.free') }}}</span>
                        @endif
                    </div>
                    <div class="h-10"></div>
                    <div class="product-buy-selection">
                        <form>
                            @if(isset($user) && $product->user_id == $user['id'])
                                <a class="btn btn-orange product-btn-buy sbox3" id="buy-btn" href="/user/content/edit/{{{ $product->id or 0 }}}">{{{ trans('main.edit_course') }}}</a>
                                <a class="btn btn-blue product-btn-buy sbox3" id="buy-btn" href="/user/content/part/list/{{{ $product->id or 0 }}}">{{{ trans('main.add_video') }}}</a>
                            @else
                            @if(!$buy)
                                    @if($product->price != 0)
                                        <div class="radio">
                                            <input type="radio" id="radio-2" name="buy_mode" data-mode="download" value="{{{ price($product->id,$product->category_id,$meta['price'])['price'] }}}" checked>
                                            <label class="radio-label" for="radio-2">{{{ trans('main.purchase_download') }}}</label>
                                        </div>
                                    @endif
                                @if($product->post == 1 && userMeta($product->user_id,'trip_mode') == 0)
                                    @if($product->price != 0)
                                        <div class="radio">
                                            <input type="radio" id="radio-1" data-mode="post" value="{{{ price($product->id,$product->category_id,$meta['post_price'])['price'] }}}" name="buy_mode">
                                            <label class="radio-label" for="radio-1">{{{ trans('main.postal_purchase') }}}</label>
                                        </div>
                                    @endif
                                @endif

                                @if($product->price != 0)<a class="btn btn-orange product-btn-buy sbox3" id="buy-btn" data-toggle="modal" data-target="#buyModal" href="">{{{ trans('main.pay') }}}</a>@endif
                            @else
                                @if($product->price != 0)<a class="btn btn-orange product-btn-buy sbox3" href="javascript:void(0);">{{{ trans('main.purchased_item') }}}</a>@endif
                            @endif
                            @endif

                        </form>
                    </div>
                    <div class="h-10 visible-xs"></div>
                    @if(userMeta($product->user_id,'trip_mode') == 1 && userMeta($product->user_id,'trip_mode_date')>0)
                    <div class="h-20"></div>
                    <div class="trip_mode_alert">
                        <span class="mdi mdi-shield-airplane"></span>
                            <span> {{{ trans('main.vendor_vac') }}}
                             {{{ date('Y-m-d', userMeta($product->user_id,'trip_mode_date')) }}}
                             {{{ trans('main.vendor_vac_2') }}} </span>
                    </div>
                    @endif 
                    <div class="product-price-box">
						<span class="proicon mdi mdi-wallet"></span>
                      
                </div>   --}}
            </div>
        </div>
    </div>
    <div class="h-20"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="container">
                <div class="col-md-4 col-xs-12 course_details">
					<div class="col-md-12">
                    <div class="product-user-box">
                        <?php $userM = arrayToList($product->user->usermetas,'option','value'); ?>
                        <img class="img-box" src="{{{ $userM['avatar'] or get_option('default_user_avatar','') }}}" class="img-responsive"/>
                        	<h3>
							<a href="/profile/{{{ $product->user->id or '' }}}"><span>{{{ $product->user->name or '' }}}</span></a>
							</h3>
                        <div class="user-description-box">
                            {{{ $userM['short_biography'] or '' }}}
                        </div>
                        <div class="text-center">
                            @foreach(getRateById($product->user->id) as $rate)
                                <img class="img-icon img-icon-s" src="{{{ $rate['image'] or '' }}}" title="{{{ $rate['description'] or '' }}} ({{{ $rate['title'] or '' }}})"/>
                            @endforeach
                        </div>
                    </div>
                    <div class="product-user-box-footer">
                        <a href="/profile/{{{ $product->user->id or '' }}}">{{{ trans('main.vendor_profile') }}}</a>
                    </div>
					</div>
                    <div class="h-25"></div>
                    <div class="row">
                        @if(isset($ads))
                            @foreach($ads as $ad)
                                @if($ad->position == 'product-page')
                                    <a href="{{{ $ad->url or '#' }}}"><img src="{{{ $ad->image or '' }}}" class="{{{ $ad->size or '' }}}" id="ppage-s"></a>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-md-8 col-xs-12 product-part-container">
                    <div class="user-tabs">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="active"><a href="#tab1" role="tab" data-toggle="tab">{{{ trans('main.course_content') }}}</a></li>
                            <li><a href="#tab2" role="tab" data-toggle="tab">{{{ trans('main.details') }}}</a></li>
                            <li><a href="#tab3" role="tab" data-toggle="tab">{{{ trans('main.prerequisites') }}}</a></li>
                        </ul>
                        <!-- TAB CONTENT -->
                        <div class="tab-content">
                            <div class="active tab-pane fade in" id="tab1">
                                <ul class="part-ul">

                                    @foreach($parts as $part)
                                        <li>
                                            <div class="part-links">
                                                <a href="/product/part/{{{ $product->id or 0 }}}/{{{ $part['id'] }}}">
                                                    <div class="col-md-1 hidden-xs tab-con">
                                                        @if($buy || $part['free'] == 1)
                                                            <span class="playicon mdi mdi-play-circle"></span>
                                                        @else
                                                            <span class="playicon mdi mdi-lock"></span>
                                                        @endif
                                                    </div>
                                                    <div class="@if($product->download == 1) col-md-4 @else col-md-5 @endif col-xs-10 tab-con">
                                                        <label>{{{ $part['title'] or '' }}}</label>
                                                    </div>
                                                </a>
                                        <div class="col-md-2 tab-con">
                                            <span class="btn btn-gray btn-description hidden-xs" data-toggle="modal" href="#description-{{{ $part['id'] or 0 }}}">{{{ trans('main.description') }}}</span>
                                            <div class="modal fade" id="description-{{{ $part['id'] or 0 }}}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close"
                                                                    data-dismiss="modal" aria-hidden="true">
                                                                &times;
                                                            </button>
                                                            <h4 class="modal-title">{{{ trans('main.description') }}}</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            {!! $part['description'] or '' !!}
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-custom pull-left" data-dismiss="modal">{{{ trans('main.close') }}}</button>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->
                                        </div>
                                        <div class="col-md-2 text-center hidden-xs tab-con">
                                            <span>{{{ $part['size'] or '0' }}} {{{ trans('main.mb') }}}</span>
                                        </div>
                                        <div class="col-md-2 hidden-xs tab-con">
                                            <span>{{{ $part['duration'] or 0 }}} {{{ trans('main.minute') }}}</span>
                                        </div>
                                        @if($product->download == 1)
                                            <div class="col-md-1 col-xs-2 tab-con">
                                                <span class="download-part" data-href="/video/download/{{{ $part['id'] or '0' }}}"><span class="mdi mdi-arrow-down-bold"></span></span>
                                            </div>
                                        @endif
                                        </div>
                                        </li>
                                    @endforeach
                                    @if(isset($meta['document']) && $meta['document']!='')
                                        <li class="document">
                                            <div class="col-md-1">
                                                <span class="clip"></span>
                                            </div>
                                            <div class="col-md-10 text-left" style="text-align: left;">
                                                <label>{{{ trans('main.documents') }}}</label>
                                            </div>
                                            <div class="col-md-1 text-center">
                                                <span class="download-part" data-href="{{{ $meta['document'] or '' }}}"><span class="mdi mdi-arrow-down-bold"></span></span>
                                            </div>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                            <div class="tab-pane fade" id="tab2">
                                vcbvcbcb
                                <span>{!! $product->content or '' !!}</span>
                            </div>
                            <div class="tab-pane fade in tab-body" id="tab3">
                                @foreach($precourse as $pc)
                                    <?php $pmeta = arrayToList($pc->metas,'option','value'); ?>
                                    <div class="col-md-4 col-xs-12 tab-con">
                                        <a href="/product/{{{ $pc->id or '' }}}" title="{{{ $pc->title or '' }}}" class="content-box content-box-r">
											<img src="{{{ $pmeta['thumbnail'] or '' }}}"/>
                                            <h3>{!! str_limit($pc->title,25,'...') !!}</h3>
                                            <div class="footer">
												<span class="boxicon mdi mdi-wallet pull-left"></span>
                                                <label class="pull-left">{{{ currencySign() }}}{{{ price($pc->id,$pc->category_id,$pmeta['price'])['price'] }}}</label>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="h-20"></div>
                    <div class="user-tabs">
                        <ul class="nav nav-tabs back-blue" role="tablist">
                            <li class="active"><a href="#vtab1" role="tab" data-toggle="tab">{{{ trans('main.similar_courses') }}}</a></li>
                            <li><a href="#vtab2" role="tab" data-toggle="tab">{{{ trans('main.vendor_courses') }}}</a></li>
                        </ul>
                        <!-- TAB CONTENT -->
                        <div class="tab-content">
                            <div class="active tab-pane fade in tab-body" id="vtab1">
                                @foreach($related as $rel)
                                    <?php $rmeta = arrayToList($rel->metas,'option','value'); ?>
                                    <div class="col-md-4 col-xs-12 tab-con">
                                        <a href="/product/{{{ $rel->id or '' }}}" title="{{{ $rel->title or '' }}}" class="content-box content-box-r">
                                            <img src="{{{ $rmeta['thumbnail'] or '' }}}"/>
											<h3>{!! str_limit($rel->title,25,'...') !!}</h3>
                                            <div class="footer">
												<span class="boxicon mdi mdi-wallet pull-left"></span>
                                                <label class="pull-left">{{{ currencySign() }}}{{{ price($rel->id,$rel->category_id,$rmeta['price'])['price'] }}}</label>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <div class="tab-pane fade tab-body" id="vtab2">
                                @foreach($product->user->contents as $puc)
                                    @if($puc->id != $product->id)
                                    <?php $umeta = arrayToList($puc->metas,'option','value'); ?>
                                    <div class="col-md-4 col-xs-12 tab-con">
                                        <a href="/product/{{{ $puc->id or '' }}}" title="{{{ $puc->title or '' }}}" class="content-box content-box-r">
                                            <img src="{{{ $umeta['thumbnail'] or '' }}}"/>
											<h3>{!! str_limit($puc->title,25,'...') !!}</h3>
                                            <div class="footer">
												<span class="boxicon mdi mdi-wallet pull-left"></span>
                                                <label class="pull-left">{{{ currencySign() }}}{{{ price($puc->id,$puc->category_id,$umeta['price'])['price'] }}}</label>
                                            </div>
                                        </a>
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="h-20" id="blog-comment-scroll"></div>
                    <div class="user-tabs">
                        <ul class="nav nav-tabs back-green" role="tablist">
                            <li class="active"><a href="#ctab1" role="tab" data-toggle="tab">{{{ trans('main.comments') }}}&nbsp;({{{ $product->comments_count or 0 }}})</a></li>
                            @if($product->support == 1)
                            @if($product->supports->sum('rate')!=null && $product->supports->sum('rate')>0 && $product->supports!=null && count($product->supports)>0)
                                <li><a href="#ctab2" role="tab" data-toggle="tab">Support &nbsp;(Rating: {{{ $product->support_rate or 0 }}})</a></li>
                            @else
                                <li><a href="#ctab2" role="tab" data-toggle="tab">{{{ trans('main.support') }}}</a></li>
                            @endif
                            @endif
                        </ul>
                        <!-- TAB CONTENT -->
                        <div class="tab-content">
                            <div class="active tab-pane fade in blog-comment-section body-target-s" id="ctab1">
                                @if(isset($user))
                                    <form method="post" action="/product/comment/store/{{{ $product->id or 0 }}}">

                                    <input type="hidden" name="content_id" value="{{{ $product->id }}}"/>
                                    <input type="hidden" name="parent" value="0" />
                                    <div class="form-group">
                                        <label>{{{ trans('main.your_comment') }}}</label>
                                        <textarea class="form-control" name="comment" rows="4" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-custom" value="Send">
                                    </div>
                                </form>
                                @else
                                    <div class="col-xs-12 text-center support-lock support-lock-s">
                                        <span>{{{ trans('main.login_to_comment') }}}</span>
                                        <br>
                                        <span class="mdi mdi-lock"></span>
                                    </div>
                                @endif
                                <ul class="comment-box support-list1">
                                    @foreach($product->comments as $comment)
                                        @if($comment->parent == 0)
                                            <?php $usermeta = arrayToList($comment->user->usermetas,'option','value'); ?>
                                            <li class="user-metas">
                                                <img src="{{{ $usermeta['avatar'] or '/assets/images/user.png' }}}" alt=""/>
                                                <a href="/profile/{{{ $comment->user_id or '' }}}">{{{ $comment->name or '' }}} @if($comment->user->buys_count>0) <b class="green-s">({{{ trans('main.student') }}})</b> @elseif($comment->user->contents_count>0) <b class="blue-s">({{{ trans('main.vendor') }}})</b> @else  <b class="gray-s">({{{ trans('main.user') }}})</b> @endif</a>
                                                <label class="pull-left">{{{ date('d F Y | H:i',$comment->create_at) }}}</label>
                                                <span>{!! $comment->comment or '' !!}</span>
                                                @if($buy || (isset($user) && $product->user_id == $user['id']))<span><a href="javascript:void(0);" answer-id="{{{ $comment->id }}}" answer-title="{{{ $comment->name or '' }}}" class="pull-left answer-btn">{{{ trans('main.reply') }}}</a> </span>@endif
                                            </li>
                                                @if(count($comment->childs)>0)
                                                    <ul class="col-md-11 col-md-offset-1 answer-comment">
                                                        @foreach($comment->childs as $child)
                                                            <?php $cusermeta = arrayToList($child->user->usermetas,'option','value'); ?>
                                                            <li>
                                                                <img src="{{{ $cusermeta['avatar'] or '/assets/images/user.png' }}}" alt=""/>
                                                                <a href="/profile/{{{ $child->user_id or '' }}}">{{{ $child->name or '' }}} @if($child->user->buys_count>0) <b class="green-s">({{{ trans('main.customer') }}})</b> @elseif($child->user->contents_count>0) <b class="blue-s">({{{ trans('main.vendor') }}})</b> @else <b class="gray-s">({{{ trans('main.user') }}})</b> @endif</a>
                                                                <label class="pull-left">{{{ date('d F Y | H:i',$child->create_at) }}}</label>
                                                                <span>{!! $child->comment or '' !!}</span>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                        @endif
                                    @endforeach
                                    @if(count($product->comments)>4)
                                        <span class="btn btn-custom pull-left" id="loadMore1">{{{ trans('main.load_more') }}}</span>
                                    @endif
                                </ul>
                            </div>
                            @if($product->support == 1)
                                <div class="tab-pane fade blog-comment-section body-target-s" id="ctab2">
                                @if($buy || $product->price == 0)
                                    <form method="post" action="/product/support/store">
                                        <input type="hidden" name="content_id" value="{{{ $product->id }}}"/>
                                        <div class="form-group">
                                            <label>{{{ trans('main.private_conversation') }}}</label>
                                            <textarea class="form-control" name="comment" rows="4" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-custom" value="Send">
                                        </div>
                                    </form>
                                    @elseif(isset($user) && $product->user_id == $user['id'])
                                        <div class="col-xs-12 text-center support-lock">
                                            <span>{{{ trans('main.support_address') }}}</span>
                                            <a href="/user/ticket/support?openid={{{ $product->id or 0 }}}">{{{ trans('main.panel_support') }}}</a>
                                            <span>{{{ trans('main.support_students') }}}</span>
                                            <br>
                                            <span class="mdi mdi-lock"></span
                                        </div>
                                    @else
                                        <div class="col-xs-12 text-center support-lock">
                                            <span>{{{ trans('main.support_only_students') }}}</span>
                                            <br>
                                            <span class="mdi mdi-lock"></span>
                                        </div>
                                @endif
                                <ul class="comment-box support-list">
                                    @foreach($product->supports as $support)
                                        @if(isset($user) && $support->sender_id == $user['id'])
                                            @if($support->supporter_id != $support->user_id)
                                                <?php $senderMeta = arrayToList($support->sender->usermetas,'option','value'); ?>
                                                <li class="user-metas">
                                                    <img src="{{{ $senderMeta['avatar'] or '/assets/images/user.png' }}}" alt=""/>
                                                    <a href="/profile/{{{ $support->user_id or '' }}}">{{{ $support->name or '' }}}</a>
                                                    <label class="pull-left">
                                                        {{{ date('d F Y | H:i',$support->create_at) }}}
                                                    </label>
                                                    <span>{!! $support->comment or '' !!}</span>
                                                </li>
                                            @else
                                                <?php $senderMeta = arrayToList($support->supporter->usermetas,'option','value'); ?>
                                                <li class="user-metas">
                                                    <img src="{{{ $senderMeta['avatar'] or '/assets/images/user.png' }}}" alt=""/>
                                                    <a href="/profile/{{{ $support->user_id or '' }}}">{{{ $support->name or '' }}}</a>
                                                    <label class="pull-left text-center">
                                                        {{{ date('d F Y | H:i',$support->create_at) }}}
                                                        <br>
                                                        <div class="userraty urating" data-score="{{{ $support->rate or 0 }}}" data-id="{{{ $support->id or 0 }}}"></div>
                                                    </label>
                                                    <span>{!! $support->comment or '' !!}</span>
                                                </li>
                                            @endif
                                        @endif
                                    @endforeach
                                    @if($buy && count($product->supports)>4)
                                        <span class="btn btn-custom pull-left" id="loadMore">{{{ trans('main.load_more') }}}</span>
                                    @endif
                                </ul>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="h-30"></div>

@endsection
@section('script')
    <script type="application/javascript" src="/assets/view/fluid-player-master/fluidplayer.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {    
            $.ajax({
                url: "{{url('/cl')}}/"+"{{ Request::route('id') }}",
                type: 'get',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'JSON',
                success: function(data) {
                    for (let index = 0; index < data.data.length; index++) {
                        $("#wwil").append(
                            '<li>'   + 
                                data.data[index].desc+
                            '</li>'
                        )
                        
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error get data from ajax');
                }
            });

            $.ajax({
                url: "{{url('/cp')}}/"+"{{ Request::route('id') }}",
                type: 'get',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'JSON',
                success: function(data) {
                    for (let index = 0; index < data.data.length; index++) {
                        if(index==0){
                            $("#accordionx").append(
                                '<div class="panel panel-default">'+
                                    '<div class="panel-heading">'+
                                        '<h4 class="panel-title">'+
                                        '<a data-toggle="collapse" data-parent="#accordionx" href="#collapse'+index+'">  '+data.data[index].title+'</a> </h4>'+
                                    '</div>'+
                                    '<div id="collapse'+index+'" class="panel-collapse collapse in">'+
                                        '<div class="panel-body">'+
                                            data.data[index].desc+
                                        '</div>'+
                                    '</div>'+
                                '</div>'
                            )
                        }else{
                            $("#accordionx").append(
                                '<div class="panel panel-default">'+
                                    '<div class="panel-heading">'+
                                        '<h4 class="panel-title">'+
                                        '<a data-toggle="collapse" data-parent="#accordionx" href="#collapse'+index+'">  '+data.data[index].title+'</a> </h4>'+
                                    '</div>'+
                                    '<div id="collapse'+index+'" class="panel-collapse collapse">'+
                                        '<div class="panel-body">'+
                                            data.data[index].desc+
                                        '</div>'+
                                    '</div>'+
                                '</div>'
                            )
                        }
                        
                        
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error get data from ajax');
                }
            });

            $.ajax({
                url: "{{url('/cr')}}/"+"{{ Request::route('id') }}",
                type: 'get',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'JSON',
                success: function(data) {
                    for (let index = 0; index < data.data.length; index++) {
                        $("#req").append(
                            '<li>'+
                                data.data[index].req+
                            '</li>'
                        )
                        
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error get data from ajax');
                }
            });
            
            

       });  
    </script>

    <script>
        $(function () {
            fluidPlayer("myDiv",{
                layoutControls: {
                    posterImage: '{!! $meta['cover'] or '' !!}',
                    logo: {
                        imageUrl: '{!! get_option('video_watermark','') !!}', // Default null
                        position: 'top right', // Default 'top left'
                        clickUrl: '{!! url('/') !!}', // Default null
                        opacity: 0.9, // Default 1
                        imageMargin: '10px', // Default '2px'
                        hideWithControls: true, // Default false
                        showOverAds: 'true' // Default false
                    }
                },
                @if(get_option('site_videoads',0) == 1)
                vastOptions: {
                    vastTimeout: {!! get_option('site_videoads_time',5) * 1000 !!},
                    adList: [
                        {
                            roll: '{!! get_option('site_videoads_roll_type','preRoll') !!}',
                            vastTag: '{!! get_option('site_videoads_source') !!}',
                            adText: '{!! get_option('site_videoads_title') !!}',
                        }
                ]}
                @endif
            });
        });
    </script>
    <script>
        $('.raty').raty({ starType: 'i',score:<?php if($product->rates->avg('rate')) echo $product->rates->avg('rate'); else echo 0;  ?>,click:function (rate) {
            window.location = window.location.href+'/rate/'+rate;
        }});
    </script>
    <script>
        $(document).ready(function () {
            $('.answer-btn').click(function () {
                var parent = $(this).attr('answer-id');
                var title = $(this).attr('answer-title');
                $('input[name="parent"]').val(parent);
                scrollToAnchor('.back-green');
                $('textarea').attr('placeholder',' Replied to '+title);
            });
        });
    </script>
    <script>
        $(document).ready(function () {
           $('.download-part').click(function (e) {
               e.preventDefault();
               window.location = $(this).attr('data-href');
           })
        });
    </script>
    <script>
        $(document).ready(function () {
            $('input[type=radio][name=buy_mode]').change(function () {
                $('#buy-price').html($(this).val()+' $ ');
                $('.pn').persiaNumber('ar');
                $('#buy_method').val($(this).attr('data-mode'));
                $('input[type=radio][name=buyMode]').removeAttr('selected');
                $('#buyBtn').attr('href','#');
                if($(this).attr('data-mode') == 'post'){
                    $('.table-base-price').hide();
                    $('.table-post-price').show();
                }else{
                    $('.table-base-price').show();
                    $('.table-post-price').hide();
                }
            })
        });
    </script>
    <script>
        $(document).ready(function () {
            $('input[type=radio][name=buyMode]').change(function () {
                var buyLink = '/bank/'+ $(this).val() +'/pay/{{{ $product->id }}}/'+$('#buy_method').val();
                $('#buyBtn').attr('href',buyLink);
            })
        });
    </script>
    <script>
        $('.userraty').raty({
            starType: 'i',
            score: function () {
                return $(this).attr('data-score');
            },
            click:function (rate) {
                var id = $(this).attr('data-id');
                $.get('/product/support/rate/'+ id +'/' + rate,function (data) {
                    if(data == 0){
                        $.notify({
                            message: 'Sorry rating not submited.'
                        },{
                            type: 'danger',
                            allow_dismiss: false,
                            z_index: '99999999',
                            placement: {
                                from: "bottom",
                                align: "right"
                            },
                            position:'fixed'
                        });
                    }
                    if(data == 1){
                        $.notify({
                            message: 'Rating Submited.'
                        },{
                            type: 'danger',
                            allow_dismiss: false,
                            z_index: '99999999',
                            placement: {
                                from: "bottom",
                                align: "right"
                            },
                            position:'fixed'
                        });
                    }
                })
            }
        });
    </script>
    <script>
        $(document).ready(function () {
            size_li = $(".support-list li").size();
            x=5;
            $('.support-list li:lt('+x+')').show();
            $('#loadMore').click(function () {
                x= (x+5 <= size_li) ? x+5 : size_li;
                $('.support-list li:lt('+x+')').show();
                $('#showLess').show();
                if(x == size_li){
                    $('#loadMore').hide();
                }
            });
            $('#showLess').click(function () {
                x=(x-5<0) ? 3 : x-5;
                $('.support-list li').not(':lt('+x+')').hide();
                $('#loadMore').show();
                $('#showLess').show();
                if(x == 3){
                    $('#showLess').hide();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            size_li = $(".support-list1 li").size();
            x=5;
            $('.support-list1 li:lt('+x+')').show();
            $('#loadMore1').click(function () {
                x= (x+5 <= size_li) ? x+5 : size_li;
                $('.support-list1 li:lt('+x+')').show();
                $('#showLess1').show();
                if(x == size_li){
                    $('#loadMore1').hide();
                }
            });
            $('#showLess1').click(function () {
                x=(x-5<0) ? 3 : x-5;
                $('.support-list1 li').not(':lt('+x+')').hide();
                $('#loadMore1').show();
                $('#showLess1').show();
                if(x == 3){
                    $('#showLess1').hide();
                }
            });
        });
    </script>
    <script>
        $('#buy-btn').click(function () {
            if($('input[name="buy_mode"]:checked').attr('data-mode') == 'download') {
                $('#btn-address').hide();
                $('#postAddress').slideUp();
                $('#postAddressText').slideUp();

            } else {
                $('#btn-address').show();
                $('#postAddressText').show();
            }
        })
    </script>
    <script>
        $('#gift-card-check').click(function () {
            var code = $('#gift-card').val();
            if(code == ''){
                $.notify({
                    message: 'Please fillout all inputs.'
                },{
                    type: 'danger',
                    allow_dismiss: false,
                    z_index: '99999999',
                    placement: {
                        from: "bottom",
                        align: "right"
                    },
                    position:'fixed'
                });
            }else{
            $('#gift-card-result').html('<div class="loader"></div> Please wait...');
            $.get('/gift/'+code,function (data) {
                if(data == 0){
                    $('#gift-card-result').html('<b class="red-r">Sorry code is invalid.</b>');
                }else{
                    if(data.type == 'gift')
                        $('#gift-card-result').html('<b class="green-s"> Congratulations! {!! currencySign() !!}'+ data.off +' Discount applied successfully!</b>');
                    if(data.type == 'off')
                        $('#gift-card-result').html('<b class="green-s"> Congratulations! %'+ data.off +' Discount applied successfully!</b>');
                }
            })
        }});
    </script>
    <script>
        $('.buy-mode').on('change', function () {
            if($(this).is(':checked')){
                let buyMode = $(this).val();
                $('.btn-subscribe').each(function () {
                    let url = '/product/subscribe/' + $(this).attr('p-id') + '/' + $(this).attr('s-type') + '/' + buyMode;
                    $(this).attr('href',url);
                });
            }
        });
    </script>
    @if($buy && isset($user))
        <script>
            usage({!! $product->id !!},{!! $user['id'] !!});
        </script>
    @endif
    @if($product->discount != null || $product->category->discount != null)
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
        <script>
            var Countdown = {
                $el: $('.countdown'),
                countdown_interval: null,
                total_seconds     : 18000,
                init: function() {
                    this.$ = {
                        hours  : this.$el.find('.bloc-time.hours .figure'),
                        minutes: this.$el.find('.bloc-time.min .figure'),
                        seconds: this.$el.find('.bloc-time.sec .figure')
                    };
                    this.values = {
                        hours  : this.$.hours.parent().attr('data-init-value'),
                        minutes: this.$.minutes.parent().attr('data-init-value'),
                        seconds: this.$.seconds.parent().attr('data-init-value'),
                    };
                    this.total_seconds = this.values.hours * 60 * 60 + (this.values.minutes * 60) + this.values.seconds;
                    this.count();
                },
                count: function() {
                    var that    = this,
                        $hour_1 = this.$.hours.eq(0),
                        $hour_2 = this.$.hours.eq(1),
                        $min_1  = this.$.minutes.eq(0),
                        $min_2  = this.$.minutes.eq(1),
                        $sec_1  = this.$.seconds.eq(0),
                        $sec_2  = this.$.seconds.eq(1);
                    this.countdown_interval = setInterval(function() {
                        if(that.total_seconds > 0) {
                            --that.values.seconds;
                            if(that.values.minutes >= 0 && that.values.seconds < 0) {
                                that.values.seconds = 59;
                                --that.values.minutes;
                            }
                            if(that.values.hours >= 0 && that.values.minutes < 0) {
                                that.values.minutes = 59;
                                --that.values.hours;
                            }
                            that.checkHour(that.values.hours, $hour_1, $hour_2);
                            that.checkHour(that.values.minutes, $min_1, $min_2);
                            that.checkHour(that.values.seconds, $sec_1, $sec_2);
                            --that.total_seconds;
                        }
                        else {
                            clearInterval(that.countdown_interval);
                        }
                    }, 1000);
                },
                animateFigure: function($el, value) {
                    var that         = this,
                        $top         = $el.find('.top'),
                        $bottom      = $el.find('.bottom'),
                        $back_top    = $el.find('.top-back'),
                        $back_bottom = $el.find('.bottom-back');
                    $back_top.find('span').html(value);
                    $back_bottom.find('span').html(value);
                    TweenMax.to($top, 0.8, {
                        rotationX           : '-180deg',
                        transformPerspective: 300,
                        ease                : Quart.easeOut,
                        onComplete          : function() {
                            $top.html(value);
                            $bottom.html(value);
                            TweenMax.set($top, { rotationX: 0 });
                        }
                    });
                    TweenMax.to($back_top, 0.8, {
                        rotationX           : 0,
                        transformPerspective: 300,
                        ease                : Quart.easeOut,
                        clearProps          : 'all'
                    });
                },
                checkHour: function(value, $el_1, $el_2) {
                    var val_1       = value.toString().charAt(0),
                        val_2       = value.toString().charAt(1),
                        fig_1_value = $el_1.find('.top').html(),
                        fig_2_value = $el_2.find('.top').html();

                    if(value >= 10) {
                        if(fig_1_value !== val_1) this.animateFigure($el_1, val_1);
                        if(fig_2_value !== val_2) this.animateFigure($el_2, val_2);
                    }
                    else {
                        if(fig_1_value !== '0') this.animateFigure($el_1, 0);
                        if(fig_2_value !== val_1) this.animateFigure($el_2, val_1);
                    }
                }
            };
            Countdown.init();
        </script>
    @endif
@endsection
