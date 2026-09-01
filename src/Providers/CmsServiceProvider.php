<?php

namespace Panelis\Cms\Providers;

use Illuminate\Support\ServiceProvider;

class CmsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/panelis.php', 'panelis');

        $this->app->register(AppServiceProvider::class);
        $this->app->register(AuthServiceProvider::class);
        $this->app->register(SettingTableServiceProvider::class);
        $this->app->register(FilamentServiceProvider::class);
        $this->app->register(AdminPanelProvider::class);
    }

    public function boot(): void
    {
        $this->loadTranslationsFrom(__DIR__.'/../../lang');
        $this->loadTranslationsFrom(__DIR__.'/../../lang', 'cms');

        $this->publishes([
            __DIR__.'/../../config/panelis.php' => config_path('panelis.php'),
        ], 'panelis-config');
    }
}
