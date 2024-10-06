<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompanyProviderResource\Pages;
use App\Filament\Resources\CompanyProviderResource\RelationManagers;
use App\Models\CompanyProvider;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CompanyProviderResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';
    protected static ?string $navigationGroup = "Users";
    protected static ?string $navigationLabel = "Company Providers";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn (Builder $query) => $query->where('type' , 'company_provider'))
            ->columns([
            Tables\Columns\ImageColumn::make('business_picture')
            ->label('')
            ->circular(),
            Tables\Columns\ToggleColumn::make('active')
                ->label('')
                ->alignCenter(),
            Tables\Columns\TextColumn::make('name')
                ->searchable(),
            Tables\Columns\TextColumn::make('phone')
                ->searchable(),
            Tables\Columns\TextColumn::make('email')
                ->searchable(),
            Tables\Columns\TextColumn::make('created_at')
                ->label('Joined At')
                ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCompanyProviders::route('/'),
            'create' => Pages\CreateCompanyProvider::route('/create'),
            'edit' => Pages\EditCompanyProvider::route('/{record}/edit'),
        ];
    }
}
