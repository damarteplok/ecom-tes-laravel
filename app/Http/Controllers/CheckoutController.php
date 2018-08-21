<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use Cart;
use Session;
use Mail;
use App\Order;
use App\Product;
use Carbon\Carbon;

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

        $dt = Carbon::tomorrow()->toDateString();
        $dn = Carbon::now()->addDays(3)->toDateString();
        $dy = Carbon::now()->year;

        $pdt_id = request()->id;


        $invoice = "INV-" .$dy ."-" .uniqid();

        $order = Order::create([

            'invoice_creation_date' => $invoice,
            'delivery_due_date' => $dn,
            'payment_due_date' => $dt,
            'customer_id' => $pdt_id ,
            'customer_message' => 'null'

        ]);

        

        foreach(Cart::content() as $p)
            {
                //dd($p->model->id);
            

            $order->product()->attach($p->model->id, ['quantity' => $p->qty]);

            }

        

    	Session::flash('success',  'Purchase succesfull. wait for our email');

    	Cart::destroy();

    	Mail::to(request()->stripeEmail)->send(new \App\Mail\PurchaseSuccesfull);

    	return redirect()->route('index');

    }
}
