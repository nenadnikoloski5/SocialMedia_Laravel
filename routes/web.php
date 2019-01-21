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
use App\User;
use App\imagestest;
use App\Post;

Route::get('/', function () {
   $users =  User::all();
   $posts = Post::with('users')->get();
    return view('welcome', ["users" => $users, 'posts' => $posts]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post("/imageUpload", "HomeController@imageUpload");

Route::post('/postUpload', 'HomeController@postUpload');


Route::get("/imagestest", function(){

   $images =  imagestest::all();

    return view("imagestest", ["images" => $images]);
});