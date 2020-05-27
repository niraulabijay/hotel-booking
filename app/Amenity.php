<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
    //
    protected $table="amenities";
    public function room_types(){
       return $this->belongsToMany(RoomType::class,'amenity_room_type');
    }
}
