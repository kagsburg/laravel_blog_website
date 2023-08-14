<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimony extends Model
{
    protected $fillable=['name', 'position', 'message', 'slug','photo','status'];
}
