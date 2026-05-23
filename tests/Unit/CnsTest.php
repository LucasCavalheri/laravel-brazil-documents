<?php

declare(strict_types=1);

use Cavalheri\LaravelBrazilDocuments\Support\Cns;

it('validates a definitive cns', function () {
    expect(Cns::isValid('279802393660003'))->toBeTrue();
});

it('validates a provisional cns', function () {
    expect(Cns::isValid('798886022842946'))->toBeTrue();
});

it('formats cns', function () {
    expect(Cns::format('279802393660003'))->toBe('279 8023 9366 0003');
});

it('sanitizes cns', function () {
    expect(Cns::sanitize('279 8023 9366 0003'))->toBe('279802393660003');
});

it('generates a valid cns', function () {
    $generated = Cns::generate();

    expect($generated)->toHaveLength(15)
        ->and(Cns::isValid($generated))->toBeTrue();
});

it('rejects invalid cns', function () {
    expect(Cns::isValid('279802393660004'))->toBeFalse()
        ->and(Cns::isValid('398765432109876'))->toBeFalse();
});

it('rejects cns with invalid first digit', function () {
    expect(Cns::isValid('379802393660003'))->toBeFalse();
});

it('rejects repeated digit cns sequences', function (string $value) {
    expect(Cns::isValid($value))->toBeFalse();
})->with([
    str_repeat('1', 15),
    str_repeat('0', 15),
    str_repeat('2', 15),
]);

it('rejects empty and malformed cns', function () {
    expect(Cns::isValid(''))->toBeFalse()
        ->and(Cns::isValid(null))->toBeFalse()
        ->and(Cns::isValid('123'))->toBeFalse();
});
