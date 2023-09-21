<?php

namespace App\Services;

use Illuminate\Contracts\Translation\Loader;
use Illuminate\Translation\Translator as LaravelTranslator;
use App\Models\CountryAndShippingFee\Language;
use Illuminate\Support\Str;

class LanguageService extends LaravelTranslator
{

    public function __construct(Loader $loader, $locale)
    {
        parent::__construct($loader, $locale);
    }


    public function get($key, array $replace = [], $locale = null, $fallback = true)
    {

        $locale = $locale ?: $this->locale;
        $this->load('*', '*', $locale);
        $line = $this->loaded['*']['*'][$locale][$key] ?? null;

        if (!isset($line)) {
            $ignoreKey = ['validation.', 'pagination.', 'auth.', 'common.', 'passwords.'];
            $check = Str::startsWith($key, $ignoreKey);
            $language = new Language();
            $langTypeKeys = array_keys($language->langTypeText);
            if (!$check) {
                foreach ($langTypeKeys as $langType) {
                    Language::firstOrCreate([
                        'lang_type' => $langType,
                        'text' => $key,
                    ], [
                        'lang_type' => $langType,
                        'text' => $key,
                        'tran_text' => $key
                    ]);
                }
            }
        }


        return parent::get($key, $replace, $locale, $fallback);
    }
}
