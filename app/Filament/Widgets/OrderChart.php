<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class OrderChart extends ChartWidget
{
    protected static ?string $heading = 'New Orders';
    protected static ?string $description = 'Quote requests by the users';
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
            ->between(
                start: $startTime,
                end: now(),
            );

        $data = match ($this->filter) {
            'week', 'month' => $data->perDay(),
            'year' => $data->perMonth(),
            default => $data,
        };

        $data = $data->count();

        return [
            'datasets' => [
                [
                    'fill' => 'start',
                    'label' => 'Orders',
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
                'ticks' => [
                    'precision' => 0
                ]
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
