<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable=['name', 'size', 'path', 'caption', 'room_id', 'status'];

    public static function countActiveImage(){
        $data=Image::where('status','active')->count();
        if($data){
            return $data;
        }
        return 0;
    }

    public function room(){
        return $this->hasOne('App\Models\Room','id','room_id');
    }
}
