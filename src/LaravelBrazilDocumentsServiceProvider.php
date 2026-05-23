<?php

declare(strict_types=1);

namespace Cavalheri\LaravelBrazilDocuments;

use Cavalheri\LaravelBrazilDocuments\Services\BrazilDocumentsManager;
use Illuminate\Support\ServiceProvider;

final class LaravelBrazilDocumentsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/brazil-documents.php',
            'brazil-documents',
        );

        $this->app->singleton(BrazilDocumentsManager::class);

        if (config('brazil-documents.helpers', true)) {
            require_once __DIR__.'/Helpers/helpers.php';
        }
    }

    public function boot(): void
    {
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'brazil-documents');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/brazil-documents.php' => config_path('brazil-documents.php'),
            ], 'brazil-documents-config');

            $this->publishes([
                __DIR__.'/../resources/lang' => lang_path('vendor/brazil-documents'),
            ], 'brazil-documents-lang');
        }
    }
}
