<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BorrowDetail extends Model
{
    protected $guarded = ['id'];
    
    function item(){
        return $this->belongsTo(Item::class);
    }

    function borrow(){
        return $this->belongsTo(Borrow::class);
    }
}
