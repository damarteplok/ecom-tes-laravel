<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
   protected $fillable=[
   	'name','price','image','description','subcategory_id'
   ];

   public function subCategory(){
   	return $this->belongsTo('App\SubCategory');
   }
   public function tag(){
   	return $this->belongsToMany('App\Tag');
   }
   public function optional(){
   	return $this->belongsToMany('App\Optional');
   }
   public function gallery()
   {
      return $this->hasMany('App\Photo');
   }
}
