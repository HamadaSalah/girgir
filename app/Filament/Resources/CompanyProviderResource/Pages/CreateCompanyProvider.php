<?php

namespace App\Filament\Resources\CompanyProviderResource\Pages;

use App\Filament\Resources\CompanyProviderResource;
use App\Jobs\ProviderCreatedJob;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateCompanyProvider extends CreateRecord
{
    protected static string $resource = CompanyProviderResource::class;


    protected static bool $canCreateAnother = false;


    protected function getRedirectUrl(): string
    {
        return route('filament.manage.resources.company-providers.index');
    }

    protected function getHeaderActions(): array
    {
        return [];
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['password'] = 'Password';
        $data['type'] = 'company';
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
