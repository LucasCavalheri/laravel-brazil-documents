<?php

declare(strict_types=1);

use Cavalheri\LaravelBrazilDocuments\Services\BrazilDocumentsManager;

it('registers the manager as a singleton', function () {
    $first = app(BrazilDocumentsManager::class);
    $second = app(BrazilDocumentsManager::class);

    expect($first)->toBe($second);
});

it('merges package configuration', function () {
    expect(config('brazil-documents.helpers'))->toBeTrue()
        ->and(config('brazil-documents.locale'))->toBeNull();
});
