<?php

use App\Models\Category;
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
  return view('posts', ['title' => 'Posts', "posts" => Post::filter(request(['search', 'category', 'author']))->latest()->paginate(6)]);
});

Route::get('/posts/{post:slug}', function (Post $post) {
  return view('post', ["title" => "Single Post", "post" => $post]);
});

Route::get('/authors/{user:username}', function (User $user) {
  $title = '(' . count($user->posts) . ')' . " Articles by " . $user->name;
  return view('posts', ["title" => $title, "posts" => $user->posts]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
  $title = "Category in: " . $category->name;
  return view('posts', ["title" => $title, "posts" => $category->posts]);
});


Route::get('/contact', function () {
  return view('contact', ['title' => 'Contact']);
});
