<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IndividualProviderResource\Pages;
use App\Filament\Resources\IndividualProviderResource\RelationManagers;
use App\Models\Provider;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class IndividualProviderResource extends Resource
{
    protected static ?string $model = Provider::class;



    protected static ?string $navigationIcon = 'heroicon-o-building-office';
    protected static ?string $navigationGroup = "Users";
    protected static ?string $navigationLabel = "Individual Providers";

    public static function canCreate(): bool
    {
        return true;
    }

    public static function canEdit(Model $record): bool
    {
        return false;
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()->schema([

                    Forms\Components\Section::make('Business Information')->schema([

                        Forms\Components\TextInput::make('name')
                            ->label('Name')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('tag')
                            ->label('Business Name')
                            ->required()
                            ->maxLength(255),

                    ])->columns(2),

                    Forms\Components\Section::make('Contact Information')->schema([

                        Forms\Components\TextInput::make('phone')
                            ->label('Phone Number')
                            ->tel()
                            ->unique('providers', 'phone')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('email')
                            ->label('Email Address')
                            ->email()
                            ->unique('providers', 'email')
                            ->required()
                            ->maxLength(255),

                    ])->columns(2),

                ])->columnSpan('full'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn (Builder $query) => $query->where('type' , 'individual'))
            ->columns([
            Tables\Columns\ImageColumn::make('business_picture')
            ->label('')
            ->circular(),
            Tables\Columns\TextColumn::make('name')
            ->searchable(),
            Tables\Columns\TextColumn::make('tag')
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
            'index' => Pages\ListIndividualProviders::route('/'),
            'create' => Pages\CreateIndividualProvider::route('/create'),
            'edit' => Pages\EditIndividualProvider::route('/{record}/edit'),
        ];
    }
}
