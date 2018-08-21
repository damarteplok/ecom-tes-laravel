<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Session;

class CustomerssController extends Controller
{
    //
    public function index()

    {
    	return view('registrasi');
    }

    public function store(Request $request)
    {

    	$this->validate($request, [

            'name' => 'required|max:255',
            'email' => 'required|email|unique:customers,email',
            'nohp' => 'required|max:18',
            'alamat' => 'required|max:255',
            'password' => 'required|confirmed|min:6'
            

        ]);


        $customer = new Customer;
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->nohp = $request->nohp;
        $customer->alamat = $request->alamat;
        $customer->password = bcrypt($request->password);
        $customer->save();

        

        Session::flash('success', 'created succesfully');

        return redirect()->route('customer.login');

    }
}
