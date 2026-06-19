<?php

namespace Panelis\Branch\Panel\Pages;

use Filament\Pages\Tenancy\EditTenantProfile;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Model;
use Panelis\Branch\Events\BranchUpdated;
use Panelis\Branch\Panel\Resources\BranchResource\Forms\BranchForm;

class EditBranch extends EditTenantProfile
{
    public static function getLabel(): string
    {
        return __('branch::branch.edit');
    }

    public function form(Schema $schema): Schema
    {
        return $schema->schema(BranchForm::schema());
    }

    public function handleRecordUpdate(Model $record, array $data): Model
    {
        $record->update($data);

        event(new BranchUpdated($record));

        return $record;
    }

    public function getRedirectUrl(): ?string
    {
        return EditBranch::getUrl();
    }
}
