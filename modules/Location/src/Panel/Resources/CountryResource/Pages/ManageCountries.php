<?php

namespace Panelis\Location\Panel\Resources\CountryResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;
use Panelis\Location\Panel\Resources\CountryResource;
use Panelis\Location\Panel\Resources\CountryResource\Enums\CountryPermission;
use Panelis\Location\Panel\Resources\Widgets\LocationStatsOverview;
use Symfony\Component\HttpFoundation\Response;

class ManageCountries extends ManageRecords
{
    protected static string $resource = CountryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->visible(user_can(CountryPermission::Add)),
        ];
    }

    public function mount(): void
    {
        abort_unless(
            user_can(CountryPermission::Browse) && user_can(CountryPermission::Add),
            Response::HTTP_FORBIDDEN,
        );
    }

    protected function getHeaderWidgets(): array
    {
        return [
            LocationStatsOverview::class,
        ];
    }
}
