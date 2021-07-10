<?php

namespace App;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public $title;
    public $excerpt;
    public $date;
    public $body;

    public function __construct($title, $exceprt, $date, $body)
    {
        $this->title = $title;
        $this->excerpt = $exceprt;
        $this->date = $date;
        $this->body = $body;
    }


    public static function find($slug)
    {
        if (!file_exists($path = resource_path("posts/{$slug}.html"))) {
            throw new ModelNotFoundException();
        }

        return cache()->remember("posts.{$slug}", now()->addMinutes(20), function () use ($path) {
            // var_dump('file_get_contents');
            return file_get_contents($path);
        });
    }

    public static function all()
    {

        return cache()->rememberForever('posts.all', function () {
            return collect(File::files(resource_path("posts")))
                ->map(fn ($file) => YamlFrontMatter::parseFile($file))
                ->map(fn ($document) => new Post(
                    $document->title,
                    $document->excerpt,
                    $document->date,
                    $document->body(),
                    $document->slug,

                ))->sortByDesc('date');
        });

        // $files = File::files(resource_path("posts/"));
        // return array_map(function ($file) {

        //     return $file->getContents();

        // }, $files);
    }
}
