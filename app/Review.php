<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    public function reviews()
    {
        return $this->belongsTo("App\User");
    }
}
