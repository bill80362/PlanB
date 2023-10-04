<?php

namespace App\Http\Controllers\Operation\System;

use App\Http\Controllers\Controller;
use App\Services\Route\RouteLanguageService;

class LocaleController extends Controller
{
    public function set($locale)
    {
        app(RouteLanguageService::class)->setLangNoRedirectOperate(4);
        return redirect()->back()->with('locale', $locale);
    }
}
