<?php

namespace App\Filament\Resources\CompanyServiceProviderResource\Pages;

use App\Filament\Resources\CompanyServiceProviderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCompanyServiceProviders extends ListRecords
{
    protected static string $resource = CompanyServiceProviderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
