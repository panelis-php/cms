<?php

namespace Panelis\Location\Panel\Resources\RegionResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;
use Panelis\Location\Panel\Resources\RegionResource;
use Panelis\Location\Panel\Resources\RegionResource\Enums\RegionPermission;
use Symfony\Component\HttpFoundation\Response;

class ManageRegions extends ManageRecords
{
    protected static string $resource = RegionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->visible(user_can(RegionPermission::Add)),
        ];
    }

    public function mount(): void
    {
        abort_unless(
            user_can(RegionPermission::Browse) && user_can(RegionPermission::Add),
            Response::HTTP_FORBIDDEN,
        );
    }
}
