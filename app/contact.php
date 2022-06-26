<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        "user_id",
        "contact_email",
        "phone",
        "linkedin",
        "github",
        "site",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
