<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $guarded = ['id'];

    function student(){
        return $this->hasMany(Student::class);
    }

    function borrow(){
        return $this->hasMany(Borrow::class);
    }
}
