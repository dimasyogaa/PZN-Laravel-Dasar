<?php

use App\Http\Controllers\CookieController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\InputController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\ResponseController;
use App\Http\Middleware\ContohMiddleware;
use App\Http\Middleware\VerifyCsrfToken;
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
})->name("product.detail");

Route::get('/products/{product}/items/{item}', function ($productId, $itemId) {
    return "Product $productId, Item $itemId";
})->name("product.item.detail");

// parameter harus angka 
Route::get("/categories/{id}", function (string $categoryId) {
    return "Categories : " . $categoryId;
})->where("id", "[0-9]+")->name("category.detail");

// optional route parameter (?)
// harus ditambahkan default value
Route::get("/users/{id?}", function (string $userId = "404 by Yoga Dimas Pambudi") {
    return "Users : " . $userId;
})->name("user.detail");

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


// NAMED ROUTE
/**
 * Diatas kita tambahkan named route pada route yang telah kita buat sebelumnnya
 * Di Laravel, kita bisa menamai Route dengan sebuah nama
 * Hal ini bagus ketika kita misal nanti butuh mendapatkan informasi tentang route tersebut, 
 * misal route url nya, atau melakukan redirect ke route
 * Dengan menambahkan nama di Route nya, kita bisa menggunakan nama route saja, 
 * tanpa khawatir URL nya akan diubah
 * Untuk menambahkan nama di route, kita cukup gunakan function name()
 */

// Menggunaan Named Route
Route::get("/produk/{id}", function ($id) {
    $link = route("product.detail", ["id" => $id]);
    return "Link $link";
});

Route::get("/produk-redirect/{id}", function ($id) {
    return redirect()->route("product.detail", ["id" => $id]);
});

// CONTROLLER
// Route::get("url", [classController::class, "namaFunctionDidalamController"])
//  Route::get("/controller/hello", [HelloController::class, "hello"]);

// REQUEST
Route::get("/controller/hello/request", [HelloController::class, "request"]);

Route::get("/controller/hello/{name}", [HelloController::class, "hello"]);


// REQUEST INPUT
Route::get("/input/hello", [InputController::class, "hello"]);
Route::post("/input/hello", [InputController::class, "hello"]);

// nested input
Route::post("/input/hello/first", [InputController::class, "helloFirst"]);

// mengambil semua input
Route::post("/input/hello/all", [InputController::class, "helloAll"]);

// mengambil array input
Route::post("/input/hello/array", [InputController::class, "helloArray"]);

// input type
Route::post("/input/type", [InputController::class, "inputType"]);

// Filter Request Input
Route::post("/input/filter/only", [InputController::class, "filterOnly"]);
Route::post("/input/filter/except", [InputController::class, "filterExcept"]);
Route::post("/input/filter/merge", [InputController::class, "filterMerge"]);

// File Uplaod
Route::post("/file/upload", [FileController::class, "upload"])
    ->withoutMiddleware([VerifyCsrfToken::class]);

// RESPONSE
Route::get("/response/hello", [ResponseController::class, "response"]);

// response header
Route::get("/response/header", [ResponseController::class, "header"]);

// response type
Route::get("/response/type/view", [ResponseController::class, "responseView"]);
Route::get("/response/type/json", [ResponseController::class, "responseJson"]);
Route::get("/response/type/file", [ResponseController::class, "responseFile"]);
Route::get("/response/type/download", [ResponseController::class, "responseDownload"]);

// COOKIE
Route::get("/cookie/set", [CookieController::class, "createCookie"]);
Route::get("/cookie/get", [CookieController::class, "getCookie"]);
Route::get("/cookie/clear", [CookieController::class, "clearCookie"]);

// REDIRECT
Route::get("/redirect/from", [RedirectController::class, "redirectFrom"]);
Route::get("/redirect/to", [RedirectController::class, "redirectTo"]);

// Redirect To Named Routes
Route::get('/redirect/name', [\App\Http\Controllers\RedirectController::class, 'redirectName']);
Route::get('/redirect/name/{name}', [\App\Http\Controllers\RedirectController::class, 'redirectHello'])
    ->name('redirect-hello');

// Redirect To Controller Action
Route::get('/redirect/action', [\App\Http\Controllers\RedirectController::class, 'redirectAction']);

// Redirect To External Domain
Route::get('/redirect/away', [\App\Http\Controllers\RedirectController::class, 'redirectAway']);

// MIDDLEWARE
Route::get("/middleware1/api", function () {
    return "OK";
})->middleware([ContohMiddleware::class]);

// menggunakan alias 
// Route::get("/middleware/api", function() {
//     return "OK";
// })->middleware(["contoh"]);

// middleware grup
Route::get("/middleware1/group", function () {
    return "GROUP";
})->middleware(["pzn-codimas"]); // semua middleware pada grup ini akan digunakan pada route ini

// middleware parameter
// ["alias:argumen1,argumen2"]
Route::get("/middleware/api", function () {
    return "OK";
})->middleware(["contoh2:PZN-Codimas,401"]);

Route::get("/middleware/group", function () {
    return "GROUP";
})->middleware(["pzn-codimas-2"]);
