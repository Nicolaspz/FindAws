<?php

namespace App\Filament\Resources\TipeEnergieResource\Pages;

use App\Filament\Resources\TipeEnergieResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTipeEnergie extends EditRecord
{
    protected static string $resource = TipeEnergieResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
