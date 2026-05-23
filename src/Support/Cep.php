<?php

declare(strict_types=1);

namespace Cavalheri\LaravelBrazilDocuments\Support;

use Cavalheri\LaravelBrazilDocuments\Concerns\ValidatesRepeatedDigits;

final class Cep
{
    use ValidatesRepeatedDigits;

    private const int LENGTH = 8;

    public static function sanitize(string $value): string
    {
        return preg_replace('/\D/', '', $value) ?? '';
    }

    public static function isValid(?string $value): bool
    {
        if ($value === null || $value === '') {
            return false;
        }

        $digits = self::sanitize($value);

        if (strlen($digits) !== self::LENGTH) {
            return false;
        }

        if (self::hasRepeatedDigits($digits)) {
            return false;
        }

        return ctype_digit($digits);
    }

    public static function format(string $value): string
    {
        $digits = self::sanitize($value);

        return sprintf('%s-%s', substr($digits, 0, 5), substr($digits, 5, 3));
    }
}
