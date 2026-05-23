<?php

declare(strict_types=1);

namespace Cavalheri\LaravelBrazilDocuments\ValueObjects;

use Cavalheri\LaravelBrazilDocuments\Support\Cnh;

final class CnhValue extends AbstractDocumentValue
{
    public static function from(string $value): self
    {
        return new self($value);
    }

    public function isValid(): bool
    {
        return Cnh::isValid($this->value);
    }

    public function formatted(): string
    {
        return Cnh::format($this->value);
    }

    public function sanitized(): string
    {
        return Cnh::sanitize($this->value);
    }
}
