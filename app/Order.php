<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [

    	'customer_id',
    	'invoice_creation_date',
        'delivery_due_date',
        'payment_due_date',
        'custom_message',

    ];

    public function customer()
    {
    	return $this->belongsTo('App\Customer', 'customer_id');
    }
    public function product()
    {
    	return $this->belongsToMany('App\Product')->withPivot('quantity');
    }
}
