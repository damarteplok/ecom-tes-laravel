<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Optional extends Model
{
    //
    protected $fillable = [

    	'name',
    	'description'

    ];

    public function product(){
    	return $this->belongsToMany('App\Product');
    }
}
