<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MobileCashTransaction extends Model
{
    protected $fillable = [

        'user_id',
        'mobile_cash_id',
        'incoming',
        'outgoing',
        'incoming_profit',
        'outgoing_profit',
        'total_profit'

    ];


    public function mobile_cash(){

        return $this->belongsTo(MobileCash::class);
        
    }

}
