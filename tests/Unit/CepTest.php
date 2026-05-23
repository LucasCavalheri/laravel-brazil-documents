<?php

declare(strict_types=1);

use Cavalheri\LaravelBrazilDocuments\Support\Cep;

it('validates a correct cep', function () {
    expect(Cep::isValid('01001000'))->toBeTrue();
});

it('formats cep', function () {
    expect(Cep::format('01001000'))->toBe('01001-000');
});

it('sanitizes cep', function () {
    expect(Cep::sanitize('01001-000'))->toBe('01001000');
});

it('rejects repeated digit cep sequences', function (string $value) {
    expect(Cep::isValid($value))->toBeFalse();
})->with([
    '11111111',
    '00000000',
    '22222222',
]);

it('rejects empty and malformed cep', function () {
    expect(Cep::isValid(''))->toBeFalse()
        ->and(Cep::isValid(null))->toBeFalse()
        ->and(Cep::isValid('123'))->toBeFalse();
});
