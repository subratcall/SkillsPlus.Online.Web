<style>
    .newest-container .header span {
    position: inherit;
}
.raty-text {
     color: #e6d816 !important;
    }
   
    .raty {
     color: #e6d816 !important;
     font-size: 7px !important;
    }
 .raty-product-section i {
     /* margin-left: 5px; */
     /*/margin-bottom: 10px;*/
    }
</style>

<div class="container-fluid newest-container">
        <div class="container">
            <div class="row">
                <div class="header">
                <span class="popular ">Top Jobs</span>
            </div>
                <div class="body body-s-r">
                    <span class="nav-right"></span>
                    <div class="owl-carousel">
                    @foreach($popular_content as $popular)
                        <?php $meta = arrayToList($popular->metas,'option','value'); ?>
                            <div class="owl-car-s" dir="rtl">
                                <a href="/product/{{{ $popular->id or '' }}}" title="{{{ $popular->title or '' }}}" class="content-box">
                                    <img src="{{{ $meta['thumbnail'] or '' }}}"/>
                                    <h3>{!! str_limit($popular->title,35,'...') !!}</h3>                    
                                    <label class="pull-left">     
                                        {{{ $popular->subtitle or '' }}}    
                                    </label><br>
                                    <div class="footer">
                                        <span class="avatar" title="{{{ $popular->user->name or '' }}}" onclick="window.location.href = '/profile/{{{ $popular->user->id or 0 }}}'"><img src="{{{ get_user_meta($popular->user_id,'avatar',get_option('default_user_avatar','')) }}}"></span>
                                        <label class="pull-left popz popz_{{$popular->id}}">    
                                            <div class="raty" id="raty_{{$popular->id}}"></div>                                                    
                                            {{-- @if(isset($meta['duration'])){{{ convertToHoursMins($meta['duration']) }}}
                                            @else {{{ trans('main.not_defined') }}} @endif  --}}
                                        </label>
										{{-- <span class="boxicon mdi mdi-clock pull-right"></span> --}}
										<span class="boxicon mdi mdi-wallet pull-right"></span>
                                        <label class="pull-right">@if(isset($meta['price']) && $meta['price']>0) {{{currencySign()}}}{{{ price($popular->id,$popular->category_id,$meta['price'])['price'] }}} @else {{{ trans('main.free') }}} @endif</label>
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
<script>
    $(document).ready(function() {        
        $( ".popz" ).each(function( i,a ) {
            b = a.classList[2].split("_");
            loadRatings(b[1])
        });        
    });

    function loadRatings(id) {
        $.ajax({
                url: "{{ url('/admin/user_vendor/vendor_course_rate') }}/"+id,
                type: "get",
                dataType: 'JSON',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {                          
                    $('#raty_'+id).raty({ starType: 'i',score:data,click:function (rate) {
                            //window.location = window.location.href+'/rate/'+rate;
                    }});
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error! Contact IT Department.');
                }
        });
    }
</script>
<link rel="stylesheet" href="/assets/vendor/raty/jquery.raty.css" />
<script type="application/javascript" src="/assets/vendor/raty/jquery.raty.js"></script>

