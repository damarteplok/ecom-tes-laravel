<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function home(){
    	return view('index');
    }
    public function about(){
    	return view('about');
    }
    public function contact(){
    	return view('contact');
    }
    public function howto(){
        return view('howto');
    }
    public function faq(){
        return view('faq');
    }
    public function term(){
        return view('term');
    }
    public function policy(){
        return view('policy');
    }
}
