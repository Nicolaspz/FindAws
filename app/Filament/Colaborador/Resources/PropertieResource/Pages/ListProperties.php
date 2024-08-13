<?php

namespace App\Filament\Colaborador\Resources\PropertieResource\Pages;

use App\Filament\Colaborador\Resources\PropertieResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProperties extends ListRecords
{
    protected static string $resource = PropertieResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
