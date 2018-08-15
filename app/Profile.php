<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $fillable = ['product_id', 'poin', 'brand', 'kode_product', 'pabrik_product'];

    public function product()
    {
    	return $this->belongsTo('App\Product');
    }
}
