<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\RoomReview;

class Room extends Model
{
    protected $fillable=['title', 'slug', 'photo', 'description','price','status','photo','discount','is_featured'];

    public function image_info(){
        return $this->hasOne('App\Models\Image','id','image_id');
    }

    public static function getAllRoom(){
        return Room::orderBy('id','desc')->paginate(10);
    }
    public function getReview(){
        return $this->hasMany('App\Models\RoomReview', 'room_id', 'id')->with('user_info')->where('status','active')->orderBy('id','DESC');
    }
    public static function getRoomBySlug($slug){
        return Room::with(['getReview'])->where('slug',$slug)->first();
    }
    public static function countActiveRoom(){
        $data=Room::where('status','active')->count();
        if($data){
            return $data;
        }
        return 0;
    }

    public function images() {
        return $this->hasMany(Image::class);
    }

}
