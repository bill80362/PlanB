<?php

namespace App\Tools\Lang;

use App\Models\CountryAndShippingFee\Language;
use App\Models\CountryAndShippingFee\LangUrlMap;
use Illuminate\Contracts\Translation\Loader;
use Illuminate\Support\Str;
use Illuminate\Translation\Translator as LaravelTranslator;
use Illuminate\Support\Facades\Request;
use App\Services\Operate\SystemConfigService;

class LanguageTranslator extends LaravelTranslator
{
    private $useUrlMap = false;
    public function __construct(Loader $loader, $locale, $useUrlMap = false)
    {
        $this->useUrlMap = $useUrlMap;
        parent::__construct($loader, $locale);
    }

    public function get($key, array $replace = [], $locale = null, $fallback = true)
    {
        // dd($key);
        $locale = $locale ?: $this->locale;
        $this->load('*', '*', $locale);
        $line = $this->loaded['*']['*'][$locale][$key] ?? null;


        //需做開關，如果打開，需執行寫入url的動作。
        if ($this->useUrlMap) {
            $currenturl = Request::path(); // or url()
            // $key、$currenturl
            LangUrlMap::firstOrCreate([
                'language_key' => $key,
                'url' => $currenturl,
            ]);
        }



        if (!isset($line)) {
            $ignoreKey = ['validation.', 'pagination.', 'auth.', 'common.', 'passwords.'];
            $check = Str::startsWith($key, $ignoreKey);
            $language = new Language();
            $langTypeKeys = $language->getCode();
            if (!$check) {
                foreach ($langTypeKeys as $langType) {
                    Language::firstOrCreate([
                        'lang_type' => $langType,
                        'text' => $key,
                    ], [
                        'lang_type' => $langType,
                        'text' => $key,
                        'tran_text' => $key,
                    ]);
                }
            }
        }

        return parent::get($key, $replace, $locale, $fallback);
    }
}
