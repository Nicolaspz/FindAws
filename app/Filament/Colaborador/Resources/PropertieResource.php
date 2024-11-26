<?php

namespace App\Filament\Colaborador\Resources;

use App\Filament\Colaborador\Resources\PropertieResource\Pages;
use App\Filament\Colaborador\Resources\PropertieResource\RelationManagers;
use App\Filament\Resources\PropertieResource\RelationManagers\ImagesRelationManager;
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
use Illuminate\Support\Facades\Auth;


class PropertieResource extends Resource {
    protected static ?string $model = Propertie::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form( Form $form ): Form {
        return $form
        ->schema([
            Section::make('Informações Principais')->columns(2)->columnSpan(2)->schema([
                Forms\Components\Group::make([
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
                ])
                    ->columns(2), // Define o layout como 2 colunas


                Forms\Components\Group::make([
                    Select::make('provinces_id') // Campo para Província
                    ->options(fn() => Province::pluck('name', 'id'))
                    ->required()
                        ->reactive()
                        ->label('Província')
                        ->afterStateUpdated(fn(callable $set) => $set('municipios_id', null)),

                    Select::make('municipios_id') // Campo para Município
                    ->options(fn(Get $get) => Municipio::where('provincia_id', $get('provinces_id'))->pluck('name', 'id'))
                    ->required()
                        ->reactive()
                        ->label('Município')
                        ->afterStateUpdated(fn(callable $set) => $set('distritos_id', null)),

                    Select::make('distritos_id') // Campo para Distrito
                    ->options(fn(Get $get) => Distrito::where('municipio_id', $get('municipios_id'))->pluck('name', 'id'))
                    ->required()
                        ->label('Distrito'),
                    Select::make('tipe_energies_id')
                    ->label('Tipo de Energia')
                    ->relationship('tipe_energies', 'name')
                    ->required(),
                    Forms\Components\TextInput::make('cidade')
                        ->maxLength(255)
                        ->label('Bairro'),

                ])
                    ->columns(3), // Define o layout como 3 colunas
            ]),

            Section::make('Informações da Propriedade')->columns(3)->columnSpan(2)->schema([


                Forms\Components\TextInput::make('price')
                    ->numeric()
                    ->prefix('Kz')
                    ->label("Preço"),
                Forms\Components\TextInput::make('title')
                    ->maxLength(255)
                    ->label("Titulo da Propriedade"),
                //Forms\Components\TextInput::make('lng')
                // ->numeric(),

                //Forms\Components\TextInput::make('lat')
                // ->numeric(),

                Forms\Components\Textarea::make('description')
                ->maxLength(65535)
                    ->label("Preço")
                    ->label("Descrição"),
                Forms\Components\Textarea::make('abstract')
                    ->maxLength(65535)
                    ->label("Mais informações"),


                Forms\Components\TextInput::make('area')
                    ->label("Área")
                    ->numeric(),
                Forms\Components\TextInput::make('ano_construcao'),
                Forms\Components\TextInput::make('quarto')
                    ->label("Qtd Quarto"),
                Forms\Components\TextInput::make('banheiro')
                    ->numeric()
                    ->label("Nº Banheiro"),
                Forms\Components\Toggle::make('destaque'),
            ]),
            Section::make('Comodidades')->columns(4)->columnSpan(2)->schema([
                Forms\Components\Toggle::make('ar_condicionado')
                ->required(),
                Forms\Components\Toggle::make('roupeiro_imbutido')
                ->required(),
                Forms\Components\Toggle::make('elevator')
                    ->required(),

                Forms\Components\Toggle::make('jardin')
                    ->required(),
                Forms\Components\Toggle::make('piscina')
                    ->required(),
                Forms\Components\Toggle::make('terraco')
                    ->required()
                    ->label("Terraço"),
                Forms\Components\Toggle::make('dispensa')

                    ->required(),
                Forms\Components\Toggle::make('propiedade_acessivel')
                ->required()
                    ->label("Acessivel"),
                Forms\Components\Toggle::make('reservedo')
                    ->required(),
                Forms\Components\Toggle::make('negociavel')
                    ->label("Negociável")
                    ->required(),
                Forms\Components\TextInput::make('park')
                    ->label("Qtd de Ecionamento")
                    ->numeric(),
            ]),
            Section::make('Destaques e Mídia')->columns(2)->columnSpan(2)->schema([
                
                
                FileUpload::make('technical_details_img')
                ->disk('public')
                    ->directory('destaque')
                    ->label("Imagem Frontal"),
                Forms\Components\FileUpload::make('movie')
                    ->disk('public')
                    ->directory('videos')
                    ->label("Vídeo de Apresentação"),
            ]),
            ]);
    }

    public static function table( Table $table ): Table {
        return $table
       ->columns([
            ImageColumn::make('technical_details_img')
            ->label('Imagem')
            ->defaultImageUrl(url('/destaque/technical_details_img')),
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
            TextColumn::make('distritos.name')
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
            ImagesRelationManager::class,
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

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->whereHas('user', function ($query) {
            $query->where('id', Auth::user()->id);
        });
    }
}
