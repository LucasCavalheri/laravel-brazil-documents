<?php

declare(strict_types=1);

namespace Cavalheri\LaravelBrazilDocuments\Rules;

use Cavalheri\LaravelBrazilDocuments\Concerns\ResolvesValidationLocale;
use Cavalheri\LaravelBrazilDocuments\Support\Cns as CnsSupport;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

final class Cns implements ValidationRule
{
    use ResolvesValidationLocale;

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! is_scalar($value) && $value !== null) {
            $fail($this->trans('cns'));

            return;
        }

        if (! CnsSupport::isValid($value === null ? null : (string) $value)) {
            $fail($this->trans('cns'));
        }
    }
}
