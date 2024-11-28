<?php

namespace App\Filament\Resources\VisitResource\Widgets;

use App\Models\Visit;
use Filament\Widgets\BarChartWidget;

class Visita extends BarChartWidget
{
    
protected static ?string $heading = 'Visitas por Propriedade';

    protected function getData(): array
    {
        $visits = Visit::visitsByProperty();

        return [
            'labels' => $visits->pluck('reference')->toArray(), // Nome das propriedades
            'datasets' => [
                [
                    'label' => 'Visitas',
                    'data' => $visits->pluck('total_visits')->toArray(), // Quantidade de visitas
                    'backgroundColor' => '#3b82f6',
                    'borderColor' => '#2563eb',
                ],
            ],
        ];
    }
}
