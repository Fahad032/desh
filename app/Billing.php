<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    protected $fillaable = [
        'bill_name'
    ];

    public function billing_transaction(){

        return $this->hasMany(BillingTransaction::class, 'billing_id');

    }
}
