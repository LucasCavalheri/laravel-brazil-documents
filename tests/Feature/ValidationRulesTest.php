<?php

declare(strict_types=1);

use Cavalheri\LaravelBrazilDocuments\Rules\Cep;
use Cavalheri\LaravelBrazilDocuments\Rules\Cnh;
use Cavalheri\LaravelBrazilDocuments\Rules\Cnpj;
use Cavalheri\LaravelBrazilDocuments\Rules\Cpf;
use Cavalheri\LaravelBrazilDocuments\Rules\Cns;
use Cavalheri\LaravelBrazilDocuments\Rules\Pis;
use Illuminate\Support\Facades\Validator;

it('validates cpf rule', function () {
    $validator = Validator::make(
        ['cpf' => '12345678909'],
        ['cpf' => ['required', new Cpf]],
    );

    expect($validator->passes())->toBeTrue();

    $invalid = Validator::make(
        ['cpf' => '11111111111'],
        ['cpf' => ['required', new Cpf]],
    );

    expect($invalid->fails())->toBeTrue();
});

it('validates cnpj rule', function () {
    $validator = Validator::make(
        ['cnpj' => '11222333000181'],
        ['cnpj' => ['required', new Cnpj]],
    );

    expect($validator->passes())->toBeTrue();

    $invalid = Validator::make(
        ['cnpj' => '11111111111111'],
        ['cnpj' => ['required', new Cnpj]],
    );

    expect($invalid->fails())->toBeTrue();
});

it('validates cep rule', function () {
    $validator = Validator::make(
        ['cep' => '01001000'],
        ['cep' => ['required', new Cep]],
    );

    expect($validator->passes())->toBeTrue();

    $invalid = Validator::make(
        ['cep' => '11111111'],
        ['cep' => ['required', new Cep]],
    );

    expect($invalid->fails())->toBeTrue();
});

it('validates cnh rule', function () {
    $validator = Validator::make(
        ['cnh' => '12345678900'],
        ['cnh' => ['required', new Cnh]],
    );

    expect($validator->passes())->toBeTrue();

    $invalid = Validator::make(
        ['cnh' => '11111111111'],
        ['cnh' => ['required', new Cnh]],
    );

    expect($invalid->fails())->toBeTrue();
});

it('validates pis rule', function () {
    $validator = Validator::make(
        ['pis' => '12056413177'],
        ['pis' => ['required', new Pis]],
    );

    expect($validator->passes())->toBeTrue();

    $invalid = Validator::make(
        ['pis' => '11111111111'],
        ['pis' => ['required', new Pis]],
    );

    expect($invalid->fails())->toBeTrue();
});

it('validates cns rule', function () {
    $validator = Validator::make(
        ['cns' => '279802393660003'],
        ['cns' => ['required', new Cns]],
    );

    expect($validator->passes())->toBeTrue();

    $invalid = Validator::make(
        ['cns' => str_repeat('1', 15)],
        ['cns' => ['required', new Cns]],
    );

    expect($invalid->fails())->toBeTrue();
});
