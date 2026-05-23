<?php

declare(strict_types=1);

use Cavalheri\LaravelBrazilDocuments\Services\Documents\CepHandler;
use Cavalheri\LaravelBrazilDocuments\Services\Documents\CnhHandler;
use Cavalheri\LaravelBrazilDocuments\Services\Documents\CnpjHandler;
use Cavalheri\LaravelBrazilDocuments\Services\Documents\CpfHandler;
use Cavalheri\LaravelBrazilDocuments\Services\Documents\CnsHandler;
use Cavalheri\LaravelBrazilDocuments\Services\Documents\PisHandler;

if (! function_exists('cpf')) {
    function cpf(?string $value = null): CpfHandler
    {
        return new CpfHandler($value);
    }
}

if (! function_exists('cnpj')) {
    function cnpj(?string $value = null): CnpjHandler
    {
        return new CnpjHandler($value);
    }
}

if (! function_exists('cep')) {
    function cep(?string $value = null): CepHandler
    {
        return new CepHandler($value);
    }
}

if (! function_exists('cnh')) {
    function cnh(?string $value = null): CnhHandler
    {
        return new CnhHandler($value);
    }
}

if (! function_exists('pis')) {
    function pis(?string $value = null): PisHandler
    {
        return new PisHandler($value);
    }
}

if (! function_exists('cns')) {
    function cns(?string $value = null): CnsHandler
    {
        return new CnsHandler($value);
    }
}
