<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RechargeBalance extends Model
{

    protected $fillable = [
                            'user_id',
                            'operator_id',
                            'opening_balance',
                            'ending_balance',
                            'investment',
                            'profit',
                            'total_recharge'
                          ];


    public function opening_is_greater_than_the_ending_balance($opening_balance, $ending_balance){

        return boolval($opening_balance > $ending_balance);


    }

    public function operator(){

        return $this->belongsTo(Operator::class);

    }




}
