<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; // use HomeController as Controller
use App\Http\Controllers\BlogPostController;
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


Route::resource('blogposts', BlogPostController::class)->except('edit', 'update', 'destroy');
Route::get('recent-posts/{days_ago}', function ($daysAgo = 20) {
    return 'posts from' . $daysAgo . ' days ago';
})->name('blogposts.recent.index');

