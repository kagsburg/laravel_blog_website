<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomReview extends Model
{
    protected $fillable=['user_id','room_id','rate','review','status'];

    public function user_info(){
        return $this->hasOne('App\User','id','user_id');
    }

    public static function getAllReview(){
        return RoomReview::with('user_info')->paginate(10);
    }
    public static function getAllUserReview(){
        return RoomReview::where('user_id',auth()->user()->id)->with('user_info')->paginate(10);
    }

    public function room(){
        return $this->hasOne('App\Models\Room','id','room_id');
    }

}
