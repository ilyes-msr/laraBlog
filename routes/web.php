<?php

use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('/logout', [SessionsController::class, 'destroy'])->middleware('auth');
Route::post('/login', [SessionsController::class, 'store'])->middleware('guest');

Route::post('/posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::post('/newsletter', NewsletterController::class);

Route::get('/admin/posts/create', [PostController::class, 'create'])->middleware('admin');
Route::post('admin/posts', [PostController::class, 'store'])->middleware('admin');

//Route::get('/ping', function () {
//    $mailchimp = new \MailchimpMarketing\ApiClient();
//
//    $mailchimp->setConfig([
//        'apiKey' => env('MAILCHIMP_KEY'),
//        'server' => 'us17'
//    ]);
//
////    $response = $mailchimp->ping->get();
////    $response = $mailchimp->lists->getAllLists();
////    $response = $mailchimp->lists->getList('4a731cf998');
////    $response = $mailchimp->lists->getListMembersInfo('4a731cf998');
//
//    $list_id = "4a731cf998";
//
//    try {
//        $response = $mailchimp->lists->addListMember($list_id, [
//            "email_address" => "ooyali712@gmail.com",
//            "status" => "pending",
//            "merge_fields" => [
//                "FNAME" => "Ilyes",
//                "LNAME" => "Mansour"
//            ]
//        ]);
//        ddd($response);
//    } catch (MailchimpMarketing\ApiException $e) {
//        echo $e->getMessage();
//    }
//
////    ddd($response);
//});
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



