<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use Filament\Support\RawJs;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class RevenueChart extends ChartWidget
{
    protected static ?string $heading = 'Revenue';
    protected static ?string $description = 'Revenue generated from all delivered orders';

    protected static ?string $pollingInterval = '30s';

    //default chart filter
    public ?string $filter = 'month';

    protected function getData(): array
    {
        $startTime = match ($this->filter) {
            'week' => now()->subWeek(),
            'year' => now()->subYear(),
            default => now()->subMonth(),
        };

        $data = Trend::model(Order::class)
            ->query(
                Order::query()
                    ->where('status','shipped')
            )->between(
                start: $startTime,
                end: now(),
            );

        $data = match ($this->filter) {
            'week', 'month' => $data->perDay(),
            'year' => $data->perMonth(),
            default => $data,
        };

        $data = $data->sum('total_price');

        return [
            'datasets' => [
                [
                    'fill' => 'start',
                    'label' => 'Revenue',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected static ?array $options = [
        'plugins' => [
            'legend' => [
                'display' => false,
            ],
        ],
        'scales' => [
            'y' => [
                'beginAtZero' => true,
            ]
        ]
    ];

    protected function getFilters(): ?array
    {
        return [
            'week' => 'Last 7 days',
            'month' => 'Last 30 days',
            'year' => 'Last year',
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
