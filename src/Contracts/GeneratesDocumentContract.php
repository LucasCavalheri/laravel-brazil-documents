<?php

declare(strict_types=1);

namespace Cavalheri\LaravelBrazilDocuments\Contracts;

interface GeneratesDocumentContract extends DocumentContract
{
    public function generate(): string;
}
