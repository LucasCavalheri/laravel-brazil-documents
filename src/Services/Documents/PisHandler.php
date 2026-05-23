<?php

declare(strict_types=1);

namespace Cavalheri\LaravelBrazilDocuments\Services\Documents;

use Cavalheri\LaravelBrazilDocuments\Contracts\GeneratesDocumentContract;
use Cavalheri\LaravelBrazilDocuments\Support\Pis;

final class PisHandler extends AbstractDocumentHandler implements GeneratesDocumentContract
{
    protected static function documentName(): string
    {
        return 'PIS/PASEP';
    }

    protected static function supportClass(): string
    {
        return Pis::class;
    }

    public function generate(): string
    {
        return Pis::generate();
    }
}
