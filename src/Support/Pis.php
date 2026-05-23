<?php

declare(strict_types=1);

namespace Cavalheri\LaravelBrazilDocuments\Support;

use Cavalheri\LaravelBrazilDocuments\Concerns\ValidatesRepeatedDigits;

/**
 * PIS, PASEP and NIS share the same 11-digit validation algorithm.
 */
final class Pis
{
    use ValidatesRepeatedDigits;

    private const int LENGTH = 11;

    /** @var array<int, int> */
    private const array WEIGHTS = [3, 2, 9, 8, 7, 6, 5, 4, 3, 2];

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

        return self::hasValidCheckDigit($digits);
    }

    public static function format(string $value): string
    {
        $digits = self::sanitize($value);

        return sprintf(
            '%s.%s.%s-%s',
            substr($digits, 0, 3),
            substr($digits, 3, 5),
            substr($digits, 8, 2),
            substr($digits, 10, 1),
        );
    }

    public static function generate(): string
    {
        do {
            $base = '';

            for ($i = 0; $i < 10; $i++) {
                $base .= (string) random_int(0, 9);
            }

            $digits = $base.self::calculateCheckDigit($base);
        } while ((int) $digits === 0 || self::hasRepeatedDigits($digits));

        return $digits;
    }

    private static function hasValidCheckDigit(string $digits): bool
    {
        $base = substr($digits, 0, 10);

        return substr($digits, 10, 1) === self::calculateCheckDigit($base);
    }

    private static function calculateCheckDigit(string $base): string
    {
        $sum = 0;

        foreach (str_split($base) as $index => $digit) {
            $sum += (int) $digit * self::WEIGHTS[$index];
        }

        $remainder = $sum % 11;

        return (string) ($remainder < 2 ? 0 : 11 - $remainder);
    }
}
