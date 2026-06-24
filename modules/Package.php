<?php

namespace Panelis;

class Package
{
    public static function getAll(): array
    {
        $installed = json_decode(
            file_get_contents(base_path('vendor/composer/installed.json')),
            true,
        );

        return $installed['packages'];
    }

    public static function getPlugins(): array
    {
        return collect(self::getAll())
            ->pluck('extra.panelis.plugins')
            ->flatten()
            ->filter()
            ->map(fn (string $plugin): object => app($plugin))
            ->values()
            ->all();
    }

    public static function getPanelisModules(): array
    {
        return collect(self::getAll())
            ->filter(fn (array $package) => isset($package['extra']['panelis']))
            ->values()
            ->all();
    }
}
