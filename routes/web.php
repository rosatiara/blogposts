<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home.index', []);
})->name('home.index');

Route::get('/contact', function () {
    return "contacttttt";
})->name('home.contact');

Route::get('/blogposts/{id}', function($id) {
    $posts = [
        1 => [
            'title' => 'Intro to Laravel',
            'content' => 'This is a short intro to Laravel'
        ],
        2 => [
            'title' => 'Intro to PHP',
            'content' => 'This is a short intro to PHP'
        ]
        ];
    return 'blog post' . $id;
})->name('blogposts.show');

Route::get('recent-posts/{days_ago}', function ($daysAgo = 20) {
    return 'posts from' . $daysAgo . ' days ago';
})->name('blogposts.recent.index');
