<?php

declare(strict_types=1);

namespace Panelis\Branch\Plugins;

use Filament\Contracts\Plugin;
use Filament\Panel;

class BranchPlugin implements Plugin
{
    public function getId(): string
    {
        return 'branch';
    }

    public function register(Panel $panel): void {}

    public function boot(Panel $panel): void {}
}
