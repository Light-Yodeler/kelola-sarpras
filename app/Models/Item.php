<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $guarded = ['id'];

    function borrow(){
        return $this->hasMany(Borrow::class);
    }
}
