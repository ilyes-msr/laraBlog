<?php

use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
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

Route::get('/', [PostController::class, 'index'])->name('home');
//    \Illuminate\Support\Facades\DB::listen(function($query) {
//        logger($query->sql, $query->bindings);
//    });
    // Way 01
//    $posts = [];
//    foreach ($files as $file)
//    {
//        $document = YamlFrontMatter::parseFile($file);
////        dd($document->body());
//        $post = new Post($document->title, $document->excerpt, $document->date, $document->body(), $document->slug);
//        $posts[] = $post;
//    }

    // Way 02 using array_map
//    $posts = array_map(function($file) {
//        $document = YamlFrontMatter::parseFile($file);
//        return new Post($document->title, $document->excerpt, $document->date, $document->body(), $document->slug);
//    }, $files);

    // Way 03 using collections
//    $posts = collect($files)
//        ->map(function($file) {
//            $document = YamlFrontMatter::parseFile($file);
//            return new Post($document->title, $document->excerpt, $document->date, $document->body(), $document->slug);
//        });

    // Way 04 using collection but mapping twice
//    $posts = collect($files)
//        ->map(fn($file) => YamlFrontMatter::parseFile($file))
//        ->map(fn($document) => new Post($document->title, $document->excerpt, $document->date, $document->body(), $document->slug));



Route::get('posts/{post:slug}', [PostController::class, 'show']);

//Route::get('categories/{category:slug}', function (Category $category) {
//    return view('posts', [
//        'posts' => $category->posts,
//        'currentCategory' => $category,
//        'categories' => Category::all()
////        'posts' => $category->posts->load(['category', 'author'])
//    ]);
//})->name('category');

Route::get('authors/{author:username}', function (User $author) {
    return view('posts', [
        'posts' => $author->posts,
        'categories' => Category::all()

//        'posts' => $author->posts->load(['category', 'author'])
    ]);
});
