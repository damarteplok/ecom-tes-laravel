<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubCategory;
use App\Category;
use Session;

class SubCategoryController extends Controller
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
        return view('admin.subcategory.index')->with('categories', SubCategory::simplePaginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.subcategory.create')->with('categories', Category::all());
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
            'category_id' => 'required'

        ]);

        SubCategory::create([


            'name' => $request->name,
            'category_id' => $request->category_id

        ]);

        Session::flash('success', 'SubCategory created');

        return redirect()->route('subcategory.index');

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
        $category = SubCategory::find($id);
        $categories = Category::all();

        return view('admin.subcategory.edit')->with('category', $category)->with('categories', $categories);
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
            'category_id' => 'required'

        ]);

        $p = SubCategory::find($id);
        $p->name = $request->name;
        $p->category_id = $request->category_id;
        $p->save();

        Session::flash('success', 'SubCategory Updated');

        return redirect()->route('subcategory.index');

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
        $p = SubCategory::find($id);

        foreach($p->product as $a){
            $a->forceDelete();
        }
        $p->delete();

        Session::flash('success', 'SubCategory Deleted');

        return redirect()->route('subcategory.index');
    }
}
