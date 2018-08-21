<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PaymentConfirm;
use Session;
use Auth;

class PaymentConfirmController extends Controller
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
        return view('admin.paymentconfirm.index')->with('p', PaymentConfirm::simplePaginate(10));
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
        PaymentConfirm::destroy($id);

        Session::flash('success', 'Deleted success');
        return redirect()->back();
    }

    public function detail($id)
    {
        $p = PaymentConfirm::find($id);

        return view('admin.paymentconfirm.detail')->with('t', $p);
    }

    public function change($id)
    {

        $p = PaymentConfirm::find($id);

        if($p->status == 0)
        {
            $p->status = 1;
            $p->save();

            Session::flash('success', 'Change success');
            return redirect()->back();

        } else
        
        {
            $p->status = 0;
            $p->save();

            Session::flash('success', 'Change success');
            return redirect()->route('payment.index');
        }
        
           
    }
}
