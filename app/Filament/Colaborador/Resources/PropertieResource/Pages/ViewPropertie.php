<?php

namespace App\Filament\Colaborador\Resources\PropertieResource\Pages;

use App\Filament\Colaborador\Resources\PropertieResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPropertie extends ViewRecord
{
    protected static string $resource = PropertieResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
