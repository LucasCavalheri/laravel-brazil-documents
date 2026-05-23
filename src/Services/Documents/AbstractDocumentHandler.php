<?php

declare(strict_types=1);

namespace Cavalheri\LaravelBrazilDocuments\Services\Documents;

use Cavalheri\LaravelBrazilDocuments\Contracts\DocumentContract;
use Cavalheri\LaravelBrazilDocuments\Exceptions\InvalidDocumentException;

abstract class AbstractDocumentHandler implements DocumentContract
{
    public function __construct(protected readonly ?string $value = null) {}

    abstract protected static function documentName(): string;

    abstract protected static function supportClass(): string;

    public function isValid(): bool
    {
        $this->ensureValue();

        return static::supportClass()::isValid($this->value);
    }

    public function format(): string
    {
        $this->ensureValue();

        return static::supportClass()::format($this->value);
    }

    public function sanitize(): string
    {
        $this->ensureValue();

        return static::supportClass()::sanitize($this->value);
    }

    protected function ensureValue(): void
    {
        if ($this->value === null || $this->value === '') {
            throw InvalidDocumentException::missingValue(static::documentName());
        }
    }
}
