<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Purchase extends Model
{
    public function store(){
        return $this->belongsTo('App\Store');
    }

    public function product(){
        return $this->belongsTo('App\Product');
    }
}
