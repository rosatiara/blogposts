<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; // use HomeController as Controller
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\InternalAreaController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CommentController;

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


Route::resource('blogposts', BlogPostController::class);
Route::resource('authors',AuthorController::class);
Route::resource('comments',CommentController::class)->only(['store','create']);

Route::get('recent-posts/{days_ago}', function ($daysAgo = 20) {
    return 'posts from' . $daysAgo . ' days ago';
})->name('blogposts.recent.index');


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [InternalAreaController::class, 'home'])->name('home.index');

Auth::routes();