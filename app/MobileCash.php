<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MobileCash extends Model
{

    protected $table = 'mobile_cashes';

    protected $fillable = ['operator_name'];
    
    
    public function mobileCash_transaction(){

        return $this->hasMany(MobileCashTransaction::class);

    }

}
