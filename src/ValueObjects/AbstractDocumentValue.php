<?php

declare(strict_types=1);

namespace Cavalheri\LaravelBrazilDocuments\ValueObjects;

abstract class AbstractDocumentValue
{
    protected function __construct(protected readonly string $value) {}

    abstract public function isValid(): bool;

    abstract public function formatted(): string;

    abstract public function sanitized(): string;

    public function toString(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->toString();
    }
}
