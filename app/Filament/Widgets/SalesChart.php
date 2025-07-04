<?php

namespace App\Filament\Widgets;

use App\Models\Transaction;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class SalesChart extends ChartWidget
{
    protected static ?string $heading = 'Grafik Pendapatan 7 Hari Terakhir';

    protected function getData(): array
    {
        $labels = [];
        $data = [];

        foreach (range(6, 0) as $i) {
            $date = Carbon::today()->subDays($i)->format('Y-m-d');
            $labels[] = $date;

            $total = Transaction::whereDate('date', $date)->sum('total_amount');
            $data[] = $total;
        }

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Pendapatan',
                    'data' => $data,
                    'backgroundColor' => '#3b82f6',
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
