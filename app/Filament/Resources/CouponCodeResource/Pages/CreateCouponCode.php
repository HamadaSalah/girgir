<?php

namespace App\Filament\Resources\CouponCodeResource\Pages;

use App\Filament\Resources\CouponCodeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCouponCode extends CreateRecord
{
    protected static string $resource = CouponCodeResource::class;

    protected static bool $canCreateAnother = false;


    protected function getRedirectUrl(): string
    {
        return route('filament.manage.resources.coupon-codes.index');
    }

    protected function getHeaderActions(): array
    {
        return [];
    }
}
