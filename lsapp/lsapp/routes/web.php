<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* //get user id via get method
Route::get('/user/{id}', function($id){
    return 'This id user '.$id;
});

//get user name and id via get method
Route::get('/user/{id}/{name}', function($id,$name){
    return 'This id user '.$name .' with a id of '. $id;
}); */

/* Route::get('/', function () {
    return view('welcome');
});

//get pages from get method 
Route::get('/about', function(){
    return view('pages.about');
});
 */

//call controller we created PagesController
//controller@functionName
//call index.blade.php
Route::get('/', 'PagesController@index');
//call pages about.blade.php
Route::get('/about','PagesController@about');
//call pages services.blade.php
Route::get('/services','PagesController@services');
//route map postscontroller  
Route::resource('posts','PostsController');


