<?php

namespace Panelis\Job\Providers;

use Illuminate\Support\ServiceProvider;

class JobServiceProvider extends ServiceProvider
{
    private const string NAMESPACE = 'job';

    public function boot(): void
    {
        $this->loadTranslationsFrom(__DIR__.'/../../lang', self::NAMESPACE);
    }

    public function register(): void {}
}
