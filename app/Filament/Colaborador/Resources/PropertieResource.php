<?php

namespace App\Filament\Colaborador\Resources;

use App\Filament\Colaborador\Resources\PropertieResource\Pages;
use App\Filament\Colaborador\Resources\PropertieResource\RelationManagers;
use App\Models\Propertie;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Distrito;
use App\Models\Municipio;
use App\Models\Province;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;

use Filament\Forms\Get;


use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;


class PropertieResource extends Resource {
    protected static ?string $model = Propertie::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form( Form $form ): Form {
        return $form
        ->schema([
            Section::make('Informações Principais')->columns(2)->columnSpan(2)->schema([
                Select::make('business_id')
                    ->label('Negócio')
                    ->relationship('business', 'name')
                    ->required(),
                Select::make('tipologies_id')
                    ->label('Tipologia')
                    ->relationship('tipologies', 'name')
                    ->required(),
                Select::make('property_types_id')
                ->label('Tipo')
                    ->relationship('property_types', 'name')
                    ->required(),
                Select::make('conditions_id')
                    ->label('Estado da Propriedade')
                    ->relationship('conditions', 'name')
                    ->required(),
                Select::make('tipe_energies_id')
                ->label('Tipo de Energia')
                ->relationship('tipe_energies', 'name')
                ->required(),

                Select::make('province')
                    ->options(fn() => Province::pluck('name', 'id'))
                    ->live(),

                Select::make('municipio')
                    ->options(fn(Get $get) => Municipio::where('provincia_id', $get('province'))->pluck('name', 'id'))
                    ->live(),

                Select::make('distrito')
                    ->options(fn(Get $get) => Distrito::where('municipio_id', $get('municipio'))->pluck('name_distrito', 'id'))
                    ->live(),

                //Select::make('provinces_id')
                //  ->label('Província')
                //->relationship('provinces', 'name')
                //->required(),
                //Select::make('municipios_id')
                //  ->label('Município')
                //->relationship('municipios', 'name')
                //->required(),
                //Select::make('distritos_id')
                //  ->label('Distrito')
                //->relationship('distritos', 'name_distrito')
                //->required(),--}}
            ]),

            Section::make('Informações da Propriedade')->columns(2)->columnSpan(2)->schema([
                TextInput::make('price')
                    ->numeric()
                    ->prefix('Kz'),
                TextInput::make('title')
                    ->maxLength(255),
                TextInput::make('lng')
                    ->numeric(),

                TextInput::make('lat')
                    ->numeric(),

                Textarea::make('abstract')
                    ->maxLength(65535),
                Textarea::make('description')
                    ->maxLength(65535),
                TextInput::make('cidade')
                    ->maxLength(255),
                TextInput::make('area'),
                TextInput::make('ano_construcao'),
                TextInput::make('quarto'),
                TextInput::make('banheiro')
                /* ->numeric(),
                    Toggle::make('destaque'),*/
            ]),
            Section::make('Comodidades')->columns(4)->columnSpan(2)->schema([
                Toggle::make('ar_condicionado')
                ->required(),
                Toggle::make('roupeiro_imbutido')
                ->required(),
                Toggle::make('elevator')
                    ->required(),

                Toggle::make('jardin')
                    ->required(),
                Toggle::make('piscina')
                    ->required(),
                Toggle::make('terraco')
                    ->required(),
                Toggle::make('dispensa')
                    ->required(),
                Toggle::make('propiedade_acessivel')
                ->required(),
                //Toggle::make('reservedo')
                   // ->required(),
                Toggle::make('negociavel')
                    ->required(),
                TextInput::make('park')
                    ->numeric(),
            ]),
            Section::make('Destaques e Mídia')->columns(2)->columnSpan(2)->schema([
                DatePicker::make('visible_until'),
                TextInput::make('order')
                    ->numeric(),
                //Toggle::make('publish')->required(),

                FileUpload::make('technical_details_img')
                ->disk('public')
                    ->directory('destaque'),
                FileUpload::make('movie')
                    ->disk('public')
                    ->directory('videos'),
            ]),
            ]);
    }

    public static function table( Table $table ): Table {
        return $table
       ->columns([
            ImageColumn::make('technical_details_img')
            ->label("Imagem"),
            TextColumn::make('reference')
                ->label("Referência")
                ->searchable(),
            TextColumn::make('business.name')
                ->sortable()
                ->label("Negócio"),
            IconColumn::make('destaque')
                ->searchable()
                ->boolean(),
            IconColumn::make('publish')
                ->searchable()
                ->boolean()
                ->label("publicado"),
            Tables\Columns\IconColumn::make('fechado')
                ->searchable()
                ->boolean()
                ->label("Arrendado/Comprado"),
            TextColumn::make('property_types.name')
                ->numeric()
                ->sortable()
                ->label("Tipo"),

            TextColumn::make('tipologies.name')
                ->sortable(),
            TextColumn::make('price')
                ->money('AKZ', divideBy: 100)
                ->sortable()
                ->label("Preço"),

            TextColumn::make('municipios.name')
                ->numeric()
                ->sortable()
                ->label("Município")
                ->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('provinces.name')
                ->markdown()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('distritos.name_distrito')
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('users.name')
                ->sortable()
                ->label("Usuário")
                ->toggleable(isToggledHiddenByDefault: true),

            ])
        ->filters( [
            //
        ] )
        ->actions( [
            Tables\Actions\ViewAction::make(),
            Tables\Actions\EditAction::make(),
        ] )
        ->bulkActions( [
            Tables\Actions\BulkActionGroup::make( [
                Tables\Actions\DeleteBulkAction::make(),
            ] ),
        ] );
    }

    public static function getRelations(): array {
        return [
            //
        ];
    }

    public static function getPages(): array {
        return [
            'index' => Pages\ListProperties::route( '/' ),
            'create' => Pages\CreatePropertie::route( '/create' ),
            'view' => Pages\ViewPropertie::route( '/{record}' ),
            'edit' => Pages\EditPropertie::route( '/{record}/edit' ),
        ];
    }
}
