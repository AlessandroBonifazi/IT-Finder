<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    //
    // public function contact() {
    //     return $this->hasOne('App\Contact');
    // }
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $fillable = [
        'name', 'email', 'password'
    ];
}
