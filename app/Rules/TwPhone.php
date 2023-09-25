<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

/**
 * 台灣手機號碼驗證
 * 範例
 */
class TwPhone implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {

        $pattern = "/^09\d{8}$/";

        $check = (bool)preg_match($pattern, $value);
        if (!$check) {
            $fail('validation.phone')->translate();
        }
    }
}
