<?php

namespace App\Filament\Resources\TipologiesResource\Pages;

use App\Filament\Resources\TipologiesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTipologies extends ListRecords
{
    protected static string $resource = TipologiesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
