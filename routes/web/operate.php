<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;


/**後台*/
Route::prefix('/operate')->group(function () {
    Route::middleware(["AdminLoginAuth"])->group(function () {
        //測試使用多語言
        // App::setLocale("zh-tw");

        //管理員
        Route::get('/user', [\App\Http\Controllers\Operation\UserController::class, "listHTML"])->name("user_list");
        Route::get('/user/{id}', [\App\Http\Controllers\Operation\UserController::class, "updateHTML"])->whereNumber("id");
        Route::post('/user/{id}', [\App\Http\Controllers\Operation\UserController::class, "update"])->whereNumber("id");
        Route::post('/user/del', [\App\Http\Controllers\Operation\UserController::class, "delBatch"]);
        Route::get('/user/export', [\App\Http\Controllers\Operation\UserController::class, 'export']);

        //Dashboard
        Route::get('/dashboard', [\App\Http\Controllers\Admin\IndexController::class, "indexHTML"])
            // ->middleware(['can:memberLevel.read'])
            ;

        //Member_Data
        Route::get('/member_data', [\App\Http\Controllers\Admin\MemberDataController::class, "listHTML"]);
        Route::get('/member_data/{id}', [\App\Http\Controllers\Admin\MemberDataController::class, "updateHTML"])->whereNumber("id");
        Route::post('/member_data/{id}', [\App\Http\Controllers\Admin\MemberDataController::class, "update"])->whereNumber("id");
        Route::post('/member_data/del', [\App\Http\Controllers\Admin\MemberDataController::class, "delBatch"]);
        Route::get('/member_data/export', [\App\Http\Controllers\Admin\MemberDataController::class, 'export']);




    });

    //登入
    Route::get('/login', [\App\Http\Controllers\Admin\LoginController::class, "loginHTML"]);
    Route::post('/login', [\App\Http\Controllers\Admin\LoginController::class, "login"]);
    Route::get('/logout', [\App\Http\Controllers\Admin\LoginController::class, "logout"]);
});
