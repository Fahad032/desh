<div class="box box-danger">
    <div class="box-header with-border">
        <h3 class="box-title">Mobile Cash Transactions </h3>
    </div>
    <div class="box-body">
        <div class="row">

            <div class="col-xs-6"><label>From</label></div>
            <div class="col-xs-3"><label>Amount</label></div>

            <div class="clearfix"></div>
            <hr style="margin-top: 0;" />

            <form action="/account" method="POST" class="ajax_submit">

                <div class="input-row-wrapper form-group">

                    {{ csrf_field() }}

                    <input type="hidden" name="mobile_cash_transactions" value="mobile_cash_transactions" />

                    <div class="col-xs-6">MobiCash</div>
                    <div class="col-xs-3">
                        <input type="text" name="mobicash" class="form-control input-sm" placeholder="50"
                        value="{{ isset($mobile_cash[0]) ? $mobile_cash[0]->outgoing : '' }}">
                    </div>

                </div>

                <div class="clearfix"></div>

                <div class="input-row-wrapper form-group">

                    <div class="col-xs-6">TeleCash </div>
                    <div class="col-xs-3">
                        <input type="text" name="telecash" class="form-control input-sm" placeholder="500"
                               value="{{ isset($mobile_cash[1]) ? $mobile_cash[1]->outgoing : '' }}">
                    </div>

                </div>

                <div class="clearfix"></div>

                <div class="input-row-wrapper form-group">

                    <div class="col-xs-6">Bkash</div>
                    <div class="col-xs-3">
                        <input type="text" name="bkash" class="form-control input-sm" placeholder="500"
                               value="{{ isset($mobile_cash[2]) ? $mobile_cash[2]->outgoing : '' }}">
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