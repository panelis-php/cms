<?php

namespace Panelis\Module\Providers;

use Illuminate\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    private const string NAMESPACE = 'module';

    public function boot(): void
    {

        $this->loadTranslationsFrom(__DIR__.'/../../lang', self::NAMESPACE);

        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
    }

    public function register(): void {}
}
