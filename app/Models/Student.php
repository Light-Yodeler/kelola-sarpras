<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded = ['id'];

    function classroom(){
        return $this->belongsTo(Classroom::class);
    }
    
    function borrow(){
        return $this->hasMany(Borrow::class);
    }
}
