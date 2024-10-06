<?php

namespace App\Filament\Resources\CompanyProviderResource\Pages;

use App\Filament\Resources\CompanyProviderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCompanyProviders extends ListRecords
{
    protected static string $resource = CompanyProviderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
