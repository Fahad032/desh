<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['item_name'];

    public function purchase(){

        return $this->hasMany(Purchase::class);

    }

    public function sales_transaction(){

        return $this->hasMany(SalesTransaction::class);

    }

}
