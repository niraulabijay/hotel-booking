<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomTypeImage extends Model
{
    //
    protected $table="room_type_images";
    public function roomtype(){
         return $this->belongsTo(RoomType::class,'roomtype_id');
    }
}
