<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);

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



