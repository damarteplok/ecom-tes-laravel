<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $order = Order::orderBy('created_at','desc')->simplePaginate(10);

        return view('admin.order.index')->with('order', $order);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $order = Order::find($id);
        $o = $order->product ;
        return view('admin.order.view')->with('order', $order)
        ->with('p', $o);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Order::destroy($id);
        Session::flash('success', 'Deleted');

        return redirect()->back();
    }

    public function status($id)

    {
        $o = Order::find($id);
        
        if($o->status == 0)
        {
            $o->status = 1;
            $o->save();
            Session::flash('success', 'updated');

            return redirect()->back();

        } else {

            $o->status = 0;
            $o->save();
            Session::flash('success', 'updated');

            return redirect()->back();

        }

        

    }
}
