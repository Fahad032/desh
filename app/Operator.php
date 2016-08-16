<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{

    protected $fillable = ['name'];



    public function recharge_balance(){

        return $this->hasMany(RechargeBalance::class);

    }

}
