<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\FollowsController;   //FollowsControllerに接続
use App\Http\Controllers\Auth\AuthenticatedSessionController;   //ログアウト処理のために接続
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



require __DIR__ . '/auth.php';

Route::get('top', [PostsController::class, 'index'])->name('top');
Route::post('/post/create', [PostsController::class, 'post'])->name('post.create');
Route::get('/posts/{id}/delete', [PostsController::class, 'postDelete']);
Route::post('/post/update', [PostsController::class, 'postUpdate'])->name('post.update');

Route::get('profile', [ProfileController::class, 'profile'])->name('profile');
Route::get('/profile/{id}', [ProfileController::class, 'viewProfile']);

Route::get('search', [UsersController::class, 'search'])->name('search');   //ページ遷移できないためindex→searchに変更
ROUTE::get('/users/{id}/add', [FollowsController::class, 'add']);
ROUTE::get('/users/{id}/cancel', [FollowsController::class, 'cancel']);
// Route::get('search', [UsersController::class, 'user']);
// Route::get('search', [UsersController::class, 'follows']);

Route::get('follow-list', [FollowsController::class, 'followList'])->name('follow-list');
// Route::get('follow-list', [FollowsController::class, 'following']);

Route::get('follower-list', [FollowsController::class, 'followerList'])->name('follower-list');

Route::get('logout', [AuthenticatedSessionController::class, 'logout'])->name('logout');   //logoutメソッドと接続

ROUTE::get('login', function() {
  return view('auth.login');
}) ->name('login');
