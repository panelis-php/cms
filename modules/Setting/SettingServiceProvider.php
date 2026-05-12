<?php

namespace Modules\Setting;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Modules\Setting\Events\SettingUpdated;
use Modules\Setting\Listeners\FlushCache;

class SettingServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadTranslationsFrom(__DIR__.'/Lang', 'setting');

        $this->loadMigrationsFrom(__DIR__.'/Database/Migrations');

        $this->loadViewsFrom(__DIR__.'/Views', 'setting');

        Event::listen(SettingUpdated::class, FlushCache::class);
    }

    public function register(): void
    {
        //
    }
}
