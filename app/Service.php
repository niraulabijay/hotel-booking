<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    public function images(){
        return $this->hasMany(ServiceImage::class,'service_id');
    }
}
