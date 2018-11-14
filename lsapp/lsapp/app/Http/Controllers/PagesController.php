<?php
//namespace App\Http\Controllers created automatically
namespace App\Http\Controllers;
//brought REquest library to handle requests
use Illuminate\Http\Request;
//created PagesController under the core Controller
class PagesController extends Controller
{
    //create function (function inside a class is also called a method)
    //public - can accessible from outside the function
    public function index(){
        //load index.blade.php from view from pages folder
        $title = 'Welcome To Laravel';

        //one way 
        //return view('pages.index', compact('title')); 
        //other way
        return view('pages.index')->with('title', $title);
    }

    //load about page view
    public function about(){
        $title = 'About Us';
        return view('pages.about')->with('title', $title);
    }

    //load servie page view
    public function services(){
        $data = array(
            'title' => 'Services',
            'services' => ['Web Design','Programming','SEO']
        );
        return view('pages.services')->with($data);
    } 
}
