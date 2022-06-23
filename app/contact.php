<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    //
    public function user() {
        return $this->belongsTo('App\user');
    }

    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $fillable = [
        'contact_email', 'linkedin', 'phone', 'site', 'github'
    ];
}
