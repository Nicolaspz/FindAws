<?php

namespace App\Filament\Resources\VisitResource\Pages;

use App\Filament\Resources\VisitResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListVisits extends ListRecords
{
    protected static string $resource = VisitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'Todos' => Tab::make('Todos'),
            'abertas' => Tab::make('Abertas')
            ->modifyQueryUsing(fn(Builder $query) => $query->where('status', 'aberta')),
            'fechadas' => Tab::make('Fechadas')
            ->modifyQueryUsing(fn(Builder $query) => $query->where('status', 'fechada')),
        ];
    }
}
