
<form action="/account" method="POST" class="recharge_form" >

    <div class="input-row-wrapper form-group">

        {!! csrf_field() !!}
        <input type="hidden" name="operator_id" value="1">
        <div class="col-xs-3">Grameen</div>
        <div class="col-xs-3">
            <input type="text" name="opening_balance" class="form-control input-sm" placeholder="5000">
        </div>
        <div class="col-xs-3">
            <input type="text" name="ending_balance" class="form-control input-sm" placeholder="2000">
        </div>
        <div class="col-xs-3">
            <button type="submit" id="grameen_recharge_balance" class="btn btn-success btn-sm" title="Save"><span class="fa fa-check"></span> Save </button>
        </div>

    </div>

</form>



<div class="clearfix"></div>

