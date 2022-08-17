<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\WelcomeController;
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

Route::get('/', [WelcomeController::class, 'index'])
    ->name('welcome');

Route::prefix('category')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])
        ->name('category');

    Route::get('/{category}/news', [NewsController::class, 'index'])
        ->name('news');
    Route::get('/{category}/news/{id}', [NewsController::class, 'show'])
        ->name('news.show');
});

Route::get('/hello/{name}', function ($name) {
    return "Hello $name";
});

Route::get('/info', function () {
    return "Страница с информацией.";
});

Route::get('/news', function () {
    return "Здесь будут новости.";
});
