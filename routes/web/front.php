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
