<?php

namespace Panelis\Branch\Panel\Resources\BranchResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Panelis\Branch\Panel\Pages\RegisterBranch;
use Panelis\Branch\Panel\Resources\BranchResource;

class ListBranches extends ListRecords
{
    protected static string $resource = BranchResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->url(RegisterBranch::getUrl())
                ->visible(user_can(BranchResource\Enums\BranchPermission::Create)),
        ];
    }
}
