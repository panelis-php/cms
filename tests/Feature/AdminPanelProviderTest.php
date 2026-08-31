<?php

use Filament\Contracts\Plugin;
use Filament\Panel;
use Panelis\Cms\Providers\AdminPanelProvider;

it('registers application plugins through the panel configuration hook', function (): void {
    app()->instance('panelis', [
        'multitenant' => false,
        'path' => '',
        'domain' => '',
    ]);
    config(['panelis.id' => 'admin']);
    app()->setBasePath(dirname(__DIR__, 2));

    $plugin = new class implements Plugin
    {
        public function getId(): string
        {
            return 'custom-plugin';
        }

        public function register(Panel $panel): void {}

        public function boot(Panel $panel): void {}
    };

    AdminPanelProvider::configurePanel(function (Panel $panel) use ($plugin): void {
        $panel->plugin($plugin);
    });

    $panel = (new AdminPanelProvider(app()))->panel(Panel::make());

    expect($panel->hasPlugin('custom-plugin'))->toBeTrue();
});
