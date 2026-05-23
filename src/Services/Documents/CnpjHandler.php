<?php

declare(strict_types=1);

namespace Cavalheri\LaravelBrazilDocuments\Services\Documents;

use Cavalheri\LaravelBrazilDocuments\Contracts\GeneratesDocumentContract;
use Cavalheri\LaravelBrazilDocuments\Support\Cnpj;

final class CnpjHandler extends AbstractDocumentHandler implements GeneratesDocumentContract
{
    protected static function documentName(): string
    {
        return 'CNPJ';
    }

    protected static function supportClass(): string
    {
        return Cnpj::class;
    }

    public function generate(): string
    {
        return Cnpj::generate();
    }
}
