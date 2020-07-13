@extends('admin.newlayout.layout',['breadcom'=>['Report','Users']])
@section('title')
Dashboard
@endsection

@section('style')
<link rel='stylesheet' href="{{ asset('assets/_plugins/jkanban.css') }}">

@endsection

@section('page')
<style>
    .ucp-menu-item .item-box {
    background: #ffffff;
    border-radius: 4px;
    height: auto;
    overflow: hidden;
    display: block;
    padding: 15px;
    position: relative;
    -webkit-transition: all 0.25s ease-in-out;
    transition: all 0.25s ease-in-out;
    text-decoration: none;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}
.sbox3 {
    box-shadow: 0 1px 5px rgba(0, 0, 0, 0.15);
}
.ucp-menu-item .item-box:hover {
    box-shadow: 0 0 0 4px #343871;
    background-color: #343871;
}
.ucp-menu-item .item-box:hover {
    font-size: 1em;
    border: none;
    transition: 0.3s;
    box-shadow: 0 0 0 4px #ffab00;
}
.ucp-menu-item .item-box:hover {
    opacity: 1;
    font-weight: bold;
    font-size: 1.3em;
    border: 3px solid #ffaf0b;
    transition: all 0.4s;
    background: #ffffff;
        background-color: rgb(255, 255, 255);
}
.ucp-menu-item .item-box {
    background: #ffffff;
    border-radius: 4px;
    height: auto;
    overflow: hidden;
    display: block;
    padding: 15px;
    position: relative;
    -webkit-transition: all 0.25s ease-in-out;
    transition: all 0.25s ease-in-out;
    text-decoration: none;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}
.container {
    border-radius: 5px;
}
.container-fluid {
    margin-right: auto;
    margin-left: auto;
    padding-left: 15px;
    padding-right: 15px;
}

.ucp-menu-item {
    background: #F0F0F0;
    height: auto;
    overflow: hidden;
    padding-top: 15px;
    padding-bottom: 15px;
}
.row {
    margin-left: -15px;
    margin-right: -15px;
}
.container {
    border-radius: 5px;
}
.container {
    width: 1170px;
}
.ucp-menu-item .item-box span {
    color: #5e5e5e;
    display: block;
    text-align: center;
    font-weight: bold;
    font-size: 1.1em;
}
.micon {
    font-size: 4em !important;
    color: #343871 !important;
}
@media (min-width: 768px) {
	.seven-cols .col-md-1,
	.seven-cols .col-sm-1,
	.seven-cols .col-lg-1 {
		width: 100%;
		*width: 100%;
	}
}

@media (min-width: 480px) {
	.seven-cols .col-md-1,
	.seven-cols .col-sm-1,
	.seven-cols .col-lg-1 {
		width: 50%;
		*width: 50%;
	}
}

@media (min-width: 992px) {
	.seven-cols .col-md-1,
	.seven-cols .col-sm-1,
	.seven-cols .col-lg-1 {
		width: 14.285714285714285714285714285714%;
		*width: 14.285714285714285714285714285714%;
	}
}


/**
 *  The following is not really needed in this case
 *  Only to demonstrate the usage of @media for large screens
 */

@media (min-width: 1200px) {
	.seven-cols .col-md-1,
	.seven-cols .col-sm-1,
	.seven-cols .col-lg-1 {
		width: 14.285714285714285714285714285714%;
		*width: 14.285714285714285714285714285714%;
	}
}

.icon-align {
       vertical-align: text-bottom;
    }

    .center-icon{
        display: block;
        text-align: center;
        font-weight: bold;
    }

        .ucp-top-panel .top-panel-box {
    padding: 10px 10px 0 0;
}
.ucp-top-panel .top-panel-box {
    height: 100px;
    border-radius: 10px;
    padding: 12px 12px 0 0;
    display: block;
    position: relative;
    color: #fff;
}
.sbox3-s {
    background-image: linear-gradient(to right, #43e97b 0%, #38f9d7 100%);
    box-shadow: 0 3px 15px -5px rgb(66, 235, 132);
}
.ucp-top-panel .top-panel-box .icon1 {
    box-shadow: 0 5px 15px -5px rgba(16, 16, 16, 0.41);
}
.ucp-top-panel .top-panel-box .icon-holder {
    box-shadow: 0 5px 15px -5px rgba(16, 16, 16, 0.41);
    width: 75px;
    height: 75px;
    right: 5px;
    border-radius: 75px;
    background-color: #ffffff;
    background-position: center center;
    background-repeat: no-repeat;
    position: absolute;
}
.noticon {
    position: absolute;
    left: 20%;
    top: 5%;
    font-size: 3.8em;
    color: #4c4c4c;
}
.ucp-top-panel .top-panel-box .alert-box1 {
    color: #3d8840;
}
.ucp-top-panel .top-panel-box .alert-box1 {
    background-image: url("../images/view/user/top-box-1-icon.png");
    color: #E91E63;
}
.ucp-top-panel .top-panel-box .alert-box {
    position: absolute;
    width: 30px;
    background-color: #FFF;
    height: 30px;
    border-radius: 16px;
    top: 5px;
    right: 5px;
    font-weight: bold;
    text-align: left;
    padding-top: 6px;
    padding-left: 12px;
    font-size: 1.2em;
    box-shadow: 1px 1px 4px 1px #48474724;
}

.sbox3n {
    background-image: linear-gradient(to right, #f9d423 0%, #ff4e50 100%);
    box-shadow: 0 3px 15px -5px rgb(252, 145, 58);
}

.ucp-top-panel .top-panel-box .alert-box3 {
    color: #2a9aa7;
}
.ucp-top-panel .top-panel-box .alert-box3 {
    background-image: url("../images/view/user/top-box-4-icon.png");
    color: #FFAF0B;
}

.sbox3m {
    background-image: linear-gradient(-225deg, #A445B2 0%, #D41872 52%, #FF0066 100%);
    box-shadow: 0 3px 15px -5px rgb(204, 32, 125);
}

.sbox3-e {
    background-image: linear-gradient(to right, #4facfe 0%, #00f2fe 100%);
    box-shadow: 0 3px 15px -5px rgb(67, 183, 254);
}

.ucp-top-panel .top-panel-box .alert-box3 {
    color: #2a9aa7;
}
.ucp-top-panel .top-panel-box .alert-box3 {
    background-image: url("../images/view/user/top-box-4-icon.png");
    color: #FFAF0B;
}
.ucp-top-panel .top-panel-box .alert-box {
    position: absolute;
    width: 30px;
    background-color: #FFF;
    height: 30px;
    border-radius: 16px;
    top: 5px;
    right: 5px;
    font-weight: bold;
    text-align: left;
    padding-top: 6px;
    padding-left: 12px;
    font-size: 1.2em;
    box-shadow: 1px 1px 4px 1px #48474724;
}

.ucp-top-panel .top-panel-box {
    height: 100px;
    border-radius: 10px;
    padding: 12px 12px 0 0;
    display: block;
    position: relative;
    color: #fff;
}
.ucp-top-panel .top-panel-box {
    padding: 10px 10px 0 0;
}
.sbox3-s {
    background-image: linear-gradient(to right, #43e97b 0%, #38f9d7 100%);
    box-shadow: 0 3px 15px -5px rgb(66, 235, 132);
}
.sbox3 {
    box-shadow: 0 1px 5px rgba(0, 0, 0, 0.15);
}


</style>
<link rel="stylesheet" href="/assets/stylesheets/vendor/mdi/css/materialdesignicons.min.css" /> 
<div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
            <a href="/user/video/buy" class="item-box sbox3 text-cente" id="buy-hover">
                <span class="center-icon micon mdi mdi-library-video"></span>
                <h4 class="text-center">{{{ trans('main.courses') }}}</h4>
            </a>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
        <div class="card-body">
         <a href="/user/video/request" class="item-box sbox3" id="request-hover">
            <span class="center-icon micon mdi mdi-camera-enhance"></span>
            <h4>{{{ trans('main.requests') }}}</h4>
        </a>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
        <div class="card-body">
          <a href="/user/balance/log" class="item-box sbox3" id="balance-hover">
            <span class="center-icon micon mdi mdi-finance"></span>
            <h4>{{{ trans('main.financial') }}}</h4>
        </a>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
        <div class="card-body">
         <a href="/user/balance/charge" class="item-box sbox3" id="charge-hover">
            <span class="center-icon micon mdi mdi-credit-card-plus"></span>
            <h4>{{{ trans('main.charge_account') }}}</h4>
         </a>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
        <div class="card-body">
          <a href="/user/ticket" class="item-box sbox3" id="ticket-hover">
            <span class="center-icon micon mdi mdi-headset"></span>
            <h4>{{{ trans('main.support') }}}</h4>
         </a>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
        <div class="card-body">
          <a href="/user/profile" class="item-box sbox3" id="profile-hover">
            <span class="center-icon micon mdi mdi-settings"></span>
            <h4>{{{ trans('main.settings') }}}</h4>
         </a>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
        <div class="card-body">
          <a @if(get_option('become_vendor') == 1) href="/user/become" @else onclick="customNotify('{!! trans('main.become_vendor_disabled_message') !!}');" @endif class="item-box sbox3" id="article-hover">
            <span class="center-icon micon mdi mdi-teach"></span>
            <h4>{{{ trans('main.become_vendor') }}}</h4>
            </a>
        </div>
      </div>
    </div>
  </div>

  {{-- <div class="row ucp-top-panel">
    <div class="container no-padding-xs">
        <div class="row">      
                <div class="col">
                    <div class="card">
                    <div class="card-body">
                                <a href="/user/balance" class="col-md-3 col-xs-6">
                                    <div class="top-panel-box sbox3 sbox3-s">
                                        <div class="icon-holder icon1 hidden-xs">
                                        <span class="noticon mdi mdi-cash-usd"></span>
                                        </div>
                                        <p>{{{ trans('main.new_sales') }}}</p>
                                        <div class="alert-box alert-box1">123</div>
                                    </div>
                                </a>
                    </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                    <div class="card-body">
                        <a href="/user/balance/sell/post" class="col-md-3 col-xs-6">
                            <div class="top-panel-box sbox3 sbox3n">
                                <div class="icon-holder icon2 hidden-xs">
                                <span class="noticon mdi mdi-package-variant-closed"></span>
                                </div>
                                <p>{{{ trans('main.new_postal_sales') }}}</p>
                                <div class="alert-box alert-box3">23</div>
                            </div>
                        </a>
                    </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                    <div class="card-body">
                        <a href="/user/ticket" class="col-md-3 col-xs-6">
                            <div class="top-panel-box sbox3 sbox3m">
                                <div class="icon-holder icon3 hidden-xs">
                                <span class="noticon mdi mdi-comment-multiple-outline"></span>
                                </div>
                                <p>{{{ trans('main.new_support_ticket') }}}</p>
                                <div class="alert-box alert-box2">{{{ $alert['ticket'] or 0 }}}</div>
                            </div>
                        </a>
                        
                    </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                    <div class="card-body">                        
                        <a href="/user/balance/sell/post" class="col-md-3 col-xs-6">
                            <div class="top-panel-box sbox3 sbox3-e">
                                <div class="icon-holder icon2 hidden-xs">
                                <span class="noticon mdi mdi-package-variant-closed"></span>
                                </div>
                                <p>{{{ trans('main.new_postal_sales') }}}</p>
                                <div class="alert-box alert-box3">{!! $alert['sell_post'] !!}</div>
                            </div>
                        </a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="container-fluid">
        <div class="row ucp-top-panel">
            <div class="container no-padding-xs">
                <div class="h-10 visible-xs"></div>
                {{-- <div class="col">
                    <div class="card">
                        <div class="card-body"> --}}
                            <div class="row">
                                <a href="/user/balance" class="col-md-3 col-xs-6">
                                    <div class="top-panel-box sbox3 sbox3-s">
                                        <div class="icon-holder icon1 hidden-xs">
                                        <span class="noticon mdi mdi-cash-usd"></span>
                                        </div>
                                        <p>New Sales</p>
                                        <div class="alert-box alert-box1">212</div>
                                    </div>
                                </a>
                                <a href="/user/balance/sell/post" class="col-md-3 col-xs-6">
                                    <div class="top-panel-box sbox3 sbox3-e">
                                        <div class="icon-holder icon2 hidden-xs">
                                        <span class="noticon mdi mdi-package-variant-closed"></span>
                                        </div>
                                        <p>New Postal Sales</p>
                                        <div class="alert-box alert-box3">0</div>
                                    </div>
                                </a>
                                <a href="/user/ticket" class="col-md-3 col-xs-6">
                                    <div class="top-panel-box sbox3 sbox3m">
                                        <div class="icon-holder icon3 hidden-xs">
                                        <span class="noticon mdi mdi-comment-multiple-outline"></span>
                                        </div>
                                        <p>New Support Message</p>
                                        <div class="alert-box alert-box2">0</div>
                                    </div>
                                </a>
                                <a href="/user/ticket/comments" class="col-md-3 col-xs-6">
                                    <div class="top-panel-box sbox3 sbox3n">
                                        <div class="icon-holder icon4 hidden-xs">
                                        <span class="noticon mdi mdi-comment-processing-outline"></span>
                                        </div>
                                        <p>New Comment</p>
                                        <div class="alert-box alert-box3">0</div>
                                    </div>
                                </a>
                            </div>
                            
                        {{-- </div>
                    </div>
                </div> --}}
                {{-- <div class="col">
                    <div class="card">
                        <div class="card-body"> --}}
                            
                        {{-- </div>
                    </div>
                </div> --}}
                {{-- <div class="col">
                    <div class="card">
                        <div class="card-body"> --}}
                            
                        {{-- </div>
                    </div>
                </div> --}}
                {{-- <div class="col">
                    <div class="card">
                        <div class="card-body"> --}}
                            
                        {{-- </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>

  <?php 
  //Merchant's account information
  $merchant_id = "JT01";			//Get MerchantID when opening account with 2C2P
  $secret_key = "7jYcp4FxFdf0";	//Get SecretKey from 2C2P PGW Dashboard
  
  //Transaction information
  $payment_description  = '2 days 1 night hotel room';
  $order_id  = time();
  $currency = "702";
  $amount  = '000000002500';
  
  //Request information
  $version = "8.5";	
  $payment_url = "https://demo2.2c2p.com/2C2PFrontEnd/RedirectV3/payment";
  $result_url_1 = URL::to('/')."/get2c2presult";
  $payment_option = 'ALL';
  //Construct signature string
  $params = $version.$merchant_id.$payment_description.$order_id.$currency.$amount.$result_url_1.$payment_option;
  $hash_value = hash_hmac('sha256',$params, $secret_key,false);	//Compute hash value

?>
  
{{--

<form id="myform" name="myform" method="post" action="{{$payment_url}}">
    <input type="hidden" name="version" value="{{$version}}"/>
    <input type="hidden" name="merchant_id" value="{{$merchant_id}}"/>
    <input type="hidden" name="currency" value="{{$currency}}"/>
    <input type="hidden" name="result_url_1" value="{{$result_url_1}}"/>
    <input type="hidden" name="payment_option" value="{{$payment_option}}"/>
    <input type="hidden" name="hash_value" value="{{$hash_value}}"/> PRODUCT INFO : <input type="text" name="payment_description" value="{{$payment_description}}" readonly/><br/>
    ORDER NO : <input type="text" name="order_id" value="{{$order_id}}"  readonly/><br/>
    AMOUNT: <input type="text" name="amount" value="{{$amount}}" readonly/><br/>
    <input type="submit" name="submit" value="Confirm" />
</form>

 --}}

<section class="card">
    <div class="card-body">
        <!--  <canvas id="myChart" width="400" height="200"></canvas> -->
        <div class="row">
            <!-- <div class="col-lg-4">
                <label>Add board</label>
                <input type="text" id="kb-btitle" placeholder="Enter list board title"/>
                <button type="button" id="kb-addboard">Add</button>
            </div> -->
            <div class="col-lg-12">
                <div id="myKanban" ></div>
            </div>
        </div>
    </div>
</section>


@endsection

@section('script')
<script type="text/javascript">
   // document.forms.myform.submit();
   window.onload = function(){
       
  };
</script>

<script>
    $(document).ready(function() {
       // document.createElement('form').submit.call(document.getElementById("myform"));
       /*  $.ajax({
            url: "https://demo2.2c2p.com/2C2PFrontEnd/RedirectV3/payment",
            type: "POST",
            data:{
               version:"8.5",
                merchant_id:"JT01",
                currency:"702",
                result_url_1:"http://192.168.110.16:8080/get2c2presult",
                hash_value:"{{$hash_value}}",
                payment_description:"2 days 1 night hotel room",
                order_id:"{{ $order_id }}",
                amount:"000000002500",
            },
            dataType: 'JSON',
            success: function(data) {       
               
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error! Contact IT Department.');
            }
        }); */
        
    });

  
</script>

@endsection