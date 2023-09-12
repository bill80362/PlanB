<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;



/**前台*/
Route::get('/greeting/{locale}', function (string $locale) {
    if (!in_array($locale, ['en', 'es', 'fr'])) {
        abort(400);
    }

    App::setLocale($locale);
});


Route::get('/', [\App\Http\Controllers\Front\IndexController::class, 'index']);
Route::get('/http-test', [\App\Http\Controllers\Front\IndexController::class, 'httpTest']);


Route::post('/login', [\App\Http\Controllers\Front\MemberController::class, 'login']);

Route::middleware(['auth:web_front'])->group(function () {
    Route::get('/member', [\App\Http\Controllers\Front\MemberController::class, 'index']);
    Route::get('/logout', [\App\Http\Controllers\Front\MemberController::class, "logout"]);
});
