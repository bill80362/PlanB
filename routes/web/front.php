<?php

use Illuminate\Support\Facades\Route;


Route::group([
    //開啟語系偵測，如果開頭有語系就吃語系，如果開頭不是語系，就使用預設語系，但不強迫導轉
    "prefix" => app(\App\Services\RouteLanguageService::class)->setLangNoRedirect(),//開啟語系偵測
//    "middleware" => ["lang.redirect"],//開啟強迫導轉
],function () {
    //首頁
    Route::get('/', [\App\Http\Controllers\Front\HomepageController::class, 'homepage'])->name("homepage");
    //內容頁面
    Route::get('/about', [\App\Http\Controllers\Front\ContentController::class, 'about'])->name("about");
});
