
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Billing Records</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">

        <table class=" table table-bordered table-hover table-striped">
            <thead>
            <tr>
                <th>Bill Name</th>
                <th> Amount</th>
            </tr>
            </thead>
            <tbody>
            @if(count($bills) > 0)

                <?php $total_bill = 0; ?>

                @foreach($bills as $bill)

                    @if(count($bill) > 0)

                        <?php

                        $total_bill = $total_bill + $bill->amount;

                        ?>

                        <tr>
                            <td>{{ $bill->bill->bill_name }}</td>
                            <td>{{ $bill->amount  }}</td>
                        </tr>

            @endif

            @endforeach


            <tfoot>
            <tr>
                <th>Total</th>
                <th> {{ $total_bill }} </th>
            </tr>
            <tr>
                <td colspan="2"> <i>*Advance Bill = those are accepted but not paid</i></td>
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

