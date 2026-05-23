<?php

declare(strict_types=1);

namespace Cavalheri\LaravelBrazilDocuments\Services\Documents;

use Cavalheri\LaravelBrazilDocuments\Support\Cep;

final class CepHandler extends AbstractDocumentHandler
{
    protected static function documentName(): string
    {
        return 'CEP';
    }

    protected static function supportClass(): string
    {
        return Cep::class;
    }
}
