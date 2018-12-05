<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $title ='Welcome to my BLOG';
        return view('pages.index',compact('title'));
        //another way to pass the value as abhove
        //return view('pages.index')->with('title',$title);
    }
    public function contact(){
        return view ('pages.contact');
    }
}
