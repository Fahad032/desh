<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesTransaction extends Model
{
    protected $fillable = [
                            'user_id',
                            'product_id',
                            'sells_amount'
                          ];

    public function product(){

        return $this->belongsTo(Product::class);

    }
}
