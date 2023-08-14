<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable=['title','slug', 'summary','status', 'photo'];

    public static function countActiveService(){
        $data=Service::where('status','active')->count();
        if($data){
            return $data;
        }
        return 0;
    }
}
