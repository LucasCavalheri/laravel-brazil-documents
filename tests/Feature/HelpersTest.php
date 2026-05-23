<?php

declare(strict_types=1);

it('exposes global helpers', function () {
    expect(cpf('12345678909')->format())->toBe('123.456.789-09')
        ->and(cnpj('11222333000181')->format())->toBe('11.222.333/0001-81')
        ->and(cep('01001000')->format())->toBe('01001-000')
        ->and(cnh('12345678900')->format())->toBe('123.456.789.00')
        ->and(pis('12056413177')->format())->toBe('120.56413.17-7')
        ->and(cpf()->generate())->toHaveLength(11);
});
