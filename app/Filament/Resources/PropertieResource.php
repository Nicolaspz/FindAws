<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PropertieResource\Pages;
use App\Filament\Resources\PropertieResource\RelationManagers;
use App\Filament\Resources\PropertieResource\RelationManagers\ImagesRelationManager;
use App\Models\Distrito;
use App\Models\Municipio;
use App\Models\Propertie;
use App\Models\Province;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PropertieResource extends Resource
{
    protected static ?string $model = Propertie::class;

    protected static ?string $navigationIcon = 'heroicon-o-home-modern';
    protected static ?string $navigationLabel = 'Propriedade';

    public static function form(Form $form): Form
    {
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
                    

                Select::make('provinces_id')  // O nome do campo é 'province_id' para corresponder ao banco de dados
                ->options(fn() => Province::pluck('name', 'id'))
                ->required()
                ->reactive()
                ->label('Provincia')
                ->afterStateUpdated(fn(callable $set) => $set('municipios_id', null)),

                Select::make('municipios_id')  // O nome do campo é 'municipios_id' para corresponder ao banco de dados
                ->options(fn(Get $get) => Municipio::where('provincia_id', $get('provinces_id'))->pluck('name', 'id'))
                ->required()
                ->reactive()
                ->label('Município')
                ->afterStateUpdated(fn(callable $set) => $set('distritos_id', null)),

                Select::make('distritos_id')  // O nome do campo é 'distritos_id' para corresponder ao banco de dados
                ->options(fn(Get $get) => Distrito::where('municipio_id', $get('municipios_id'))->pluck('name', 'id'))
                ->required()
                ->label('Distrito'),
                Select::make('tipe_energies_id')
                    ->label('Tipo de Energia')
                    ->relationship('tipe_energies', 'name')
                    ->required(),

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
                        //->relationship('distritos', 'name')
                        //->required(),--}}
                ]),

                    Section::make('Informações da Propriedade')->columns(2)->columnSpan(2)->schema([
                        Forms\Components\TextInput::make('price')
                            ->numeric()
                            ->prefix('Kz'),
                            Forms\Components\TextInput::make('title')
                            ->maxLength(255),
                        //Forms\Components\TextInput::make('lng')
                           // ->numeric(),

                        //Forms\Components\TextInput::make('lat')
                           // ->numeric(),

                        Forms\Components\Textarea::make('abstract')
                            ->maxLength(65535),
                        Forms\Components\Textarea::make('description')
                            ->maxLength(65535),
                        Forms\Components\TextInput::make('cidade')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('area'),
                        Forms\Components\TextInput::make('ano_construcao'),
                        Forms\Components\TextInput::make('quarto'),
                        Forms\Components\TextInput::make('banheiro')
                            ->numeric(),
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
                            ->required(),
                        Forms\Components\Toggle::make('dispensa')
                            ->required(),
                        Forms\Components\Toggle::make('propiedade_acessivel')
                            ->required(),
                        Forms\Components\Toggle::make('reservedo')
                            ->required(),
                        Forms\Components\Toggle::make('negociavel')
                            ->required(),
                            Forms\Components\TextInput::make('park')
                            ->numeric(),
                    ]),
                    Section::make('Destaques e Mídia')->columns(2)->columnSpan(2)->schema([
                        Forms\Components\DatePicker::make('visible_until'),
                        Forms\Components\TextInput::make('order')
                            ->numeric(),
			Forms\Components\Toggle::make('publish')->required(),

                        FileUpload::make('technical_details_img')
                            ->disk('public')
                            ->directory('destaque'),
                        Forms\Components\FileUpload::make('movie')
                            ->disk('public')
                            ->directory('videos'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('technical_details_img')
                	    ->label("Imagem")
                        ->disk('public'),
                Tables\Columns\TextColumn::make('reference')
                    ->searchable(),
                Tables\Columns\TextColumn::make('business.name')
                    ->sortable()
                    ->label("Negócio"),
                    Tables\Columns\IconColumn::make('destaque')
                    ->searchable()
                    ->boolean(),
                    Tables\Columns\IconColumn::make('publish')
                    ->searchable()
                    ->boolean()
                    ->label("publicado"),
                Tables\Columns\TextColumn::make('property_types.name')
                    ->numeric()
                    ->sortable()
                    ->label("Tipo"),

                    Tables\Columns\TextColumn::make('tipologies.name')
                    ->sortable(),
                    Tables\Columns\TextColumn::make('price')
                    ->money()
                    ->sortable()
                    ->label("Tipologia"),

                    Tables\Columns\TextColumn::make('municipios.name')
                    ->numeric()
                    ->sortable()
                    ->label("Município")
                    ->toggleable(isToggledHiddenByDefault: true),
                    Tables\Columns\TextColumn::make('provinces.name')
                    ->markdown()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                    Tables\Columns\TextColumn::make('distritos.name')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                    Tables\Columns\TextColumn::make('users.name')
                    ->sortable()
                    ->label("Usuário")
                    ->toggleable(isToggledHiddenByDefault: true),


            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    BulkAction::make('Publicar')
                    ->icon('heroicon-m-check')
                    ->requiresConfirmation()
                    ->action(function (Collection $records){
                        return $records->each->update(['publish'=> 1]);

                    }),
                    BulkAction::make('Nao publicar')
                    ->icon('heroicon-m-x-circle')
                    ->requiresConfirmation()
                    ->action(function (Collection $records){
                        return $records->each->update(['publish'=> 0]);

                    }),
                    BulkAction::make('Destaque')
                    ->icon('heroicon-m-check')
                    ->requiresConfirmation()
                    ->action(function (Collection $records){
                        return $records->each->update(['destaque'=> 1]);

                    }),
                    BulkAction::make('Rem Destaque')
                    ->icon('heroicon-m-x-circle')
                    ->requiresConfirmation()
                    ->action(function (Collection $records){
                        return $records->each->update(['destaque'=> 0]);

                    }),
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            ImagesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProperties::route('/'),
            'create' => Pages\CreatePropertie::route('/create'),
            'edit' => Pages\EditPropertie::route('/{record}/edit'),
        ];
    }
}
