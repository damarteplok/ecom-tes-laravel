<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Optional;
use App\Product;
use Session;

class OptionalController extends Controller
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
        return view('admin.optional.index')->with('p', Optional::simplePaginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.optional.create')->with('p', Product::all());
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
        $this->validate($request, [

            'name' => 'required',
            'description' => 'required',
            'product_id' => 'required'

        ]);

        Optional::create([

            'product_id' => $request->product_id,
            'name' => $request->name,
            'description' => $request->description

        ]);

        Session::flash('success', 'Create success');

        return redirect()->route('optional.index');
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
        $p = Optional::find($id);

        return view('admin.optional.edit')->with('p', $p)
        ->with('s', Product::all());
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
        $this->validate($request, [

            'name' => 'required',
            'description' => 'required',
            'product_id' => 'required'

        ]);

        $t = Optional::find($id);
        $t->name = $request->name;
        $t->description = $request->description;
        $t->product_id = $request->product_id;
        $t->save();

        Session::flash('success', 'Optional Updated');

        return redirect()->route('optional.index');
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
        Optional::destroy($id);
        Session::flash('success', 'Optional deleted');

        return redirect()->back();
    }
}
