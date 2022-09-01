<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\WelcomeController;
use \App\Http\Controllers\Admin\IndexController as AdminIndexController;
use \App\Http\Controllers\Admin\NewsController as AdminNewsController;
use \App\Http\Controllers\Admin\CategoryController as AdminCategoriesController;
use \App\Http\Controllers\Admin\OrderController as AdminOrderController;
use \App\Http\Controllers\Admin\ReviewController as AdminReviewController;

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
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', AdminIndexController::class)
        ->name('index');

    Route::resources([
        'categories' => AdminCategoriesController::class,
        'news' => AdminNewsController::class,
        'orders' => AdminOrderController::class,
        'reviews' => AdminReviewController::class,
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

Route::resources([
    'orders' => OrderController::class,
    'reviews' => ReviewController::class,
]);
