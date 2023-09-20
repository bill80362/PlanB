<?php

use Illuminate\Support\Facades\Route;


Route::group([
    //開啟語系偵測，如果開頭有語系就吃語系，如果開頭不是語系，就使用預設語系，但不強迫導轉
    "prefix" => app(\App\Services\RouteLanguageService::class)->setLangNoRedirect(),//開啟語系偵測
//    "middleware" => ["lang.redirect"],//開啟強迫導轉
],function () {
    Route::get('/', [\App\Http\Controllers\Front\HomepageController::class, 'index']);
    Route::get('/about', [\App\Http\Controllers\Front\HomepageController::class, 'about']);
});
