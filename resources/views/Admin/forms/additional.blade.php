<div class="box box-danger">
    <div class="box-header with-border">
        <h3 class="box-title">Additional Amounts </h3>
    </div>
    <div class="box-body">
        <div class="row">

            <div class="col-xs-6"><label>Field Name</label></div>
            <div class="col-xs-3"><label>Amount</label></div>

            <div class="clearfix"></div>
            <hr style="margin-top: 0;" />

            <form action="/account" method="POST" class="ajax_submit">

                <div class="input-row-wrapper form-group">

                    <div class="col-xs-6">Due Get</div>
                    <div class="col-xs-3">
                        {{ csrf_field() }}
                        <input type="text" name="due_get" class="form-control input-sm" placeholder="50"
                               value="{{ isset($product[2]->sales_transaction[0]) ? $product[2]->sales_transaction[0]->sells_amount : '' }}">
                    </div>

                </div>



                <div class="clearfix"></div>

                <div class="input-row-wrapper form-group">

                    <div class="col-xs-9">
                        <button type="submit" name="additional_amount_submit" class="btn btn-success btn-sm pull-right" > <span class="fa fa-check"></span> Save </button>
                    </div>

                </div>

                <div class="clearfix"></div>

            </form>

            <div class="clearfix"></div>


        </div>
    </div>
    <!-- /.box-body -->
</div>
