<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Post
{
  public static function all()
  {
    return [
      [
        "id" => 1,
        'slug' => "judul-artikel-1",
        "title" => "Post 1",
        "author" => "Thoriq Dharmawan",
        "body" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quibusdam voluptatem optioexercitationem culpa consequuntur, reprehenderit recusandae qui iure ducimus, esse molestiae? Excepturi obcaecati, animi velit laborum quibusdam tenetur fugit ratione."
      ],
      [
        "id" => 2,
        'slug' => "judul-artikel-2",
        "title" => "Post 2",
        "author" => "Awaludin",
        "body" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quibusdam  optio exercitationem culpa consequuntur, reprehenderit recusandae qui iure ducimus, esse molestiae? Excepturi obcaecati, animi velit laborum quibusdam tenetur fugit ratione."
      ],
    ];
  }

  public static function find($slug): array
  {
    $post = Arr::first(static::all(), fn($post) => $post['slug'] == $slug);

    if (!$post) {
      abort(404);
    };

    return $post;
  }
}
