<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

Route::prefix('/oauth')->group(function () {
    Route::get('/google/redirect', [\App\Http\Controllers\Front\OauthController::class, "googleRedirect"]);
    Route::get('/google/login', [\App\Http\Controllers\Front\OauthController::class, "googleLogin"]);

    Route::get('/line/redirect', [\App\Http\Controllers\Front\OauthController::class, "lineRedirect"]);
    Route::get('/line/login', [\App\Http\Controllers\Front\OauthController::class, "lineLogin"]);

    Route::get('/facebook/redirect', [\App\Http\Controllers\Front\OauthController::class, "facebookRedirect"]);
    Route::get('/facebook/login', [\App\Http\Controllers\Front\OauthController::class, "facebookLogin"]);
});
