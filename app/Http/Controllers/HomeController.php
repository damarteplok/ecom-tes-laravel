<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Customer;
use Carbon\Carbon;




class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $now = Carbon::now();
        $today = $now->day;
        $month = $now->month;

        $totalmember = Customer::count();
        
        $o = Order::all();

        $totalorder = Order::count();
        
        $totalnotpaid = Order::where('status', 0)->count();
        
        $t = Order::where('status', 1)->get();
        
        $totalsales=0;
        foreach($t as $p)
        {
            foreach($p->product as $a)
            {
            $totalsales = (($a->pivot->quantity) * ($a->price)) + $totalsales;
            }
        }

        $t1 = Order::where('status', 1)
        ->whereMonth('payment_due_date', '=', $now->month )
        ->get();
        
        $totalbln=0;
        foreach($t as $p)
        {
            foreach($p->product as $a)
            {
            $totalbln = (($a->pivot->quantity) * ($a->price)) + $totalbln;
            }
        }

        $perdayorder = [];
        

        for ($i=1; $i <= 12 ; $i++) { 
            
            $as = Order::whereMonth('created_at', $i)
            ->where('status', '1')
            ->get();
            $totalday = 0;
            foreach ($as as $c) {
                    
                foreach($c->product as $a)
                {

                $totalday = (($a->pivot->quantity) * ($a->price)) + $totalday;
                
                }
                
                
            }
            $totalday = $totalday/1000;
            $perdayorder[] = $totalday;
               
        }
         

        
       
        

        return view('admin.home')->with('totalbln', $totalbln)
        ->with('totalsales', $totalsales)
        ->with('totalmember', $totalmember)
        ->with('totalnotpaid', $totalnotpaid)
        ->with('totalorder', $totalorder)
        ->with('perdayorder', $perdayorder);
    }
}
