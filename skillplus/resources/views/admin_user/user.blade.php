@extends('admin.newlayout.layout',['breadcom'=>['Report','Users']])
@section('title')
Dashboard
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
        <!-- <section class="card bg-warning">
                <div class="card-body">
                    <div class="widget-summary">
                        <div class="widget-summary-col">
                            <div class="summary">
                                <h4 class="title">{{{  trans('admin.total_users') }}}</h4>
                                <div class="info">
                                    <strong class="amount">{{{ $userCount or 0 }}}</strong>
                                </div>
                            </div>
                            <div class="summary-footer">
                                <a href="/admin/user/lists" class="text text-uppercase">{{{  trans('admin.users_list') }}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section> -->
    </div>
    <!-- <div class="col-xs-6 col-md-3 col-sm-6 text-center">
            <section class="card bg-info">
                <div class="card-body">
                    <div class="widget-summary">
                        <div class="widget-summary-col">
                            <div class="summary">
                                <h4 class="title">{{{  trans('admin.total_employees') }}}</h4>
                                <div class="info">
                                    <strong class="amount">{{{ $adminCount or 0 }}}</strong>
                                </div>
                            </div>
                            <div class="summary-footer">
                                <a href="/admin/manager/lists" class="text text-uppercase">{{{  trans('admin.employees_list') }}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-xs-6 col-md-3 col-sm-6 text-center">
            <section class="card bg-success">
                <div class="card-body">
                    <div class="widget-summary">
                        <div class="widget-summary-col">
                            <div class="summary">
                                <h4 class="title">{{{  trans('admin.total_customers') }}}</h4>
                                <div class="info">
                                    <strong class="amount">{{{ $buyerCount or 0 }}}</strong>
                                </div>
                            </div>
                            <div class="summary-footer">
                                <a class="text text-uppercase">{{{  trans('admin.customers_deff') }}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-xs-6 col-md-3 col-sm-6 text-center"> -->
    <!-- <section class="card bg-danger">
            <div class="card-body">
                <div class="widget-summary">
                    <div class="widget-summary-col">
                        <div class="summary">
                            <h4 class="title">{{{  trans('admin.total_sellers') }}}</h4>
                            <div class="info">
                                <strong class="amount">{{{ $sellerCount or 0 }}}</strong>
                            </div>
                        </div>
                        <div class="summary-footer">
                            <a class="text text-uppercase">{{{  trans('admin.seller_deff') }}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
</div>
</div>
<section class="card">
    <div class="card-body">
        <!--  <canvas id="myChart" width="400" height="200"></canvas> -->
        <div class="row">
            <!-- <div class="col-lg-4">
                <label>Add board</label>
                <input type="text" id="kb-btitle" placeholder="Enter list board title"/>
                <button type="button" id="kb-addboard">Add</button>
            </div> -->
            <div class="col-lg-12">
                <div id="myKanban"></div>
            </div>
        </div>
    </div>
</section>


@endsection

@section('script')
<script src='{{ asset('assets/_plugins/jkanban.min.js') }}'></script>
<script>
    $(document).ready(function() {

        var c = []
        var f = []

        $.ajax({
            url: "{{ url('/admin/user_dashboard/course_overview') }}",
            type: "get",
            dataType: 'JSON',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                console.log(data);

                for (let index = 0; index < data.courses.length; index++) {
                    c.push({"title":data.courses[index].content_title});                            
                }
                for (let index = 0; index < data.favorite.length; index++) {
                    f.push({"title":data.favorite[index].content_title});
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error! Contact IT Department.');
            }
        });

        
        var countb = 0;
        var countc = 0;
        var dragarr = [];

        var KanbanTest = new jKanban({
            element : '#myKanban',
            gutter  : '10px',
                click : function(el){
                    alert(el.innerHTML);
                },
            dragBoards       : true, 
            addItemButton: true,
            buttonContent    : '+',
            itemHandleOptions: {
                enabled             : true,                                 // if board item handle is enabled or not
                handleClass         : "item_handle",                         // css class for your custom item handle
                customCssHandler    : "drag_handler",                        // when customHandler is undefined, jKanban will use this property to set main handler class
                customCssIconHandler: "drag_handler_icon",                   // when customHandler is undefined, jKanban will use this property to set main icon handler class. If you want, you can use font icon libraries here
                customHandler       : `
                    <div class='item_handle'>
                        %s <span class='float-r' id="item_delete">x</span>
                    </div>
                    `
            },
            click: function(el) {
                // console.log("kanban click: "+el);
            },
            buttonClick: function(el, boardId) {
                // console.log(el);
                // console.log(boardId);
                // create a form to enter element
                var formItem = document.createElement("form");
                formItem.setAttribute("class", "itemform");
                formItem.innerHTML =
                    `<div class="form-group">
                        <textarea class="form-control" rows="2" autofocus></textarea>
                    </div><div class="form-group">
                        <button type="submit" class="btn btn-primary btn-xs pull-right">Submit</button>
                        <button type="button" id="CancelBtn" class="btn btn-default btn-xs pull-right">Cancel</button>
                    </div>`;

                KanbanTest.addForm(boardId, formItem);
                formItem.addEventListener("submit", function(e) {
                    e.preventDefault();

                    var text = e.target[0].value;

                    if (text) {
                        KanbanTest.addElement(boardId, {
                            id: countc.toString(),
                            title: text,
                        });

                        formItem.parentNode.removeChild(formItem);
                        countc++;
                    } else {
                        formItem.parentNode.removeChild(formItem);
                    }
                });

                document.getElementById("CancelBtn").onclick = function() {
                    formItem.parentNode.removeChild(formItem);
                 };
            },
            boards  :[
                    {
                        'id' : '_todo',
                        dragBoards : false,
                        'title'  : 'My Courses',
                        'class' : 'info',
                        'item'  : c
                    },
                        {
                        'id' : '_working',
                        dragBoards : false,
                        'title'  : 'Favorites',
                        'class' : 'warning',
                        'item'  : f
                    },
            ]
        });

        $("#kb-addboard").click(function() {

            countb = countb.toString();

            dragarr.push(countb);
            
            if ($("#kb-btitle").val()) {
    
                KanbanTest.addBoards(
                    [{
                        'id' : countb,
                        'title'  : $('#kb-btitle').val(),
                        'dragTo': dragarr,
                        'class' : 'error'
                    }]
                )
            }

            // console.log(dragarr);

            countb++;
        });

        $(document).on("click", "#item_delete", function(e) {
            var eid = $(this).parent('div').parent('div').attr("data-eid");

            var r = confirm("Remove item?");
            if (r == true) {
                KanbanTest.removeElement(eid);   
            } else {
                return false;
            }
        });

    });

</script>
@endsection