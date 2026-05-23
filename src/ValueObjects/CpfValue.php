<?php

declare(strict_types=1);

namespace Cavalheri\LaravelBrazilDocuments\ValueObjects;

use Cavalheri\LaravelBrazilDocuments\Support\Cpf;

final class CpfValue extends AbstractDocumentValue
{
    public static function from(string $value): self
    {
        return new self($value);
    }

    public function isValid(): bool
    {
        return Cpf::isValid($this->value);
    }

    public function formatted(): string
    {
        return Cpf::format($this->value);
    }

    public function sanitized(): string
    {
        return Cpf::sanitize($this->value);
    }
}
