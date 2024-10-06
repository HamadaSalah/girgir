<?php

namespace App\Filament\Resources\CompanyProviderResource\Pages;

use App\Filament\Resources\CompanyProviderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCompanyProvider extends EditRecord
{
    protected static string $resource = CompanyProviderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
