<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable=['user_name', 'email', 'content'];
    public function messages()
    {
        return $this->belongsTo("App\User");
    }
}
