<?php

declare(strict_types=1);

namespace Cavalheri\LaravelBrazilDocuments\ValueObjects;

use Cavalheri\LaravelBrazilDocuments\Support\TituloEleitor;

final class TituloEleitorValue extends AbstractDocumentValue
{
    public static function from(string $value): self
    {
        return new self($value);
    }

    public function isValid(): bool
    {
        return TituloEleitor::isValid($this->value);
    }

    public function formatted(): string
    {
        return TituloEleitor::format($this->value);
    }

    public function sanitized(): string
    {
        return TituloEleitor::sanitize($this->value);
    }
}
