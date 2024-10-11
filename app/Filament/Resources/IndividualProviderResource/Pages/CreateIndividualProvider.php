<?php

namespace App\Filament\Resources\IndividualProviderResource\Pages;

use App\Filament\Resources\IndividualProviderResource;
use App\Jobs\ProviderCreatedJob;
use App\Jobs\UserCreatedJob;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateIndividualProvider extends CreateRecord
{
    protected static string $resource = IndividualProviderResource::class;


    protected static bool $canCreateAnother = false;


    protected function getRedirectUrl(): string
    {
        return route('filament.manage.resources.individual-providers.index');
    }

    protected function getHeaderActions(): array
    {
        return [];
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['password'] = 'Password';
        $data['type'] = 'individual';
        return $data;
    }

    protected function afterCreate()
    {
        ProviderCreatedJob::dispatch($this->record);
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Provider created')
            ->body('The provider has been created successfully. We will notify him by email');
    }
}
