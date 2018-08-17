<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Photo;
use Session;

class PhotoController extends Controller
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
        return view('admin.gallery.index')->with('products', Product::simplePaginate(10));
    }

    public function index2($id)
    {
        //
        $photo = Product::find($id);

        return view('admin.gallery.index-edit')->with('photo', $photo)
        ->with('id', $id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        return view('admin.gallery.create')->with('id', $id);
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

            'filename' => 'required|image|mimes:jpg,jpeg,bmp,png|max:2000'

        ]);

        $img = $request->filename;
        $img_new_name = time().$img->getClientOriginalName();
        $img->move('uploads/products', $img_new_name);

        $p = Photo::create([

            'filename' => 'uploads/products/' . $img_new_name,
            'product_id' => $request->product_id

        ]);

        $id = $request->product_id;

        Session::flash('success', 'Photo created succesfully');

        return redirect()->route('photo.index2', ['id' => $id]);
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
        $p = Photo::find($id);

        return view('admin.gallery.edit')->with('p', $p);
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
        $p = Photo::find($id);

        if($request->hasFile('filename'))
        {
            $img = $request->filename;
            $img_new_name = time() . $img->getClientOriginalName();
            $img->move('uploads/products/', $img_new_name);
            $p->filename = 'uploads/products/' . $img_new_name;
        }

        $p->save();

        Session::flash('success', 'Photo edit succesfully');

        return redirect()->route('photo.index');

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
        $p = Product::find($id);
        
        foreach($p->gallery as $g)
        {
            $g->forceDelete();


        }

        Session::flash('success', 'U succesfuly delete gallery');

        return redirect()->route('photo.index');
    }
    public function destroy2($id)
    {
        //
        $p = Photo::find($id);
        $p->delete();

        Session::flash('success', 'U succesfuly delete gallery');

        return redirect()->route('photo.index');

    }
}
