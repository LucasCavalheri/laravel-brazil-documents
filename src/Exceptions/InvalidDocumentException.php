<?php

declare(strict_types=1);

namespace Cavalheri\LaravelBrazilDocuments\Exceptions;

use InvalidArgumentException;

class InvalidDocumentException extends InvalidArgumentException
{
    public static function missingValue(string $document): self
    {
        return new self("A value is required to perform this operation on {$document}.");
    }
}
