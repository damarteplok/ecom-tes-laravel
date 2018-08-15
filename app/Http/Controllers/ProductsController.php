<?php

namespace App\Http\Controllers;

use App\Product;
use Session;
use Illuminate\Http\Request;
use App\Tag;
use App\SubCategory;
use App\Optional;
use App\Profile;
use App\Photo;

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
        
        if($catagories->count()==0 || $tags->count() == 0)
        {
            Session::flash('info', 'must have one sub cat or tag');
            return redirect()->back();
        }

        return view('admin.products.create')->with('categories', $catagories)->with('tags', $tags);
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
            
            'category_id' => 'required' ,
            'brand' => 'required',
            'poin' => 'required',
            'status' => 'required',
            'pabrik_product' => 'required',
            'kode_product' => 'required'

        ]);

        $img = $request->image;
        $img_new_name = time().$img->getClientOriginalName();
        $img->move('uploads/products', $img_new_name);
        $p = Product::create([

            'name' => $request->name,
            'description' => $request->description,
            'image' => 'uploads/products/' . $img_new_name,
            'price' => $request->price,
            'sub_category_id' => $request->category_id,
            'status' => $request->status

        ]);

        $p->tag()->attach($request->tags);

        foreach ($request->photos as $photo) {
            
            $photo_new_name = time().$photo->getClientOriginalName();

            $photo->move('uploads/products', $photo_new_name);

            
            Photo::create([
                'product_id' => $p->id,
                'filename' => 'uploads/products/' . $photo_new_name,
            ]);
        }

        Profile::create([

            'product_id' => $p->id,
            'poin' => $request->poin,
            'brand' => $request->brand,
            'pabrik_product' => $request->pabrik_product,
            'kode_product' => $request->kode_product

        ]);

        Session::flash('success', 'Product created succesfully');

        return redirect()->route('products.index');
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
        $t = Tag::all();
        $profile = $p->profile;
        $s = SubCategory::all();

        return view('admin.products.edit')->with('p', $p)
        ->with('t', $t)
        ->with('profile', $profile)
        ->with('s', $s);
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
            'price' => 'required',
            'sub_category_id' => 'required',
            'status' => 'required',
            'brand' => 'required',
            'kode_product' => 'required',
            'pabrik_product' => 'required',
            'poin' => 'required'

        ]);

        $p = Product::find($id);
        $a = $p->gallery;

        if($request->hasFile('image'))
        {
            $img = $request->image;
            $img_new_name = time() . $img->getClientOriginalName();
            $img->move('uploads/products/', $img_new_name);
            $p->image = 'uploads/products/' . $img_new_name;
        }

        $pro = $p->profile;

        $p->name = $request->name;
        $p->description = $request->description;
        $p->price =  $request->price;
        $p->status = $request->status;
        $p->sub_category_id = $request->sub_category_id;
        $p->save();

        $pro->brand =  $request->brand;
        $pro->kode_product =  $request->kode_product;
        $pro->pabrik_product =  $request->pabrik_product;
        $pro->poin =  $request->poin;

        $pro->save();

        $p->tag()->sync($request->tag);

        Session::flash('success', 'success edit products');

        return redirect()->route('products.index');

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
        
        foreach($p->gallery as $a)
        {
            $a->forceDelete();
        }

        $p->profile->delete();

        foreach($p->optional as $a)
        {
            $a->forceDelete();
        }

        $p->delete();

        Session::flash('success', 'Product Deleted');

        return redirect()->route('products.index');
    }
}
