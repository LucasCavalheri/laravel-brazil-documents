<?php

declare(strict_types=1);

use Cavalheri\LaravelBrazilDocuments\Support\Pis;

it('validates a correct pis', function () {
    expect(Pis::isValid('12056413177'))->toBeTrue();
});

it('formats pis', function () {
    expect(Pis::format('12056413177'))->toBe('120.56413.17-7');
});

it('sanitizes pis', function () {
    expect(Pis::sanitize('120.56413.17-7'))->toBe('12056413177');
});

it('generates a valid pis', function () {
    $generated = Pis::generate();

    expect($generated)->toHaveLength(11)
        ->and(Pis::isValid($generated))->toBeTrue();
});

it('rejects invalid pis check digit', function () {
    expect(Pis::isValid('12056413179'))->toBeFalse();
});

it('rejects repeated digit pis sequences', function (string $value) {
    expect(Pis::isValid($value))->toBeFalse();
})->with([
    '11111111111',
    '00000000000',
    '22222222222',
]);

it('rejects empty and malformed pis', function () {
    expect(Pis::isValid(''))->toBeFalse()
        ->and(Pis::isValid(null))->toBeFalse()
        ->and(Pis::isValid('123'))->toBeFalse();
});
