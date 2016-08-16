<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = [

                             'user_id',
                             'product_id',
                             'purchase_amount'
    ];

    public function product(){

        return $this->hasMany(SalesTransaction::class);

    }
}
