<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
   protected $fillable=[
   	'name','price','image','description','sub_category_id', 'status'
   ];

   public function subCategory(){
   	return $this->belongsTo('App\SubCategory');
   }
   public function tag(){
   	return $this->belongsToMany('App\Tag');
   }
   public function optional(){
   	return $this->hasMany('App\Optional');
   }
   public function gallery()
   {
      return $this->hasMany('App\Photo');
   }
   public function profile()
   {
      return $this->hasOne('App\Profile');
   }
   public function order()
   {
      return $this->belongsToMany('App\Order');
   }
}
