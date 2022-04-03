<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; // use HomeController as Controller
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

Route::get('/', [HomeController::class, 'home'])->name('home.index');
Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');

$posts = [
    1 => [
        'title' => 'Intro to Laravel',
        'content' => 'This is a short intro to Laravel',
        'is_new' => true
    ],
    2 => [
        'title' => 'Intro to PHP',
        'content' => 'This is a short intro to PHP',
        'is_new' => false
    ]
];

Route::get('/blogposts', function() use ($posts){
    return view('blogposts.index', ['posts' => $posts]);
})->name('blogposts.index');

Route::get('/blogposts/{id}', function($id) use($posts) {
    abort_if (!isset($posts[$id]), 404);
    return view ('blogposts.show', ['post' => $posts[$id]]);
})->name('blogposts.show');

Route::get('recent-posts/{days_ago}', function ($daysAgo = 20) {
    return 'posts from' . $daysAgo . ' days ago';
})->name('blogposts.recent.index');
