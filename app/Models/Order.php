<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=['first_name','last_name','email','phone','country', 'post_code', 'address1', 'address2', 'room_id', 'fax', 'number_of_adults', 'number_of_kids', 'arrival_date', 'arrival_time', 'departure_date'];

    public function room(){
        return $this->hasOne('App\Models\Room','id','room_id');
    }
}
