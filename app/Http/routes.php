<?php

use App\Post;
use App\User;
use App\Country;
use App\Photo;
use App\Video;
use App\Tag;
use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Polymorphic Relations
|--------------------------------------------------------------------------
*/
Route::get('/user/{id}/photos',function($id){
    $user = User::find($id);
    foreach ($user->photos as $photo){
        echo $photo->path;
    }
});

Route::get('/post/{id}/photos',function($id){
    $post = Post::find($id);
    foreach ($post->photos as $photo){
        echo $photo->path . '<br>';
    }
});

Route::get('/photo/{id}/user', function($id){
    $photo = Photo::findOrFail($id);
    return $photo->imageable;
});

// Polymorphic Many to Many
Route::get('/post/{id}/tag',function($id){
    $post = Post::find($id);
    foreach ($post->tags as $tag) {
        echo $tag->name;
    }
});

Route::get('/video/{id}/tag',function($id){
    $video = Video::find($id);
    foreach ($video->tags as $tag) {
        echo $tag->name;
    }
});


Route::get('/tag/{id}/post', function($id) {
    $tag = Tag::find($id);
    foreach ($tag->posts as $post) {
        echo $post->title;
    }
});

/*
|--------------------------------------------------------------------------
| ELOQUENT RELATIONSHIP
|--------------------------------------------------------------------------
*/

// One to one Relationship
Route::get('/user/{id}/post', function($id){
    return User::find($id)->post->content;
});

// Inverse Relation
Route::get('/post/{id}/user',function($id){
    return Post::find($id)->user->name;
});

// One to Many Relationship
Route::get('/posts', function(){
    $user = User::find(1);

    $result = '';
    foreach($user->posts as $post){
        $result .= $post->title . '<br>';
    }
    return $result;
});

Route::get('/user/{id}/role', function($id){
    $user = User::find($id);
    foreach ($user->roles as $role){
        echo $role->name . "<br>";
    }
});

// Accessing the intermediate table / pivot
Route::get('user/{id}/pivot', function($id){
    $user = User::find($id);

    foreach($user->roles as $role){
        echo $role->pivot->created_at;
    }
});

Route::get('user/{id}/country', function($id){
    $country = Country::find($id);

    foreach($country->posts as $post){
        echo $post->title .'<br>';
    }
});



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