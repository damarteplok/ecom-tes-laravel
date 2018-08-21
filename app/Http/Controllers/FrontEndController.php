<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\SubCategory;
use App\Tag;
use Illuminate\Pagination\LengthAwarePaginator;

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
    	
    	->with('product', $p)
    	->with('tag', $tag)
    	->with('tag2', $tag2);
    }

    public function index_single_category(Request $request, $id)
    {
    	$cat = Category::find($id);

    	$category = $cat->subcategory;
    	
    	$post = [];
    	foreach ($category as $c) {
    		foreach ($c->product as $p) {
    			$post[] = $p;
    		}
    	}
    	$posts = collect($post);
    	

	    $currentPage = LengthAwarePaginator::resolveCurrentPage();

	    $perPage = 12;
	    $currentPageItems = $posts->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
 
        // Create our paginator and pass it to the view
        $paginatedItems= new LengthAwarePaginator($currentPageItems , count($posts), $perPage);
 
        // set url path for generted links
        $paginatedItems->setPath($request->url());
 
	    return view('index-single-category')->with('posts', $paginatedItems)
	    ->with('cat', $cat);
    }

    public function index_single_subcategory(Request $request, $id)
    {


    	$cat = SubCategory::find($id);
    	
    	$posts = $cat->product()->orderBy('created_at', 'desc')->paginate(12);

    	return view('index-single-subcategory')->with('cat', $cat)
    	->with('posts', $posts);



    }

    public function single($id)
    {
    	$p = Product::find($id);
    	return view('single2')->with('p', $p);
    }
}
