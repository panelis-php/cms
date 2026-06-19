<?php

use App\Providers\AppServiceProvider;
use App\Providers\AuthServiceProvider;
use App\Providers\EventServiceProvider;
use App\Providers\Filament\AdminPanelProvider;
use App\Providers\FilamentServiceProvider;
use App\Providers\SettingTableServiceProvider;
use App\Providers\TelescopeServiceProvider;
use Spatie\Permission\PermissionServiceProvider;
use Spatie\TranslationLoader\TranslationServiceProvider;

return [
    AppServiceProvider::class,
    AuthServiceProvider::class,
    EventServiceProvider::class,
    AdminPanelProvider::class,
    SettingTableServiceProvider::class,
    FilamentServiceProvider::class,
    TelescopeServiceProvider::class,
    PermissionServiceProvider::class,
    TranslationServiceProvider::class,
];
