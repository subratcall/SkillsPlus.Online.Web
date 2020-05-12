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
            <div class="col-lg-4">
                <label>Add board</label>
                <input type="text" id="kb-btitle" placeholder="Enter list board title"/>
                <button type="button" id="kb-addboard">Add</button>
            </div>
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
        var KanbanTest = new jKanban({
            element : '#myKanban',
            gutter  : '10px',
                click : function(el){
                    alert(el.innerHTML);
                },
            addItemButton: true,
            buttonClick: function(el, boardId) {
                console.log(el);
                console.log(boardId);
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
                    KanbanTest.addElement(boardId, {
                        title: text
                    });
                    formItem.parentNode.removeChild(formItem);
                });
                document.getElementById("CancelBtn").onclick = function() {
                    formItem.parentNode.removeChild(formItem);
                };
            },
        });

        $("#kb-addboard").click(function() {
            KanbanTest.addBoards(
                [{
                    'id' : '_default',
                    'title'  : $('#kb-btitle').val(),
                    'dragTo':['_todo','_working'],
                    'class' : 'error'
                }]
            )
        });
    });

    // var toDoButton = document.getElementById('addToDo');
    // toDoButton.addEventListener('click',function(){
    //     KanbanTest.addElement(
    //         '_todo',
    //         {
    //             'title':'Test Add',
    //         }
    //     );
    // });

    // var addBoardDefault = document.getElementById('addDefault');
    // addBoardDefault.addEventListener('click', function () {
    //     KanbanTest.addBoards(
    //         [{
    //             'id' : '_default',
    //             'title'  : 'Default (Can\'t drop in Done)',
    //             'dragTo':['_todo','_working'],
    //             'class' : 'error',
    //             'item'  : [
    //                 {
    //                     'title':'Default Item',
    //                 },
    //                 {
    //                     'title':'Default Item 2',
    //                 },
    //                 {
    //                     'title':'Default Item 3',
    //                 }
    //             ]
    //         }]
    //     )
    // });

    // var removeBoard = document.getElementById('removeBoard');
    // removeBoard.addEventListener('click',function(){
    //     KanbanTest.removeBoard('_done');
    // });
</script>
@endsection