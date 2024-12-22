<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Rule;

class Filter implements ValidationRule
{
    protected array $forbidden;
    /**
     * Run the validation rule.
     *
     * 
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @param array $forbidden
     */

     public function __construct(array $forbidden)
    {
        $this->forbidden = ['laravel', 'admin', 'php', 'test'];
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (in_array(strtolower($value), $this->forbidden)) {
            $fail("The :attribute value '{$value}' is not allowed.");
        }
    }
}
