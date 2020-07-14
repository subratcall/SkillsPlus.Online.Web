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
        color:  #090001
    }

    .jk_danger{
        background: #f20d12;/*#FB7D44;*/
        color: #090001
    }

    .jk_success{
        background: #399444;/*#FB7D44;*/
        color: #090001
    }

    
</style>
@endsection

@section('page')
<div class="row">
    <div class="col-xs-6 col-md-3 col-sm-6 text-center">

     {{--
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
        --}}
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
                <div id="myKanban" ></div>
            </div>
        </div>
    </div>
</section>


@endsection

@section('script')
<script src='{{ asset('assets/_plugins/jkanban.min.js') }}'></script>
<script>
    $(document).ready(function() {
        $.ajax({
            url: "{{ url('/admin/user_dashboard/course_overview') }}",
            type: "get",
            dataType: 'JSON',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                var c = []
                var f = []
                var e = []
                for (let index = 0; index < data.courses.length; index++) {
                    c.push({"title":data.courses[index].content_title});                            
                }
                for (let index = 0; index < data.favorite.length; index++) {
                    f.push({"title":data.favorite[index].content_title});
                }
                for (let index = 0; index < data.favorite.length; index++) {
                    e.push({"title":data.favorite[index].content_title});
                }
                           
                var KanbanTest = new jKanban({
                    element : '#myKanban',
                    gutter  : '10px',
                            dragBoards : false,
                    click : function(el){
                        
                    },
                    boards  :[
                        {
                            'id' : '_todo',
                            dragBoards : false,
                            'title'  : 'New',
                            'class' : 'jk_danger',
                            'item'  : c
                        },
                        {
                            'id' : '_working',
                            dragBoards : false,
                            'title'  : 'In Progress',
                            'class' : 'error',
                            'item'  : f
                        },
                        {
                            'id' : '_working',
                            dragBoards : false,
                            'title'  : 'Completed',
                            'class' : 'jk_success',
                            'item'  : e
                        },
                    ]
                });
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error! Contact IT Department.');
            }
        });
        
    });
</script>
@endsection