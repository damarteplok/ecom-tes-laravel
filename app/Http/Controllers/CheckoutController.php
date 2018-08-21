<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use Cart;
use Session;
use Mail;

class CheckoutController extends Controller
{
    //


    public function index()
    {

    	if(Cart::content()->count() == 0)
    		{
    			Session::flash('info', 'Your cart is still empty, do some shoping');
    			return redirect()->route('index');
    		}
    	return view('checkout2');
    }

    public function pay()
    {
    	

    	Stripe::setApiKey("sk_test_UsC6i1sxwf2ECe34AmrGJUAJ");

    	$token = request()->stripeToken;

    	$charge = Charge::create([

    		'amount' => Cart::total() * 100,
    		'currency' => 'usd',
    		'description' => 'sumber-rejeki',
    		'source' => $token
    	]);

    	Session::flash('success',  'Purchase succesfull. wait for our email');

    	Cart::destroy();

    	Mail::to(request()->stripeEmail)->send(new \App\Mail\PurchaseSuccesfull);

    	return redirect('index');

    }
}
