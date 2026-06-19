<?php

namespace Panelis;

class ModuleManager
{
    public static function getModules(): array
    {
        return collect(glob(base_path('modules/*/module.json')))
            ->map(fn ($path) => json_decode(file_get_contents($path), true))
            ->toArray();
    }

    public static function register(): void
    {
        foreach (static::getModules() as $module) {
            if (! empty($module['provider'])) {
                app()->register($module['provider']);
            }

            foreach ($module['providers'] ?? [] as $provider) {
                app()->register($provider);
            }
        }
    }

    public static function plugins(): array
    {
        $plugins = [];
        foreach (static::getModules() as $module) {
            foreach ($module['plugins'] ?? [] as $plugin) {
                $plugins[] = new $plugin;
            }
        }

        return $plugins;
    }
}
