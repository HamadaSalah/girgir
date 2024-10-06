<?php

namespace App\Filament\Resources\WebsiteInfoResource\Pages;

use App\Filament\Resources\WebsiteInfoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWebsiteInfos extends ListRecords
{
    protected static string $resource = WebsiteInfoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
