<?php

use App\Models\Post;
use App\Models\User;
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

Route::get('/posts/{post:slug}', function (Post $post) {
  return view('post', ["title" => "Single Post", "post" => $post]);
});

Route::get('/authors/{user:username}', function (User $user) {
  return view('posts', ["title" => '(' . count($user->posts) . ')' . " Articles by " . $user->name, "posts" => $user->posts]);
});

Route::get('/contact', function () {
  return view('contact', ['title' => 'Contact']);
});
