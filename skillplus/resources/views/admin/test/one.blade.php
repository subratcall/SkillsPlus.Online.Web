{{-- @extends('admin.newlayout.layout',['breadcom'=>['Notifications','New Notification']]) --}}
@extends('admin.newlayout.layout-vue')

@section('title')
    {{{ trans('admin.new_notification') }}}
@endsection

@section('page')
<section class="card">
    <div class="card-body">
        <example-component></example-component>
    </div>
</section>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            
        })
    </script>
@endsection