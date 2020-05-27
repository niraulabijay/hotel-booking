<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //
    public function roomtype(){
        return $this->belongsTo(RoomType::class,'roomtype_id');
    }
    public function floor(){
       return $this->belongsTo(Floor::class,'floor_id');
    }
    public function bookings(){
        return $this->hasMany(Booking::class,'room_id');
    }
}
