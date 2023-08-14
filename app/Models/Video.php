<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable=['slug', 'link', 'room_id', 'status'];

    public function room(){
        return $this->hasOne('App\Models\Room','id','room_id');
    }
}
