<?php

declare(strict_types=1);

use Cavalheri\LaravelBrazilDocuments\Support\Cpf;

it('validates a correct cpf', function () {
    expect(Cpf::isValid('12345678909'))->toBeTrue();
});

it('formats cpf', function () {
    expect(Cpf::format('12345678909'))->toBe('123.456.789-09');
});

it('sanitizes cpf', function () {
    expect(Cpf::sanitize('123.456.789-09'))->toBe('12345678909');
});

it('generates a valid cpf', function () {
    $generated = Cpf::generate();

    expect($generated)->toHaveLength(11)
        ->and(Cpf::isValid($generated))->toBeTrue();
});

it('rejects invalid cpf check digits', function () {
    expect(Cpf::isValid('12345678900'))->toBeFalse();
});

it('rejects repeated digit cpf sequences', function (string $value) {
    expect(Cpf::isValid($value))->toBeFalse();
})->with([
    '11111111111',
    '00000000000',
    '22222222222',
]);

it('rejects empty and malformed cpf', function () {
    expect(Cpf::isValid(''))->toBeFalse()
        ->and(Cpf::isValid(null))->toBeFalse()
        ->and(Cpf::isValid('123'))->toBeFalse();
});
