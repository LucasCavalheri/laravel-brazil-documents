<?php

declare(strict_types=1);

namespace Cavalheri\LaravelBrazilDocuments\Facades;

use Cavalheri\LaravelBrazilDocuments\Services\BrazilDocumentsManager;
use Cavalheri\LaravelBrazilDocuments\Services\Documents\CepHandler;
use Cavalheri\LaravelBrazilDocuments\Services\Documents\CnhHandler;
use Cavalheri\LaravelBrazilDocuments\Services\Documents\CnpjHandler;
use Cavalheri\LaravelBrazilDocuments\Services\Documents\CpfHandler;
use Cavalheri\LaravelBrazilDocuments\Services\Documents\CnsHandler;
use Cavalheri\LaravelBrazilDocuments\Services\Documents\PisHandler;
use Illuminate\Support\Facades\Facade;

/**
 * @method static CpfHandler cpf(?string $value = null)
 * @method static CnpjHandler cnpj(?string $value = null)
 * @method static CepHandler cep(?string $value = null)
 * @method static CnhHandler cnh(?string $value = null)
 * @method static PisHandler pis(?string $value = null)
 * @method static CnsHandler cns(?string $value = null)
 *
 * @see BrazilDocumentsManager
 */
final class BrazilDocuments extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return BrazilDocumentsManager::class;
    }
}
