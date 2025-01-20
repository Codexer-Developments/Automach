<?php

namespace App\Filament\Resources\BodyTypeResource\Pages;

use App\Filament\Resources\BodyTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBodyType extends CreateRecord
{
    protected static string $resource = BodyTypeResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // Redirect to the index page
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Body Type Create successfully!';
    }
}
