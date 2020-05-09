@extends('admin.newlayout.layout',['breadcom'=>['Courses','Lessons']])
@section('title')
    {{{ trans('admin.lessons') }}}
@endsection
@section('page')
    <div class="card">
        <div class="card-body">
            <div class="tabs">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link" href="#list" data-toggle="tab"> {{{ trans('admin.lessons') }}} </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#newitem" data-toggle="tab">{{{ trans('admin.new_lesson_type') }}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#edititem" data-toggle="tab">Edit</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="list" class="tab-pane">
                        <table class="table table-bordered table-striped mb-none" id="datatable-details">
                            <thead>
                            <tr>
                                <th>{{{ trans('admin.th_title') }}}</th>
                                <th>{{{ trans('admin.th_desc') }}}</th>
                                <th class="text-center" width="100">{{{ trans('admin.th_controls') }}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($lists as $list)
                                <tr>
                                    <td>{{{ $list->lesson }}}</td>
                                    <td>{{{ $list->description }}}</td>
                                    <td class="text-center">
                                        <a href="/admin/content/lesson/edit/{{{ $list->id }}}" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                        <a href="/admin/content/category/filter/{{{ $list->id }}}" title="Manage Filters"><i class="fa fa-tags" aria-hidden="true"></i></a>
                                        <a href="#" data-href="/admin/content/category/delete/{{{ $list->id }}}" title="Delete" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-times" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div id="newitem" class="tab-pane ">
                        <form method="post" action="/admin/content/lesson/store" class="form-horizontal form-bordered">                         

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="inputDefault">{{{ trans('admin.th_title') }}}</label>
                                <div class="col-md-6">
                                    <input type="text" name="lesson" value="" required class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="inputDefault">{{{ trans('admin.th_desc') }}}</label>
                                <div class="col-md-6">
                                    <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-6">
                                    <button class="btn btn-primary" type="submit">{{{ trans('admin.save_changes') }}}</button>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div id="edititem" class="tab-pane active">
                        <form method="post" action="/admin/content/lesson/store" class="form-horizontal form-bordered">
                            <input type="hidden" name="edit" value="{{{ $item->id or '' }}}">
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="inputDefault">{{{ trans('admin.th_title') }}}</label>
                                <div class="col-md-6">
                                    <input type="text" name="lesson" value="{{{ $item->lesson or '' }}}" required class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="inputDefault">{{{ trans('admin.th_desc') }}}</label>
                                <div class="col-md-6">
                                    <textarea name="description" id="" cols="30" rows="10" class="form-control">
                                        {{{ $item->description or '' }}}
                                    </textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-6">
                                    <button class="btn btn-primary" type="submit">{{{ trans('admin.save_changes') }}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

