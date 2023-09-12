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
