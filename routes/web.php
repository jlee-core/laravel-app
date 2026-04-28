<?php

use App\Http\Controllers\TodoController;
use App\Http\Controllers\AuthController;
use app\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// 入り口
Route::get('/todos', [TodoController::class, 'index'])
    ->name('todos.index');

// 新規作成ページへ遷移
Route::get('/todos/create', [TodoController::class, 'create'])
    ->name('todos.create');
// データベースへ保存処理
Route::post('/todos', [TodoController::class, 'store'])
    ->name('todos.store');

// 編集ページへ遷移
Route::get('todos/{todo}/edit', [TodoController::class, 'edit'])
    ->name('todos.edit');

// データベースへ更新処理
Route::put('todos/{todo}', [TodoController::class, 'update'])
    ->name('todos.update');

// データベースへ削除処理
Route::delete('todos/{todo}', [TodoController::class, 'destroy'])
    ->name('todos.destroy');

// 検索結果ページへ遷移
Route::get('todos/search', [TodoController::class, 'search'])
    ->name('todos.search');

// ログイン機能
Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.store');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

Route::middleware('auth')->group(function () {
    Route::resource('posts', PostController::class);
});