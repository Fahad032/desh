
<div class="box box-danger">
    <div class="box-header with-border">
        <h3 class="box-title">Today's Sells </h3>
    </div>
    <div class="box-body">
        <div class="row">

            <div class="col-xs-6"><label>Product Name</label></div>
            <div class="col-xs-3"><label>Amount</label></div>

            <div class="clearfix"></div>
            <hr style="margin-top: 0;" />

            <form action="/account" method="POST" class="ajax_submit">

                <div class="input-row-wrapper form-group">

                    <div class="col-xs-6">Cards</div>
                    <div class="col-xs-3">
                        {{ csrf_field() }}
                        <input type="text" name="cards_sell" class="form-control input-sm" placeholder="50"
                               value="{{ (isset($data[0]['sells_amount']) && count($data[0]['sells_amount']) > 0 ) ? $data[0]['sells_amount'][0]->sells_amount : '' }}">
                    </div>

                </div>

                <div class="clearfix"></div>

                <div class="input-row-wrapper form-group">

                    <div class="col-xs-6">Other Products </div>
                    <div class="col-xs-3">
                        <input type="text" name="other_products" class="form-control input-sm" placeholder="500"
                               value="{{ (isset($data[1]['sells_amount']) && count($data[1]['sells_amount']) > 0) ? $data[1]['sells_amount'][0]->sells_amount : '' }}">
                    </div>

                </div>

                <div class="clearfix"></div>

                <div class="input-row-wrapper form-group">

                    <div class="col-xs-9">
                        <button type="submit" name="mobile_cash_submit" class="btn btn-success btn-sm pull-right" > <span class="fa fa-check"></span> Save </button>
                    </div>

                </div>

                <div class="clearfix"></div>

            </form>

            <div class="clearfix"></div>


        </div>
    </div>
    <!-- /.box-body -->
</div>
