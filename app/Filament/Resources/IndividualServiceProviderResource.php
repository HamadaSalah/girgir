<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IndividualServiceProviderResource\Pages;
use App\Filament\Resources\IndividualServiceProviderResource\RelationManagers;
use App\Models\IndividualServiceProvider;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class IndividualServiceProviderResource extends Resource
{
    protected static ?string $model = IndividualServiceProvider::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    protected static ?string $navigationLabel = 'Individual';

    protected static ?string $navigationGroup = 'Providers';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return static::getModel()::count() > 1 ? 'success' : 'danger';
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canEdit(Model $record): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('profile_picture_url')
                    ->label('')
                    ->circular(),
                Tables\Columns\TextColumn::make('user.name')
                    ->searchable()
                    ->label('User Name'),
                Tables\Columns\TextColumn::make('user.email')
                    ->searchable()
                    ->label('User Email'),
                Tables\Columns\TextColumn::make('business_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\Action::make('View User')
                    ->color('success')
                    ->url(fn (Model $record): string => route('filament.manage.resources.users.index', ['id' => $record->user->id]))
                    ->icon('heroicon-o-eye'),

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
            'index' => Pages\ListIndividualServiceProviders::route('/'),
            // 'create' => Pages\CreateIndividualServiceProvider::route('/create'),
            'edit' => Pages\EditIndividualServiceProvider::route('/{record}/edit'),
        ];
    }
}
