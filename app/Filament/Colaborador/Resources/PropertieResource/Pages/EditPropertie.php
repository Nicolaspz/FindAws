<?php

namespace App\Filament\Colaborador\Resources\PropertieResource\Pages;

use App\Filament\Colaborador\Resources\PropertieResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPropertie extends EditRecord
{
    protected static string $resource = PropertieResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
