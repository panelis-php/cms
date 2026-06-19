<?php

namespace Panelis\Branch\Providers;

use Illuminate\Support\ServiceProvider;

class BranchServiceProvider extends ServiceProvider
{
    private const string NAMESPACE = 'branch';

    public function boot(): void
    {
        $this->loadTranslationsFrom(__DIR__.'/../../lang', self::NAMESPACE);

        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
    }

    public function register(): void {}
}
