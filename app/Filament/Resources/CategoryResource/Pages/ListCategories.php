<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use App\Filament\Resources\CategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Closure;
use Filament\Tables\Table;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListCategories extends ListRecords
{
    protected static string $resource = CategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function makeTable(): Table
    {
        return parent::makeTable()->recordUrl(null);
    }

    public function getTabs(): array
    {
        return
        [
            'All Categories' => Tab::make(),
            'Has Packages' =>Tab::make()
            ->modifyQueryUsing(function (Builder $query) {
                $query->has('packages');
            }),
            'Without Packages' => Tab::make()
            ->modifyQueryUsing(function (Builder $query) {
                $query->doesntHave('packages');
            }),
        ];
    }
}
