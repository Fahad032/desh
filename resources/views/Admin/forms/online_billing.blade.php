
<div class="box box-danger">
    <div class="box-header with-border">
        <h3 class="box-title">Bills ( Electric, Gas, Wasa ) </h3>
    </div>
    <div class="box-body">
        <div class="row">

            <div class="col-xs-6"><label>Bill Name</label></div>
            <div class="col-xs-3"><label>Amount</label></div>

            <div class="clearfix"></div>
            <hr style="margin-top: 0;" />

            <form action="/account" method="POST" class="ajax_submit" >

                <div class="input-row-wrapper form-group">

                    {{ csrf_field() }}

                    <input type="hidden" name="bills" value="bills"/>

                    <div class="col-xs-6">Wasa</div>
                    <div class="col-xs-3">
                        <input type="text" name="wasa_bill" class="form-control input-sm" placeholder="50"
                               value="{{ isset($bills[0]) ? $bills[0]->amount : '' }}">
                    </div>

                </div>

                <div class="clearfix"></div>

                <div class="input-row-wrapper form-group">

                    <div class="col-xs-6">Advance Bill </div>
                    <div class="col-xs-3">
                        <input type="text" name="advance_bill" class="form-control input-sm" placeholder="500"
                               value="{{ isset($bills[1]) ? $bills[1]->amount : '' }}">
                    </div>

                </div>

                <div class="clearfix"></div>

                <div class="input-row-wrapper form-group">

                    <div class="col-xs-9">
                        <button type="submit" name="mobile_cash_submit" class="btn btn-success btn-sm pull-right" > <span class="fa fa-check"></span>  Save </button>
                    </div>

                </div>

                <div class="clearfix"></div>

            </form>

            <div class="clearfix"></div>


        </div>
    </div>
    <!-- /.box-body -->
</div>
