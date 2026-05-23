<?php

declare(strict_types=1);

namespace Cavalheri\LaravelBrazilDocuments\Services;

use Cavalheri\LaravelBrazilDocuments\Services\Documents\CepHandler;
use Cavalheri\LaravelBrazilDocuments\Services\Documents\CnhHandler;
use Cavalheri\LaravelBrazilDocuments\Services\Documents\CnpjHandler;
use Cavalheri\LaravelBrazilDocuments\Services\Documents\CpfHandler;
use Cavalheri\LaravelBrazilDocuments\Services\Documents\PisHandler;

final class BrazilDocumentsManager
{
    public function cpf(?string $value = null): CpfHandler
    {
        return new CpfHandler($value);
    }

    public function cnpj(?string $value = null): CnpjHandler
    {
        return new CnpjHandler($value);
    }

    public function cep(?string $value = null): CepHandler
    {
        return new CepHandler($value);
    }

    public function cnh(?string $value = null): CnhHandler
    {
        return new CnhHandler($value);
    }

    public function pis(?string $value = null): PisHandler
    {
        return new PisHandler($value);
    }
}
