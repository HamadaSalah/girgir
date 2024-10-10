<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\Provider;
use Filament\Widgets\ChartWidget;

class UsersWidget extends ChartWidget
{
    protected static ?string $heading = 'User & Provider Types Distribution';

    protected function getData(): array
    {
        $userCount = User::where('type', 'user')->count();
        $adminCount = User::where('type', 'admin')->count();

        $individualProvidersCount = Provider::where('type', 'individual')->count();
        $companyProvidersCount = Provider::where('type', 'company')->count();

        return [
            'labels' => ['Users', 'Admins', 'Individual Providers', 'Company Providers'],
            'datasets' => [
                [
                    'label' => 'User & Provider Types',
                    'data' => [
                        $userCount,
                        $adminCount,
                        $individualProvidersCount,
                        $companyProvidersCount,
                    ],
                    'backgroundColor' => ['#fca311', '#457b9d', '#2a9d8f', '#e63946'],
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
