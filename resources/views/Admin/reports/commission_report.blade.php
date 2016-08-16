<div class="box">
    <div class="box-header">
        <h3 class="box-title">Commission Calculations</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">

        <table class=" table table-bordered table-hover table-striped">
            <thead>
            <tr>
                <th>From</th>
                <th> Amount</th>
            </tr>
            </thead>
            <tbody>
            @if(count($commission) > 0)

                <?php $total_commission = 0; ?>

                @foreach($commission as $local_commission)

                    @if(count($local_commission) > 0)

                        <?php

                        $total_commission = $total_commission + $local_commission->amount;

                        ?>

                        <tr>
                            <td>{{ $local_commission->commission->additional_field_name }}</td>
                            <td>{{ $local_commission->amount  }}</td>
                        </tr>

            @endif

            @endforeach


            <tfoot>
            <tr>
                <th>Total</th>
                <th> {{ $total_commission }} </th>
            </tr>

            </tfoot>

            @else

                <tr>
                    <td class="alert-error text-center" colspan="3"><h4> Sorry ! Don't have enough data to generate this report. </h4></td>
                </tr>


                @endif

                </tbody>

        </table>

    </div>

</div>