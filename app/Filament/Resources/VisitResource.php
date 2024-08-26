<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VisitResource\Pages;
use App\Filament\Resources\VisitResource\RelationManagers;
use App\Models\Visit;
use Filament\Forms;
use Filament\Forms\Form;
use Illuminate\Database\Eloquent\Collection;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

use Illuminate\Database\Eloquent\SoftDeletingScope;

class VisitResource extends Resource
{
    protected static ?string $model = Visit::class;

    protected static ?string $navigationIcon = 'heroicon-o-eye';
    protected static ?string $navigationLabel = 'Visita';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            Tables\Columns\TextColumn::make('name')
            ->sortable() // Para garantir que os dados sejam carregados corretamente
            ->searchable(),
            Tables\Columns\TextColumn::make('propertie.reference')
            ->label('Ref Propriedade')
            ->sortable() // Para garantir que os dados sejam carregados corretamente
            ->searchable(),
            Tables\Columns\TextColumn::make('phone')
            ->sortable() // Para garantir que os dados sejam carregados corretamente
            ->searchable(),
            Tables\Columns\TextColumn::make('info'),
            Tables\Columns\TextColumn::make('data_confirm'),
            Tables\Columns\TextColumn::make('data_vista'),
            IconColumn::make('status')
            ->icon(fn(string $state): string => match ($state) {
               // '' => 'heroicon-o-pencil',
                'aberta' => 'heroicon-o-clock',
                'fechada' => 'heroicon-o-check-circle',
            })
                ->color(fn(string $state): string => match ($state) {
                //'aberta' => 'info',
                'aberta' => 'warning',
                'fechada' => 'success',
                    default => 'gray',
                })
            ])

            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                BulkAction::make('fechar')
                ->icon('heroicon-m-check')
                ->requiresConfirmation()
                ->action(function (Collection $records) {
                    return $records->each->update(['status' => "fechada"]);
                }),
                BulkAction::make('abrir')
                ->icon('heroicon-m-check')
                ->requiresConfirmation()
                ->action(function (Collection $records) {
                    return $records->each->update(['status' => "aberta"]);
                }),
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVisits::route('/'),
            'create' => Pages\CreateVisit::route('/create'),
            'edit' => Pages\EditVisit::route('/{record}/edit'),
        ];
    }
}
