<?php

declare(strict_types=1);

namespace Cavalheri\LaravelBrazilDocuments\Tests;

use Cavalheri\LaravelBrazilDocuments\LaravelBrazilDocumentsServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

abstract class TestCase extends OrchestraTestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            LaravelBrazilDocumentsServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app): array
    {
        return [
            'BrazilDocuments' => \Cavalheri\LaravelBrazilDocuments\Facades\BrazilDocuments::class,
        ];
    }

    protected function defineEnvironment($app): void
    {
        $app['config']->set('app.locale', 'en');
        $app['config']->set('app.fallback_locale', 'en');
    }
}
