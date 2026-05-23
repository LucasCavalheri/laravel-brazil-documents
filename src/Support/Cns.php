<?php

declare(strict_types=1);

namespace Cavalheri\LaravelBrazilDocuments\Support;

use Cavalheri\LaravelBrazilDocuments\Concerns\ValidatesRepeatedDigits;

/**
 * Cartão Nacional de Saúde (CNS) — algoritmo DATASUS para definitivo (1, 2) e provisório (7, 8, 9).
 */
final class Cns
{
    use ValidatesRepeatedDigits;

    private const int LENGTH = 15;

    /** @var array<int, int> */
    private const array VALID_FIRST_DIGITS = [1, 2, 7, 8, 9];

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

        if (! in_array((int) $digits[0], self::VALID_FIRST_DIGITS, true)) {
            return false;
        }

        if ($digits === str_repeat('0', self::LENGTH)) {
            return false;
        }

        if (self::hasRepeatedDigits($digits)) {
            return false;
        }

        $chars = str_split($digits);

        if (in_array($chars[0], ['1', '2'], true)) {
            return self::buildDefinitiveDigits($chars) === $chars;
        }

        return self::weightedSum($chars) % 11 === 0;
    }

    public static function format(string $value): string
    {
        $digits = self::sanitize($value);

        return sprintf(
            '%s %s %s %s',
            substr($digits, 0, 3),
            substr($digits, 3, 4),
            substr($digits, 7, 4),
            substr($digits, 11, 4),
        );
    }

    public static function generate(): string
    {
        do {
            $firstDigit = (string) self::VALID_FIRST_DIGITS[random_int(0, count(self::VALID_FIRST_DIGITS) - 1)];

            $digits = in_array($firstDigit, ['1', '2'], true)
                ? self::generateDefinitive($firstDigit)
                : self::generateProvisional($firstDigit);
        } while ($digits === str_repeat('0', self::LENGTH) || self::hasRepeatedDigits($digits));

        return $digits;
    }

    /**
     * @param  array<int, string>  $base
     * @return array<int, string>
     */
    private static function buildDefinitiveDigits(array $base): array
    {
        $cns = array_slice($base, 0, 11);
        $total = self::weightedSum($cns, 11);
        $checkDigit = 11 - ($total % 11);

        if ($checkDigit === 11) {
            $checkDigit = 0;
        }

        if ($checkDigit === 10) {
            $total += 2;
            $checkDigit = 11 - ($total % 11);

            return array_merge($cns, ['0', '0', '1', (string) $checkDigit]);
        }

        return array_merge($cns, ['0', '0', '0', (string) $checkDigit]);
    }

    private static function generateDefinitive(string $firstDigit): string
    {
        $cns = [$firstDigit];

        for ($i = 0; $i < 10; $i++) {
            $cns[] = (string) random_int(0, 9);
        }

        return implode('', self::buildDefinitiveDigits($cns));
    }

    private static function generateProvisional(string $firstDigit): string
    {
        $cns = [$firstDigit];

        for ($i = 0; $i < 14; $i++) {
            $cns[] = (string) random_int(0, 9);
        }

        if (self::weightedSum($cns) % 11 === 0) {
            return implode('', $cns);
        }

        $remainder = self::weightedSum($cns) % 11;
        $diff = 11 - $remainder;

        return implode('', self::adjustProvisionalDigits($cns, 15 - $diff, $diff));
    }

    /**
     * @param  array<int, string>  $cns
     * @return array<int, string>
     */
    private static function adjustProvisionalDigits(array $cns, int $position, int $remainder): array
    {
        if ($remainder === 0) {
            if (self::isValid(implode('', $cns))) {
                return $cns;
            }

            $total = self::weightedSum($cns);
            $diff = 15 - ($total % 11);

            return self::adjustProvisionalDigits($cns, 15 - $diff, $diff);
        }

        if (15 - $position > $remainder) {
            return self::adjustProvisionalDigits($cns, $position + 1, $remainder);
        }

        if ($cns[$position] !== '9') {
            $cns[$position] = (string) ((int) $cns[$position] + 1);
            $remainder -= 15 - $position;
        } else {
            $remainder += 15 - $position;
            $cns[$position] = (string) ((int) $cns[$position] - 1);
            $position--;
        }

        return self::adjustProvisionalDigits($cns, $position, $remainder);
    }

    /**
     * @param  array<int, string>  $digits
     */
    private static function weightedSum(array $digits, int $length = self::LENGTH): int
    {
        $sum = 0;

        for ($position = 0; $position < $length; $position++) {
            $sum += (int) $digits[$position] * (15 - $position);
        }

        return $sum;
    }
}
