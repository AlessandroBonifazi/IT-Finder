<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    public function messages()
    {
        return $this->belongsTo("App\User");
    }
}
