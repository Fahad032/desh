<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdditionalAndCommissionTransaction extends Model
{
    //

    protected $fillable=[
                            'user_id',
                            'commission_id',
                            'amount'
                        ];

    public function commission(){

        return $this->belongsTo(AdditionalsAndCommission::class);

    }
}
