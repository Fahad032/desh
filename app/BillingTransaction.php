<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillingTransaction extends Model
{

    protected $fillable = [

        'user_id',
        'billing_id',
        'amount'
        
    ];

    public function bill(){

        return $this->belongsTo(Billing::class, 'billing_id');

    }
    
}
