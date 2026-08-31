# Panelis CMS

Installable CMS foundation for Laravel and Filament applications.

The package provides the Panelis admin panel, shared application services,
configuration, middleware, and the integration layer for Panelis modules.

For a new application, use `panelis-php/skeleton`. Existing Laravel
applications can install this package with:

```bash
composer require panelis-php/cms
```

Panelis modules are installed as dependencies of this package and can be
updated through Composer.

## Registering application plugins

Plugins provided by Panelis modules are registered automatically from Composer
metadata. To register a custom Filament plugin from the application, add a
panel configuration callback in an application service provider:

```php
use Filament\Panel;
use Panelis\Cms\Providers\AdminPanelProvider;

public function boot(): void
{
    AdminPanelProvider::configurePanel(function (Panel $panel): void {
        $panel->plugins([
            new ServicePingerPlugin,
            FilamentLogViewer::make()
                ->navigationGroup(__('ui.system'))
                ->navigationIcon('')
                ->navigationLabel(__('ui.log')),
        ]);
    });
}
```

The callback runs after plugins supplied by Panelis modules have been
registered, so custom application plugins can be added without replacing the
CMS `AdminPanelProvider`. Register plugin instances through this hook instead
of placing them in configuration, keeping `config:cache` compatible.
