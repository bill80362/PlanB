<?php

namespace App\Tools\Lang;

use Illuminate\Support\Facades\App;


class JsTranslator
{

    public function __construct()
    {
    }


    public function getJsLang()
    {
        $locale = App::getLocale();
        $file = lang_path($locale . '.json');
        if (file_exists($file)) {
            return json_decode(file_get_contents($file));
        }

        return [];
    }
}
