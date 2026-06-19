<?php

namespace Panelis\Translation\Panel\Resources\TranslationResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Panelis\Translation\Actions\MutateText;
use Panelis\Translation\Panel\Resources\TranslationResource;
use Panelis\Translation\Panel\Resources\TranslationResource\Enums\TranslationPermission;
use Symfony\Component\HttpFoundation\Response;

class CreateTranslation extends CreateRecord
{
    protected static string $resource = TranslationResource::class;

    protected function authorizeAccess(): void
    {
        abort_unless(user_can(TranslationPermission::Add), Response::HTTP_FORBIDDEN);
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['text'] = MutateText::run($data['text']);

        return $data;
    }
}
