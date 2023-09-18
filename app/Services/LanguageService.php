<?php

namespace App\Services;

use Illuminate\Contracts\Translation\Loader;
use Illuminate\Translation\Translator as LaravelTranslator;
use App\Models\CountryAndShippingFee\Language;

class LanguageService extends LaravelTranslator
{

    public function __construct(Loader $loader, $locale)
    {
        parent::__construct($loader, $locale);
    }


    public function get($key, array $replace = [], $locale = null, $fallback = true)
    {
        foreach (['1', '2', '3'] as $langType) {
            Language::firstOrCreate([
                'status' => 'Y',
                'type' => '4',
                'lang_type' => $langType,
                'text' => $key,
                'tran_text' => $key
            ]);
        }

        return parent::get($key, $replace, $locale, $fallback);
    }
}
