<div class="box">
    <div class="box-header">
        <h3 class="box-title">Product Records</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">

        <table class=" table table-bordered table-hover table-striped">
            <thead>
            <tr>
                <th>Product's Name</th>
                <th>Purchase Amount</th>
                <th>Sells Amount</th>
            </tr>
            </thead>
            <tbody>
            @if($product)

                <?php $total_sells = 0; $total_purchase = 0; ?>

                @foreach($product as $item)

                    @if((count($item->purchase) > 0) && (count($item->sales_transaction) > 0))

                        <?php

                        $total_sells = $total_sells + $item->sales_transaction[0]->sells_amount;
                        $total_purchase = $total_purchase + $item->purchase[0]->purchase_amount;

                        ?>

                        <tr>
                            <td>{{ $item->item_name }}</td>
                            <td>{{ $item->purchase[0]->purchase_amount  }}</td>
                            <td>{{ $item->sales_transaction[0]->sells_amount  }}</td>
                        </tr>
                    @else

                        <tr>
                            <td class="alert-error text-center" colspan="3"><h4> Sorry ! Don't have enough data to generate this report. </h4></td>
                        </tr>
                        <?php break; ?>

                    @endif

            @endforeach


            <tfoot>
            <tr>
                <th>Total</th>
                <th> {{ $total_purchase }} </th>
                <th> {{ $total_sells }} </th>
            </tr>
            <tr>
                <td colspan="3"> <i>*Due Sells Amount = Due Get</i></td>
            </tr>
            </tfoot>

            @endif

            </tbody>

        </table>

    </div>

</div>

