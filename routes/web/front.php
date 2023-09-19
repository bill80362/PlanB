<?php

use Illuminate\Support\Facades\Route;


//不強迫導轉範本，如果開頭語系成立，就吃語系，如果不是成立的語系，就使用預設語系，但是不強迫導轉
Route::group([
    "prefix" => app(\App\Services\RouteLanguageService::class)->setLangNoRedirect(),
//    "middleware" => ["lang.redirect"],//開啟強迫導轉
],function () {
    Route::get('/', [\App\Http\Controllers\Front\HomepageController::class, 'index']);
    Route::get('/about', [\App\Http\Controllers\Front\HomepageController::class, 'about']);
});

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
