<?php

namespace App\Filament\Resources\PropertieResource\Pages;

use App\Filament\Resources\PropertieResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPropertie extends EditRecord
{
    protected static string $resource = PropertieResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
