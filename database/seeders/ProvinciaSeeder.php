<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $provincias = [
            ['id' => 1, 'nome' => 'Bengo'],
            ['id' => 2, 'nome' => 'Benguela'],
            ['id' => 3, 'nome' => 'Bié'],
            ['id' => 4, 'nome' => 'Cabinda'],
            ['id' => 5, 'nome' => 'Cuando Cubango'],
            ['id' => 6, 'nome' => 'Cuanza Norte'],
            ['id' => 7, 'nome' => 'Cuanza Sul'],
            ['id' => 8, 'nome' => 'Cunene'],
            ['id' => 9, 'nome' => 'Huambo'],
            ['id' => 10, 'nome' => 'Huíla'],
            ['id' => 11, 'nome' => 'Luanda'],
            ['id' => 12, 'nome' => 'Lunda Norte'],
            ['id' => 13, 'nome' => 'Lunda Sul'],
            ['id' => 14, 'nome' => 'Malange'],
            ['id' => 15, 'nome' => 'Moxico'],
            ['id' => 16, 'nome' => 'Namibe'],
            ['id' => 17, 'nome' => 'Uíge'],
            ['id' => 18, 'nome' => 'Zaire']
        ];

        DB::table('provincias')->insert($provincias);

        // Inserindo os municípios da província de Bengo (id = 1)
        $municipios_bengo = [
            ['id' => 1, 'nome' => 'Ambriz', 'provincia_id' => 1],
            ['id' => 2, 'nome' => 'Bula Atumba', 'provincia_id' => 1],
            ['id' => 3, 'nome' => 'Dande', 'provincia_id' => 1],
            ['id' => 4, 'nome' => 'Dembos', 'provincia_id' => 1],
            ['id' => 5, 'nome' => 'Nambuangongo', 'provincia_id' => 1],
            ['id' => 6, 'nome' => 'Pango Aluquém', 'provincia_id' => 1]
        ];

        DB::table('municipios')->insert($municipios_bengo);

        // Inserindo os distritos do município de Ambriz (id = 1)
        $distritos_ambriz = [
            ['nome' => 'Bela Vista', 'municipio_id' => 1],
            ['nome' => 'Ambriz', 'municipio_id' => 1],
            ['nome' => 'Tabi', 'municipio_id' => 1],
        ];

        DB::table('distritos')->insert($distritos_ambriz);

        $distritos_Bula = [
            ['nome' => 'ula Atumba', 'municipio_id' => 2],
            ['nome' => 'Quiage', 'municipio_id' => 2],

        ];
        DB::table('distritos')->insert($distritos_Bula);


}
}
