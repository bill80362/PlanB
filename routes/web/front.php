<?php

use App\Services\Operate\SystemConfigService;
use Illuminate\Support\Facades\Route;

$systemConfigService = app(SystemConfigService::class);

//不強迫導轉範本
Route::prefix('{locale}')->where(['locale','[a-zA-Z]{2}'])->middleware(["lang.setting"])->group(function () {
    Route::get('/aa', [\App\Http\Controllers\Front\HomepageController::class, 'index']);
    Route::get('/about', [\App\Http\Controllers\Front\HomepageController::class, 'about']);
});


//強迫導轉範本
//Route::prefix('{locale?}')->middleware(["lang.redirect"])->group(function () {
//    Route::get('/', [\App\Http\Controllers\Front\HomepageController::class, 'index']);
//    Route::get('/about', [\App\Http\Controllers\Front\HomepageController::class, 'about']);
//});


//
///**
// * Post方法
// */
//Route::middleware(['lang'])->group(function () {
//    Route::post('/login', [\App\Http\Controllers\Front\MemberController::class, 'login']);
//    Route::post('/change-lang', [\App\Http\Controllers\Front\IndexController::class, 'changeLang']);
//});
//
//
///**
// * Get方法
// */
//$systemConfigService = app(SystemConfigService::class);
//$useLangPrefix = $systemConfigService->useLangPrefix;
//
//Route::middleware(['lang'])->prefix($useLangPrefix ? '{lang?}' : '')->group(function () {
//    Route::middleware(['auth:web_front'])->group(function () {
//        Route::get('/member', [\App\Http\Controllers\Front\MemberController::class, 'index']);
//        Route::get('/logout', [\App\Http\Controllers\Front\MemberController::class, "logout"]);
//    });
//    Route::get('/http-test', [\App\Http\Controllers\Front\IndexController::class, 'httpTest']);
//
//});
