<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\PaymentConfirm;
use Session;

class PagesController extends Controller
{
    //
    public function home(){
    	return view('index');
    }
    public function about(){
    	return view('about');
    }
    public function contact(){
    	return view('contact');
    }
    public function howto(){
        return view('howto');
    }
    public function faq(){
        return view('faq');
    }
    public function term(){
        return view('term');
    }
    public function policy(){
        return view('policy');
    }

    public function paymentconfirm(){

        return view('payment');
    }

    public function paymentStore(Request $request)
    
    
    {

        // dd($request->order_id);
        $this->validate($request, [
        
            'order_id' => 'required',
            'payment_amount' => 'required',
            'bank_receiver' => 'required',
            'bank_from' => 'required',
            'account_name' => 'required',
            'account_nohp' => 'required',
            'message' => 'required'

        ]);


        PaymentConfirm::create([

            'order_id' => $request->order_id,
            'payment_amount' => $request->payment_amount,
            'bank_receiver' => $request->bank_receiver,
            'bank_form' => $request->bank_from,
            'account_name' => $request->account_name,
            'account_nohp' => $request->account_nohp,
            'message' => $request->message,

        ]);

    Session::flash('success', 'payment telah kami terima');

    return redirect()->route('index');

    }
}
