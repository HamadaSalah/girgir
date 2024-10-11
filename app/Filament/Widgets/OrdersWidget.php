<?php

namespace App\Filament\Widgets;

use App\Models\Order; // Import your Order model
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class OrdersWidget extends BaseWidget
{
    protected function getStats(): array
    {
        $today = Carbon::today();
        $yesterday = Carbon::yesterday();
        $lastWeek = Carbon::now()->subWeek();
        $lastMonth = Carbon::now()->subMonth();
        $lastYear = Carbon::now()->subYear();

        $ordersToday = Order::whereDate('created_at', $today)->count();
        $ordersYesterday = Order::whereDate('created_at', $yesterday)->count();
        $ordersLastWeek = Order::whereBetween('created_at', [$lastWeek, $today])->count();
        $ordersLastMonth = Order::whereBetween('created_at', [$lastMonth, $today])->count();
        $ordersLastYear = Order::whereBetween('created_at', [$lastYear, $today])->count();
        $overallOrders = Order::count();

        return [
            Stat::make('Orders Today', $ordersToday)
                ->description('Today\'s orders')
                ->descriptionIcon('heroicon-o-sun')
                ->color('success'),

            Stat::make('Orders Yesterday', $ordersYesterday)
                ->description('Yesterday\'s orders')
                ->descriptionIcon('heroicon-o-moon')
                ->color('warning'),

            Stat::make('Orders Last Week', $ordersLastWeek)
                ->description('Orders in the last 7 days')
                ->descriptionIcon('heroicon-o-calendar')
                ->color('info'),

            Stat::make('Orders Last Month', $ordersLastMonth)
                ->description('Orders in the last 30 days')
                ->descriptionIcon('heroicon-o-calendar')
                ->color('info'),

            Stat::make('Orders Last Year', $ordersLastYear)
                ->description('Orders in the last 365 days')
                ->descriptionIcon('heroicon-o-calendar')
                ->color('primary'),

            Stat::make('Overall Orders', $overallOrders)
                ->description('Total orders')
                ->descriptionIcon('heroicon-o-archive-box')
                ->color('gray'),
        ];
    }
}
