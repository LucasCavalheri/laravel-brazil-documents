<?php

declare(strict_types=1);

namespace Cavalheri\LaravelBrazilDocuments\Support;

use Cavalheri\LaravelBrazilDocuments\Concerns\ValidatesRepeatedDigits;

final class Cnpj
{
    use ValidatesRepeatedDigits;

    private const int LENGTH = 14;

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

        return self::hasValidCheckDigits($digits);
    }

    public static function format(string $value): string
    {
        $digits = self::sanitize($value);

        return sprintf(
            '%s.%s.%s/%s-%s',
            substr($digits, 0, 2),
            substr($digits, 2, 3),
            substr($digits, 5, 3),
            substr($digits, 8, 4),
            substr($digits, 12, 2),
        );
    }

    public static function generate(): string
    {
        do {
            $base = '';

            for ($i = 0; $i < 12; $i++) {
                $base .= (string) random_int(0, 9);
            }

            $digits = $base.self::calculateCheckDigits($base);
        } while (self::hasRepeatedDigits($digits));

        return $digits;
    }

    private static function hasValidCheckDigits(string $digits): bool
    {
        $base = substr($digits, 0, 12);
        $expected = self::calculateCheckDigits($base);

        return substr($digits, 12, 2) === $expected;
    }

    private static function calculateCheckDigits(string $base): string
    {
        $first = self::calculateDigit($base, [5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2]);
        $second = self::calculateDigit($base.$first, [6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2]);

        return $first.$second;
    }

    private static function calculateDigit(string $digits, array $weights): string
    {
        $sum = 0;

        foreach (str_split($digits) as $index => $digit) {
            $sum += (int) $digit * $weights[$index];
        }

        $remainder = $sum % 11;

        return (string) ($remainder < 2 ? 0 : 11 - $remainder);
    }
}
