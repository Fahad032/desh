@extends('Admin.index')

@section('main-content')


<div class="content-wrapper">

<!-- Main content -->
<section class="content">
    <div class="row">

        <!-- Calendar -->
        <?php
        $action = 'report';
        $btn_value = 'View Report';
        $text_info = ' Report For ';
        ?>
        @include('Admin.forms.search-form', [$text_info, $date, $action, $btn_value])
        <div class="clearfix"></div>


        <div class="col-xs-12">

            @include('Admin.reports.recharge_balance_report', $recharge_balance)

        </div>


        <div class="clearfix"></div>


        <div class="col-xs-12">

            @include('Admin.reports.mobile_cash_report', $mobile_cash)

        </div>


        <div class="clearfix"></div>

        <div class="col-xs-12">

            @include('Admin.reports.products_report', $product)

        </div>


        <div class="clearfix"></div>

        <div class="col-xs-12 col-sm-6">

            @include('Admin.reports.billing_report', $bills)

        </div>





<!-- commission -->
        <div class="col-xs-12 col-sm-6">

            @include('Admin.reports.commission_report', $commission)

        </div>

    <div class="clearfix"></div>

    </div>

 </section>

</div>
<!-- /.content-wrapper -->
@stop
