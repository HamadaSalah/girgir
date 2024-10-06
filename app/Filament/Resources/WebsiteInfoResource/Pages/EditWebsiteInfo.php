<?php

namespace App\Filament\Resources\WebsiteInfoResource\Pages;

use App\Filament\Resources\WebsiteInfoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWebsiteInfo extends EditRecord
{
    protected static string $resource = WebsiteInfoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
