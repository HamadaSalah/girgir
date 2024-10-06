<?php

namespace App\Filament\Resources\IndividualProviderResource\Pages;

use App\Filament\Resources\IndividualProviderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIndividualProvider extends EditRecord
{
    protected static string $resource = IndividualProviderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
