<div class="box">
    <div class="box-header">
        <h3 class="box-title">Mobile Cash Transactions</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">

        <table class="table table-bordered table-hover table-striped">
            <thead>
            <tr>
                <th>Cash Operator</th>
                <th>Investment</th>
                <th>Incoming</th>
                <th>Outgoing</th>
                <th>Incoming Profit</th>
                <th>Total Profit</th>
            </tr>
            </thead>
            <tbody>

            @if(count($mobile_cash) > 0)

                <?php

                $total_incoming_cash = 0;

                $total_outgoing_cash = 0;

                $total_profit = 0;

                ?>

                @foreach($mobile_cash as $single_cash)

                    <?php

                    $cash_investment = $single_cash->investment;
                    $cash_incoming = $single_cash->incoming;
                    $cash_outgoing = $single_cash->outgoing;
                    $incoming_cash_profit =  $single_cash->incoming_profit;
                    $total_cash_profit =  $single_cash->total_profit;

                    $total_incoming_cash = $total_incoming_cash+$cash_incoming;

                    $total_outgoing_cash = $total_outgoing_cash+$cash_outgoing;

                    $total_profit =  $total_profit + $total_cash_profit;
                    ?>
                    <tr>
                        <td>{{ str_replace('_', ' - ', ucfirst($single_cash->mobile_cash->operator_name)) }}</td>
                        <td>{{ $cash_investment }}</td>
                        <td>{{ $cash_incoming }}</td>
                        <td>{{ $cash_outgoing }}</td>
                        <td>{{ $incoming_cash_profit }}</td>
                        <td>{{ $total_cash_profit }}</td>
                    </tr>



            @endforeach

            <tfoot>
            <tr>
                <th>Total</th>
                <th> {{ $total_incoming_cash }} </th>
                <th> {{ $total_outgoing_cash }} </th>
                <th></th>
                <th></th>
                <th> {{ $total_profit }} </th>
            </tr>
            </tfoot>


            @else

                <tr>
                    <td class="alert-error text-center" colspan="6"><h4> Sorry ! Don't have enough data to generate this report. </h4></td>
                </tr>

                @endif

                </tbody>
        </table>

    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
