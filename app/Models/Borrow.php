<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    protected $guarded = ['id'];

    function student(){
        return $this->belongsTo(Student::class);
    }

    function classroom(){
        return $this->belongsTo(Classroom::class);
    }

    function item(){
        return $this->belongsTo(Item::class, 'item_id');
    }

    function borrowDetail(){
        return $this->hasMany(BorrowDetail::class);
    }
}
