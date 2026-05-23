<?php

declare(strict_types=1);

use Cavalheri\LaravelBrazilDocuments\ValueObjects\CepValue;
use Cavalheri\LaravelBrazilDocuments\ValueObjects\CnhValue;
use Cavalheri\LaravelBrazilDocuments\ValueObjects\CnpjValue;
use Cavalheri\LaravelBrazilDocuments\ValueObjects\CpfValue;
use Cavalheri\LaravelBrazilDocuments\ValueObjects\CnsValue;
use Cavalheri\LaravelBrazilDocuments\ValueObjects\PisValue;
use Cavalheri\LaravelBrazilDocuments\ValueObjects\TituloEleitorValue;

it('exposes cpf value object api', function () {
    $cpf = CpfValue::from('12345678909');

    expect($cpf->isValid())->toBeTrue()
        ->and($cpf->formatted())->toBe('123.456.789-09')
        ->and(CpfValue::from('123.456.789-09')->sanitized())->toBe('12345678909')
        ->and((string) $cpf)->toBe('12345678909');
});

it('exposes cnpj value object api', function () {
    $cnpj = CnpjValue::from('11222333000181');

    expect($cnpj->isValid())->toBeTrue()
        ->and($cnpj->formatted())->toBe('11.222.333/0001-81')
        ->and(CnpjValue::from('11.222.333/0001-81')->sanitized())->toBe('11222333000181');
});

it('exposes cep value object api', function () {
    $cep = CepValue::from('01001000');

    expect($cep->isValid())->toBeTrue()
        ->and($cep->formatted())->toBe('01001-000')
        ->and(CepValue::from('01001-000')->sanitized())->toBe('01001000');
});

it('exposes cnh value object api', function () {
    $cnh = CnhValue::from('12345678900');

    expect($cnh->isValid())->toBeTrue()
        ->and($cnh->formatted())->toBe('123.456.789.00')
        ->and(CnhValue::from('123.456.789.00')->sanitized())->toBe('12345678900');
});

it('exposes pis value object api', function () {
    $pis = PisValue::from('12056413177');

    expect($pis->isValid())->toBeTrue()
        ->and($pis->formatted())->toBe('120.56413.17-7')
        ->and(PisValue::from('120.56413.17-7')->sanitized())->toBe('12056413177');
});

it('exposes cns value object api', function () {
    $cns = CnsValue::from('279802393660003');

    expect($cns->isValid())->toBeTrue()
        ->and($cns->formatted())->toBe('279 8023 9366 0003')
        ->and(CnsValue::from('279 8023 9366 0003')->sanitized())->toBe('279802393660003');
});

it('exposes titulo eleitor value object api', function () {
    $titulo = TituloEleitorValue::from('825169091279');

    expect($titulo->isValid())->toBeTrue()
        ->and($titulo->formatted())->toBe('8251 6909 1279')
        ->and(TituloEleitorValue::from('8251 6909 1279')->sanitized())->toBe('825169091279');
});
