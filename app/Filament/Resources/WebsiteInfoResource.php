<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WebsiteInfoResource\Pages;
use App\Filament\Resources\WebsiteInfoResource\RelationManagers;
use App\Models\WebsiteInfo;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\BadgeColumn;

class WebsiteInfoResource extends Resource
{
    protected static ?string $model = WebsiteInfo::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog';

    protected static ?string $navigationLabel = 'Website Settings';

    public static function canCreate(): bool
    {
        return WebsiteInfo::query()->count() === 0;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('General Info')
                    ->schema([
                        TextInput::make('email')
                            ->label('Email')
                            ->required()
                            ->email(),
                        TextInput::make('phone')
                            ->label('Phone')
                            ->required(),
                        TextInput::make('address')
                            ->label('Address')
                            ->required(),
                    ])->columns(2),
                Section::make('Rates')
                    ->schema([
                        TextInput::make('coins_rate')
                            ->label('Coins Rate')
                            ->required()
                            ->numeric(),
                        TextInput::make('withdraw_rate')
                            ->label('Withdraw Rate')
                            ->required()
                            ->numeric(),
                    ])->columns(2),
                Section::make('Social Links')
                    ->schema([
                        TextInput::make('facebook')->label('Facebook')->url(),
                        TextInput::make('twitter')->label('Twitter')->url(),
                        TextInput::make('instagram')->label('Instagram')->url(),
                        TextInput::make('tiktok')->label('TikTok')->url(),
                        TextInput::make('youtube')->label('YouTube')->url(),
                        TextInput::make('whatsapp')->label('WhatsApp'),
                    ])->columns(2),
                Section::make('App Links')
                    ->schema([
                        TextInput::make('play_store_link')
                            ->label('Play Store Link')
                            ->url(),
                        TextInput::make('app_store_link')
                            ->label('App Store Link')
                            ->url(),
                    ])->columns(2),
                Section::make('About')
                    ->schema([
                        RichEditor::make('about')
                            ->label('About')
                            ->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('email')
                    ->label('Email'),
                BadgeColumn::make('coins_rate')
                    ->label('Coins Rate')
                    ->suffix(' %'),
                BadgeColumn::make('withdraw_rate')
                    ->label('Withdraw Rate')
                    ->suffix(' %'),
                TextColumn::make('phone')
                    ->label('Phone'),
                TextColumn::make('address')
                    ->label('Address'),
                TextColumn::make('facebook')
                    ->label('Facebook')
                    ->url(fn ($record) => $record->facebook)
                    ->openUrlInNewTab(),
                TextColumn::make('twitter')
                    ->label('Twitter')
                    ->url(fn ($record) => $record->twitter)
                    ->openUrlInNewTab(),
                TextColumn::make('instagram')
                    ->label('Instagram')
                    ->url(fn ($record) => $record->instagram)
                    ->openUrlInNewTab(),
                TextColumn::make('tiktok')
                    ->label('TikTok')
                    ->url(fn ($record) => $record->tiktok)
                    ->openUrlInNewTab(),
                TextColumn::make('youtube')
                    ->label('YouTube')
                    ->url(fn ($record) => $record->youtube)
                    ->openUrlInNewTab(),
                TextColumn::make('whatsapp')
                    ->label('WhatsApp'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListWebsiteInfos::route('/'),
            // 'create' => Pages\CreateWebsiteInfo::route('/create'),
            // 'edit' => Pages\EditWebsiteInfo::route('/{record}/edit'),
        ];
    }
}
