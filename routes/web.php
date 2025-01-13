<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
  return view('home', ['title' => 'Home page']);
});

Route::get('/about', function () {
  return view('about', ['title' => "About", 'name' => "Thoriq Dharmawan"]);
});

Route::get('/posts', function () {
  return view('posts', ['title' => 'Posts', "posts" => Post::all()]);
});

Route::get('/posts/{slug}', function ($slug) {
  $post = Post::find($slug);

  return view('post', ["title" => "Single Post", "post" => $post]);
});

Route::get('/contact', function () {
  return view('contact', ['title' => 'Contact']);
});
