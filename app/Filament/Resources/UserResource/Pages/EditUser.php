<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // If the password field is empty, remove it from the data array
        if (empty($data['password'])) {
            unset($data['password']);
        } else {
            // Hash the password if it's provided
            $data['password'] = bcrypt($data['password']);
        }

        return $data;
    }
}
