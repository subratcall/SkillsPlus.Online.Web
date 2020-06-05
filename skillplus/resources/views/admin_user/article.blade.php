@extends('admin.newlayout.layout')
@section('title')
Article
@endsection

@section('style')

@endsection

@section('page')
<div id="app">
    <section class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <div class="row margin-bottom">
                            <div class="col-lg-12">
                                <ul class="navigation nav nav-pills nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#list" data-toggle="tab" id="switch-list">My
                                            Articles</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#new" data-toggle="tab" id="switch-new">New
                                            Article</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="list">
                                <table id="tbl"
                                    class="table table-bordered table-striped mb-none display responsive nowrap"
                                    cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>

                            <div class="tab-pane fade" id="new">
                                <form method="post" id="form">
                                    <input type="hidden" id="actionType" />
                                    <input type="hidden" id="article_id" />
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-4">
                                                    <label>Title</label>
                                                </div>
                                                <div class="col-8">
                                                    <input type="text" class="form-control" name="title" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-4">
                                                    <label>Category</label>
                                                </div>
                                                <div class="col-8">
                                                    <select class="form-control font-s" name="cat_id">
                                                        @foreach($category as $key => $value)
                                                        <optgroup label="{!! $value['title'] or '' !!}">
                                                            @if(count($value['submenu']) == 0)
                                                            <option value="{!! $value['id'] or '' !!}">
                                                                {!! $value['title'] or '' !!}</option>
                                                            @else
                                                            @foreach($value['submenu'] as $sub)
                                                            <option value="{!! $sub['id'] or '' !!}">
                                                                {!! $sub['title'] or '' !!}</option>
                                                            @endforeach
                                                            @endif
                                                        </optgroup>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row margin-top">
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-4">
                                                    <label class="control-label">Thumbnail</label>
                                                </div>
                                                <div class="col-8">
                                                    <div class="input-group">
                                                        <span class="input-group-prepend view-selected cu-p"
                                                            data-toggle="modal" data-target="#ImageModal"
                                                            data-whatever="thumbnail">
                                                            <span class="input-group-text"><i class="fa fa-eye"
                                                                    aria-hidden="true"></i></span>
                                                        </span>
                                                        <input type="text" name="image" dir="ltr"
                                                            value="{{{$meta['thumbnail'] or ''}}}" class="form-control">
                                                        <span class="input-group-append click-for-upload cu-p">
                                                            <span class="input-group-text"><i class="fa fa-upload"
                                                                    aria-hidden="true"></i></span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-4">
                                                    <label class="control-label">Status</label>
                                                </div>
                                                <div class="col-8">
                                                    <select class="form-control font-s" name="mode">
                                                        <option value="draft">Draft</option>
                                                        <option value="request">Send for review</option>
                                                        <option value="delete">Unpublish Request</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 margin-top">
                                            <label>Article Summary</label>
                                            <div class="form-group">
                                                <textarea class="summernote" name="pre_text" id="pre_text"
                                                    required></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 margin-top">
                                            <label>Description</label>
                                            <textarea class="summernote" name="text" required></textarea>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <input type="submit" value="Save Article"
                                                class="btn btn-success btn-custom btn-save-article" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    {{-- <article-index></article-index> --}}
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@section('script')
<script src="/assets/_plugins/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.11/vue.min.js"></script>
<script>
    var title = $("input[name=title]");
    var category = $("select[name=cat_id]");
    var image = $("img[name=image]");
    var mode = $("select[name=mode]");
    var pre_text = $("textarea[name=pre_text]");
    var text = $("textarea[name=text]");

    $(document).ready(function() {
        list();
    });

    $("#switch-list").click(function() {
        $("#switch-new").text("New Article");
    });

    $("#switch-new").click(function () {
        $("#actionType").val('');
        $("#article_id").val('');

        title.val('');
        category.val('');
        image.val('');
        mode.val('');
        pre_text.summernote("code", '');
        text.summernote("code", '');
                        
    });

    $("#form").submit(function(e) {
        e.preventDefault();

        var data = $(this).serialize();
        var article_id = $("#article_id").val();
        var actionType = $("#actionType").val();

        if (actionType == "1") {
            $.post(`/admin/user_dashboard/request/article/${article_id}/update`, data).then(function(res) {
                $("#switch-list").trigger("click");
                $('#tbl').DataTable().ajax.reload();
                console.log(res);
            });
            
        } else {
            $.post('/admin/user_dashboard/request/article/store', data).then(function(res) {
                $("#switch-list").trigger("click");
                $('#tbl').DataTable().ajax.reload();
                console.log(res);
            });
        }

    });


        function list() {
            tbl = $('#tbl').dtcustom({
                        "ajax": {
                            "type": "GET",
                            "url": "{{ url('/admin/user_dashboard/request/article') }}",
                            "dataSrc": function(json) {
                                return json.data;
                            }
                        },
                        "columns": [{
                                "data": "title"
                            },{
                                "data": "category"
                            },{
                                "data": "date"
                            },{
                                "data": "status"
                            },{
                                "data": "action"
                            },
                        ],
                        columnDefs: [
                            { responsivePriority: 1, targets: 0 },
                            {
                                render: function ( data, type, row ) {
                                return moment(data).format('LL');
                                },
                                
                                targets: 2
                            },
                            {
                                render: function ( data, type, row ) {
                                
                                    if (data == 'publish') {
                                        return `{!! trans('main.published') !!}`;
                                    }
                                    else if (data == 'draft') {
                                        return `{!! trans('main.draft') !!}`;
                                    }
                                    else if (data == 'request') {
                                        return `{!! trans('main.send_for_review') !!}`;
                                    }
                                    else if (data == 'delete') {
                                        return `{!! trans('main.unpublish_request') !!}`;
                                    } else {
                                        return '';
                                    }
                                },

                                targets: 3
                            },
                            {
                            responsivePriority: 1,
                            data: null,
                            defaultContent: `
                                <button class="btn btn-default">View</button>
                                <button class="btn btn-primary" id="edit">Edit</button>
                                <button class="btn btn-danger" id="delete">Delete</button>
                            `,
                            targets: -1,
                            }
                        ],
                    }); 

                    $('#tbl tbody').on('click', '#edit', function () {
                        var data = tbl.row($(this).parents('tr')).data();
                        
                        $("#switch-new").trigger("click");

                        $("#switch-new").text("Edit Article"); 

                        title.val(data.title);
                        category.val(data.cat_id);
                        mode.val(data.status);

                        // pre_text.val(data.pre_text);
                        pre_text.summernote("code", data.pre_text);
                        text.summernote("code", data.text);
                        
                        $("#article_id").val(data.id);
                        
                        $("#actionType").val(1);

                     });
                    
        }

</script>
@endsection