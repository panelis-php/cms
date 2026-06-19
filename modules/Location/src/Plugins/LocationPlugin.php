<?php

declare(strict_types=1);

namespace Panelis\Location\Plugins;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Panelis\Location\Panel\Resources\CountryResource;
use Panelis\Location\Panel\Resources\DistrictResource;
use Panelis\Location\Panel\Resources\RegionResource;

class LocationPlugin implements Plugin
{
    public function getId(): string
    {
        return 'location';
    }

    public function register(Panel $panel): void
    {
        $panel->resources([
            CountryResource::class,
            RegionResource::class,
            DistrictResource::class,
        ]);
    }

    public function boot(Panel $panel): void {}
}
