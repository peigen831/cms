<?php

use App\Post;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| ELOQUENT
|--------------------------------------------------------------------------
*/
Route::get('/findAll', function(){
    $posts = Post::all();

    foreach ($posts as $post){
        return $post->title;
    }
});

Route::get('/find', function(Request $request){
    $id = $request->input('id');
    $post = Post::findOrFail($id);
    return $post->title;
});

Route::get('/insert', function(){
    $posts = new Post;
    $posts->title = 'New Eloquent title insert';
    $posts->content = 'New Eloquent content very cool!!!!';
    $posts->save();
});

Route::get('/edit', function(){
    $posts = Post::find(3);
    $posts->title = 'Edited Eloquent';
    $posts->content = 'Edit eloquent content!!!!';
    $posts->save();
});

Route::get('/create', function(){
    Post::create(['title'=>'the create method', 'content' => 'WOW it\'s creating!']);
});

Route::get('/update',function(){
   Post::where('id', 3)->where('is_admin', 0)->update(['title' => 'NEW PHP TITLE', 'content' => 'Love my Laravel Instructor']);
});

Route::get('/delete', function(){
    $post = Post::find(2);
    $post->delete();
});

Route::get('/delete2', function(){
    Post::destroy([4,5]);
});

Route::get('/softdelete', function(){
    Post::find(12)->delete();
});

Route::get('/readsoftdelete', function(){
//    $post = Post::find(7);
//    return $post->title;

//    $post = Post::withTrashed()->where('id', 7)->get();
//    return $post;

    $post = Post::onlyTrashed()->where('is_admin', 0)->get();
    return $post;
});

Route::get('/restore', function(){
    Post::onlyTrashed()->where('is_admin', 0)->restore();
});

Route::get('/forcedelete', function(){
    Post::onlyTrashed()->where('is_admin', 0)->forcedelete();
});

/*
|--------------------------------------------------------------------------
| RAW SQL Queries
|--------------------------------------------------------------------------
*/
//Route::get('/insert/{title}/{content}', function($title, $content){
//    DB::insert('INSERT INTO posts(title, content) VALUES (?,?)', [$title,$content]);
//});
//
//
//Route::get('/read/{id}', function($id){
//    $results = DB::select('SELECT * FROM posts WHERE id=?', [$id]);
//
//    return $results;
//});
//
//Route::get('/update', function(){
//    $updated = DB::update('UPDATE posts set title= ? WHERE id =?', ['hello world!!!', 1]);
//    return $updated;
//});
//
//Route::get('/delete', function(){
//    $deleted = DB::delete('DELETE FROM posts where id=?', [1]);
//    return $deleted;
//});



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

//Route::get('/contact', 'PostController@contact');

//Route::get('post/{id}/{name}/{tel}', 'PostController@show_post');