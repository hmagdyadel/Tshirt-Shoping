<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps=false;
    public $table="products";
    public function user(){
        return $this->belongsTo('App\User');
    }
}
