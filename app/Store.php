<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{

    protected $fillable = [
        'name', 'address', 'logo',
    ];


    public function products(){
        return $this->hasMany('App\Product');
    }
}
