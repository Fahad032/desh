
<form action="/account" method="POST" class="recharge_form" >

    <div class="input-row-wrapper form-group">

        {!! csrf_field() !!}
        <input type="hidden" name="operator_id" value="{{ $balanceObj->id }}">
        <div class="col-xs-3">{{ str_replace('_', ' - ', ucfirst($balanceObj->name)) }}</div>
        <div class="col-xs-3">
            <input type="text" name="opening_balance" class="form-control input-sm" placeholder="5000"
                   value="{{ isset($balanceObj->recharge_balance[0]) ? $balanceObj->recharge_balance[0]->opening_balance: ''}}">
        </div>
        <div class="col-xs-3">
            <input type="text" name="ending_balance" class="form-control input-sm" placeholder="2000"
                   value="{{ isset($balanceObj->recharge_balance[0])? $balanceObj->recharge_balance[0]->ending_balance : '' }}">
        </div>
        <div class="col-xs-3">
            <button type="submit" id="grameen_recharge_balance" class="btn btn-success btn-sm" title="Save"><span class="fa fa-check"></span> Save </button>
        </div>

    </div>

</form>



<div class="clearfix"></div>

