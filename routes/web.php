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

Route::get('/', function () {
    return view('welcome');
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
