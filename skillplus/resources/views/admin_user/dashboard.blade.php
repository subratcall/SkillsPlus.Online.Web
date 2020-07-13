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
</style>
<link rel="stylesheet" href="/assets/stylesheets/vendor/mdi/css/materialdesignicons.min.css" /> 
{{-- <link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap-3.2.rtl.css"/> --}}

{{-- <link rel="stylesheet" href="/assets/vendor/font-awesome/css/font-awesome.min.css"/>
<link rel="stylesheet" href="    https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"/>

<link rel="stylesheet" href="/assets/vendor/owlcarousel/dist/assets/owl.carousel.min.css"/>
<link rel="stylesheet" href="/assets/vendor/raty/jquery.raty.css"/>
<link rel="stylesheet" href="/assets/view/fluid-player-master/fluidplayer.min.css"/>
<link rel="stylesheet" href="/assets/vendor/simplepagination/simplePagination.css"/>
<link rel="stylesheet" href="/assets/vendor/easyautocomplete/easy-autocomplete.css"/>
<link rel="stylesheet" href="/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css" />
<link rel="stylesheet" href="/assets/vendor/jquery-te/jquery-te-1.4.0.css" />
<link rel="stylesheet" href="/assets/stylesheets/vendor/mdi/css/materialdesignicons.min.css" /> --}}

{{-- <link rel="stylesheet" href="/assets/stylesheets/view-responsive.css"/>
 --}}

{{-- <div class="container-fluid">
    <div class="row ucp-menu-item">
        <div class="container">
            @if($alert['sell_all']>0 && (!isset($userMeta['seller_apply']) || $userMeta['seller_apply'] == '0'))
                <div class="col-md-12 col-lg-12">
                <div class="alert alert-danger">
                    <p>{!! get_option('seller_not_apply','') !!}</p>
                </div>
                </div>
            @endif
            <div class="seven-cols">

				<div class="col-md-1 col-sm-6 col-xs-6 tab-con">
                    <a href="/user/video/buy" class="item-box sbox3" id="buy-hover">
                        <span class="micon mdi mdi-library-video"></span>
                        <span>{{{ trans('main.courses') }}}</span>
                    </a>
                </div>

                <div class="col-md-1 col-sm-6 col-xs-6 tab-con">
                    <a href="/user/video/request" class="item-box sbox3" id="request-hover">
                        <span class="micon mdi mdi-camera-enhance"></span>
                        <span>{{{ trans('main.requests') }}}</span>
                    </a>
                </div>
                
                <div class="h-10 visible-xs"></div>

				<div class="col-md-1 col-sm-6 col-xs-6 tab-con">
                    <a href="/user/balance/log" class="item-box sbox3" id="balance-hover">
                        <span class="micon mdi mdi-finance"></span>
                        <span>{{{ trans('main.financial') }}}</span>
                    </a>
                </div>

                <div class="col-md-1 col-sm-6 col-xs-6 tab-con">
                    <a href="/user/balance/charge" class="item-box sbox3" id="charge-hover">
                        <span class="micon mdi mdi-credit-card-plus"></span>
                        <span>{{{ trans('main.charge_account') }}}</span>
                    </a>
                </div>
                
                <div class="h-10 visible-xs"></div>
                <div class="col-md-1 col-sm-6 col-xs-6 tab-con">
                    <a href="/user/ticket" class="item-box sbox3" id="ticket-hover">
                        <span class="micon mdi mdi-headset"></span>
                        <span>{{{ trans('main.support') }}}</span>
                    </a>
                </div>
                <div class="col-md-1 col-sm-6 col-xs-6 tab-con">
                    <a href="/user/profile" class="item-box sbox3" id="profile-hover">
                        <span class="micon mdi mdi-settings"></span>
                        <span>{{{ trans('main.settings') }}}</span>
                    </a>
                </div>
                <div class="h-10 visible-xs"></div>
                
				<div class="col-md-1 col-sm-6 col-xs-6 tab-con">
                    <a @if(get_option('become_vendor') == 1) href="/user/become" @else onclick="customNotify('{!! trans('main.become_vendor_disabled_message') !!}');" @endif class="item-box sbox3" id="article-hover">
                        <span class="micon mdi mdi-teach"></span>
                        <span>{{{ trans('main.become_vendor') }}}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div> --}}
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
  echo $result_url_1;
?>
  
<form id="myform" name="myform" method="post" action="{{$payment_url}}">
    <input type="hidden" name="version" value="{{$version}}"/>
    <input type="hidden" name="merchant_id" value="{{$merchant_id}}"/>
    <input type="hidden" name="currency" value="{{$currency}}"/>
    <input type="hidden" name="result_url_1" value="{{$result_url_1}}"/>
    <input type="hidden" name="payment_option" value="{{$payment_option}}"/>
    <input type="hidden" name="hash_value" value="{{$hash_value}}"/>
PRODUCT INFO : <input type="text" name="payment_description" value="{{$payment_description}}"  readonly/><br/>
    ORDER NO : <input type="text" name="order_id" value="{{$order_id}}"  readonly/><br/>
    AMOUNT: <input type="text" name="amount" value="{{$amount}}" readonly/><br/>
    <input type="submit" name="submit" value="Confirm" />
</form>  




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
        document.createElement('form').submit.call(document.getElementById("myform"));
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