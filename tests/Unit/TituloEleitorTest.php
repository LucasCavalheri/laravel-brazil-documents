<?php

declare(strict_types=1);

use Cavalheri\LaravelBrazilDocuments\Support\TituloEleitor;

it('validates a correct titulo eleitor', function () {
    expect(TituloEleitor::isValid('825169091279'))->toBeTrue();
});

it('formats titulo eleitor', function () {
    expect(TituloEleitor::format('825169091279'))->toBe('8251 6909 1279');
});

it('sanitizes titulo eleitor', function () {
    expect(TituloEleitor::sanitize('8251 6909 1279'))->toBe('825169091279');
});

it('generates a valid titulo eleitor', function () {
    $generated = TituloEleitor::generate();

    expect($generated)->toHaveLength(12)
        ->and(TituloEleitor::isValid($generated))->toBeTrue();
});

it('rejects invalid check digits', function () {
    expect(TituloEleitor::isValid('825169091270'))->toBeFalse();
});

it('rejects invalid state code', function () {
    expect(TituloEleitor::isValid('825169000279'))->toBeFalse()
        ->and(TituloEleitor::isValid('825169299279'))->toBeFalse();
});

it('rejects repeated digit sequences', function (string $value) {
    expect(TituloEleitor::isValid($value))->toBeFalse();
})->with([
    str_repeat('1', 12),
    str_repeat('0', 12),
    str_repeat('2', 12),
]);

it('rejects empty and malformed titulo eleitor', function () {
    expect(TituloEleitor::isValid(''))->toBeFalse()
        ->and(TituloEleitor::isValid(null))->toBeFalse()
        ->and(TituloEleitor::isValid('123'))->toBeFalse();
});
