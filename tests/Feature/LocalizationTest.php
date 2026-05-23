<?php

declare(strict_types=1);

use Cavalheri\LaravelBrazilDocuments\Rules\Cpf;
use Illuminate\Support\Facades\Validator;

it('returns english validation message by default', function () {
    $validator = Validator::make(
        ['cpf' => '11111111111'],
        ['cpf' => ['required', new Cpf]],
    );

    expect($validator->errors()->first('cpf'))->toBe('The CPF is invalid.');
});

it('returns portuguese validation message when locale is pt_BR', function () {
    app()->setLocale('pt_BR');

    $validator = Validator::make(
        ['cpf' => '11111111111'],
        ['cpf' => ['required', new Cpf]],
    );

    expect($validator->errors()->first('cpf'))->toBe('O CPF informado é inválido.');
});

it('respects config locale override', function () {
    config(['brazil-documents.locale' => 'pt_BR']);
    app()->setLocale('en');

    $validator = Validator::make(
        ['cpf' => '11111111111'],
        ['cpf' => ['required', new Cpf]],
    );

    expect($validator->errors()->first('cpf'))->toBe('O CPF informado é inválido.');
});
