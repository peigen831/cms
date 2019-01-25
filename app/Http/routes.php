<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
////    session(['visitor'=> 'jin']);
//    return view('welcome');
//});
//
//Route::get('/about', function () {
////    $visitor = session('visitor');
//    return 'about page ';
//});
//
//Route::get('/contact', function () {
//    return "contact page";
//});
//
//Route::get('/post/{id}', function($id){
//    return "This is post number: " . $id;
//});

// 呈现当前路径
//Route::get('/admin/home', array('as'=>'admin.home', function(){
//    $url = route('admin.home');
//    return "url: " . $url;
//}));

//Route::get('/post', 'PostController@index');

//Route::resource('post', 'PostController');

Route::get('/contact', 'PostController@contact');

Route::get('post/{id}/{name}/{tel}', 'PostController@show_post');