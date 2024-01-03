<?php

namespace App\Filament\Widgets\Dashboard;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('New Orders', DB::table('orders')->where('status', 'new')->count()),
            Stat::make('Pending Orders', DB::table('orders')->where('status', 'pending')->count()),
            Stat::make('Out of Stock Products', DB::table('catalogs')->where('quantity', '<=' ,0)->where('visible', true)->count()),

        ];
    }
}
