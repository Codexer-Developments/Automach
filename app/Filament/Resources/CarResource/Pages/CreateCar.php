<?php

namespace App\Filament\Resources\CarResource\Pages;

use App\Filament\Resources\CarResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCar extends CreateRecord
{
    protected static string $resource = CarResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // Redirect to the index page
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Car Create successfully!';
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Set the authenticated user as the user_id
        $data['user_id'] = auth()->id();

        return $data;
    }
}
