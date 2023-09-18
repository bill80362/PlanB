<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;


/**後台*/
Route::prefix('/operate')->group(function () {
    Route::middleware(['auth:operate', "AdminLoginAuth"])->group(function () {
        Route::get('/', [\App\Http\Controllers\Operation\IndexController::class, "index"]);

        //Dashboard
        Route::get('/dashboard', [\App\Http\Controllers\Operation\IndexController::class, "dashboard"]);

        //管理員
        Route::get('/user', [\App\Http\Controllers\Operation\UserController::class, "listHTML"])->name("user_list");
        Route::get('/user/{id}', [\App\Http\Controllers\Operation\UserController::class, "updateHTML"])->whereNumber("id")->name("user_update_html");
        Route::post('/user/{id}', [\App\Http\Controllers\Operation\UserController::class, "update"])->whereNumber("id")->name("user_update");
        Route::post('/user/del', [\App\Http\Controllers\Operation\UserController::class, "delBatch"])->name("user_del");
        Route::get('/user/export', [\App\Http\Controllers\Operation\UserController::class, 'export'])->name("user_export");
        Route::post('/user/import', [\App\Http\Controllers\Operation\UserController::class, 'import'])->name("user_import");

        //Member_Data
        Route::get('/member_data', [\App\Http\Controllers\Operation\MemberDataController::class, "listHTML"]);
        Route::get('/member_data/{id}', [\App\Http\Controllers\Operation\MemberDataController::class, "updateHTML"])->whereNumber("id");
        Route::post('/member_data/{id}', [\App\Http\Controllers\Operation\MemberDataController::class, "update"])->whereNumber("id");
        Route::post('/member_data/del', [\App\Http\Controllers\Operation\MemberDataController::class, "delBatch"]);
        Route::get('/member_data/export', [\App\Http\Controllers\Operation\MemberDataController::class, 'export']);

        //語系
        Route::get('/language', [\App\Http\Controllers\Operation\LanguageController::class, "listHTML"])->name("language_list")
            ->middleware(['can:language_read']);
        Route::get('/language/{id}', [\App\Http\Controllers\Operation\LanguageController::class, "updateHTML"])->whereNumber("id")
            ->name("language_update_html")->middleware(['can:language_read']);
        Route::post('/language/{id}', [\App\Http\Controllers\Operation\LanguageController::class, "update"])
            ->whereNumber("id")->name("language_update")->middleware(['can:language_update']);
        Route::post('/language/del', [\App\Http\Controllers\Operation\LanguageController::class, "delBatch"])
            ->name("language_del")->middleware(['can:language_delete']);
        Route::get('/language/export', [\App\Http\Controllers\Operation\LanguageController::class, 'export'])
            ->name("language_export");
        // Route::post('/language/import', [\App\Http\Controllers\Operation\LanguageController::class, 'import'])->name("language_import");
        Route::post('/language/make_file', [\App\Http\Controllers\Operation\LanguageController::class, "makeFile"])->name("language_makeFile");
    });

    //登入
    Route::get('/login', [\App\Http\Controllers\Operation\LoginController::class, "loginHTML"]);
    Route::post('/login', [\App\Http\Controllers\Operation\LoginController::class, "login"]);
    Route::get('/logout', [\App\Http\Controllers\Operation\LoginController::class, "logout"]);
});
