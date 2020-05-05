@extends('admin.newlayout.layout',['breadcom'=>['Users','Channels List']])
@section('title')
    {{{ trans('admin.channels_list') }}}
@endsection
@section('page')
    <section class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped mb-none display responsive nowrap" cellspacing="0" width="100%" id="datatable-details">
                <thead>
                <tr>
                    <th>{{{ trans('admin.channel_title') }}}</th>
                    <th class="text-center">{{{ trans('admin.channel_id') }}}</th>
                    <th class="text-center">{{{ trans('admin.creator') }}}</th>
                    <th class="text-center" width="200">{{{ trans('admin.verification_status') }}}</th>
                    <th class="text-center" width="50">{{{ trans('admin.contents') }}}</th>
                    <th class="text-center" width="50">{{{ trans('admin.th_status') }}}</th>
                    <th class="text-center" width="50">{{{ trans('admin.views') }}}</th>
                    <th class="text-center" width="50">{{{ trans('admin.th_controls') }}}</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($channels as $channel)
                        <tr>
                            <td>{{{ $channel->title or '' }}}</td>
                            <td class="text-center"><a href="/chanel/{{{ $channel->username or '' }}}" target="_blank">{{{ $channel->username or '' }}}</a></td>
                            <td class="text-center" title="{{{ $channel->user->username or '' }}}"><a href="/profile/{{{ $channel->user->id or '' }}}" target="_blank">{{{ $channel->user->username or '' }}}</a></td>
                            <td class="text-center">
                                @if($channel->formal == 'ok')
                                    <b class="c-g">{{{ trans('admin.verified') }}}</b>
                                @else
                                    <b class="c-r">{{{ trans('admin.not_verified') }}}</b>
                                @endif
                            </td>
                            <td class="text-center" width="50">{{{ $channel->contents_count or 0 }}}</td>
                            <td class="text-center">
                                @if($channel->mode == 'active')
                                    <span class="c-g">{{{ trans('admin.active') }}}</span>
                                @else
                                    <span class="c-r">{{{ trans('admin.disabled') }}}</span>
                                @endif
                            </td>
                            <td class="text-center">{{{ $channel->view or '0' }}}</td>
                            <td class="text-center">
                                <a href="/admin/channel/item/{{{ $channel->id }}}" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                <a href="#" data-href="/admin/channel/delete/{{{ $channel->id }}}" title="Delete" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-times" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection


