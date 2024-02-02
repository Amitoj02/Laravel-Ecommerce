<?php

namespace App\Filament\Widgets\Dashboard;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;

class StatsOverview extends BaseWidget
{
    protected static ?string $pollingInterval = '30s';
    protected function getStats(): array
    {
        return [
            Stat::make('Catalogs', DB::table('catalogs')->count())
            ->icon('heroicon-o-cube'),
            Stat::make('Total Orders', DB::table('orders')->count())
            ->icon('heroicon-o-shopping-cart'),
            Stat::make('Total Users', DB::table('users')->count())
            ->icon('heroicon-o-user'),
        ];
    }
}
