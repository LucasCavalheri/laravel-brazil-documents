<?php

declare(strict_types=1);

namespace Cavalheri\LaravelBrazilDocuments\Rules;

use Cavalheri\LaravelBrazilDocuments\Concerns\ResolvesValidationLocale;
use Cavalheri\LaravelBrazilDocuments\Support\TituloEleitor as TituloEleitorSupport;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

final class TituloEleitor implements ValidationRule
{
    use ResolvesValidationLocale;

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! is_scalar($value) && $value !== null) {
            $fail($this->trans('titulo_eleitor'));

            return;
        }

        if (! TituloEleitorSupport::isValid($value === null ? null : (string) $value)) {
            $fail($this->trans('titulo_eleitor'));
        }
    }
}
