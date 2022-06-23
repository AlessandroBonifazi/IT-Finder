<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    //
    public function contact() {
        return $this->hasOne('App\contact');
    }
}
