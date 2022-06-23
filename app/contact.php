<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
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
