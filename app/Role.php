<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //

    protected $fillable = ['role'];


    public function user(){

        return $this->belongsToMany(App\User::class, 'role_user', 'role_id', 'user_id');

    }
}
