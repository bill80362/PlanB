<?php

use Illuminate\Support\Facades\Route;

/**前台*/
Route::middleware(['lang'])->prefix('{lang?}')->group(function () {
    Route::get('/', [\App\Http\Controllers\Front\IndexController::class, 'index']);
    Route::get('/http-test', [\App\Http\Controllers\Front\IndexController::class, 'httpTest']);

    Route::middleware(['auth:web_front'])->group(function () {
        Route::get('/member', [\App\Http\Controllers\Front\MemberController::class, 'index']);
        Route::get('/logout', [\App\Http\Controllers\Front\MemberController::class, "logout"]);
    });
});

Route::middleware(['lang'])->group(function () {
    Route::post('/login', [\App\Http\Controllers\Front\MemberController::class, 'login']);
});

Route::post('/change-lang', [\App\Http\Controllers\Front\IndexController::class, 'changeLang']);
