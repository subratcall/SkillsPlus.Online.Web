@extends('admin.newlayout.layout',['breadcom'=>['Support','New Ticket']])
@section('title')
{{{ trans('admin.submit_ticket') }}}
@endsection

@section('style')
<style>
    .select2 {
        width: 100% !important;
    }
</style>
@endsection

@section('page')
<section class="card">
    <div class="card-body">

        <div class="row">
            <div class="col-12">

                {{-- <form id="form" action="/admin/ticket/store" class="form-horizontal form-bordered" method="post"> --}}
                <form id="form" action="/admin/ticket/store" method="post">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="control-label" for="inputDefault">{{{ trans('admin.th_title') }}}</label>
                            <input type="text" name="title" value="{{{ $_GET['title'] or '' }}}" class="form-control"
                                required>
                        </div>

                        <div class="form-group col-md-12" id="userone">
                            <label class="control-label" for="inputDefault">{{{ trans('admin.department') }}}</label>
                            <select name="category_id" class="form-control select2">
                                @foreach($category as $cat)
                                <option value="{{{ $cat->id or 0 }}}">{{{ $cat->title or '' }}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-12" id="userone">
                            <label class="control-label" for="inputDefault">{{{ trans('admin.users') }}}</label>
                            <select name="user_id" class="form-control select2">
                                @foreach($users as $user)
                                <option value="{{{ $user->id }}}" @if(isset($_GET['uid']) && $_GET['uid']==$user->id)
                                    selected
                                    @endif>{{{ $user->username }}} ({{{ $user->name }}})</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <textarea class="summernote" name="msg" required></textarea>
                        </div>

                        <div class="form-group col-md-12">
                            <button class="btn btn-primary pull-left" type="submit">{{{ trans('admin.send') }}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        </form>
    </div>
</section>
@endsection