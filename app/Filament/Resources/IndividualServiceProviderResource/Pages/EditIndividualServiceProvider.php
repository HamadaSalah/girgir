<?php

namespace App\Filament\Resources\IndividualServiceProviderResource\Pages;

use App\Filament\Resources\IndividualServiceProviderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIndividualServiceProvider extends EditRecord
{
    protected static string $resource = IndividualServiceProviderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
