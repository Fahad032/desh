<div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title">Investment </h3>
    </div>
    <div class="box-body">
        <div class="row">

            <div class="col-xs-6"><label>Invested On</label></div>
            <div class="col-xs-3"><label>Amount</label></div>

            <div class="clearfix"></div>
            <hr style="margin-top: 0;" />

            <form method="POST" action="/account" id="investment_form" class="ajax_submit">
                {!! csrf_field() !!}
                <input type="hidden" name="investment" value="investment" />
                <div class="input-row-wrapper form-group">

                    <div class="col-xs-6">Product Purchase</div>
                    <div class="col-xs-3">
                        <input type="text" name="product_purchase" class="form-control input-sm" placeholder="2000"
                        value="{{ isset($purchase[2]) ? $purchase[2] : ''}}">
                    </div>

                </div>

                <div class="clearfix"></div>

                <div class="input-row-wrapper form-group">

                    <div class="col-xs-6">Card Purchase</div>
                    <div class="col-xs-3">
                        <input type="text" name="card_purchase" class="form-control input-sm" placeholder="2000"
                               value="{{ isset($purchase[2]) ? $purchase[1] : ''}}">
                    </div>

                </div>

                <div class="clearfix"></div>

                <div class="input-row-wrapper form-group">

                    <div class="col-xs-6">Grameen </div>
                    <div class="col-xs-3">
                        <input type="text" name="grameen_investment" class="form-control input-sm" placeholder="500"
                               value="{{ isset($investment['grameen']) ? $investment['grameen'] : '' }}">
                    </div>

                </div>

                <div class="clearfix"></div>

                <div class="input-row-wrapper form-group">

                    <div class="col-xs-6">Banglalink</div>
                    <div class="col-xs-3">
                        <input type="text" name="banglalink_investment" class="form-control input-sm" placeholder="500"
                               value="{{ isset($investment['banglalink']) ? $investment['banglalink'] : '' }}">
                    </div>

                </div>



                <div class="clearfix"></div>

                <div class="input-row-wrapper form-group">

                    <div class="col-xs-6">Airtel</div>
                    <div class="col-xs-3">
                        <input type="text" name="airtel_investment" class="form-control input-sm" placeholder="500"
                               value="{{ isset($investment['airtel']) ? $investment['airtel'] : '' }}">
                    </div>

                </div>

                <div class="clearfix"></div>

                <div class="input-row-wrapper form-group">

                    <div class="col-xs-6">Grameen - 2</div>
                    <div class="col-xs-3">
                        <input type="text" name="grameen_2_investment" class="form-control input-sm" placeholder="500"
                               value="{{ isset($investment['grameen_2']) ? $investment['grameen_2'] : '' }}">
                    </div>

                </div>

                <div class="clearfix"></div>

                <div class="input-row-wrapper form-group">

                    <div class="col-xs-6">Banglalink - 2</div>
                    <div class="col-xs-3">
                        <input type="text" name="banglalink_2_investment" class="form-control input-sm" placeholder="500"
                               value="{{ isset($investment['banglalink_2']) ? $investment['banglalink_2'] : '' }}">
                    </div>

                </div>

                <div class="clearfix"></div>

                <div class="input-row-wrapper form-group">

                    <div class="col-xs-6">Airtel - 2</div>
                    <div class="col-xs-3">
                        <input type="text" name="airtel_2_investment" class="form-control input-sm" placeholder="500"
                               value="{{ isset($investment['airtel_2']) ? $investment['airtel_2'] : '' }}">
                    </div>

                </div>

                <div class="clearfix"></div>

                <div class="input-row-wrapper form-group">

                    <div class="col-xs-6">Robi</div>
                    <div class="col-xs-3">
                        <input type="text" name="robi_investment" class="form-control input-sm" placeholder="500"
                               value="{{ isset($investment['robi']) ? $investment['robi'] : '' }}">
                    </div>

                </div>

                <div class="clearfix"></div>                                <div class="input-row-wrapper form-group">

                    <div class="col-xs-6">Alap</div>
                    <div class="col-xs-3">
                        <input type="text" name="alap_investment" class="form-control input-sm" placeholder="500"
                               value="{{ isset($investment['alap']) ? $investment['alap'] : '' }}">
                    </div>

                </div>

                <div class="clearfix"></div>

                <div class="input-row-wrapper form-group">

                    <div class="col-xs-6">Teletalk</div>
                    <div class="col-xs-3">
                        <input type="text" name="teletalk_investment" class="form-control input-sm" placeholder="500"
                               value="{{ isset($investment['teletalk']) ? $investment['teletalk'] : '' }}">
                    </div>

                </div>

                <div class="clearfix"></div>

                <div class="input-row-wrapper form-group">

                    <div class="col-xs-6">MobiCash</div>
                    <div class="col-xs-3">
                        <input type="text" name="mobicash_investment" class="form-control input-sm" placeholder="500"
                               value="{{ isset($mobile_cash[0]) ? $mobile_cash[0]->investment : '' }}">
                    </div>

                </div>

                <div class="clearfix"></div>

                <div class="input-row-wrapper form-group">

                    <div class="col-xs-6">Bkash</div>
                    <div class="col-xs-3">
                        <input type="text" name="bkash_investment" class="form-control input-sm" placeholder="500"
                               value="{{ isset($mobile_cash[1]) ? $mobile_cash[1]->investment : '' }}">

                    </div>

                </div>

                <div class="clearfix"></div>

                <div class="input-row-wrapper form-group">

                    <div class="col-xs-6">Telecash</div>
                    <div class="col-xs-3">
                        <input type="text" name="telecash_investment" class="form-control input-sm" placeholder="500"
                               value="{{ isset($mobile_cash[0]) ? $mobile_cash[0]->investment : '' }}">

                    </div>

                </div>

                <div class="clearfix"></div>

                <div class="input-row-wrapper form-group">

                    <div class="col-xs-6">MobiCash Incoming</div>
                    <div class="col-xs-3">
                        <input type="text" name="mobicash_incoming" class="form-control input-sm" placeholder="500"
                               value="{{ isset($mobile_cash[0]) ? $mobile_cash[0]->incoming : '' }}">

                    </div>

                </div>

                <div class="clearfix"></div>

                <div class="input-row-wrapper form-group">

                    <div class="col-xs-6">Bkash Incoming</div>
                    <div class="col-xs-3">
                        <input type="text" name="bkash_incoming" class="form-control input-sm" placeholder="500"
                               value="{{ isset($mobile_cash[2]) ? $mobile_cash[2]->incoming : '' }}">

                    </div>

                </div>

                <div class="clearfix"></div>

                <div class="input-row-wrapper form-group">

                    <div class="col-xs-6">Telecash Incoming</div>
                    <div class="col-xs-3">
                        <input type="text" name="telecash_incoming" class="form-control input-sm" placeholder="500"
                               value="{{ isset($mobile_cash[1]) ? $mobile_cash[1]->incoming : '' }}">

                    </div>

                </div>

                <div class="clearfix"></div>

                <div class="input-row-wrapper form-group">

                    <div class="col-xs-6">Due</div>
                    <div class="col-xs-3">

                        <input type="text" name="due_investment" class="form-control input-sm" placeholder="500"
                               value="{{ isset($purchase[3]) ? $purchase[3] : ''}}">
                    </div>

                </div>

                <div class="clearfix"></div>

                <div class="input-row-wrapper form-group">

                    <div class="col-xs-9">
                        <button type="submit" name="investment_submit" class="btn btn-success btn-sm pull-right" > <span class="fa fa-check"></span>Save  </button>
                    </div>

                </div>

                <div class="clearfix"></div>

            </form>

            <div class="clearfix"></div>


        </div>
    </div>
    <!-- /.box-body -->
</div>