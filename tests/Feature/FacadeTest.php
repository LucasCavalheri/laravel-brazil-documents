<?php

declare(strict_types=1);

use Cavalheri\LaravelBrazilDocuments\Facades\BrazilDocuments;

it('exposes cpf through the facade', function () {
    expect(BrazilDocuments::cpf('12345678909')->isValid())->toBeTrue()
        ->and(BrazilDocuments::cpf('12345678909')->format())->toBe('123.456.789-09')
        ->and(BrazilDocuments::cpf('123.456.789-09')->sanitize())->toBe('12345678909')
        ->and(BrazilDocuments::cpf()->generate())->toHaveLength(11);
});

it('exposes cnpj through the facade', function () {
    expect(BrazilDocuments::cnpj('11222333000181')->isValid())->toBeTrue()
        ->and(BrazilDocuments::cnpj('11222333000181')->format())->toBe('11.222.333/0001-81')
        ->and(BrazilDocuments::cnpj('11.222.333/0001-81')->sanitize())->toBe('11222333000181')
        ->and(BrazilDocuments::cnpj()->generate())->toHaveLength(14);
});

it('exposes cep through the facade', function () {
    expect(BrazilDocuments::cep('01001000')->isValid())->toBeTrue()
        ->and(BrazilDocuments::cep('01001000')->format())->toBe('01001-000')
        ->and(BrazilDocuments::cep('01001-000')->sanitize())->toBe('01001000');
});

it('exposes cnh through the facade', function () {
    expect(BrazilDocuments::cnh('12345678900')->isValid())->toBeTrue()
        ->and(BrazilDocuments::cnh('12345678900')->format())->toBe('123.456.789.00')
        ->and(BrazilDocuments::cnh('123.456.789.00')->sanitize())->toBe('12345678900')
        ->and(BrazilDocuments::cnh()->generate())->toHaveLength(11);
});

it('exposes pis through the facade', function () {
    expect(BrazilDocuments::pis('12056413177')->isValid())->toBeTrue()
        ->and(BrazilDocuments::pis('12056413177')->format())->toBe('120.56413.17-7')
        ->and(BrazilDocuments::pis('120.56413.17-7')->sanitize())->toBe('12056413177')
        ->and(BrazilDocuments::pis()->generate())->toHaveLength(11);
});

it('exposes cns through the facade', function () {
    expect(BrazilDocuments::cns('279802393660003')->isValid())->toBeTrue()
        ->and(BrazilDocuments::cns('279802393660003')->format())->toBe('279 8023 9366 0003')
        ->and(BrazilDocuments::cns('279 8023 9366 0003')->sanitize())->toBe('279802393660003')
        ->and(BrazilDocuments::cns()->generate())->toHaveLength(15);
});

it('exposes titulo eleitor through the facade', function () {
    expect(BrazilDocuments::tituloEleitor('825169091279')->isValid())->toBeTrue()
        ->and(BrazilDocuments::tituloEleitor('825169091279')->format())->toBe('8251 6909 1279')
        ->and(BrazilDocuments::tituloEleitor('8251 6909 1279')->sanitize())->toBe('825169091279')
        ->and(BrazilDocuments::tituloEleitor()->generate())->toHaveLength(12);
});
