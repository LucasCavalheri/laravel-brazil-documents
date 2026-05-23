<?php

declare(strict_types=1);

namespace Cavalheri\LaravelBrazilDocuments\Support;

use Cavalheri\LaravelBrazilDocuments\Concerns\ValidatesRepeatedDigits;

final class Cnh
{
    use ValidatesRepeatedDigits;

    private const int LENGTH = 11;

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

        if ((int) $digits === 0) {
            return false;
        }

        if (self::hasRepeatedDigits($digits)) {
            return false;
        }

        return self::hasValidCheckDigits($digits);
    }

    public static function format(string $value): string
    {
        $digits = self::sanitize($value);

        return sprintf(
            '%s.%s.%s.%s',
            substr($digits, 0, 3),
            substr($digits, 3, 3),
            substr($digits, 6, 3),
            substr($digits, 9, 2),
        );
    }

    public static function generate(): string
    {
        do {
            $base = '';

            for ($i = 0; $i < 9; $i++) {
                $base .= (string) random_int(0, 9);
            }

            $digits = $base.self::calculateCheckDigits($base);
        } while ((int) $digits === 0 || self::hasRepeatedDigits($digits));

        return $digits;
    }

    private static function hasValidCheckDigits(string $digits): bool
    {
        $base = substr($digits, 0, 9);
        $expected = self::calculateCheckDigits($base);

        return substr($digits, 9, 2) === $expected;
    }

    private static function calculateCheckDigits(string $base): string
    {
        $first = self::calculateDigitDescending($base);
        $second = self::calculateDigitAscending($base);

        return $first.$second;
    }

    private static function calculateDigitDescending(string $base): string
    {
        $sum = 0;

        foreach (str_split($base) as $index => $digit) {
            $sum += (int) $digit * (9 - $index);
        }

        $remainder = $sum % 11;

        return (string) ($remainder >= 10 ? 0 : $remainder);
    }

    private static function calculateDigitAscending(string $base): string
    {
        $sum = 0;

        foreach (str_split($base) as $index => $digit) {
            $sum += (int) $digit * ($index + 1);
        }

        $remainder = $sum % 11;

        return (string) ($remainder >= 10 ? 0 : $remainder);
    }
}
