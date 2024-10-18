<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WithdrawalResource\Pages;
use App\Filament\Resources\WithdrawalResource\RelationManagers;
use App\Jobs\WithdrawalJob;
use App\Models\Withdrawal;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WithdrawalResource extends Resource
{
    protected static ?string $model = Withdrawal::class;

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';


    public static function canCreate(): bool
    {
        return false;
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('status', 'pending')->count();
    }

    public static function canEdit(Model $record): bool
    {
        return $record->status === 'pending';
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Withdrawal Details')
                    ->schema([
                        Forms\Components\Select::make('user_id')
                            ->label('User')
                            ->options(
                                \App\Models\Provider::all()->mapWithKeys(function ($user) {
                                    return [$user->id => $user->name];
                                })
                            )
                            ->disabled()
                            ->columnSpan(1),

                        Forms\Components\TextInput::make('amount')
                            ->label('Amount')
                            ->required()
                            ->numeric()
                            ->disabled()
                            ->columnSpan(1),

                        Forms\Components\TextInput::make('IBAN')
                            ->label('IBAN')
                            ->disabled()
                            ->columnSpan(1),

                        Forms\Components\TextInput::make('bank_name')
                            ->label('Bank Name')
                            ->disabled()
                            ->columnSpan(1),

                        Forms\Components\TextInput::make('swift_code')
                            ->label('SWIFT Code')
                            ->disabled()
                            ->columnSpan(1),

                        Forms\Components\TextInput::make('currency')
                            ->label('Currency')
                            ->disabled()
                            ->columnSpan(1),

                        Forms\Components\Textarea::make('address')
                            ->label('Address')
                            ->disabled()
                            ->columnSpan(2),

                        Forms\Components\Textarea::make('user_note')
                            ->label('User Notes')
                            ->disabled()
                            ->columnSpan(2),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Status and Notes')
                    ->schema([
                        Forms\Components\Select::make('status')
                            ->label('Status')
                            ->required()
                            ->options([
                                'pending' => 'Pending',
                                'approved' => 'Approved',
                                'rejected' => 'Rejected',
                            ])
                            ->columnSpan(1),

                        Forms\Components\Textarea::make('note')
                            ->label('Notes')
                            ->nullable()
                            ->columnSpan(1),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('User')
                    ->searchable(),

                Tables\Columns\TextColumn::make('IBAN')
                    ->label('IBAN')
                    ->searchable(),

                Tables\Columns\TextColumn::make('user_note')
                    ->label('User Notes')
                    ->getStateUsing(fn($record) => $record->user_note ? $record->user_note : 'No Notes')
                    ->badge(fn($record) => $record->user_note ? false : true)
                    ->color(fn($record) => $record->user_note ? 'success' : 'danger')
                    ->limit(20)
                    ->searchable(),

                Tables\Columns\TextColumn::make('amount')
                    ->label('Amount')
                    ->sortable()
                    ->getStateUsing(fn($record) =>$record->amount . ' ' . $record->currency),

                Tables\Columns\BadgeColumn::make('status')
                    ->label('Status')
                    ->color(fn($record) => match ($record->status) {
                        'pending' => 'warning',
                        'approved' => 'success',
                        'rejected' => 'danger',
                    }),

                Tables\Columns\TextColumn::make('note')
                    ->label('Admin Notes')
                    ->getStateUsing(fn($record) => $record->note ? $record->note : 'No Notes')
                    ->badge(fn($record) => $record->note ? false : true)
                    ->color(fn($record) => $record->note ? 'success' : 'danger')
                    ->limit(40),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Requested At')
                    ->dateTime()
                    ->sortable(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Last Update At')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                ->after(function (Tables\Actions\EditAction $action, $record) {
                    WithdrawalJob::dispatch($record);
                }),
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
            'index' => Pages\ListWithdrawals::route('/'),
            'create' => Pages\CreateWithdrawal::route('/create'),
            // 'edit' => Pages\EditWithdrawal::route('/{record}/edit'),
        ];
    }
}
