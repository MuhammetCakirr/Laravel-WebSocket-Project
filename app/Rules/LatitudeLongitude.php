<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class LatitudeLongitude implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(!preg_match('/^-?\d{1,9}(\.\d{1,8})?$/', $value)){

            $fail('The :attribute must be a valid latitude with up to 8 digits before the decimal and up to 2 digits after the decimal.');
        }
    }
}
