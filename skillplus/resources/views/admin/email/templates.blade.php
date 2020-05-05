@extends('admin.newlayout.layout',['breadcom'=>['Email Templates']])
@section('title')
    {{{ trans('admin.email_templates.') }}}
@endsection
@section('page')

    <section class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped mb-none display responsive nowrap" cellspacing="0" width="100%" id="datatable-basic">
                <thead>
                <tr>
                    <th>{{{ trans('admin.th_title') }}}</th>
                    <th class="text-center" width="100">{{{ trans('admin.th_controls') }}}</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($lists as $list)
                        <tr>
                            <th>{{{ $list->title }}}</th>
                            <th class="text-center" width="100">
                                <a href="/admin/email/template/item/{{{ $list->id }}}" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                <a href="#" data-href="/admin/email/template/delete/{{{ $list->id }}}" title="Delete" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-times" aria-hidden="true"></i></a>
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

@endsection

