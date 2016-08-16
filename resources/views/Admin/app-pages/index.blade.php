@extends('Admin.index')

@section('main-content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <!-- Calendar -->

            @if( Session::has('message'))
                <div class="col-xs-12">
                    <div class="box">
                        <div class="alert alert-warning">
                            {{ Session::get('message') }}
                        </div>
                    </div>
                    <div class="clearfix"></div>


                </div>
                <div class="clearfix"></div>
            @endif
            <?php
                $action = 'account';
                $btn_value = 'Search';
                $text_info = 'Adding records for the date of';
            ?>
            @include('Admin.forms.search-form', [$text_info, $date, $action, $btn_value])
            <div class="clearfix"></div>

        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-7 connectedSortable">


                <!-- Recharge Balance -->

                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Recharge Balance </h3>
                        <span class="text-danger pull-right"></span>
                    </div>
                    <div class="box-body">
                        <div class="row">

                            <div class="col-xs-3"><label>Operators</label></div>
                            <div class="col-xs-3"><label>Opening</label></div>
                            <div class="col-xs-3"><label>Ending</label></div>
                            <div class="col-xs-3"><label>Action</label></div>

                            <div class="clearfix"></div>
                            <hr style="margin-top: 0;" />

                            @if($recharge_balance)

                                <?php $investment = []; ?>

                                @foreach( $recharge_balance as $balanceObj )

                                    <?php

                                    isset($balanceObj->recharge_balance[0]) ? ( $investment["$balanceObj->name"] = $balanceObj->recharge_balance[0]->investment ) : '';

                                    ?>

                                    @include('Admin.forms.recharge_balance', $balanceObj)

                                @endforeach

                            @endif

                            <div class="clearfix"></div>


                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->


                <!-- Commission Calculation box -->

                @if($commission)

                     @include('Admin.forms.commission_calculation', $commission)

                @endif

                <!-- /.box -->



                <!-- Mobile Cash Transfer Box  -->

                @if($mobile_cash)

                    @include('Admin.forms.mobilecash_transaction', $mobile_cash)


                @endif

                <!-- /.box -->


                <!-- Online Billing Box  -->

                @if($bills)

                    @include('Admin.forms.online_billing', $bills)

                @endif
                <!-- /.box -->


                <!-- Custom tabs (Charts with tabs)-->
                <div class="nav-tabs-custom">
                    <!-- Tabs within a box -->
                    <ul class="nav nav-tabs pull-right">
                        <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
                        <li><a href="#sales-chart" data-toggle="tab">Donut</a></li>
                        <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>
                    </ul>
                    <div class="tab-content no-padding">
                        <!-- Morris chart - Sales -->
                        <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
                        <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
                    </div>
                </div>
                <!-- /.nav-tabs-custom -->



            </section>
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-5 connectedSortable">

                <!-- Today's sells Box  -->

                @if($product)

                            <?php  $purchase = []; ?>

                        @foreach($product as $item)
                            <?php
                                //[{"id":1,"product_id":1,"sells_amount":500}]
                                $transaction = $item->sales_transaction;

                                $purchase[$item->id] = isset($item->purchase[0]) ? $item->purchase[0]->purchase_amount : '';

                                $data[] = ['sells_amount' => $item->sales_transaction];
                            ?>
                        @endforeach

                    @include('Admin.forms.sells', $data)

                @endif
                <!-- /.box -->

                <!-- Additional Box  -->

                @if($product)

                    @include('Admin.forms.additional', $product)

                @endif
                <!-- /.box -->



                <!-- Investment Box  -->


                @include('Admin.forms.investment',
                            [
                                'investment' => $investment,
                                'purchase' => $purchase,
                                'mobile_cash' => $mobile_cash

                            ])
                <!-- /.box -->




                <!-- solid sales graph -->
                <div class="box box-solid bg-teal-gradient">
                    <div class="box-header">
                        <i class="fa fa-th"></i>

                        <h3 class="box-title">Sales Graph</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body border-radius-none">
                        <div class="chart" id="line-chart" style="height: 250px;"></div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer no-border" style="display: none;">
                        <div class="row">
                            <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                                <input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60" data-fgColor="#39CCCC">

                                <div class="knob-label">Mail-Orders</div>
                            </div>
                            <!-- ./col -->
                            <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                                <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60" data-fgColor="#39CCCC">

                                <div class="knob-label">Online</div>
                            </div>
                            <!-- ./col -->
                            <div class="col-xs-4 text-center">
                                <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60" data-fgColor="#39CCCC">

                                <div class="knob-label">In-Store</div>
                            </div>
                            <!-- ./col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->



            </section>
            <!-- right col -->
        </div>
        <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@stop
