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
    	$this->belongsTo('App\Customer');
    }
    public function product()
    {
    	$this->belongsToMany('App\Product')->withPivot('quantity');
    }
}
