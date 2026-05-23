<?php

declare(strict_types=1);

use Cavalheri\LaravelBrazilDocuments\Services\Documents\CepHandler;
use Cavalheri\LaravelBrazilDocuments\Services\Documents\CnhHandler;
use Cavalheri\LaravelBrazilDocuments\Services\Documents\CnpjHandler;
use Cavalheri\LaravelBrazilDocuments\Services\Documents\CpfHandler;

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
