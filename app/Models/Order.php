<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=['name','email', 'number_of_adults', 'country', 'room_id', 'arrival_date', 'departure_date'];

    public function room(){
        return $this->hasOne('App\Models\Room','id','room_id');
    }
}
