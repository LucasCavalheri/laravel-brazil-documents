<?php

declare(strict_types=1);

namespace Cavalheri\LaravelBrazilDocuments\Rules;

use Cavalheri\LaravelBrazilDocuments\Concerns\ResolvesValidationLocale;
use Cavalheri\LaravelBrazilDocuments\Support\Cep as CepSupport;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

final class Cep implements ValidationRule
{
    use ResolvesValidationLocale;

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! is_scalar($value) && $value !== null) {
            $fail($this->trans('cep'));

            return;
        }

        if (! CepSupport::isValid($value === null ? null : (string) $value)) {
            $fail($this->trans('cep'));
        }
    }
}
