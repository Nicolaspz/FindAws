<?php

namespace App\Filament\Resources\PropertieResource\Widgets;

use App\Models\Propertie;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;


class Proprertie extends ChartWidget
{
    protected static ?string $heading = 'Propriedades por Província e Data';

    // Define o tipo de gráfico (barra, pizza, etc.)
    protected function getType(): string
    {
        return 'bar'; // Ou 'pie', 'line', etc., dependendo do que preferir
    }

    protected function getData(): array
    {
        // Consulta para agrupar propriedades por província e contar por mês
        $data = Propertie::query()
            ->join('provinces', 'properties.provinces_id', '=', 'provinces.id')
            ->select(
                DB::raw("DATE_FORMAT(properties.created_at, '%Y-%m') as month"), // Agrupa por mês
                'provinces.name as province',
                DB::raw('COUNT(properties.id) as total_properties')
            )
            ->groupBy('month', 'province')
            ->orderBy('month', 'asc')
            ->get();

        // Agrupa os dados para o gráfico
        $groupedData = $data->groupBy('province');
        $labels = $data->pluck('month')->unique()->values()->toArray();

        $datasets = [];
        foreach ($groupedData as $province => $properties) {
            $provinceData = [];
            foreach ($labels as $month) {
                $total = $properties->firstWhere('month', $month)?->total_properties ?? 0;
                $provinceData[] = $total;
            }

            $datasets[] = [
                'label' => $province,
                'data' => $provinceData,
                'backgroundColor' => $this->getRandomColor(),
                'borderColor' => '#000000',
                'borderWidth' => 1,
            ];
        }

        return [
            'labels' => $labels,
            'datasets' => $datasets,
        ];
    }

    // Gera cores aleatórias para o gráfico
    private function getRandomColor(): string
    {
        return '#' . substr(md5(mt_rand()), 0, 6);
    }
}