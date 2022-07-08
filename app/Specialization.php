<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    //
    protected $fillable = [
        "specialization",
    ];

    public function users()
    {
        return $this->belongsToMany("App\User")->withPivot('user_id', 'specialization_id');
    }
}
