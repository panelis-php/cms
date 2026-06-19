<?php

declare(strict_types=1);

namespace Panelis\Translation\Plugins;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Panelis\Translation\Panel\Resources\TranslationResource;

class TranslationPlugin implements Plugin
{
    public function getId(): string
    {
        return 'translation';
    }

    public function register(Panel $panel): void
    {
        $panel->resources([
            TranslationResource::class,
        ]);
    }

    public function boot(Panel $panel): void {}
}
