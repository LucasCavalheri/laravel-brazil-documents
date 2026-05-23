<?php

declare(strict_types=1);

namespace Cavalheri\LaravelBrazilDocuments\Rules;

use Cavalheri\LaravelBrazilDocuments\Concerns\ResolvesValidationLocale;
use Cavalheri\LaravelBrazilDocuments\Support\Cnpj as CnpjSupport;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

final class Cnpj implements ValidationRule
{
    use ResolvesValidationLocale;

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! is_scalar($value) && $value !== null) {
            $fail($this->trans('cnpj'));

            return;
        }

        if (! CnpjSupport::isValid($value === null ? null : (string) $value)) {
            $fail($this->trans('cnpj'));
        }
    }
}
