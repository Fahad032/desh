<div class="box box-danger">
    <div class="box-header with-border">
        <h3 class="box-title">Commissions Calculation</h3>
    </div>
    <div class="box-body">
        <div class="row">

            <div class="col-xs-6"><label>From</label></div>
            <div class="col-xs-3"><label>Amount</label></div>

            <div class="clearfix"></div>
            <hr style="margin-top: 0;" />

            <form action="/account" method="POST" class="commission-calculation ajax_submit">

                {{ csrf_field() }}
                <input type="hidden" name="commission_calculation" value="commission_calculation"/>

                <div class="input-row-wrapper form-group">

                    <div class="col-xs-6">One Taka ( 1Tk )</div>
                    <div class="col-xs-3">
                        <input type="text" name="one_taka" class="form-control input-sm"
                               value="{{ isset($commission[0]->commission_transaction[0]) ? $commission[0]->commission_transaction[0]->amount : '' }}" placeholder="50">
                    </div>

                </div>

                <div class="clearfix"></div>

                <div class="input-row-wrapper form-group">

                    <div class="col-xs-6">Company Commission </div>
                    <div class="col-xs-3">
                        <input type="text" name="company_commission" class="form-control input-sm" placeholder="500"
                               value="{{ isset($commission[1]->commission_transaction[0]) ? $commission[1]->commission_transaction[0]->amount: '' }}">
                    </div>

                </div>

                <div class="clearfix"></div>

                <div class="input-row-wrapper form-group">

                    <div class="col-xs-6">Mobi Cash Commission</div>
                    <div class="col-xs-3">
                        <input type="text" name="mobi_cash_commission" class="form-control input-sm" placeholder="500"
                               value="{{ isset($commission[2]->commission_transaction[0]) ? $commission[2]->commission_transaction[0]->amount : '' }}">
                    </div>

                </div>

                <div class="clearfix"></div>

                <div class="input-row-wrapper form-group">

                    <div class="col-xs-9">
                        <button type="submit" name="commission_submit" class="btn btn-success btn-sm pull-right" > <span class="fa fa-check"></span> Save </button>
                    </div>

                </div>

                <div class="clearfix"></div>

            </form>

            <div class="clearfix"></div>


        </div>
    </div>
    <!-- /.box-body -->
</div>