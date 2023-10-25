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

Route::get("/ydp", function () {
    return "Hello Yoga Dimas Pambudi";
});

// ketika path url /me maka dialihkan ke url path /ydp
Route::redirect('/me', '/ydp', 301);

// melihat semua routing
// php artisan route:list

// Fallback Route -modifikasi (tidak ada halaman 404)
Route::fallback(function () {
    return "404 by Yoga Dimas Pambudi";
});

// MENAMPILKAN VIEW

// view(uri, template, variabel data dalam bentuk array)
Route::view("/hello", "hello", ["name" => "Yoga"]);

// get(uri, callback)
Route::get("/hello-again", function () {
    return view("hello", ["name" => "Dimas"]);
});
