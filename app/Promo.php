<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    //
    protected $fillable = [
        "user_id", "promo_id", "duration", "type", "price"
    ];
    public function users()
    {
        return $this->belongsToMany("App\User")->withPivot('user_id', 'promo_id');
    }
}
