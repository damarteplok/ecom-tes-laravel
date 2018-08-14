<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Session;

class CategoryController extends Controller
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
        return view('admin.category.index')->with('categories', Category::simplePaginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.category.create');
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

            'name' => 'required'

        ]);

        Category::create([

            'name' => $request->name

        ]);

        Session::flash('success', 'Created New Category');

        return redirect()->route('category.index');


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
        $c = Category::find($id);

        return view('admin.category.edit')->with('category', $c);
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

            'name' => 'required'

        ]);

        $c = Category::find($id);
        $c->name =  $request->name;
        $c->save();

        Session::flash('success', 'Category Updated');

        return redirect()->route('category.index');
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
        $c = Category::find($id);

        foreach($c->subcategory as $p) {    
            
            $p->product()->delete();
            $p->delete();
        }

        $c->delete();

        Session::flash('success', 'Category Deleted');

        return redirect()->route('category.index');
    }
}
