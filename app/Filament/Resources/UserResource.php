<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = "Users";
    protected static ?string $navigationLabel = "Users";


    public static function form(Form $form): Form
{
    return $form
        ->schema([
            Forms\Components\Section::make('User Information')
                ->schema([
                    Forms\Components\Grid::make()
                        ->columns([
                            'default' => 1,
                            'sm' => 2,
                            'lg' => 3,
                        ])
                        ->schema([
                            Forms\Components\TextInput::make('first_name')
                                ->label('First Name')
                                ->placeholder('Enter first name')
                                ->required()
                                ->maxLength(255)
                                ->columnSpan(1),

                            Forms\Components\TextInput::make('last_name')
                                ->label('Last Name')
                                ->placeholder('Enter last name')
                                ->required()
                                ->maxLength(255)
                                ->columnSpan(1),

                            Forms\Components\TextInput::make('phone')
                                ->label('Phone Number')
                                ->placeholder('Enter phone number')
                                ->tel()
                                ->required()
                                ->unique(ignoreRecord: true)
                                ->maxLength(20)
                                ->columnSpan(1),

                            Forms\Components\TextInput::make('email')
                                ->label('Email Address')
                                ->placeholder('Enter email')
                                ->email()
                                ->required()
                                ->unique(ignoreRecord: true)
                                ->maxLength(255)
                                ->columnSpan(2), // Span two columns for larger screens

                            Forms\Components\Select::make('type')
                                ->label('Account Type')
                                ->options([
                                    'user' => 'User',
                                    'company_provider' => 'Company Provider',
                                    'individual_provider' => 'Individual Provider',
                                    'admin' => 'Admin',
                                ])
                                ->required()
                                ->columnSpan(1),
                        ]),
                ])
                ->extraAttributes(['class' => 'mt-4']),
        ]);
}


    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn (Builder $query) => $query->where('type' , 'user'))
            ->columns([
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
