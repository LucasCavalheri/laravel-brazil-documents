<?php

declare(strict_types=1);

namespace Cavalheri\LaravelBrazilDocuments\ValueObjects;

use Cavalheri\LaravelBrazilDocuments\Support\Cep;

final class CepValue extends AbstractDocumentValue
{
    public static function from(string $value): self
    {
        return new self($value);
    }

    public function isValid(): bool
    {
        return Cep::isValid($this->value);
    }

    public function formatted(): string
    {
        return Cep::format($this->value);
    }

    public function sanitized(): string
    {
        return Cep::sanitize($this->value);
    }
}
