<?php

namespace Panelis\Location\Panel\Resources\DistrictResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;
use Illuminate\Http\Response;
use Panelis\Location\Panel\Resources\DistrictResource;
use Panelis\Location\Panel\Resources\DistrictResource\Enums\DistrictPermission;

class ManageDistricts extends ManageRecords
{
    protected static string $resource = DistrictResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->visible(user_can(DistrictPermission::Add)),
        ];
    }

    public function mount(): void
    {
        abort_unless(
            user_can(DistrictPermission::Browse) && user_can(DistrictPermission::Add),
            Response::HTTP_FORBIDDEN,
        );
    }
}
