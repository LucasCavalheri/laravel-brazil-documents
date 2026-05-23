<?php

declare(strict_types=1);

namespace Cavalheri\LaravelBrazilDocuments\Concerns;

trait ValidatesRepeatedDigits
{
    protected static function hasRepeatedDigits(string $digits): bool
    {
        return preg_match('/^(\d)\1+$/', $digits) === 1;
    }
}
