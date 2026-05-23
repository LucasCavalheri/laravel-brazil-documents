<?php

declare(strict_types=1);

namespace Cavalheri\LaravelBrazilDocuments\Services\Documents;

use Cavalheri\LaravelBrazilDocuments\Contracts\GeneratesDocumentContract;
use Cavalheri\LaravelBrazilDocuments\Support\Cnh;

final class CnhHandler extends AbstractDocumentHandler implements GeneratesDocumentContract
{
    protected static function documentName(): string
    {
        return 'CNH';
    }

    protected static function supportClass(): string
    {
        return Cnh::class;
    }

    public function generate(): string
    {
        return Cnh::generate();
    }
}
