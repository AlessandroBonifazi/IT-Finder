<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ["user_id", "content", "user_name", "valutation"];

    //
    public function reviews()
    {
        return $this->belongsTo("App\User");
    }
}
