@extends('admin.newlayout.layout',['breadcom'=>['Email Template']])
@section('title')
    {!! trans('admin.templates') !!}
@endsection
@section('page')
    <section class="card card-collapsed">
        <div class="card-body">
            <p>{{{ trans('admin.username') }}} : [username] </p>
            <hr>
            <p>{{{ trans('admin.real_name') }}} : [name] </p>
            <hr>
            <p>{{{ trans('admin.password') }}} : [password] </p>
            <hr>
            <p>{{{ trans('admin.email') }}} : [email] </p>
            <hr>
            <p>{{{ trans('admin.user_activation_link') }}} : [active] </p>
            <hr>
            <p>{{{ trans('admin.change_password_link') }}} : [token] </p>
        </div>
    </section>

    <section class="card">
        <div class="card-body">

            <form id="form" action="/admin/email/template/edit" class="form-horizontal form-bordered" method="post">

                <input type="hidden" name="id" value="{{{$item->id or ''}}}">
                <div class="form-group">
                    <label class="col-md-4 control-label" for="inputDefault">{!! trans('admin.th_title') !!}</label>
                    <div class="col-md-11">
                        <input type="text" name="title" class="form-control" value="{{{ $item->title or '' }}}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="inputDefault">Message body</label>
                    <div class="col-md-12">
                        <textarea class="form-control text-left summernote" dir="ltr" rows="15" name="template">
                            @if(isset($item->template))
                                {!! htmlentities($item->template) !!}
                            @endif
                        </textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <button class="btn btn-primary pull-left" type="submit">{{{ trans('admin.save_changes') }}}</button>
                    </div>
                </div>

            </form>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            function validation() {
                $("#form").validate({
                    rules: {
                        title: {
                            required: true
                        }
                    },
                    message: {
                        title: {
                            required: "Please enter a title"
                        }
                    }
                })
            }

            validation();

            $("#form").submit(function(e) {
                e.preventDefault();

                validation();
            });
        });
    </script>
@endsection