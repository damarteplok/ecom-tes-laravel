<?php

namespace App\Http\Controllers;

use App\Product;
use Session;
use Illuminate\Http\Request;
use App\Tag;
use App\SubCategory;
use App\Optional;

class ProductsController extends Controller
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
        $p = Product::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('admin.products.index')->with('products', $p);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $catagories = SubCategory::all();
        $tags = Tag::all();
        $p = Optional::all();
        
        if($catagories->count()==0 || $tags->count() == 0 || $p->count() == 0)
        {
            Session::flash('info', 'must have one sub cat or tag');
            return redirect()->back();
        }

        return view('admin.products.create')->with('categories', $catagories)->with('tags', $tags)->with('option', $p);
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
            'image' => 'required|image|mimes:jpg,jpeg,bmp,png|max:2000',
            'description' => 'required',
            'price' => 'required',
            'option' => 'required',
            'category_id' => 'required' 

        ]);

        $img = $request->image;
        $img_new_name = time().$img->getClientOriginalName();
        $img->move('uploads/products', $img_new_name);
        $p = Product::create([

            'name' => $request->name,
            'description' => $request->description,
            'image' => 'uploads/products/' . $img_new_name,
            'price' => $request->price,
            'sub_category_id' => $request->catagory_id

        ]);
        $p->tag()->attach($request->tags);
        $p->optional()->attach($request->option);

        foreach ($request->photos as $photo) {
            
            $photo_new_name = time().$photo->getClientOriginalName();

            $photo->move('uploads/products', $photo_new_name);

            
            Photo::create([
                'product_id' => $p->id,
                'filename' => 'uploads/products/' . $photo_new_name,
            ]);
        }

        Session::flash('success', 'Product created succesfully');

        return redirect()->route('admin.products.index');
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
        $p = Product::find($id);

        return view('admin.products.edit')->with('p', $p);
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
            'image' => 'required|image|mimes:jpg,jpeg,bmp,png|max:2000',
            'description' => 'required',
            'price' => 'required'

        ]);

        $p = Product::find($id);

        if($request->hasFile('image'))
        {
            $img = $request->image;
            $img_new_name = time() . $img->getClientOriginalName();
            $img->move('uploads/products/', $img_new_name);
            $p->image = 'uploads/products/' . $img_new_name;
        }

        $p->name = $request->name;
        $p->description = $request->description;
        $p->price =  $request->price;
        $p->save();

        Session::flash('success', 'success edit products');

        return redirect()->route('admin.products.index');

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
        Product::destroy($id);

        Session::flash('success', 'Product Deleted');

        return redirect()->route('admin.products.index');
    }
}
