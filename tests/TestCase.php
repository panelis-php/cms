<?php

namespace Panelis\Cms\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Panelis\Activity\Providers\ActivityServiceProvider;
use Panelis\Cms\Providers\AuthServiceProvider;
use Spatie\Activitylog\ActivitylogServiceProvider;

abstract class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            ActivitylogServiceProvider::class,
            ActivityServiceProvider::class,
            AuthServiceProvider::class,
        ];
    }

    protected function defineEnvironment($app): void
    {
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite.database', ':memory:');
    }

    protected function defineDatabaseMigrations(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/migrations');
    }
}
