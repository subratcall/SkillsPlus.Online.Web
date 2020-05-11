@extends('admin.newlayout.layout',['breadcom'=>['Report','Users']])
@section('title')
    Dashboard
@endsection
@section('page')
    <link rel="stylesheet" href="{!! asset('assets/taskboard/css/lobilist.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/taskboard/css/jquery-ui.min.css') !!}">
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
           <div id="todo-lists-demo-controls"></div>
        </div>
    </section>
    
    
@endsection

@section('scripts')
    <script src="{!! asset('assets/taskboard/js/lobilist.js') !!}"></script>
    <script src="{!! asset('assets/taskboard/js/lobibox.min.js') !!}"></script>
    <script>
    $(document).ready(function() {     
        $('#todo-lists-demo-controls').lobiList({
            lists: [/* {
                    title: 'Todo',
                    defaultStyle: 'lobilist-info',
                    controls: ['edit', 'styleChange'],
                    items: [{
                        title: 'Floor cool cinders',
                        description: 'Thunder fulfilled travellers folly, wading, lake.',
                        dueDate: '2015-01-31'
                    }]
                },
                {
                    title: 'Disabled checkboxes',
                    defaultStyle: 'lobilist-danger',
                    controls: ['edit', 'add', 'remove'],
                    useLobicheck: false,
                    items: [{
                        title: 'Periods pride',
                        description: 'Accepted was mollis',
                        done: true
                    }]
                }, */
                {
                    title: 'Completed',
                    controls: false,
                    items: [{
                        title: 'Composed trays',
                        description: 'Hoary rattle exulting suspendisse elit paradises craft wistful. ' +
                            'Bayonets allures prefer traits wrongs flushed. Tent wily matched bold polite slab coinage ' +
                            'celerities gales beams.'
                    }]
                },
            ]
        });       
    });
        
    </script>
@endsection
