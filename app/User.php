<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "user_name",
        "email",
        "password",
        "name",
        "surname",
        "img_path",
        "location",
        "job_experience",
        "cv",
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ["password", "remember_token"];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        "email_verified_at" => "datetime",
    ];

    public function contactInfo()
    {
        return $this->hasOne("App\Contact");
    }

    public function technologies()
    {
        return $this->belongsToMany("App\Technology")->withPivot('user_id', 'technology_id');
    }

    public function messages()
    {
        return $this->hasMany("App\Message");
    }

    public function reviews()
    {
        return $this->hasMany("App\Review");
    }

    public function promos()
    {
        return $this->belongsToMany("App\Promo")->withPivot('user_id', 'promo_id');
    }

    public function specializations()
    {
        return $this->belongsToMany("App\Specialization")->withPivot('user_id', 'specialization_id');
    }
}
