<?php

declare(strict_types=1);

namespace Cavalheri\LaravelBrazilDocuments\Concerns;

trait ResolvesValidationLocale
{
    protected function validationLocale(): ?string
    {
        $locale = config('brazil-documents.locale');

        if ($locale !== null && $locale !== '') {
            return (string) $locale;
        }

        return app()->getLocale();
    }

    protected function trans(string $key, array $replace = []): string
    {
        $locale = $this->validationLocale();

        return trans("brazil-documents::validation.{$key}", $replace, $locale);
    }
}
