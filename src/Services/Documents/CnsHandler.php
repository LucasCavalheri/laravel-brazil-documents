<?php

declare(strict_types=1);

namespace Cavalheri\LaravelBrazilDocuments\Services\Documents;

use Cavalheri\LaravelBrazilDocuments\Contracts\GeneratesDocumentContract;
use Cavalheri\LaravelBrazilDocuments\Support\Cns;

final class CnsHandler extends AbstractDocumentHandler implements GeneratesDocumentContract
{
    protected static function documentName(): string
    {
        return 'CNS';
    }

    protected static function supportClass(): string
    {
        return Cns::class;
    }

    public function generate(): string
    {
        return Cns::generate();
    }
}
