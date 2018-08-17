<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Tag;


class FrontEndController extends Controller
{
    //
    public function index()
    {
    	

    	$t = Tag::find(1);
    	
    	$tag = $t->product()->orderBy('created_at', 'desc')->simplePaginate(3, ['*'], 'p1');

    	$t2 = Tag::find(7);
    	
    	$tag2 = $t2->product()->orderBy('created_at', 'desc')->simplePaginate(3, ['*'], 'p2');

    
    	$p = Product::orderBy('created_at', 'desc')->simplePaginate(9, ['*'], 'p3');
    	

    	return view('index')
    	->with('category', Category::all())
    	->with('product', $p)
    	->with('tag', $tag)
    	->with('tag2', $tag2);
    }

    public function singleProduct($id)
    {
    	return view('single')->with('product', Product::find($id));
    }
}
