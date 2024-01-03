<?php

use App\Exceptions\ValidationException;
use App\Http\Controllers\_15_controller\_abcd_pzn\ABBasicHelloController;
use App\Http\Controllers\_15_controller\_abcd_pzn\CDIHelloController;
use App\Http\Controllers\_15_controller\_abcd_pzn\CDISingletonHelloController;
use App\Http\Controllers\_15_controller\_e_experiment\NonSingletonController;
use App\Http\Controllers\_15_controller\_e_experiment\SingletonController;
use App\Http\Controllers\_16_request\RequestController;
use App\Http\Controllers\_17_request_input\_a_mengambil_input_basic\RequestInputBasicController;
use App\Http\Controllers\_17_request_input\_b_nested_input\RequestInputNestedController;
use App\Http\Controllers\_17_request_input\_c_mengambil_semua_input\RequestInputAllInputController;
use App\Http\Controllers\_17_request_input\_d_mengambil_array_input\RequestInputArrayInputController;
use App\Http\Controllers\_17_request_input\_f_dynamic_properties\RequestInputDynamicPropertiesController;
use App\Http\Controllers\_18_input_type\InputTypeController;
use App\Http\Controllers\_19_filter_request_input\AFilterOnlyExceptController;
use App\Http\Controllers\_19_filter_request_input\BFilterMergeController;
use App\Http\Controllers\_21_file_upload\FileController;
use App\Http\Controllers\_22_response\_a_basic\ResponseBasicController;
use App\Http\Controllers\_22_response\_b_httpheader\ResponseHttpHeaderController;
use App\Http\Controllers\_22_response\_c_response_type\ResponseTypeController;
use App\Http\Controllers\_24_cookie\CookieController;
use App\Http\Controllers\_25_redirect\_a_basic\RedirectBasicController;
use App\Http\Controllers\_25_redirect\_bcd_redirect_to\_b_named_route\RedirectToNamedRouteController;
use App\Http\Controllers\_25_redirect\_bcd_redirect_to\_c_controller_action\RedirectToControllerActionController;
use App\Http\Controllers\_25_redirect\_bcd_redirect_to\_d_external_domain\RedirectToExternalDomainController;
use App\Http\Controllers\_27_cross_site_request_forgery\FormController;
use App\Http\Controllers\_29_url_generation\FormController as UrlGenerationFormController;
use App\Http\Controllers\_30_session\SessionController;
use App\Http\Middleware\_26_middleware\_c2_route_middleware\IniRouteMiddleware;
use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

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
Route::view("/view-view-hello", "_10_view.hello", ["name" => "Yoga"]);

// get(uri, callback)
Route::get("/view-get-hello", function () {
    // view(template, array)
    return view("_10_view.hello", ["name" => "Dimas"]);
});

// Nested View Directory
Route::get("/view-get-nested-hello", function () {
    // view(template, array)
    return view("_10_view._e_nested_view_directory.world", ["name" => "Pambudi"]);
});

// compile views : php artisan view:cache
// disimpan di folder storage/framework/views
// menghapus compile views : php artisan view:clear

// ROUTE PARAMETER
// Base
Route::get("/base/products/{id}", function ($productId) {
    return "Product $productId";
});

Route::get('/base/products/{product}/items/{item}', function ($productId, $itemId) {
    return "Product $productId, Item $itemId";
});

//  Named Route
Route::get("/products/{id}", function ($productId) {
    return "Product $productId";
})->name("product.detail");

Route::get('/products/{product}/items/{item}', function ($productId, $itemId) {
    return "Product $productId, Item $itemId";
})->name("product.item.detail");

// Regular Expression Constraints
// Base - parameter harus angka
Route::get("/base/categories/{id}", function (string $categoryId) {
    return "Categories : " . $categoryId;
})->where("id", "[0-9]+");

//  Named Route
Route::get("/categories/{id}", function (string $categoryId) {
    return "Categories : " . $categoryId;
})->where("id", "[0-9]+")->name("category.detail");

// Optional Route Parameter (?)
// harus ditambahkan default value
Route::get("/base/users/{id?}", function (string $userId = "ID Default 42443 - 404 by Yoga Dimas Pambudi") {
    return "Users : " . $userId;
});

// Named Route
Route::get("/users/{id?}", function (string $userId = "404 by Yoga Dimas Pambudi") {
    return "Users : " . $userId;
})->name("user.detail");

// Routing Conflict : route yang akan di eksekusi yang paling pertama dideklarasikan
// Route::get("/conflict/{name}", function (string $name) {
//     return "Conflict " . $name;
// });

// Route Basic
Route::get("/conflict/yoga", function () {
    return "Conflict Yoga Dimas Pambudi";
});

// Route Parameter
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
Route::get("/named-route/produk/{id}", function ($id) {
    $link = route("product.detail", ["id" => $id]);
    return "Link $link";
});

Route::get("/named-route/produk-redirect/{id}", function ($id) {
    return redirect()->route("product.detail", ["id" => $id]);
});

// pzn
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

// _ab_basic
Route::get("/controller/ab-basic", [ABBasicHelloController::class, "basicHello"]);

// _c_dependency_injection di controller
// no singleton
Route::get("/controller/c-di/{name}", [CDIHelloController::class, "woi"]);

// singletone
Route::get("/controller/c-di-singletone/{name}", [CDISingletonHelloController::class, "woi"]);

// experiment
Route::get('/non-singleton', [NonSingletonController::class, 'indexBind']);
Route::get('/singleton', [SingletonController::class, 'indexSingletone']);

// REQUEST
// untuk testing
Route::get("/request", [RequestController::class, "request"]);
Route::get("/request/param/{name}", [RequestController::class, "request"]);
// untuk tampil web
// http://127.0.0.1:8000/web/request?param=1 -untuk menguji full url
Route::get("web/request", [RequestController::class, "webRequest"]);
Route::get("web/request/param/{name}", [RequestController::class, "webRequest"]);

// REQUEST INPUT
// jika ingin test dengan postman gunakan ->withoutMiddleware([VerifyCsrfToken::class]);
// _a_mengambil_input
// http://127.0.0.1:8000/requestinput?namaku=yoga - HTTP METHOD(get)
Route::get("/requestinput", [RequestInputBasicController::class, "mengambilInputHTTPMethod"]); // - HTTP METHOD(get)
Route::post("/requestinput", [RequestInputBasicController::class, "mengambilInputHTTPMethod"]); // - HTTP METHOD(post)
/** Perbedaan get dan post : jika post, maka tidak bisa diakses melalui url, testing bisa melalui postman dengan form */
// http://127.0.0.1:8000/requestinput/yoga
Route::get("/requestinput/path/{namaku}", [RequestInputBasicController::class, "mengambilInputURI"]);

// _b_nested_input
Route::post("/requestinput/nested", [RequestInputNestedController::class, "mengambilNestedInput"]);

// _c_mengambil_semua_input
Route::post("/requestinput/all", [RequestInputAllInputController::class, "mengambilSemuaInput"]);

// _d_mengambil_array_input
Route::post("/requestinput/array", [RequestInputArrayInputController::class, "mengambilDataNamaPadaSemuaArrayProducts"]);

// _e_dynamic_properties
Route::post("/requestinput/dynamicproperties", [RequestInputDynamicPropertiesController::class, "mengambilDataNamaPadaSemuaArrayProducts"]);

// INPUT TYPE
Route::post("/inputtype", [InputTypeController::class, "inputType"]);

// FILTER REQUEST INPUT
Route::post("/input/filter/only", [AFilterOnlyExceptController::class, "filterOnly"]);
Route::post("/input/filter/except", [AFilterOnlyExceptController::class, "filterExcept"]);
Route::post("/input/filter/merge", [BFilterMergeController::class, "filterMerge"]);
Route::post("/input/filter/mergeifmissing", [BFilterMergeController::class, "filterMergeIfMissing"]);

// FILE UPLOAD
Route::post("/fileupload", [FileController::class, "upload"])
    ->withoutMiddleware([VerifyCsrfToken::class]);

// RESPONSE
// response basic
Route::get("/response/basic", [ResponseBasicController::class, "responseBasic"]);

// response header
Route::get("/response/header", [ResponseHttpHeaderController::class, "responseHeader"]);

// response type
// route group
Route::prefix("/response/type")->group(function () {
    Route::get("/view", [ResponseTypeController::class, "responseView"]);
    Route::get("/json", [ResponseTypeController::class, "responseJson"]);
    Route::get("/file", [ResponseTypeController::class, "responseFile"]);
    Route::get("/download", [ResponseTypeController::class, "responseDownload"]);
});


// COOKIE
// Route Controller
Route::controller(CookieController::class)->group(function () {
    Route::get("/cookie/set", "createCookie");
    Route::get("/cookie/get", "getCookie");
    Route::get("/cookie/clear", "clearCookie");
});


// REDIRECT
// basic
Route::get("/redirect/from", [RedirectBasicController::class, "redirectFrom"]);
Route::get("/redirect/to", [RedirectBasicController::class, "redirectTo"]);

// Redirect To Named Routes
Route::get('/redirect/namedroute', [RedirectToNamedRouteController::class, 'redirectName']);
Route::get('/redirect/namedroute/{name}', [RedirectToNamedRouteController::class, 'redirectHello'])
    ->name('redirect-to-named-route');

// Redirect To Controller Action
Route::get('/redirect/controlleraction', [RedirectToControllerActionController::class, 'redirectAction']);
Route::get('/redirect/controlleraction/{name}', [RedirectToControllerActionController::class, 'x']);

// Redirect To External Domain
Route::get('/redirect/externaldomain', [RedirectToExternalDomainController::class, 'redirectAway']);

// MIDDLEWARE
// C2 Route Middleware
Route::get("/route-middleware/api", function () {
    return "Route Middleware";
})->middleware([IniRouteMiddleware::class]);

// menggunakan alias
// Route::get("/route-middleware-alias/api", function() {
//     return "Route Middleware - Alias";
// })->middleware(["iniAliasRouteMiddleware"]);

// D Group Middleware
Route::get("/group-middleware", function () {
    return "Group Middleware";
})->middleware(["ini-group-middleware"]); // semua middleware pada grup ini akan digunakan pada route ini


// E Parameter Middleware
// ["alias:argumen1,argumen2"]
 Route::get("/parameter-middleware/api", function () {
     return "Parameter Middleware";
 })->middleware(["iniAliasParamMiddleware:Parameter-PZN-Codimas,401"]);


/**
 * ------ pzn ------
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
// Route::get("/middleware/api", function () {
//     return "OK";
// })->middleware(["contoh2:PZN-Codimas,401"]);

// Route::get("/middleware/group", function () {
//     return "GROUP";
// })->middleware(["pzn-codimas-2"]);

// Route Middleware
// Route::middleware(["contoh2:PZN-Codimas,401"])->group(function () {
//     Route::get("/middleware/api", function () {
//         return "OK";
//     });
//     Route::get("/middleware/group", function () {
//         return "GROUP";
//     });
// });

// Multiple/Combine Route Group
Route::middleware(["contoh2:PZN-Codimas,401"])->prefix("/middleware")->group(function () {
    Route::get("/api", function () {
        return "OK";
    });
    Route::get("/group", function () {
        return "GROUP";
    });
}); */

// CSRF
Route::get('/csrf', [FormController::class, 'form']);
Route::post('/csrf', [FormController::class, 'submitForm']);

// ROUTE GROUP
//-- Route Prefix
Route::prefix("/route-group/prefix/response/type")->group(function () {
    Route::get("/view", [ResponseTypeController::class, "responseView"]);
    Route::get("/json", [ResponseTypeController::class, "responseJson"]);
    Route::get("/file", [ResponseTypeController::class, "responseFile"]);
    Route::get("/download", [ResponseTypeController::class, "responseDownload"]);
});

//-- Route Middleware
Route::middleware(["iniAliasParamMiddleware:Parameter-PZN-Codimas,401"])
    ->prefix("/route-group/middleware/api")->group(function () {

        Route::get("/1", function () {
            return "Parameter Middleware 1";
        });

        Route::get("/2", function () {
            return "Parameter Middleware 2";
        });
});

//-- Route Controller
Route::controller(CookieController::class)->group(function () {
    Route::get("route-group/controller/cookie/set", "createCookie");
    Route::get("route-group/controller/cookie/get", "getCookie");
    Route::get("route-group/controller/cookie/clear", "clearCookie");
});

//-- Multiple Route Group (Combine)
// Multiple/Combine Route Group
Route::middleware(["iniAliasParamMiddleware:Parameter-PZN-Codimas,401"])
    ->prefix("/multiple-route-group/middleware/prefix/api")->group(function () {
        Route::get("/1", function () {
            return "Parameter Middleware Prefix 1";
        });

        Route::get("/2", function () {
            return "Parameter Middleware Prefix 2";
        });
    });

Route::controller(CookieController::class)
    ->prefix("multiple-route-group/controller/prefix")->group(function () {
    Route::get("/cookie/set", "createCookie");
    Route::get("/cookie/get", "getCookie");
    Route::get("/cookie/clear", "clearCookie");
});

// URL GENERATION
//-- Current URL
Route::get("/url/current", function () {
    return URL::full();
});

//-- URL for Named Route
Route::get("/url/named", function () {

    // cara 1
    // return route("redirect-to-named-route", ["name" => "Dimas"]);

    // cara2
    // return url()->route("redirect-to-named-route", ["name" => "Dimas"]);

    // cara 3
    return URL::route("redirect-to-named-route", ["name" => "Dimas"]);
});

//-- URL for Controller Action
Route::get('url/controller-action/csrf', [UrlGenerationFormController::class, 'form']);
Route::post('url/controller-action/csrf', [UrlGenerationFormController::class, 'submitForm']);

Route::get("/url/action", function () {

    // cara 1
    // return action([UrlGenerationFormController::class, 'form'], []);

    // cara 2
    // return url()->action([UrlGenerationFormController::class, 'form'], []);

    // cara 3
    return URL::action([UrlGenerationFormController::class, 'form'], []);
});




// SESSION
Route::get("/session/create", [SessionController::class, "createSession"]);
Route::get("/session/get", [SessionController::class, "getSession"]);
Route::get("test/session/get", [SessionController::class, "getSessionForUnitTesting"]);

// ERROR HANDLING
Route::get("/error/sample", function () {
    throw new Exception("Sample Error");
});

Route::get('/error/manual', function () {
    report(new Exception("Sample Error"));
    return "OK";
});

Route::get("/error/validation", function () {
    throw new ValidationException("Validation Error");
});

// HTTP Exception
Route::get('/abort/400', function () {
    abort(400, "Ups Validation Error");
});

Route::get('/abort/401', function () {
    abort(401);
});

Route::get('/abort/500', function () {
    abort(500);
});
