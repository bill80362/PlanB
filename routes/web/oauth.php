<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

Route::prefix('/oauth')->group(function () {
    Route::get('/google/redirect', [\App\Http\Controllers\Front\OauthController::class, "googleRedirect"]);
    Route::get('/google/login', [\App\Http\Controllers\Front\OauthController::class, "googleLogin"]);
});
