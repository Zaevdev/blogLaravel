<?php

use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\Admin\Category\{
    CreateController,
    DeleteController,
    EditController,
    IndexController,
    ShowController,
    StoreController,
    UpdateController
};
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

Route::prefix('/')->group(function () {
    Route::get('/', \App\Http\Controllers\Blog\IndexController::class)->name('blog.index');
    Route::prefix('posts')->group(function () {
        Route::get('/{post}', \App\Http\Controllers\Blog\ShowController::class)->name('blog.post.show');
    });
});

Route::prefix('admin')->middleware(['auth', 'role:admin', 'verified'])->group(function () {
    Route::get('/', \App\Http\Controllers\Admin\Blog\IndexController::class)->name('admin.blog.index');
    Route::prefix('categories')->group(function () {
        Route::get('/', IndexController::class)->name('admin.categories.index');
        Route::get('/create', CreateController::class)->name('admin.categories.create');
        Route::post('/', StoreController::class)->name('admin.categories.store');
        Route::get('/{category}', ShowController::class)->name('admin.categories.show');
        Route::get('/{category}/edit', EditController::class)->name('admin.categories.edit');
        Route::patch('/{category}', UpdateController::class)->name('admin.categories.update');
        Route::delete('/{category}', DeleteController::class)->name('admin.categories.delete');
    });
    Route::prefix('tags')->group(function () {
        Route::get('/', \App\Http\Controllers\Admin\Tag\IndexController::class)->name('admin.tag.index');
        Route::get('/create', \App\Http\Controllers\Admin\Tag\CreateController::class)->name('admin.tag.create');
        Route::post('/', \App\Http\Controllers\Admin\Tag\StoreController::class)->name('admin.tag.store');
        Route::get('/{tag}', \App\Http\Controllers\Admin\Tag\ShowController::class)->name('admin.tag.show');
        Route::get('/{tag}/edit', \App\Http\Controllers\Admin\Tag\EditController::class)->name('admin.tag.edit');
        Route::patch('/{tag}', \App\Http\Controllers\Admin\Tag\UpdateController::class)->name('admin.tag.update');
        Route::delete('/{tag}', \App\Http\Controllers\Admin\Tag\DeleteController::class)->name('admin.tag.delete');
    });
    Route::prefix('posts')->group(function () {
        Route::get('/', \App\Http\Controllers\Admin\Post\IndexController::class)->name('admin.post.index');
        Route::get('/create', \App\Http\Controllers\Admin\Post\CreateController::class)->name('admin.post.create');
        Route::post('/', \App\Http\Controllers\Admin\Post\StoreController::class)->name('admin.post.store');
        Route::get('/{post}', \App\Http\Controllers\Admin\Post\ShowController::class)->name('admin.post.show');
        Route::get('/{post}/edit', \App\Http\Controllers\Admin\Post\EditController::class)->name('admin.post.edit');
        Route::patch('/{post}', \App\Http\Controllers\Admin\Post\UpdateController::class)->name('admin.post.update');
        Route::delete('/delete', \App\Http\Controllers\Admin\Post\DeleteAllController::class)->name('admin.post.delete.all');
        Route::delete('/{post}', \App\Http\Controllers\Admin\Post\DeleteController::class)->name('admin.post.delete');
    });
    Route::prefix('users')->group(function () {
        Route::get('/', \App\Http\Controllers\Admin\User\IndexController::class)->name('admin.user.index');
        Route::get('/create', \App\Http\Controllers\Admin\User\CreateController::class)->name('admin.user.create');
        Route::post('/', \App\Http\Controllers\Admin\User\StoreController::class)->name('admin.user.store');
        Route::get('/{user}', \App\Http\Controllers\Admin\User\ShowController::class)->name('admin.user.show');
        Route::get('/{user}/edit', \App\Http\Controllers\Admin\User\EditController::class)->name('admin.user.edit');
        Route::patch('/{user}', \App\Http\Controllers\Admin\User\UpdateController::class)->name('admin.user.update');
        Route::delete('/{user}', \App\Http\Controllers\Admin\User\DeleteController::class)->name('admin.user.delete');
    });
});


Route::group(['middleware' => 'guest'], static function () {
    Route::get('/vk/auth', [SocialController::class, 'index'])->name('vk.auth');
    Route::get('/vk/auth/callback', [SocialController::class, 'callback']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes(['verify' => true]);