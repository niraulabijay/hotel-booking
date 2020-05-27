<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class RoomType extends Model
{
    //
    use Sluggable;
    protected $table="room_types";
    public function sluggable(){
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    public function images(){
        return $this->hasMany(RoomTypeImage::class,'roomtype_id');
    }
    public function amenities(){
        return $this->belongsToMany(Amenity::class,'amenity_room_type');
    }
    public function rooms(){
        return $this->hasMany(Room::class,'roomtype_id');
    }
    public function bookings(){
        return $this->hasMany(RoomType::class,'room_type_id');
    }

}
