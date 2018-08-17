<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $guard = 'customer';
    
    protected $fillable = [

    	'name',
    	'alamat',
    	'nohp',
    	'email',
    	'password'

    ];

    public function order()
    {
    	return $this->hasMany('App\Order');
    }

    protected $hidden = [
        'password', 'remember_token',
    ];
 
    // public function sendPasswordResetNotification($token)
    // {
    //     $this->notify(new CustomerResetPasswordNotification($token));
    // }
}
