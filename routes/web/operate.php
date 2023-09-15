<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;


/**後台*/
Route::prefix('/operate')->group(function () {
    Route::middleware(["AdminLoginAuth"])->group(function () {
        //測試使用多語言
        // App::setLocale("zh-tw");

        //Dashboard
        Route::get('/dashboard', [\App\Http\Controllers\Admin\IndexController::class, "indexHTML"])
            // ->middleware(['can:memberLevel.read'])
            ;

        //Member_Data
        Route::get('/member_data', [\App\Http\Controllers\Admin\MemberDataController::class, "listHTML"]);
        Route::get('/member_data/{ID}', [\App\Http\Controllers\Admin\MemberDataController::class, "updateHTML"])->whereNumber("ID");
        Route::post('/member_data/{ID}', [\App\Http\Controllers\Admin\MemberDataController::class, "update"])->whereNumber("ID");
        Route::post('/member_data/del', [\App\Http\Controllers\Admin\MemberDataController::class, "delBatch"]);
        Route::get('/member_data/export', [\App\Http\Controllers\Admin\MemberDataController::class, 'export']);

        //管理員
        Route::get('/user', [\App\Http\Controllers\Operation\User::class, "listHTML"]);
        Route::get('/user/{ID}', [\App\Http\Controllers\Operation\User::class, "updateHTML"])->whereNumber("ID");
        Route::post('/user/{ID}', [\App\Http\Controllers\Operation\User::class, "update"])->whereNumber("ID");
        Route::post('/user/del', [\App\Http\Controllers\Operation\User::class, "delBatch"]);
        Route::get('/user/export', [\App\Http\Controllers\Operation\User::class, 'export']);


    });

    //登入
    Route::get('/login', [\App\Http\Controllers\Admin\LoginController::class, "loginHTML"]);
    Route::post('/login', [\App\Http\Controllers\Admin\LoginController::class, "login"]);
    Route::get('/logout', [\App\Http\Controllers\Admin\LoginController::class, "logout"]);
});
