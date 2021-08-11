<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use App\Post;
use App\Category;
use App\User;   
use Spatie\YamlFrontMatter\YamlFrontMatter;

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
Route::get('/',function(){

    return view('posts',[
        // 'posts' => Post::all()
        'posts' => Post::latest('published_at')->with('category','author')->get()
    ]);

});
Route::get('posts/{post:slug}',function(Post $post){
    return view('post',[
        // 'post' => Post::FindOrFail($id)
        'post' => $post
    ]);
});

Route::get('categories/{category:slug}', function(Category $category){
    return view('post',[
        'post' => $category->posts
    ]);
});

Route::get('authors/{author}', function(User $author){
    return view('post',[
        'post' => $author->posts
    ]);
});
// Route::get('/', function () {

//     $files = File::files(resource_path("posts"));
//     $posts = [];

//     foreach ($files as $file) {
//         $document = YamlFrontMatter::parseFile($file);

//         $posts[] = new Post(
//             $document->title,
//             $document->excerpt,
//             $document->date,    
//             $document->body()

//         );
//     }
    // ddd($posts);    
    // $document = YamlFrontMatter::parseFile(
    //     resource_path('posts/my-first-post.html')
    // );

    // ddd($document->date);

//     return view('posts', [

//         // 'posts' => Post::all()
//         'posts' => $posts

//     ]);
// });


// Route::get('posts/{post}', function ($slug) {

//     $post = Post::find($slug);
//     return view('post', ['post' => $post]);
// })->where('post', '[A-z_\-]+');
