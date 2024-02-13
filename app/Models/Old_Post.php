<?php

namespace App\Models;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Old_Post
{
    public function __construct(public $title, public $excerpt, public $date, public $body, public $slug) {}

    public static function all() {
        return cache()->rememberForever('posts.all', function () {
            return collect(File::files(resource_path('posts/')))
                ->map(fn($file) => YamlFrontMatter::parseFile($file))
                ->map(fn($document) => new Post($document->title, $document->excerpt, $document->date, $document->body(), $document->slug))->sortByDesc('date');
        });

    }

    public static function find($slug) {
        return static::all()->firstWhere('slug', $slug);
//    return cache()->remember("posts.{$slug}", 3, fn() => file_get_contents($path));
    }

    public static function findOrFail($slug) {
        $post = static::all()->firstWhere('slug', $slug);
        if(!$post) {
            throw new ModelNotFoundException();
        }
        return $post;
//    return cache()->remember("posts.{$slug}", 3, fn() => file_get_contents($path));
    }
}
