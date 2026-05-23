<?php

declare(strict_types=1);

namespace Cavalheri\LaravelBrazilDocuments\ValueObjects;

use Cavalheri\LaravelBrazilDocuments\Support\Cns;

final class CnsValue extends AbstractDocumentValue
{
    public static function from(string $value): self
    {
        return new self($value);
    }

    public function isValid(): bool
    {
        return Cns::isValid($this->value);
    }

    public function formatted(): string
    {
        return Cns::format($this->value);
    }

    public function sanitized(): string
    {
        return Cns::sanitize($this->value);
    }
}
