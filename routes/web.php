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

//Route::group(['namespace' => 'App\Http\Controllers\Blog'], function () {
//    Route::get('/', IndexController::class);
//});

Route::prefix('/')->group(function () {
    Route::get('/', \App\Http\Controllers\Blog\IndexController::class);
});

Route::prefix('admin')->group(function () {
    Route::get('/', \App\Http\Controllers\Admin\Blog\IndexController::class);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
