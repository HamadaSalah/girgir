<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    public function getTabs(): array
    {
        return [
            Tab::make('all')
                ->label('All'),

            Tab::make('active')
                ->label('Active')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('active', true)),

            Tab::make('inactive')
                ->label('Inactive')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('active', false)),

            Tab::make('user')
                ->label('Users')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('type', 'user')),

            Tab::make('company_provider')
                ->label('Company Providers')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('type', 'company_provider')),


            Tab::make('individual_provider')
            ->label('Individual Providers')
            ->modifyQueryUsing(fn (Builder $query) => $query->where('type', 'individual_provider')),

            Tab::make('admin')
                ->label('Admins')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('type', 'admin')),
        ];
    }

}
