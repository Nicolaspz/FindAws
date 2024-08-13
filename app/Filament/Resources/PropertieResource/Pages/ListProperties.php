<?php

namespace App\Filament\Resources\PropertieResource\Pages;

use App\Filament\Resources\PropertieResource;
use Filament\Actions;
//use Filament\Forms\Components\Builder;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListProperties extends ListRecords
{
    protected static string $resource = PropertieResource::class;

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
        'renda' => Tab::make('Renda')
            ->modifyQueryUsing(fn (Builder $query) => $query->where('business_id', '2')),
        'venda' => Tab::make('Venda')
            ->modifyQueryUsing(fn (Builder $query) => $query->where('business_id', '1')),
    ];
}

}
