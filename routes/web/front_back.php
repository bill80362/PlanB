<?php

use App\Services\Operate\SystemConfigService;
use Illuminate\Support\Facades\Route;

/**前台*/

/**
 * Post方法
 */
Route::middleware(['lang'])->group(function () {
    Route::post('/login', [\App\Http\Controllers\Front\MemberController::class, 'login']);
    Route::post('/change-lang', [\App\Http\Controllers\Front\IndexController::class, 'changeLang']);
});

/**
 * Get方法
 */
$systemConfigService = app(SystemConfigService::class);
$useLangPrefix = $systemConfigService->useLangPrefix;

Route::middleware(['lang'])->prefix($useLangPrefix ? '{lang?}' : '')->group(function () {
    Route::middleware(['auth:web_front'])->group(function () {
        Route::get('/member', [\App\Http\Controllers\Front\MemberController::class, 'index']);
        Route::get('/logout', [\App\Http\Controllers\Front\MemberController::class, 'logout']);
    });
    Route::get('/http-test', [\App\Http\Controllers\Front\IndexController::class, 'httpTest']);
    Route::get('/', [\App\Http\Controllers\Front\IndexController::class, 'index']);
});
