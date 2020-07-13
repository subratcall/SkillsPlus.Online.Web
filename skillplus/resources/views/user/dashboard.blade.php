@extends('user.layout.layout')
@section('title')
    {{{ $setting['site']['site_title'] or '' }}} -
{{{ trans('main.user_panel') }}}
@endsection
@section('pages')

    <div class="container-fluid">
        <div class="row ucp-top-panel">
            <div class="container no-padding-xs">
                <div class="h-10 visible-xs"></div>
                <a href="/user/balance" class="col-md-3 col-xs-6">
                    <div class="top-panel-box sbox3 sbox3-s">
                        <div class="icon-holder icon1 hidden-xs">
						<span class="noticon mdi mdi-cash-usd"></span>
						</div>
                        <p>{{{ trans('main.new_sales') }}}</p>
                        <div class="alert-box alert-box1">{!! $alert['sell_download'] !!}12</div>
                    </div>
                </a>
                <a href="/user/balance/sell/post" class="col-md-3 col-xs-6">
                    <div class="top-panel-box sbox3 sbox3-e">
                        <div class="icon-holder icon2 hidden-xs">
						<span class="noticon mdi mdi-package-variant-closed"></span>
						</div>
                        <p>{{{ trans('main.new_postal_sales') }}}</p>
                        <div class="alert-box alert-box3">{!! $alert['sell_post'] !!}</div>
                    </div>
                </a>
                <div class="h-10 visible-xs"></div>
                <a href="/user/ticket" class="col-md-3 col-xs-6">
                    <div class="top-panel-box sbox3 sbox3m">
                        <div class="icon-holder icon3 hidden-xs">
						<span class="noticon mdi mdi-comment-multiple-outline"></span>
						</div>
                        <p>{{{ trans('main.new_support_ticket') }}}</p>
                        <div class="alert-box alert-box2">{{{ $alert['ticket'] or 0 }}}</div>
                    </div>
                </a>
                <a href="/user/ticket/comments" class="col-md-3 col-xs-6">
                    <div class="top-panel-box sbox3 sbox3n">
                        <div class="icon-holder icon4 hidden-xs">
						<span class="noticon mdi mdi-comment-processing-outline"></span>
						</div>
                        <p>{{{ trans('main.new_comment') }}}</p>
                        <div class="alert-box alert-box3">{{{ $alert['comment'] or 0 }}}</div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="container">

            <div class="col-md-3 col-xs-12">
                <div class="ucp-section-box sbox3 ucp-avatar-box">
                    <div class="body paz">
                        <form method="post" action="/user/profile/avatar">
                            <img src="{{{ $meta['avatar'] or get_option('default_user_avatar','') }}}" class="img-responsive sbox3" id="avatar-luncher" >
                            <br>
                            <input type="hidden" name="avatar" value="{{{ $meta['avatar'] or '' }}}" onclick="openKCFinder($(this));">
                            <div class="form-group">
                                <a href="/user/profile" class="btn btn-green btn-avatar btn-100-p">{{{ trans('main.edit_profile') }}}</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="ucp-section-box sbox3 ucp-avatar-box he70">
                    <div class="body text-justify lh180">
                        <b class="vac-mode">{{{ trans('main.vacation_mode') }}}</b>
                        <div class="switch switch-sm switch-primary pull-left fl-right" data-toggle="modal" href="#trip-mode-modal" id="post_toggle">
                            <input type="hidden" value="0" name="post">
                            <input type="checkbox" name="post" value="1" data-plugin-ios-switch @if(userMeta($user['id'],'trip_mode',0) == 1 && userMeta($user['id'],'trip_mode_date',1)>time()) checked="checked" @endif/>
                        </div>
                        <div class="modal fade" id="trip-mode-modal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                            &times;
                                        </button>
                                        <h4 class="modal-title">{{{ trans('main.vacation_mode') }}}</h4>
                                    </div>
                                    <form method="post" action="/user/trip/active">
                                    <div class="modal-body">
                                        <span>{{{ trans('main.vacation_alert') }}}</span>
                                        <div class="h-10"></div>
                                        <div class="col-md-8 col-md-offset-2">
                                            <div class="input-group">
                                                <input type="date" name="trip_mode_date" id="trip_mode_date" @if(is_int(userMeta($user['id'],'trip_mode_date'))) value="{!! date('Y-m-d',userMeta($user['id'],'trip_mode_date')) !!}" @endif class="form-control text-center validate" required>
                                                <span class="input-group-addon trip_mode_date_btn" id="trip_mode_date_btn"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                            </div>
                                        </div>
                                        <div class="h-20"></div>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="/user/trip/deactive" class="btn btn-danger">{{{ trans('main.disable_vacation') }}}</a>
                                        <button type="submit" name="active_trip" class="btn btn-default">{{{ trans('main.enable_vacation') }}}</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-xs-12">
                <div class="ucp-section-box ucp-dasbboard-box-1">
                    <div class="header back-orange convas-header">
                        <span class="btn btn-default convas-btn fos-w" onclick="$('#myChart1').fadeOut(0,function(){$('#myChart').fadeIn(500)});">{{{ trans('main.sales') }}}</span>
                        <span class="btn btn-default convas-btn1 fos-w" onclick="$('#myChart').fadeOut(0,function(){$('#myChart1').fadeIn(500)});">{{{ trans('main.income') }}}</span>
                        <span class="pull-left fl-right cnv-s ">{{{ trans('main.today') }}} <?= date('d F Y  |  H:i',time());?></span>
                    </div>
                    <div class="body bodypad">
                        <canvas id="myChart" class="charting"></canvas>
                        <canvas id="myChart1" class="charting" style="display: none"></canvas>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="h-10"></div>

    <div class="container-fluid">
        <div class="container">

            <div class="col-md-3 col-xs-12 tab-con">
                <div class="ucp-section-box">
                    <div class="header header-d">{{{ trans('main.recent_notifications') }}}</div>
                    <div class="body">
                        @if(count($notifications) == 0)
                            <div class="text-center">
                                <img src="/assets/images/empty/notification.png" class="img-pal">
                                <div class="h-20"></div>
                                <span class="empty-first-line">{{{ trans('main.no_notification') }}}</span>
                            </div>
                        @else
                            <ul class="ucp-section-box-notification">
                                @if($notifications != null)
                                    @foreach($notifications as $noti)
                                        <li data-toggle="modal" data-target="#alertModal{{{ $noti->id or 0 }}}"><span class="mdi mdi-information-outline"></span><a href="javascript:void(0);">{{{ $noti->title or '' }}}</a></li>
                                        <div class="modal fade" id="alertModal{{{ $noti->id or 0 }}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-hidden="true">&times;
                                                        </button>
                                                        <h4 class="modal-title">{!! $noti->title or '' !!}</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        {!! $noti->msg or '' !!}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-custom" data-dismiss="modal">{{{ trans('main.close') }}}</button>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                    @endforeach
                                @endif
                            </ul>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-xs-12 tab-con">
                <div class="ucp-section-box ucp-dasbboard-box-2">
                    <div class="header">{{{ trans('main.financial_stats') }}}</div>
                    <div class="body">
                        <span class="ucp-section-box-span"><label>{{{ trans('main.today_sale') }}}</label><b class="pull-left"> {{{ $sell_count_today or '0' }}}</b></span>
                        <span class="ucp-section-box-span"><label>{{{ trans('main.month_sale') }}}</label><b class="pull-left">{{{ $sell_count_month or '0' }}} </b></span>
                        <span class="ucp-section-box-span"><label>{{{ trans('main.total_sale') }}}</label><b class="pull-left">{{{ $userSellCount or '0' }}} </b></span>
                        <span class="ucp-section-box-span"><label>{{{ trans('main.total_income') }}}</label><b class="pull-left">{{{ currencySign() }}} {{{ $total_income or '0' }}} </b></span>
                        <span class="ucp-section-box-span"><label>{{{ trans('main.withdrawable_amount') }}}</label><b class="pull-left">{{{ currencySign() }}} {{{ $user['income'] or '0' }}} </b></span>
                        <span class="ucp-section-box-span"><label>{{{ trans('main.account_charge') }}}</label><b class="pull-left">{{{ currencySign() }}} {{{ $user['credit'] or '0' }}} </b></span>
                        <span class="ucp-section-box-span"><label>{{{ trans('main.total_purchase') }}}</label><b class="pull-left">{{{ $userBuyCount or '0' }}} </b></span>

                    </div>
                </div>
            </div>

            <div class="col-md-3 col-xs-12 tab-con">
                <div class="ucp-section-box ucp-dasbboard-box-3">
                    <div class="header">{{{ trans('main.sales_target') }}}</div>
                    <div class="body ptopz">
                        <div id="g6"></div>
                        <span class="ucp-section-box-span"><label>{{{ trans('main.current_sales_badge') }}}</label><b class="pull-left">{{{ $current_rate['description'] or 'No data' }}}</b></span>
                        <span class="ucp-section-box-span"><label>{{{ trans('main.your_total_sales') }}}</label><b class="pull-left">{{{ $userSellCount or '0' }}} </b></span>
                        <span class="ucp-section-box-span"><label>{{{ trans('main.next_badge') }}}</label><b class="pull-left">{{{ $after_rate['description'] or '' }}}</b></span>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-xs-12 tab-con">
                <div class="ucp-section-box ucp-dasbboard-box-4">
                    <div class="header">{{{ trans('main.latest_purchases') }}}</div>
                    <div class="body he277">
                        @if(count($buyList)==0)
                            <div class="text-center">
                                <img src="/assets/images/empty/bought.png" class="pur-s">
                                <div class="h-20"></div>
                                <span class="empty-first-line">{{{ trans('main.not_purchased_item') }}}</span>
                            </div>
                        @else
                            <ul class="dashboard-buy-item">
                                @foreach($buyList as $bl)
                                    <li><img src="{{{ contentMeta($bl->content->id,'thumbnail','') }}}"/><a href="/product/{{{ $bl->content->id or 0 }}}"><span>{{{ $bl->content->title or '' }}}</span><label>{{{ date('d F Y',$bl->create_at) }}}</label></a></li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection

@section('script')
    <script>$('#profile-hover').addClass('item-box-active');</script>
    <script type="text/javascript">
        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            responsive: true,
            data: {
                labels: [{!! '"'.implode('","',$captionDay).'"' !!}],
                datasets: [{
                    label: "Sales",
                    backgroundColor: '#e91e63',
                    data: [{!! implode(',',$sellDay) !!}],
                }
                ]
            },

            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            userCallback: function(label, index, labels) {
                                // when the floored value is the same as the value we have a whole number
                                if (Math.floor(label) === label) {
                                    return label;
                                }

                            },
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.yLabel;
                        }
                    }
                }
            }
        });
    </script>
    <script type="text/javascript">
        var ctx = document.getElementById('myChart1').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            responsive: true,
            data: {
                labels: [{!! '"'.implode('","',$captionDay).'"' !!}],
                datasets: [{
                    label: "Income",
                    backgroundColor: '#2BA2DF',
                    data: [{!! implode(',',$incomeDay) !!}],
                },
                ]
            },

            options: {
                legend: {
                    display: false
                },
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.yLabel;
                        }
                    }
                }
            }
        });
    </script>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function(event) {
            var g6 = new JustGage({
                id: "g6",
                value: {{{ $value or 0 }}},
                min: 0,
                max: {{{ count($sell_rate) }}},
                hideMinMax: true,
                gaugeColor: "#F0F0F0",
                levelColors: ["#e91e63"],
                levelColorsGradient: false
            });
        });
    </script>
@endsection
