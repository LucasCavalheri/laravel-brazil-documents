<?php

declare(strict_types=1);

namespace Cavalheri\LaravelBrazilDocuments\ValueObjects;

use Cavalheri\LaravelBrazilDocuments\Support\Cnpj;

final class CnpjValue extends AbstractDocumentValue
{
    public static function from(string $value): self
    {
        return new self($value);
    }

    public function isValid(): bool
    {
        return Cnpj::isValid($this->value);
    }

    public function formatted(): string
    {
        return Cnpj::format($this->value);
    }

    public function sanitized(): string
    {
        return Cnpj::sanitize($this->value);
    }
}
