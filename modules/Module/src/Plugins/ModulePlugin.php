<?php

declare(strict_types=1);

namespace Panelis\Module\Plugins;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Panelis\Module\Panel\Resources\ModuleResource;

class ModulePlugin implements Plugin
{
    public function getId(): string
    {
        return 'module';
    }

    public function register(Panel $panel): void
    {
        $panel->resources([
            ModuleResource::class,
        ]);
    }

    public function boot(Panel $panel): void {}
}
