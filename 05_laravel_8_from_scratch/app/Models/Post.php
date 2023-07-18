<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public function __construct(public $title, public $excerpt, public $date, public $body, public $slug)
    {
    }

    public static function all()
    {
        return \cache()->rememberForever('posts.all', function ()
        {
            return collect(File::files(resource_path("posts/")))
                ->map(fn ($file) => YamlFrontMatter::parseFile($file))
                ->map(
                    fn ($document) => new Post(
                        title: $document->title,
                        excerpt: $document->excerpt,
                        date: $document->date,
                        body: $document->body(),
                        slug: $document->slug
                    )
                )
                ->sortByDesc('date');
        });
    }

    public static function find($slug)
    {
        return static::all()->firstWhere('slug', $slug);
    }

    public static function findOrFail($slug)
    {
        $post = static::find($slug);
        if(! $post){
            throw new ModelNotFoundException();
        }
        return $post;
    }
}