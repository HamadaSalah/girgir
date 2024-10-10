<?php

namespace App\Filament\Resources\WithdrawalResource\Pages;

use App\Filament\Resources\WithdrawalResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Table;

class ListWithdrawals extends ListRecords
{
    protected static string $resource = WithdrawalResource::class;

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
            'All Withdrawals' => Tab::make(),
            'Pending Withdrawals' =>Tab::make()
            ->modifyQueryUsing(function (Builder $query) {
                $query->where('status', 'pending');
            }),
            'Approved Withdrawals' => Tab::make()
            ->modifyQueryUsing(function (Builder $query) {
                $query->where('status', 'approved');
            }),
            'Rejected Withdrawals' => Tab::make()
            ->modifyQueryUsing(function (Builder $query) {
                $query->where('status', 'rejected');
            }),
            'Withdrawals with notes' => Tab::make()
            ->modifyQueryUsing(function (Builder $query) {
                $query->whereNotNull('user_note');
            }),
        ];
    }
}
