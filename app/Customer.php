<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Notifications\CustomerResetPasswordNotification;


class Customer extends Authenticatable


{
    //
    use Notifiable;
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
        return $this->hasMany('App\Order', 'customer_id');
    }

    protected $hidden = [
        'password', 'remember_token',
    ];
 
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomerResetPasswordNotification($token));
    }
}
