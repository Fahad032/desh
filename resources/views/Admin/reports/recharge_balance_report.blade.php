<div class="box">
    <div class="box-header">
        <h3 class="box-title">Recharge Balance Records</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">

        <table class=" table table-bordered table-hover table-striped">
            <thead>
            <tr>
                <th>Operator's Name</th>
                <th>Opening</th>
                <th>Investment</th>
                <th>Ending</th>
                <th>Profit</th>
                <th>Total Recharge</th>
            </tr>
            </thead>
            <tbody>

            @if($recharge_balance)

                <?php

                $total_recharge_profit = 0;

                $total_recharge = 0;

                ?>

                @foreach($recharge_balance as $balance)

                    @if(!isset($balance->recharge_balance[0]))

                        <tr>
                            <td class="alert-error text-center" colspan="6"><h4> Sorry ! Don't have enough data to generate this report. </h4></td>
                        </tr>
                        <?php break;  ?>

                    @else
                        <?php

                        $total_recharge_profit = $total_recharge_profit+$balance->recharge_balance[0]->profit;

                        $total_recharge = $total_recharge+$balance->recharge_balance[0]->total_recharge;

                        ?>
                        <tr>
                            <td>{{ str_replace('_', ' - ', ucfirst($balance->name)) }}</td>
                            <td>{{ $balance->recharge_balance[0]->opening_balance }}</td>
                            <td>{{ $balance->recharge_balance[0]->investment }}</td>
                            <td>{{ $balance->recharge_balance[0]->ending_balance }}</td>
                            <td>{{ $balance->recharge_balance[0]->profit }}</td>
                            <td>{{ $balance->recharge_balance[0]->total_recharge }}</td>
                        </tr>


                    @endif


                @endforeach

            @endif

            </tbody>
            <tfoot>
            <tr>
                <th colspan="4">Total</th>
                <th>{{ $total_recharge_profit }}</th>
                <th>{{ $total_recharge }}</th>
            </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
