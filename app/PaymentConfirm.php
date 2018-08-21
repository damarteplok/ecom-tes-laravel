<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentConfirm extends Model
{
    //
    protected $fillable = [

    	'order_id',
    	'payment_amount',
    	'bank_receiver',
    	'bank_form',
    	'status',
    	'account_name',
    	'account_nohp',
    	'message'

    ];
}
