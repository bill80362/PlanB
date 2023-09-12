<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;


/**後台*/
Route::prefix('/oper')->group(function () {
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
        Route::get('/Member_Data/export', [\App\Http\Controllers\Admin\MemberDataController::class, 'export']);
    });

    //登入
    Route::get('/login', [\App\Http\Controllers\Admin\LoginController::class, "loginHTML"])->name("adminLogin");
    Route::post('/login', [\App\Http\Controllers\Admin\LoginController::class, "login"]);
    Route::get('/logout', [\App\Http\Controllers\Admin\LoginController::class, "logout"]);
});
