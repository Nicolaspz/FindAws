<?php

namespace App\Filament\Resources\TipeEnergieResource\Pages;

use App\Filament\Resources\TipeEnergieResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTipeEnergies extends ListRecords
{
    protected static string $resource = TipeEnergieResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
