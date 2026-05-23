<?php

declare(strict_types=1);

namespace Cavalheri\LaravelBrazilDocuments\Services\Documents;

use Cavalheri\LaravelBrazilDocuments\Contracts\GeneratesDocumentContract;
use Cavalheri\LaravelBrazilDocuments\Support\Cpf;

final class CpfHandler extends AbstractDocumentHandler implements GeneratesDocumentContract
{
    protected static function documentName(): string
    {
        return 'CPF';
    }

    protected static function supportClass(): string
    {
        return Cpf::class;
    }

    public function generate(): string
    {
        return Cpf::generate();
    }
}
