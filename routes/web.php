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

Route::get("/hello-world", function () {
    return view("folderhello.world", ["name" => "Pambudi"]);
});

// compile views : php artisan view:cache
// disimpan di folder storage/framework/views
// menghapus compile views : php artisan view:clear

// ROUTE PARAMETER
Route::get("/products/{id}", function ($productId) {
    return "Product $productId";
});

Route::get('/products/{product}/items/{item}', function ($productId, $itemId) {
    return "Product $productId, Item $itemId";
});

// parameter harus angka 
Route::get("/categories/{id}", function (string $categoryId) {
    return "Categories : " . $categoryId;
})->where("id", "[0-9]+");

// optional route parameter (?)
// harus ditambahkan default value
Route::get("/users/{id?}", function (string $userId = "404 by Yoga Dimas Pambudi") {
    return "Users : " . $userId;
});

// Routing Conflict : route yang akan di eksekusi yang paling pertama dideklarasikan
// Route::get("/conflict/{name}", function (string $name) {
//     return "Conflict " . $name;
// }); 

Route::get("/conflict/yoga", function () {
    return "Conflict Yoga Dimas Pambudi";
}); 

Route::get("/conflict/{name}", function (string $name) {
    return "Conflict " . $name;
});

