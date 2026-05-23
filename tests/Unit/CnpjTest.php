<?php

declare(strict_types=1);

use Cavalheri\LaravelBrazilDocuments\Support\Cnpj;

it('validates a correct cnpj', function () {
    expect(Cnpj::isValid('11222333000181'))->toBeTrue();
});

it('formats cnpj', function () {
    expect(Cnpj::format('11222333000181'))->toBe('11.222.333/0001-81');
});

it('sanitizes cnpj', function () {
    expect(Cnpj::sanitize('11.222.333/0001-81'))->toBe('11222333000181');
});

it('generates a valid cnpj', function () {
    $generated = Cnpj::generate();

    expect($generated)->toHaveLength(14)
        ->and(Cnpj::isValid($generated))->toBeTrue();
});

it('rejects invalid cnpj check digits', function () {
    expect(Cnpj::isValid('11222333000180'))->toBeFalse();
});

it('rejects repeated digit cnpj sequences', function (string $value) {
    expect(Cnpj::isValid($value))->toBeFalse();
})->with([
    '11111111111111',
    '00000000000000',
    '22222222222222',
]);

it('rejects empty and malformed cnpj', function () {
    expect(Cnpj::isValid(''))->toBeFalse()
        ->and(Cnpj::isValid(null))->toBeFalse()
        ->and(Cnpj::isValid('123'))->toBeFalse();
});
