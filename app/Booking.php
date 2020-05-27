<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public function room(){
        return $this->belongsTo(Room::class,'room_id');
    }
    public function room_type(){
        return $this->belongsTo(RoomType::class,'room_type_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
