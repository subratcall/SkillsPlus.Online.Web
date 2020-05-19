@extends('admin.newlayout.layout',['breadcom'=>['Report','Users']])
@section('title')
New Request
@endsection

@section('style')
<link rel='stylesheet' href="{{ asset('assets/_plugins/jkanban.css') }}">
<style>
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
</style>
@endsection

@section('page')
<div class="row">
    <div class="col-xs-6 col-md-3 col-sm-6 text-center">

    </div>
</div>
</div>
<section class="card">
    <div class="card-body">
        <form method="post" class="form-horizontal" action="/admin/user_settings/set">
            <div class="row">
                <div class="col-lg-12">
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse"
                                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Account Info
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="row margin-left form-group">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-1">
                                                    <label class="control-label">{{{ trans('main.realname') }}}</label>
                                                </div>
                                                <div class="col-5">
                                                    <input type="text" name="name" value="{{{ $meta['name'] or '' }}}"
                                                        class="form-control">
                                                </div>
                                                <div class="col-1">
                                                    <label class="control-label ">{{{ trans('main.email') }}}</label>
                                                </div>
                                                <div class="col-5">
                                                    <input type="text" value="{{{ $meta['email'] or '' }}}"
                                                        class="form-control text-left disabled" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                    data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Personal Info
                                </button>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row form-group margin-left">
                                            <div class="col-1">
                                                <label class="control-label">{{{ trans('main.biography') }}}</label>
                                            </div>
                                            <div class="col-5">
                                                <textarea name="biography" rows="5"
                                                    class="form-control res-vertical">{{{ $meta['biography'] or '' }}}</textarea>
                                            </div>
                                            <div class="col-1">
                                                <label
                                                    class="control-label">{{{ trans('main.short_biography') }}}</label>
                                            </div>
                                            <div class="col-5">
                                                <textarea name="short_biography" maxlength="400" rows="5"
                                                    class="form-control res-vertical">{{{ $meta['short_biography'] or '' }}}</textarea>
                                            </div>
                                        </div>
                                        <div class="row form-group margin-top margin-left">
                                            <div class="col-1">
                                                <label class="control-label">{{{ trans('main.province') }}}</label>
                                            </div>
                                            <div class="col-5">
                                                <input type="text" class="form-control" name="state"
                                                    value="{!! $meta['state'] or '' !!}">
                                            </div>
                                            <div class="col-1">
                                                <label class="control-label">{{{ trans('main.city') }}}</label>
                                            </div>
                                            <div class="col-5">
                                                <input type="text" name="city" value="{{{ $meta['city'] or '' }}}"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="row form-group margin-top margin-left">
                                            <div class="col-1">
                                                <label class="control-label">{{{ trans('main.birthday') }}}</label>
                                            </div>
                                            <div class="col-5">
                                                <input type="text" name="birthday"
                                                    value="{{{ $meta['birthday'] or '' }}}" class="form-control">
                                            </div>
                                            <div class="col-1">
                                                <label class="control-label">{{{ trans('main.age') }}}</label>
                                            </div>
                                            <div class="col-5">
                                                <input type="text" name="old" value="{{{ $meta['old'] or '' }}}"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="row form-group margin-top margin-left">
                                            <div class="col-1">
                                                <label class="control-label">{{{ trans('main.phone_number') }}}</label>
                                            </div>
                                            <div class="col-5">
                                                <input type="text" name="phone" value="{{{ $meta['phone'] or '' }}}"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                    data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Financial
                                </button>
                            </h2>
                        </div>


                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row form-group margin-left">
                                            <div class="col-1">
                                                <label class="control-label">{{{ trans('main.bank_name') }}}</label>
                                            </div>
                                            <div class="col-5">
                                                <input type="text" name="bank_name"
                                                    value="{{{ $meta['bank_name'] or '' }}}" class="form-control"
                                                    @if(isset($userMeta[ 'seller_apply' ]) && $userMeta[ 'seller_apply'
                                                    ]==1) disabled @endif>
                                            </div>
                                            <div class="col-1">
                                                <label
                                                    class="control-label">{{{ trans('main.account_number') }}}</label>
                                            </div>
                                            <div class="col-5">
                                                <input type="text" placeholder="Number Only" name="bank_account"
                                                    value="{{{ $meta['bank_account'] or '' }}}"
                                                    class="form-control text-center"
                                                    onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"
                                                    @if(isset($userMeta[ 'seller_apply' ]) && $userMeta[ 'seller_apply'
                                                    ]==1) disabled @endif>
                                            </div>
                                        </div>
                                        <div class="row form-group margin-left">
                                            <div class="col-1">
                                                <label class="control-label">{{{ trans('main.creditcard') }}}</label>
                                            </div>
                                            <div class="col-5">
                                                <input type="text" name="bank_card" class="form-control text-center"
                                                    dir="ltr" value="{{{ $meta['bank_card'] or '' }}}"
                                                    @if(isset($userMeta[ 'seller_apply' ]) && $userMeta[ 'seller_apply'
                                                    ]==1) disabled @endif>
                                            </div>
                                            <div class="col-1">
                                                <label class="control-label">{{{ trans('main.identity_scan') }}}</label>
                                            </div>
                                            <div class="col-5">
                                                <div class="input-group"> <span
                                                        class="input-group-addon view-selected img-icon-s"
                                                        data-toggle="modal" data-target="#ImageModal"
                                                        data-whatever="melli_card"><span
                                                            class="formicon mdi mdi-eye"></span></span>
                                                    <input type="text" name="melli_card" class="form-control"
                                                        value="{{{ $meta['melli_card'] or '' }}}"
                                                        @if(isset($userMeta[ 'seller_apply' ]) &&
                                                        $userMeta[ 'seller_apply' ]==1) disabled @endif> <span
                                                        class="input-group-addon click-for-upload img-icon-s"><span
                                                            class="formicon mdi mdi-arrow-up-thick"></span></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row form-group margin-left">
                                            <div class="col-1">
                                                <label class="control-label">{{{ trans('main.passport_id') }}}</label>
                                            </div>
                                            <div class="col-5">
                                                <input type="text" name="melli_code" class="form-control text-center"
                                                    dir="ltr"
                                                    onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"
                                                    value="{{{ $meta['melli_code'] or '' }}}"
                                                    @if(isset($userMeta[ 'seller_apply' ]) && $userMeta[ 'seller_apply'
                                                    ]==1) disabled @endif>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="images">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                            data-target="#imagesC" aria-expanded="false" aria-controls="imagesC">
                            Images
                        </button>
                    </h2>
                </div>
                <div id="imagesC" class="collapse" aria-labelledby="images" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="row form-group margin-left">
                                    <div class="col-1">
                                        <label class=" control-label">{{{ trans('main.avatar') }}}</label>
                                    </div>
                                    <div class="col-5">
                                        <div class="input-group">
                                            <span class="input-group-prepend view-selected cu-p" data-toggle="modal"
                                                data-target="#ImageModal" data-whatever="avatar">
                                                <span class="input-group-text"><i class="fa fa-eye"
                                                        aria-hidden="true"></i></span>
                                            </span>
                                            <input type="text" name="avatar" dir="ltr"
                                                value="{{{$meta['avatar'] or ''}}}" class="form-control">
                                            <span class="input-group-append click-for-upload cu-p">
                                                <span class="input-group-text"><i class="fa fa-upload"
                                                        aria-hidden="true"></i></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-1">
                                        <label class=" control-label">{{{ trans('admin.course_thumbnail') }}}</label>
                                    </div>
                                    <div class="col-5">
                                        <div class="input-group">
                                            <span class="input-group-prepend view-selected cu-p" data-toggle="modal"
                                                data-target="#ImageModal" data-whatever="thumbnail">
                                                <span class="input-group-text"><i class="fa fa-eye"
                                                        aria-hidden="true"></i></span>
                                            </span>
                                            <input type="text" name="thumbnail" dir="ltr"
                                                value="{{{$meta['thumbnail'] or ''}}}" class="form-control">
                                            <span class="input-group-append click-for-upload cu-p">
                                                <span class="input-group-text"><i class="fa fa-upload"
                                                        aria-hidden="true"></i></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="form-group">
                    <div class="row">
                        <!-- <label class="control-label">{{{ trans('main.avatar') }}}</label>
                        <div class="col-md-5">
                            <div class="input-group">
                                <span class="input-group-addon view-selected img-icon-s" data-toggle="modal"
                                    data-target="#ImageModal" data-whatever="avatar"><span
                                        class="formicon mdi mdi-eye"></span></span>
                                <input type="text" name="avatar" class="form-control"
                                    value="{{{ $meta['avatar'] or '' }}}">
                                <span class="input-group-addon click-for-upload img-icon-s"><span
                                        class="formicon mdi mdi-arrow-up-thick"></span></span>
                            </div> -->
                        </div>
                        --}}

                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                            data-target="#security" aria-expanded="false" aria-controls="security">
                            Postal
                        </button>
                    </h2>
                </div>
                <div id="security" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-12">
                                <div class="row form-group margin-left">
                                    <div class="col-1">
                                        <label class="control-label ">{{{ trans('main.province') }}}</label>
                                    </div>
                                    <div class="col-5">
                                        <input type="text" class="form-control" name="state"
                                            value="{!! $meta['state'] or '' !!}">
                                    </div>
                                    <div class="col-1">
                                        <label class="control-label ">{{{ trans('main.city') }}}</label>
                                    </div>
                                    <div class="col-5">
                                        <input type="text" name="city" value="{{{ $meta['city'] or '' }}}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group margin-left">
                                    <div class="col-1">
                                        <label class="control-label ">{{{ trans('main.zip_code') }}}</label>
                                    </div>
                                    <div class="col-5">
                                        <input type="text" name="postalcode" value="{{{ $meta['postalcode'] or '' }}}"
                                            class="form-control text-center">
                                    </div>
                                    <div class="col-1">
                                        <label class="control-label ">{{{ trans('main.address') }}}</label>
                                    </div>
                                    <div class="col-5">
                                        <textarea name="address" rows="20"
                                            class="form-control">{{{ $meta['address'] or '' }}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
            
            <div class="col-12">
                <input type="submit" name="submit" class="btn btn-orange pull-left" value="Save">
            </div>
        </form>
</section>


@endsection

@section('script')
<script>
    var isSave = 1;
var id = "{{request()->route('id')}}";
    $(document).ready(function() {
                categories();
                if(id){
                loadData();
                }

                
    });

    function loadData() {
        if(id!=null||id!=""){
            $.ajax({
                url: "{{ url('/admin/user_request/showRequest') }}/"+id,
                type: "get",
                dataType: 'JSON',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    isSave = 0;
                    $("#title").val(data.title);
                    $("#category_id").val(data.category_id);
                    $("#description").val(data.description);
                    $("#id").val(data.id);
                    
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error! Contact IT Department.');
                }
            });
        }
    }

    function categories() {
        $.ajax({
            url: "{{ url('/admin/user_request/getCateroy') }}",
            type: "get",
            dataType: 'JSON',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                //LT = data.data
                data.data.forEach(function(entry) {
                    $("#category_id").append("<option value='" + entry.id + "' selected>" + entry.cat + "</option>")
                });
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error! Contact IT Department.');
            }
        });
    }

    function save() {
    var data = $('#form').serializeArray();
        $.ajax({
            url: (isSave==1?"{{ url('/admin/user_request/add_request') }}":"{{ url('/admin/user_request/update_request') }}"),
            type: "post",
            data: data,
            dataType: 'JSON',
            success: function(data) {
                location = "/admin/user_request/myrequest";
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error! Contact IT Department.');
            }
        });
    }
</script>
@endsection