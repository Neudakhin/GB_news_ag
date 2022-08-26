<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\WelcomeController;
use \App\Http\Controllers\Admin\IndexController as AdminIndexController;
use \App\Http\Controllers\Admin\NewsController as AdminNewsController;
use \App\Http\Controllers\Admin\CategoryController as AdminCategoriesController;
use Illuminate\Support\Facades\DB;
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
Route::get('/test', function () {
    dd(\App\Models\Category::getAll());
});
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', AdminIndexController::class)
        ->name('index');

    Route::resources([
        'categories' => AdminCategoriesController::class,
        'news' => AdminNewsController::class,
    ]);
});

Route::get('/', [WelcomeController::class, 'index'])
    ->name('welcome');

Route::get('/categories', [CategoryController::class, 'index'])
        ->name('categories.index');

Route::prefix('news')->name('news.')->group(function () {
    Route::get('/', [NewsController::class, 'index'])
        ->name('index');

    Route::get('/{id}', [NewsController::class, 'show'])
        ->name('show');

    Route::get('/category/{category}', [NewsController::class, 'category'])
        ->name('category');
});

Route::prefix('orders')->name('orders.')->group(function () {
    Route::get('/', [OrdersController::class, 'index'])
        ->name('index');
    Route::get('/create', [OrdersController::class, 'create'])
        ->name('create');
    Route::post('/store', [OrdersController::class, 'store'])
        ->name('store');
});

Route::prefix('reviews')->name('reviews.')->group(function () {
    Route::get('/', [ReviewsController::class, 'index'])
        ->name('index');
    Route::get('/create', [ReviewsController::class, 'create'])
        ->name('create');
    Route::post('/store', [ReviewsController::class, 'store'])
        ->name('store');
});
