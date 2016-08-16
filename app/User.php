<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function roles(){

        return $this->belongsToMany(\App\Role::class, 'role_user', 'user_id', 'role_id');

    }


    public function is_allowed($role){

        if($this->is_active()){

            return $this->roles[0]->role == $role;

        }

        return false;

    }

    public function is_active(){

        return (bool)count($this->roles);

    }

}
