<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('posts/trash', [\App\Http\Controllers\PostController::class, 'trashed'])->name('posts.trashed');
Route::get('posts/{id}/restore', [\App\Http\Controllers\PostController::class, 'restore'])->name('posts.restore');
Route::delete('posts/{id}/force-delete', [\App\Http\Controllers\PostController::class, 'forceDelete'])->name('posts.force_delete');

Route::resource('posts',\App\Http\Controllers\PostController::class);

