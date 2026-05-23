<?php

declare(strict_types=1);

namespace Cavalheri\LaravelBrazilDocuments\Contracts;

interface DocumentContract
{
    public function isValid(): bool;

    public function format(): string;

    public function sanitize(): string;
}
