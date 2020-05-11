@extends('admin.newlayout.layout',['breadcom'=>['Employees','New Employee']])
@section('title')
{{{ trans('admin.new_employee') }}}
@endsection
@section('page')

@if( ! empty(session('ErrorEmail')))
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <strong>{{{ trans('admin.email_exists') }}}</strong>
</div>
@endif

@if( ! empty(session('ErrorUsername')))
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <strong>{{{ trans('admin.username') }}}</strong>
</div>
@endif

@section("style")
<style>
    #form {}
</style>
@endsection

<div class="card">
    <div class="card-body">
        <div id="main" class="tab-pane active">
            <form id="form" method="post" action="/admin/manager/new/store" class="form-horizontal form-bordered">
                <div class="form-group">
                    <label class="col-md-3 control-label" for="inputDefault">{{{ trans('admin.real_name') }}}</label>
                    <div class="col-md-6">
                        <input type="text" name="name" value="{{{ old('name') }}}" class="form-control"
                            id="inputDefault">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="inputReadOnly">{{{ trans('admin.username') }}}</label>
                    <div class="col-md-6">
                        <input type="text" name="username" class="form-control text-left" dir="ltr">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="inputReadOnly">{{{ trans('admin.password') }}}</label>
                    <div class="col-md-6">
                        <input type="password" id="password" name="password" class="form-control text-left" dir="ltr">
                    </div>
                </div>

                <div class="form-group">
                    {{-- <label class="col-md-3 control-label" for="inputReadOnly">{{{ trans('admin.password') }}}</label>
                    --}}
                    <label class="col-md-3 control-label" for="inputReadOnly">Confirm Password</label>
                    <div class="col-md-6">
                        <input type="password" name="confirmpassword" class="form-control text-left" dir="ltr">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="inputReadOnly">{{{ trans('admin.email') }}}</label>
                    <div class="col-md-6">
                        <input type="text" name="email" class="form-control text-left" dir="ltr" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">{{{ trans('admin.th_status') }}}</label>
                    <div class="col-md-6">
                        <select name="mode" class="form-control populate">
                            <option value="active">{{{ trans('admin.active') }}}</option>
                            <option value="deactive">{{{ trans('admin.banned') }}}</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-6">
                        <button class="btn btn-primary" type="submit"
                            id="btn-form">{{{ trans('admin.save_changes') }}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">

    function validation() {
        $("#form").validate({
            rules: {
                name: {
                    required: true,
                },
                username: {
                    required: true,
                    rangelength: [4, 20]
                },
                password: {
                    required: true,
                    minlength: 6
                },
                confirmpassword: {
                    required: true,
                    minlength: 6,
                    equalTo: "#password"
                },
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                name: {
                    required: "Please enter your real name",
                },
                username: {
                    required: "Please enter your username",
                    rangelength: "Enter atleast 4 - 6 characters"
                },
                password: {
                    required: "Please enter your password",
                    rangelength: "Enter atleast 4 - 6 characters"
                },
                confirmpassword: {
                    required: "Please enter your confirm password",
                    equalTo: "Your password is mismatch"
                },
                email: {
                    required: "Please enter your email",
                    email: "Please enter a valid email address"
                }
            },
            submitHandler: function(form) { 
                form.submit();
            }
        });
    }

$(document).ready(function() { 

    $("#form").submit(function(e) {
        e.preventDefault();

        var post_url = $(this).attr("action"); //get form action url
        var request_method = $(this).attr("method"); //get form GET/POST method
        var form_data = $(this).serialize(); //Encode form elements for submissio

        validation($(this));

        return false;
    });

    validation();

});
    
</script>
@endsection