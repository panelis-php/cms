<?php

namespace Panelis\Job\Panel\Resources\JobResource\Pages;

use Filament\Resources\Pages\ListRecords;
use Panelis\Job\Panel\Resources\JobResource;

class ListJobs extends ListRecords
{
    protected static string $resource = JobResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
