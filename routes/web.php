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

Route::group(['prefix' => '/post', 'as' => 'post.'], function() {
    Route::post('create', [PostsController::class, 'post'])->name('create');
    Route::get('{id}/delete', [PostsController::class, 'postDelete'])->name('delete');
    Route::post('update', [PostsController::class, 'postUpdate'])->name('update');
});

Route::group(['prefix' => '/profile', 'as' => 'profile'], function() {
    Route::get('/', [ProfileController::class, 'profile'])->name('');
    Route::get('{id}', [ProfileController::class, 'viewProfile'])->name('.other');
    Route::post('update', [ProfileController::class, 'updateProfile'])->name('.update');
});

Route::get('search', [UsersController::class, 'search'])->name('search');   //ページ遷移できないためindex→searchに変更

Route::group(['prefix' => '/users'], function() {
    ROUTE::get('{id}/add', [FollowsController::class, 'add'])->name('add');
    ROUTE::get('{id}/cancel', [FollowsController::class, 'cancel'])->name('cancel');
});

Route::get('follow-list', [FollowsController::class, 'followList'])->name('follow-list');

Route::get('follower-list', [FollowsController::class, 'followerList'])->name('follower-list');

Route::get('logout', [AuthenticatedSessionController::class, 'logout'])->name('logout');   //logoutメソッドと接続

ROUTE::get('login', function() {
    return view('auth.login');
}) ->name('login');
