<?php

declare(strict_types=1);

use Cavalheri\LaravelBrazilDocuments\Support\Cnh;

it('validates a correct cnh', function () {
    expect(Cnh::isValid('12345678900'))->toBeTrue();
});

it('formats cnh', function () {
    expect(Cnh::format('12345678900'))->toBe('123.456.789.00');
});

it('sanitizes cnh', function () {
    expect(Cnh::sanitize('123.456.789.00'))->toBe('12345678900');
});

it('generates a valid cnh', function () {
    $generated = Cnh::generate();

    expect($generated)->toHaveLength(11)
        ->and(Cnh::isValid($generated))->toBeTrue();
});

it('rejects invalid cnh check digits', function () {
    expect(Cnh::isValid('12345678909'))->toBeFalse();
});

it('rejects repeated digit cnh sequences', function (string $value) {
    expect(Cnh::isValid($value))->toBeFalse();
})->with([
    '11111111111',
    '00000000000',
    '22222222222',
]);

it('rejects empty and malformed cnh', function () {
    expect(Cnh::isValid(''))->toBeFalse()
        ->and(Cnh::isValid(null))->toBeFalse()
        ->and(Cnh::isValid('123'))->toBeFalse();
});
