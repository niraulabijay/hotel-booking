<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cartalyst\Sentinel\Users\EloquentUser;

class User extends EloquentUser
{
    //
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'address', 'dob', 'contact_number', 'profile_image', 'last_login','permissions',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    public function bookings(){
        return $this->hasMany(Booking::class,'user_id');
    }
}
