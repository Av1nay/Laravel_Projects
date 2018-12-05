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

/* Route::get('/', function () {
    return view('welcome');
});
 */
//register index page or home page of the site
Route::get('/', 'PageController@index');

//register contact page through controller
Route::get('/contact', 'PageController@contact');

//register posts page throught controller
//Route::get('/posts', 'PostsController@index');

//register posts reosurces of postscontroller
Route::resource('posts','PostsController');


