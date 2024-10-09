<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CouponCodeResource\Pages;
use App\Filament\Resources\CouponCodeResource\RelationManagers;
use App\Models\CouponCode;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CouponCodeResource extends Resource
{
    protected static ?string $model = CouponCode::class;

    protected static ?string $navigationIcon = 'heroicon-o-percent-badge';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Coupon Details')
                    ->schema([
                        Forms\Components\TextInput::make('code')
                            ->required()
                            ->unique()
                            ->maxLength(255)
                            ->label('Coupon Code')
                            ->placeholder('Enter the coupon code here')
                            ->helperText('This is the code that users will apply to get the discount.'),

                        Forms\Components\TextInput::make('discount')
                            ->required()
                            ->numeric()
                            ->label('Discount Percentage')
                            ->placeholder('Enter the discount percentage (0-100)')
                            ->minValue(0)
                            ->maxValue(100),

                        Forms\Components\TextInput::make('limit')
                            ->numeric()
                            ->label('Usage Limit')
                            ->placeholder('Enter usage limit (leave blank for unlimited)')
                            ->default(null),
                    ]),

                Forms\Components\Section::make('Additional Settings')
                    ->collapsible()
                    ->schema([
                        Forms\Components\DateTimePicker::make('expires_at')
                            ->label('Expiration Date')
                            ->placeholder('Select expiration date and time'),
                    ]),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('code')
                    ->searchable(),
                Tables\Columns\TextColumn::make('discount')
                    ->numeric()
                    ->sortable()
                    ->badge()
                    ->getStateUsing(fn($record) => $record->discount . ' %'),
                Tables\Columns\BadgeColumn::make('limit')
                    ->numeric()
                    ->sortable()
                    ->getStateUsing(fn($record) => $record->limit ? $record->limit : 'Unlimited')
                    ->color(fn($record) => $record->limit ? 'primary' : 'gray'),

                Tables\Columns\BadgeColumn::make('used')
                    ->numeric()
                    ->sortable()
                    ->getStateUsing(fn($record) => $record->used . ' times')
                    ->color(fn($record) => $record->used ? 'success' : 'danger'),
                Tables\Columns\ToggleColumn::make('status'),
                Tables\Columns\TextColumn::make('expires_at')
                    ->dateTime()
                    ->sortable()
                    ->color(fn($record) => $record->expires_at->isPast() ? 'danger' : 'success')
                    ->badge(fn($record) => $record->expires_at && $record->expires_at->isPast()),
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
            'index' => Pages\ListCouponCodes::route('/'),
            'create' => Pages\CreateCouponCode::route('/create'),
            'edit' => Pages\EditCouponCode::route('/{record}/edit'),
        ];
    }
}
