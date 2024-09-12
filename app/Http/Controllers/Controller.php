<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Propertie;
use App\Models\PropertyTypes;
use App\Models\Tipologies;
use App\Models\User;
use App\Models\Visit;
use Filament\Facades\Filament;
use Filament\Notifications\Notification;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Builder\Property;

class Controller extends BaseController
{
    //index-view
    use AuthorizesRequests, ValidatesRequests;
    public function index(){

        $baseQuery = DB::table('properties')
            ->leftJoin('users', 'properties.user_id', '=', 'users.id')
            ->leftJoin('businesses', 'properties.business_id', '=', 'businesses.id')
            ->leftJoin('tipologies', 'properties.tipologies_id', '=', 'tipologies.id')
            ->leftJoin('property_types', 'properties.property_types_id', '=', 'property_types.id')
            ->leftJoin('conditions', 'properties.conditions_id', '=', 'conditions.id')
            ->leftJoin('tipe_energies', 'properties.tipe_energies_id', '=', 'tipe_energies.id')
            ->leftJoin('distritos', 'properties.distritos_id', '=', 'distritos.id')
            ->leftJoin('municipios', 'properties.municipios_id', '=', 'municipios.id')
            ->leftJoin('provinces', 'properties.provinces_id', '=', 'provinces.id')
            ->select(
                'properties.*',
                'users.name as user_name',
                'businesses.name as business_name',
                'businesses.id as business_id',
                'tipologies.name as typology_name',
                'property_types.name as type_name',
                'conditions.name as condition_name',
                'tipe_energies.name as energy_type_name',
                'distritos.name_distrito as distrito_name',
                'municipios.name as municipio_name',
                'provinces.name as provincia_name'
            );

        // Consulta para $properties
        $properties = clone $baseQuery;
        $properties = $properties
            ->where('properties.reservedo', 0)
            ->where('properties.publish', 1)
            ->where('properties.fechado', 0)
            ->paginate(10);

        // Consulta para $properties_destaque
        $properties_destaque = clone $baseQuery;
        $properties_destaque = $properties_destaque
            ->where('properties.reservedo', 0)
            ->where('properties.publish', 1)
            ->where('properties.destaque', 1)
            ->get();
            $tipologies = Tipologies::all();
            $propertie_Type = PropertyTypes::all();

           $visitCounts = DB::table('visits')
            ->select('properties_id', DB::raw('COUNT(id) as visit_count'))
            ->where('status', 'fechada') // Filtra apenas visitas com status 'fechada'
            ->groupBy('properties_id')
            ->pluck('visit_count', 'properties_id');

        return view('site', compact('properties', 'properties_destaque','tipologies','propertie_Type', 'visitCounts'));
    }

    public function indexView()
    {

        $baseQuery = DB::table('properties')
            ->leftJoin('users', 'properties.user_id', '=', 'users.id')
            ->leftJoin('businesses', 'properties.business_id', '=', 'businesses.id')
            ->leftJoin('tipologies', 'properties.tipologies_id', '=', 'tipologies.id')
            ->leftJoin('property_types', 'properties.property_types_id', '=', 'property_types.id')
            ->leftJoin('conditions', 'properties.conditions_id', '=', 'conditions.id')
            ->leftJoin('tipe_energies', 'properties.tipe_energies_id', '=', 'tipe_energies.id')
            ->leftJoin('distritos', 'properties.distritos_id', '=', 'distritos.id')
            ->leftJoin('municipios', 'properties.municipios_id', '=', 'municipios.id')
            ->leftJoin('provinces', 'properties.provinces_id', '=', 'provinces.id')
            ->select(
                'properties.*',
                'users.name as user_name',
                'businesses.name as business_name',
                'businesses.id as business_id',
                'tipologies.name as typology_name',
                'property_types.name as type_name',
                'conditions.name as condition_name',
                'tipe_energies.name as energy_type_name',
                'distritos.name_distrito as distrito_name',
                'municipios.name as municipio_name',
                'provinces.name as provincia_name'
            );

        // Consulta para $properties
        $properties = clone $baseQuery;
        $properties = $properties
            ->where('properties.reservedo', 0)
            ->where('properties.publish', 1)
            ->where('properties.fechado', 0)
            ->paginate(10);

        // Consulta para $properties_destaque
        $properties_destaque = clone $baseQuery;
        $properties_destaque = $properties_destaque
        ->where('properties.reservedo', 0)
        ->where('properties.publish', 1)
        ->where('properties.destaque', 1)
        ->get();
        $tipologies = Tipologies::all();
        $propertie_Type = PropertyTypes::all();

        $visitCounts = DB::table('visits')
        ->select('properties_id', DB::raw('COUNT(id) as visit_count'))
        ->where('status', 'fechada') // Filtra apenas visitas com status 'fechada'
        ->groupBy('properties_id')
        ->pluck('visit_count', 'properties_id');

        return view('indexView', compact('properties', 'properties_destaque', 'tipologies', 'propertie_Type', 'visitCounts'));
    }

    public function sobre()
    {

        $baseQuery = DB::table('properties')
        ->leftJoin('users', 'properties.user_id', '=', 'users.id')
        ->leftJoin('businesses', 'properties.business_id', '=', 'businesses.id')
        ->leftJoin('tipologies', 'properties.tipologies_id', '=', 'tipologies.id')
        ->leftJoin('property_types', 'properties.property_types_id', '=', 'property_types.id')
        ->leftJoin('conditions', 'properties.conditions_id', '=', 'conditions.id')
        ->leftJoin('tipe_energies', 'properties.tipe_energies_id', '=', 'tipe_energies.id')
        ->leftJoin('distritos', 'properties.distritos_id', '=', 'distritos.id')
        ->leftJoin('municipios', 'properties.municipios_id', '=', 'municipios.id')
        ->leftJoin('provinces', 'properties.provinces_id', '=', 'provinces.id')
        ->leftJoin('visits', 'properties.id', '=', 'visits.properties_id')
        ->select(
            'properties.*',
            'users.name as user_name',
            'businesses.name as business_name',
            'businesses.id as business_id',
            'tipologies.name as typology_name',
            'property_types.name as type_name',
            'conditions.name as condition_name',
            'tipe_energies.name as energy_type_name',
            'distritos.name_distrito as distrito_name',
            'municipios.name as municipio_name',
            'provinces.name as provincia_name'

        );

        $visitCounts = DB::table('visits')
            ->select('properties_id', DB::raw('COUNT(id) as visit_count'))
            ->where('status', 'fechada') // Filtra apenas visitas com status 'fechada'
            ->groupBy('properties_id')
            ->pluck('visit_count', 'properties_id');

        // Consulta para $properties
        $properties = clone $baseQuery;
        $properties = $properties
            ->where('properties.reservedo', 0)
            ->where('properties.publish', 1)
            ->where('properties.fechado', 0)
            ->paginate(10);
        // Consulta para $properties_destaque
        $properties_destaque = clone $baseQuery;
        $properties_destaque = $properties_destaque
            ->where('properties.reservedo', 0)
            ->where('properties.publish', 1)
            ->where('properties.destaque', 1)
            ->get();
        $tipologies = Tipologies::all();
        $propertie_Type = propertyTypes::all();
        return view('layouts.sobre', compact('properties_destaque', 'tipologies', 'propertie_Type', 'visitCounts'));
    }

    public function contacto()
    {

        $baseQuery = DB::table('properties')
        ->leftJoin('users', 'properties.user_id', '=', 'users.id')
        ->leftJoin('businesses', 'properties.business_id', '=', 'businesses.id')
        ->leftJoin('tipologies', 'properties.tipologies_id', '=', 'tipologies.id')
        ->leftJoin('property_types', 'properties.property_types_id', '=', 'property_types.id')
        ->leftJoin('conditions', 'properties.conditions_id', '=', 'conditions.id')
        ->leftJoin('tipe_energies', 'properties.tipe_energies_id', '=', 'tipe_energies.id')
        ->leftJoin('distritos', 'properties.distritos_id', '=', 'distritos.id')
        ->leftJoin('municipios', 'properties.municipios_id', '=', 'municipios.id')
        ->leftJoin('provinces', 'properties.provinces_id', '=', 'provinces.id')
            ->leftJoin('visits', 'properties.id', '=', 'visits.properties_id')
        ->select(
            'properties.*',
            'users.name as user_name',
            'businesses.name as business_name',
            'businesses.id as business_id',
            'tipologies.name as typology_name',
            'property_types.name as type_name',
            'conditions.name as condition_name',
            'tipe_energies.name as energy_type_name',
            'distritos.name_distrito as distrito_name',
            'municipios.name as municipio_name',
            'provinces.name as provincia_name'

        );

        $visitCounts = DB::table('visits')
            ->select('properties_id', DB::raw('COUNT(id) as visit_count'))
            ->where('status', 'fechada') // Filtra apenas visitas com status 'fechada'
            ->groupBy('properties_id')
            ->pluck('visit_count', 'properties_id');
        // Consulta para $properties
        $properties = clone $baseQuery;
        $properties = $properties
            ->where('properties.reservedo', 0)
            ->where('properties.publish', 1)
            ->paginate(10);
        // Consulta para $properties_destaque
        $properties_destaque = clone $baseQuery;
        $properties_destaque = $properties_destaque
            ->where('properties.reservedo', 0)
            ->where('properties.publish', 1)
            ->where('properties.destaque', 1)
            ->where('properties.fechado', 0)
            ->get();
        $tipologies = Tipologies::all();
        $propertie_Type = propertyTypes::all();
        return view('layouts.contacto', compact('properties_destaque', 'tipologies', 'propertie_Type', 'visitCounts'));
    }


    public function propertie_types($type_id){

        $baseQuery = DB::table('properties')
            ->leftJoin('users', 'properties.user_id', '=', 'users.id')
            ->leftJoin('businesses', 'properties.business_id', '=', 'businesses.id')
            ->leftJoin('tipologies', 'properties.tipologies_id', '=', 'tipologies.id')
            ->leftJoin('property_types', 'properties.property_types_id', '=', 'property_types.id')
            ->leftJoin('conditions', 'properties.conditions_id', '=', 'conditions.id')
            ->leftJoin('tipe_energies', 'properties.tipe_energies_id', '=', 'tipe_energies.id')
            ->leftJoin('distritos', 'properties.distritos_id', '=', 'distritos.id')
            ->leftJoin('municipios', 'properties.municipios_id', '=', 'municipios.id')
            ->leftJoin('provinces', 'properties.provinces_id', '=', 'provinces.id')
            ->leftJoin('visits', 'properties.id', '=', 'visits.properties_id')
            ->select(
                'properties.*',
                'users.name as user_name',
                'businesses.name as business_name',
                'businesses.id as business_id',
                'tipologies.name as typology_name',
                'property_types.name as type_name',
                'conditions.name as condition_name',
                'tipe_energies.name as energy_type_name',
                'distritos.name_distrito as distrito_name',
                'municipios.name as municipio_name',
                'provinces.name as provincia_name'

            );

        // Consulta para $properties
        $properties = clone $baseQuery;
        $properties = $properties
            ->where('properties.reservedo', 0)
            ->where('properties.publish', 1)
            ->where('properties.property_types_id', $type_id)
            ->paginate(10);

        // Consulta para $properties_destaque
        $properties_destaque = clone $baseQuery;
        $properties_destaque = $properties_destaque
            ->where('properties.reservedo', 0)
            ->where('properties.publish', 1)
            ->where('properties.destaque', 1)
            ->where('properties.fechado', 0)
            ->get();
            $tipologies = Tipologies::all();
            $propertie_Type = propertyTypes::all();

        $visitCounts = DB::table('visits')
            ->select('properties_id', DB::raw('COUNT(id) as visit_count'))
            ->where('status', 'fechada') // Filtra apenas visitas com status 'fechada'
            ->groupBy('properties_id')
            ->pluck('visit_count', 'properties_id');

        return view('site', compact('properties', 'properties_destaque','tipologies','propertie_Type', 'visitCounts'));
    }


    public function Properties_Venda(){

        $baseQuery = DB::table('properties')
            ->leftJoin('users', 'properties.user_id', '=', 'users.id')
            ->leftJoin('businesses', 'properties.business_id', '=', 'businesses.id')
            ->leftJoin('tipologies', 'properties.tipologies_id', '=', 'tipologies.id')
            ->leftJoin('property_types', 'properties.property_types_id', '=', 'property_types.id')
            ->leftJoin('conditions', 'properties.conditions_id', '=', 'conditions.id')
            ->leftJoin('tipe_energies', 'properties.tipe_energies_id', '=', 'tipe_energies.id')
            ->leftJoin('distritos', 'properties.distritos_id', '=', 'distritos.id')
            ->leftJoin('municipios', 'properties.municipios_id', '=', 'municipios.id')
            ->leftJoin('provinces', 'properties.provinces_id', '=', 'provinces.id')
            ->select(
                'properties.*',
                'users.name as user_name',
                'businesses.name as business_name',
                'businesses.id as business_id',
                'tipologies.name as typology_name',
                'property_types.name as type_name',
                'conditions.name as condition_name',
                'tipe_energies.name as energy_type_name',
                'distritos.name_distrito as distrito_name',
                'municipios.name as municipio_name',
                'provinces.name as provincia_name',

            );

        // Consulta para $properties
        $properties = clone $baseQuery;
        $properties = $properties
            ->where('properties.reservedo', 0)
            ->where('properties.publish', 1)
            ->where('properties.business_id', 1)
            ->paginate(10);

            //dd($properties);

        // Consulta para $properties_destaque
        $properties_destaque = clone $baseQuery;
        $properties_destaque = $properties_destaque
            ->where('properties.reservedo', 0)
            ->where('properties.publish', 1)
            ->where('properties.destaque', 1)
            ->where('properties.fechado', 0)
            ->get();

        $tipologies = Tipologies::all();
        $propertie_Type = propertyTypes::all();

        $visitCounts = DB::table('visits')
        ->select('properties_id', DB::raw('COUNT(id) as visit_count'))
        ->where('status', 'fechada') // Filtra apenas visitas com status 'fechada'
        ->groupBy('properties_id')
        ->pluck('visit_count', 'properties_id');

            return view('site', compact('properties', 'properties_destaque','tipologies','propertie_Type','visitCounts'));
    }

    public function Properties_aluguer(){

        $baseQuery = DB::table('properties')
            ->leftJoin('users', 'properties.user_id', '=', 'users.id')
            ->leftJoin('businesses', 'properties.business_id', '=', 'businesses.id')
            ->leftJoin('tipologies', 'properties.tipologies_id', '=', 'tipologies.id')
            ->leftJoin('property_types', 'properties.property_types_id', '=', 'property_types.id')
            ->leftJoin('conditions', 'properties.conditions_id', '=', 'conditions.id')
            ->leftJoin('tipe_energies', 'properties.tipe_energies_id', '=', 'tipe_energies.id')
            ->leftJoin('distritos', 'properties.distritos_id', '=', 'distritos.id')
            ->leftJoin('municipios', 'properties.municipios_id', '=', 'municipios.id')
            ->leftJoin('provinces', 'properties.provinces_id', '=', 'provinces.id')
            ->select(
                'properties.*',
                'users.name as user_name',
                'businesses.name as business_name',
                'businesses.id as business_id',
                'tipologies.name as typology_name',
                'property_types.name as type_name',
                'conditions.name as condition_name',
                'tipe_energies.name as energy_type_name',
                'distritos.name_distrito as distrito_name',
                'municipios.name as municipio_name',
                'provinces.name as provincia_name',

            );

        // Consulta para $properties
        $properties = clone $baseQuery;
        $properties = $properties
            ->where('properties.reservedo', 0)
            ->where('properties.publish', 1)
            ->where('properties.business_id', 2)

            ->paginate(10);

        // Consulta para $properties_destaque
        $properties_destaque = clone $baseQuery;
        $properties_destaque = $properties_destaque
            ->where('properties.reservedo', 0)
            ->where('properties.publish', 1)
            ->where('properties.destaque', 1)
            ->where('properties.fechado', 0)
            ->get();

            $tipologies = Tipologies::all();
            $propertie_Type = propertyTypes::all();

        $visitCounts = DB::table('visits')
        ->select('properties_id', DB::raw('COUNT(id) as visit_count'))
        ->where('status', 'fechada') // Filtra apenas visitas com status 'fechada'
        ->groupBy('properties_id')
        ->pluck('visit_count', 'properties_id');

        return view('site', compact('properties', 'properties_destaque','tipologies','propertie_Type', 'visitCounts'));
 }

 public function Properties_Vendajs(){

    $baseQuery = DB::table('properties')
            ->leftJoin('users', 'properties.user_id', '=', 'users.id')
            ->leftJoin('businesses', 'properties.business_id', '=', 'businesses.id')
            ->leftJoin('tipologies', 'properties.tipologies_id', '=', 'tipologies.id')
            ->leftJoin('property_types', 'properties.property_types_id', '=', 'property_types.id')
            ->leftJoin('conditions', 'properties.conditions_id', '=', 'conditions.id')
            ->leftJoin('tipe_energies', 'properties.tipe_energies_id', '=', 'tipe_energies.id')
            ->leftJoin('distritos', 'properties.distritos_id', '=', 'distritos.id')
            ->leftJoin('municipios', 'properties.municipios_id', '=', 'municipios.id')
            ->leftJoin('provinces', 'properties.provinces_id', '=', 'provinces.id')
            ->select(
                'properties.*',
                'users.name as user_name',
                'businesses.name as business_name',
                'businesses.id as business_id',
                'tipologies.name as typology_name',
                'property_types.name as type_name',
                'conditions.name as condition_name',
                'tipe_energies.name as energy_type_name',
                'distritos.name_distrito as distrito_name',
                'municipios.name as municipio_name',
                'provinces.name as provincia_name',

            );

        // Consulta para $properties
        $properties = clone $baseQuery;
        $properties = $properties
            ->where('properties.reservedo', 0)
            ->where('properties.publish', 1)
            ->where('properties.business_id', 1)
            ->where('properties.fechado', 0)
            ->paginate(10);


        $visitCounts = DB::table('visits')
        ->select('properties_id', DB::raw('COUNT(id) as visit_count'))
        ->where('status', 'fechada') // Filtra apenas visitas com status 'fechada'
        ->groupBy('properties_id')
        ->pluck('visit_count', 'properties_id');
        // Consulta para $properties_destaque


        return response()->json($properties);

    }

    public function Properties_aluguerjs(){

        $baseQuery = DB::table('properties')
            ->leftJoin('users', 'properties.user_id', '=', 'users.id')
            ->leftJoin('businesses', 'properties.business_id', '=', 'businesses.id')
            ->leftJoin('tipologies', 'properties.tipologies_id', '=', 'tipologies.id')
            ->leftJoin('property_types', 'properties.property_types_id', '=', 'property_types.id')
            ->leftJoin('conditions', 'properties.conditions_id', '=', 'conditions.id')
            ->leftJoin('tipe_energies', 'properties.tipe_energies_id', '=', 'tipe_energies.id')
            ->leftJoin('distritos', 'properties.distritos_id', '=', 'distritos.id')
            ->leftJoin('municipios', 'properties.municipios_id', '=', 'municipios.id')
            ->leftJoin('provinces', 'properties.provinces_id', '=', 'provinces.id')
            ->leftJoin('visits', 'properties.id', '=', 'visits.properties_id')
            ->select(
                'properties.*',
                'users.name as user_name',
                'businesses.name as business_name',
                'businesses.id as business_id',
                'tipologies.name as typology_name',
                'property_types.name as type_name',
                'conditions.name as condition_name',
                'tipe_energies.name as energy_type_name',
                'distritos.name_distrito as distrito_name',
                'municipios.name as municipio_name',
                'provinces.name as provincia_name',

            );

        // Consulta para $properties
        $properties = clone $baseQuery;
        $properties = $properties
            ->where('properties.reservedo', 0)
            ->where('properties.publish', 1)
            ->where('properties.business_id', 2)
            ->where('properties.fechado', 0)
            ->paginate(10);

        $visitCounts = DB::table('visits')
        ->select('properties_id', DB::raw('COUNT(id) as visit_count'))
        ->where('status', 'fechada') // Filtra apenas visitas com status 'fechada'
        ->groupBy('properties_id')
        ->pluck('visit_count', 'properties_id');


        return response()->json($properties);
 }

    public function details($id){
            //dd($id);images
        $properties = DB::table('properties')
        ->leftJoin('users', 'properties.user_id', '=', 'users.id')
        ->leftJoin('businesses', 'properties.business_id', '=', 'businesses.id')
        ->leftJoin('tipologies', 'properties.tipologies_id', '=', 'tipologies.id')
        ->leftJoin('property_types', 'properties.property_types_id', '=', 'property_types.id')
        ->leftJoin('conditions', 'properties.conditions_id', '=', 'conditions.id')
        ->leftJoin('tipe_energies', 'properties.tipe_energies_id', '=', 'tipe_energies.id')
        ->leftJoin('distritos', 'properties.distritos_id', '=', 'distritos.id')
        ->leftJoin('municipios', 'properties.municipios_id', '=', 'municipios.id')
        ->leftJoin('provinces', 'properties.provinces_id', '=', 'provinces.id')
            ->leftJoin('visits', 'properties.id', '=', 'visits.properties_id')
         ->where('properties.id', $id) // Adicionando a condição onde reservedo é igual a 0
         ->select(
        'properties.*',
        'users.name as user_name',
        'businesses.name as business_name',
        'businesses.id as business_id',
        'tipologies.name as typology_name',
        'property_types.name as type_name',
        'conditions.name as condition_name',
        'tipe_energies.name as energy_type_name',
        'distritos.name_distrito as distrito_name',
        'municipios.name as municipio_name',
        'provinces.name as provincia_name',

        )
         ->get();
        $baseQuery = DB::table('properties')
            ->leftJoin('users', 'properties.user_id', '=', 'users.id')
            ->leftJoin('businesses', 'properties.business_id', '=', 'businesses.id')
            ->leftJoin('tipologies', 'properties.tipologies_id', '=', 'tipologies.id')
            ->leftJoin('property_types', 'properties.property_types_id', '=', 'property_types.id')
            ->leftJoin('conditions', 'properties.conditions_id', '=', 'conditions.id')
            ->leftJoin('tipe_energies', 'properties.tipe_energies_id', '=', 'tipe_energies.id')
            ->leftJoin('distritos', 'properties.distritos_id', '=', 'distritos.id')
            ->leftJoin('municipios', 'properties.municipios_id', '=', 'municipios.id')
            ->leftJoin('provinces', 'properties.provinces_id', '=', 'provinces.id')
            ->select(
                'properties.*',
                'users.name as user_name',
                'businesses.name as business_name',
                'businesses.id as business_id',
                'tipologies.name as typology_name',
                'property_types.name as type_name',
                'conditions.name as condition_name',
                'tipe_energies.name as energy_type_name',
                'distritos.name_distrito as distrito_name',
                'municipios.name as municipio_name',
                'provinces.name as provincia_name',

            );


        // Consulta para $properties_destaque
        $properties_destaque = clone $baseQuery;
        $properties_destaque = $properties_destaque
            ->where('properties.reservedo', 0)
            ->where('properties.publish', 1)
            ->where('properties.destaque', 1)
            ->where('properties.fechado', 0)
            ->get();
         $images = Image::where('propertie_id', $id)->get();
        $propertie_Type = propertyTypes::all();

        $visitCounts = DB::table('visits')
        ->select('properties_id', DB::raw('COUNT(id) as visit_count'))
        ->where('status', 'fechada') // Filtra apenas visitas com status 'fechada'
            ->groupBy('properties_id')
            ->pluck('visit_count', 'properties_id');

        return view('detail',
        ['propertie' => $properties[0] ,
        'images' => $images,
        'properties_destaque'=>$properties_destaque,
        'propertie_Type'=>$propertie_Type,
        'visitCounts'=> $visitCounts
        ]);
    }


    public function searchProperties(Request $request)
{

    if ($request->filled('price_min') && $request->filled('price_max')) {
        // Agora verifica se o valor mínimo é maior que o máximo
        if ($request->price_min > $request->price_max) {
            return back()->withErrors(['price_range' => 'O preço mínimo não pode ser maior que o preço máximo.']);
        }
    }

    $baseQuery = DB::table('properties')
        ->leftJoin('users', 'properties.user_id', '=', 'users.id')
        ->leftJoin('businesses', 'properties.business_id', '=', 'businesses.id')
        ->leftJoin('tipologies', 'properties.tipologies_id', '=', 'tipologies.id')
        ->leftJoin('property_types', 'properties.property_types_id', '=', 'property_types.id')
        ->leftJoin('conditions', 'properties.conditions_id', '=', 'conditions.id')
        ->leftJoin('tipe_energies', 'properties.tipe_energies_id', '=', 'tipe_energies.id')
        ->leftJoin('distritos', 'properties.distritos_id', '=', 'distritos.id')
        ->leftJoin('municipios', 'properties.municipios_id', '=', 'municipios.id')
        ->leftJoin('provinces', 'properties.provinces_id', '=', 'provinces.id')
            ->leftJoin('visits', 'properties.id', '=', 'visits.properties_id')
        ->where('properties.reservedo', 0)
        ->where('properties.publish', 1)
        ->where('properties.fechado', 0)
        ->select(
            'properties.*',
            'users.name as user_name',
            'businesses.name as business_name',
            'tipologies.name as typology_name',
            'property_types.name as type_name',
            'conditions.name as condition_name',
            'tipe_energies.name as energy_type_name',
            'distritos.name_distrito as distrito_name',
            'municipios.name as municipio_name',
            'provinces.name as provincia_name',

        );

    // Aplicação de filtros
    $properties = (clone $baseQuery)
        ->when($request->business_id, function ($query) use ($request) {
            return $query->where('properties.business_id', $request->business_id);
        })
        ->when($request->typology_id, function ($query) use ($request) {
            return $query->where('properties.tipologies_id', $request->typology_id);
        })
        ->when($request->cidade, function ($query) use ($request) {
            // Grupo de condições para busca avançada por 'cidade'
            $query->where(function($query) use ($request) {
                $query->where('properties.cidade', 'like', '%' . $request->cidade . '%')
                      ->orWhere('municipios.name', 'like', '%' . $request->cidade . '%')
                      ->orWhere('distritos.name_distrito', 'like', '%' . $request->cidade . '%')
                      ->orWhere('provinces.name', 'like', '%' . $request->cidade . '%');
            });
        })
        ->when($request->price_min, function ($query) use ($request) {
            return $query->where('properties.price', '>=', $request->price_min);
        })
        ->when($request->price_max, function ($query) use ($request) {
            return $query->where('properties.price', '<=', $request->price_max);
        })
        ->paginate(10);

        $visitCounts = DB::table('visits')
        ->select('properties_id', DB::raw('COUNT(id) as visit_count'))
        ->where('status', 'fechada') // Filtra apenas visitas com status 'fechada'
            ->groupBy('properties_id')
            ->pluck('visit_count', 'properties_id');

        $properties_destaque = clone $baseQuery;
        $properties_destaque = $properties_destaque
            ->where('properties.reservedo', 0)
            ->where('properties.publish', 1)
            ->where('properties.destaque', 1)
            ->get();
            $tipologies = Tipologies::all();
            $propertie_Type = propertyTypes::all();
            return view('site', compact('properties', 'properties_destaque','tipologies','propertie_Type','visitCounts'));
}

public function submitVisit(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|max:255',
        'phone' => 'required|max:255',
        'info' => 'required|max:1000',
        'data_vista' => 'required|date_format:Y-m-d',
        'properties_id' => 'required|exists:properties,id'
    ]);

    $visit = new Visit();
    $visit->name = $validated['name'];
    $visit->phone = $validated['phone'];
    $visit->info = $validated['info'];
    $visit->data_vista = $validated['data_vista'];
    $visit->properties_id = $validated['properties_id'];
    $visit->save();
    /*if($visit){
        Notification::make()
        ->title('Pedido de Visita')
        ->body('Um novo pedido de visita enviado com sucesso.')
        ->success() // Define o tipo da notificação como sucesso
        ->sendToUsers(User::all());
    }*/

    return redirect()->to(url()->previous() . '#property_details')->with('success', 'Visita agendada com sucesso! aguarde o feedback  do nosso agete');

}

    public function showVerificationForm($phone)
    {
        //dd($phone);
        return view('filament.pages.auth.verify-phone',compact('phone')); // Retorna a view com o formulário de verificação
    }


    public function verifyPhone(Request $request)
{
    $request->validate([
        'verification_code' => 'required|numeric',
        'phone' => 'required'
    ]);

    $user = User::where('phone', $request->phone)->first();

    if (!$user) {
        return back()->withErrors(['phone' => 'Phone number not found.']);
    }

    // Verifica se o código expirou (alterado para 1 minuto)
    /*if ($user->phone_verification_code_created_at >= now()->subMinutes(10)) {
        return back()->withErrors(['verification_code' => 'Verification code has expired.']);
    }*/

    if ($user->phone_verification_code != $request->verification_code) {
        return back()->withErrors(['verification_code' => 'Invalid verification code.']);
    }

    $user->phone_verified = true;
    $user->phone_verification_code = null;
    $user->phone_verification_code_created_at = null;
    $user->save();

    // Redirecionar para o login após a verificação bem-sucedida
    return redirect()->to('/colaborador/login');
}

    protected function sendSMS($phoneNumber, $smsVerificationCode)
    {
        $basic  = new \Vonage\Client\Credentials\Basic("80e3a742", "Sbddov3EG8gYxhra");
        $client = new \Vonage\Client($basic);

        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS($phoneNumber, "Nzuaku", 'Seu Código de confirmação  Zuaku é ' . $smsVerificationCode)
        );

        $message = $response->current();

        if ($message->getStatus() == 0) {

            return true;
        } else {
            //echo "The message failed with status: " . $message->getStatus() . "\n";
            return false;
        }
    }

    public function resendCode(Request $request)
{
        $phone = $request->input('phone');
        $user = User::where('phone', $phone)->first();

        if (!$user) {
            return response()->json(['message' => 'Phone number not found.'], 404);
        }
        $newCode = rand(100000, 999999);
        $smsSent =true;// $this->sendSMS($data['phone'], $newCode);
        // Gere um novo código de verificação
        if($smsSent){
        $user->phone_verification_code = $newCode;
        $user->phone_verification_code_created_at = now();
        $user->save();
     }


    // Substitua isso pela sua lógica de envio de SMS
    // $this->sendSMS($phone, $newCode);

     return response()->json(['message' => 'Verification code resent successfully.']);
}


}
