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

Route::get('top', [PostsController::class, 'index']);

Route::get('profile', [ProfileController::class, 'profile']);

Route::get('search', [UsersController::class, 'search']);   //ページ遷移できないためindex→searchに変更
Route::get('search', [UsersController::class, 'index']);

Route::get('follow-list', [FollowsController::class, 'followList']);
Route::get('follower-list', [FollowsController::class, 'followerList']);

Route::get('logout', [AuthenticatedSessionController::class, 'logout']);   //logoutメソッドと接続

ROUTE::get('login', function() {
  return view('auth.login');
}) ->name('login');
