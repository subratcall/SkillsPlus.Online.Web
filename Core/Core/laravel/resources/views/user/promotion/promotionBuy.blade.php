@extends('user.layout.videolayout')

@section('tab5','active')
@section('tab')
    <div class="col-md-12 col-xs-12">
        <div class="h-20"></div>
        <form method="post" class="form-horizontal" action="/user/video/promotion/buy/pay">
            <div class="form-group">
                <label class="control-label col-md-2 tab-con">{{{ trans('main.choose_plan') }}}</label>
                <div class="col-md-4 tab-con">
                    <select class="form-control font-s" name="plan_id">
                        @foreach($plans as $pl)
                            <option value="{{{ $pl->id or 0 }}}" @if($plan->id==$pl->id) selected @endif>{{{ $pl->title or '' }}} ( {{{ currencySign() }}}{{{ $pl->price or 0 }}} )</option>
                        @endforeach
                    </select>
                </div>
                <label class="control-label col-md-2 tab-con">{{{ trans('main.course') }}}</label>
                <div class="col-md-4 tab-con">
                    <select class="form-control font-s" name="content_id">
                        @foreach($userContent as $uc)
                            <option value="{{{ $uc->id or 0 }}}">{{{ $uc->title or '' }}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2 tab-con">{{{ trans('main.additional_description') }}}</label>
                <div class="col-md-8 tab-con">
                    <input type="text" class="form-control" name="description" placeholder="Optional">
                </div>
                <div class="col-md-2 tab-con">
                    <input type="submit" class="btn btn-custom btn-100-p" value="Pay" name="pay">
                </div>
            </div>
        </form>
    </div>
@endsection
