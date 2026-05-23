<?php

declare(strict_types=1);

namespace Cavalheri\LaravelBrazilDocuments\Services\Documents;

use Cavalheri\LaravelBrazilDocuments\Contracts\GeneratesDocumentContract;
use Cavalheri\LaravelBrazilDocuments\Support\TituloEleitor;

final class TituloEleitorHandler extends AbstractDocumentHandler implements GeneratesDocumentContract
{
    protected static function documentName(): string
    {
        return 'Título de eleitor';
    }

    protected static function supportClass(): string
    {
        return TituloEleitor::class;
    }

    public function generate(): string
    {
        return TituloEleitor::generate();
    }
}
