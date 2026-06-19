<?php

namespace Panelis\Job\Plugins;

use Filament\Contracts\Plugin;
use Filament\Panel;

class JobPlugin implements Plugin
{
    public function getId(): string
    {
        return 'job';
    }

    public function register(Panel $panel): void {}

    public function boot(Panel $panel): void {}
}
