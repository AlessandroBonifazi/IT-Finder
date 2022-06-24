<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tecnology extends Model
{
    //
    public function users()
    {
        return $this->belongsToMany("App\User");
    }
}
