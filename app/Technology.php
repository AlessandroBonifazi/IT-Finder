<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    //
    protected $fillable = [
        "name",
        "logo",
    ];

    public function users()
    {
        return $this->belongsToMany("App\User");
    }
}
