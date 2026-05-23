<?php

declare(strict_types=1);

namespace Cavalheri\LaravelBrazilDocuments\Support;

use Cavalheri\LaravelBrazilDocuments\Concerns\ValidatesRepeatedDigits;

/**
 * Título de eleitor — 12 dígitos (8 sequenciais + UF + 2 verificadores), módulo 11.
 */
final class TituloEleitor
{
    use ValidatesRepeatedDigits;

    private const int LENGTH = 12;

    private const int MIN_STATE_CODE = 1;

    private const int MAX_STATE_CODE = 28;

    /** @var array<int, int> */
    private const array FIRST_CHECK_WEIGHTS = [2, 3, 4, 5, 6, 7, 8, 9];

    /** @var array<int, int> */
    private const array SECOND_CHECK_WEIGHTS = [7, 8, 9];

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

        if ($digits === str_repeat('0', self::LENGTH)) {
            return false;
        }

        if (self::hasRepeatedDigits($digits)) {
            return false;
        }

        $stateCode = (int) substr($digits, 8, 2);

        if ($stateCode < self::MIN_STATE_CODE || $stateCode > self::MAX_STATE_CODE) {
            return false;
        }

        $chars = array_map(intval(...), str_split($digits));
        $firstCheckDigit = self::calculateFirstCheckDigit($chars);
        $secondCheckDigit = self::calculateSecondCheckDigit($chars, $firstCheckDigit);

        return $firstCheckDigit === $chars[10] && $secondCheckDigit === $chars[11];
    }

    public static function format(string $value): string
    {
        $digits = self::sanitize($value);

        return sprintf(
            '%s %s %s',
            substr($digits, 0, 4),
            substr($digits, 4, 4),
            substr($digits, 8, 4),
        );
    }

    public static function generate(): string
    {
        do {
            $base = '';

            for ($i = 0; $i < 8; $i++) {
                $base .= (string) random_int(0, 9);
            }

            $stateCode = str_pad((string) random_int(self::MIN_STATE_CODE, self::MAX_STATE_CODE), 2, '0', STR_PAD_LEFT);
            $partial = $base.$stateCode;
            $chars = array_map(intval(...), str_split($partial));
            $firstCheckDigit = self::calculateFirstCheckDigit($chars);
            $secondCheckDigit = self::calculateSecondCheckDigit($chars, $firstCheckDigit);
            $digits = $partial.$firstCheckDigit.$secondCheckDigit;
        } while ($digits === str_repeat('0', self::LENGTH) || self::hasRepeatedDigits($digits));

        return $digits;
    }

    /**
     * @param  array<int, int>  $digits
     */
    private static function calculateFirstCheckDigit(array $digits): int
    {
        $total = 0;

        for ($i = 0; $i < 8; $i++) {
            $total += $digits[$i] * self::FIRST_CHECK_WEIGHTS[$i];
        }

        $remainder = $total % 11;

        return $remainder === 10 ? 0 : $remainder;
    }

    /**
     * @param  array<int, int>  $digits  At least 10 digits (base + UF).
     */
    private static function calculateSecondCheckDigit(array $digits, int $firstCheckDigit): int
    {
        $total = ($digits[8] * self::SECOND_CHECK_WEIGHTS[0])
            + ($digits[9] * self::SECOND_CHECK_WEIGHTS[1])
            + ($firstCheckDigit * self::SECOND_CHECK_WEIGHTS[2]);

        $remainder = $total % 11;

        return $remainder === 10 ? 0 : $remainder;
    }
}
