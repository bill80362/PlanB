<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/**後台*/
Route::middleware(["AdminLoginAuth"])->group(function () {
    //測試使用多語言
    App::setLocale("zh-tw");

    //Dashboard
    Route::get('/', [\App\Http\Controllers\Admin\IndexController::class, "indexHTML"]);
    //Member_Data
    Route::get('/Member_Data', [\App\Http\Controllers\Admin\MemberDataController::class, "listHTML"]);
    Route::get('/Member_Data/{ID}', [\App\Http\Controllers\Admin\MemberDataController::class, "updateHTML"])->whereNumber("ID");
    Route::post('/Member_Data/{ID}', [\App\Http\Controllers\Admin\MemberDataController::class, "update"])->whereNumber("ID");
    Route::post('/Member_Data/del', [\App\Http\Controllers\Admin\MemberDataController::class, "delBatch"]);
    Route::get('Member_Data/export', [\App\Http\Controllers\Admin\MemberDataController::class, 'export']);
});

//登入
Route::get('/login', [\App\Http\Controllers\Admin\LoginController::class, "loginHTML"])->name("adminLogin");
Route::post('/login', [\App\Http\Controllers\Admin\LoginController::class, "login"]);
Route::get('/logout', [\App\Http\Controllers\Admin\LoginController::class, "logout"]);


/**多語言*/
Route::get('/greeting/{locale}', function (string $locale) {
    if (!in_array($locale, ['en', 'es', 'fr'])) {
        abort(400);
    }

    App::setLocale($locale);
});
