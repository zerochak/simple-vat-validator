<?php

namespace Chak\EuVatValidation\Rules;

use Chak\EuVatValidation\Vat;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class VatNumber implements ValidationRule
{
    /**
     * @param  string|null  $country  ISO country code; inferred from the VAT prefix when null.
     */
    public function __construct(protected ?string $country = null)
    {
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! is_string($value) || ! Vat::isValid($value, $this->country ?: null)) {
            $fail('eu-vat-validation::validation.vat_number')->translate();
        }
    }
}
