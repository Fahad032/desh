<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdditionalsAndCommission extends Model
{
    protected $fillable = ['additional_field_name'];


    public function commission_transaction(){

        return $this->hasMany(AdditionalAndCommissionTransaction::class, 'commission_id');

    }

}
