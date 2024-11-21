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
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('distritos')->truncate();
        DB::table('municipios')->truncate();
        DB::table('provinces')->truncate();
        
        $provincias = [
            ['id' => 1, 'name' => 'Bengo'],//ja
            ['id' => 2, 'name' => 'Benguela'],//ja
            ['id' => 3, 'name' => 'Bié'],//ja
            ['id' => 4, 'name' => 'Cabinda'],//ja
            ['id' => 5, 'name' => 'Cuando Cubango'],//ja
            ['id' => 6, 'name' => 'Cuanza Norte'],//ja
            ['id' => 7, 'name' => 'Cuanza Sul'],//ja
            ['id' => 8, 'name' => 'Cunene'],//ja
            ['id' => 9, 'name' => 'Huambo'],//ja
            ['id' => 10, 'name' => 'Huíla'],//ja
            ['id' => 11, 'name' => 'Luanda'],//ja
            ['id' => 12, 'name' => 'Lunda Norte'],//ja
            ['id' => 13, 'name' => 'Lunda Sul'],//ja
            ['id' => 14, 'name' => 'Malange'],//ja
            ['id' => 15, 'name' => 'Moxico'],
            ['id' => 16, 'name' => 'Namibe'],
            ['id' => 17, 'name' => 'Uíge'],
            ['id' => 18, 'name' => 'Zaire']
        ];

        DB::table('provinces')->insert($provincias);

        // Inserindo os municípios da província de Bengo (id = 1)
        $municipios_bengo = [
            ['id' => 1, 'name' => 'Ambriz', 'provincia_id' => 1],
            ['id' => 2, 'name' => 'Bula Atumba', 'provincia_id' => 1],
            ['id' => 3, 'name' => 'Dande', 'provincia_id' => 1],
            ['id' => 4, 'name' => 'Dembos', 'provincia_id' => 1],
            ['id' => 5, 'name' => 'Nambuangongo', 'provincia_id' => 1],
            ['id' => 6, 'name' => 'Pango Aluquém', 'provincia_id' => 1]
        ];

        DB::table('municipios')->insert($municipios_bengo);

        // Inserindo os distritos do município de Ambriz (id = 1)
        $distritos_ambriz = [
            ['name' => 'Bela Vista', 'municipio_id' => 1],
            ['name' => 'Ambriz', 'municipio_id' => 1],
            ['name' => 'Tabi', 'municipio_id' => 1],
        ];

        DB::table('distritos')->insert($distritos_ambriz);

        $distritos_Bula = [
            ['name' => 'Bula Atumba', 'municipio_id' => 2],
            ['name' => 'Quiage', 'municipio_id' => 2],

        ];
        DB::table('distritos')->insert($distritos_Bula);


        $distritos_dande = [
            ['name' => 'Barra do Dande', 'municipio_id' => 3],
            ['name' => 'Caxito', 'municipio_id' => 3],
            ['name' => 'Mabubas', 'municipio_id' => 3],
            ['name' => 'Quicabo', 'municipio_id' => 3],
            ['name' => 'Úcua', 'municipio_id' => 3],

        ];
        DB::table('distritos')->insert($distritos_dande);

        $distritos_Dembos = [
            ['name' => 'Quibaxe', 'municipio_id' => 4],
            ['name' => 'Piri', 'municipio_id' => 4],
            ['name' => 'Paredes', 'municipio_id' => 4],
            ['name' => 'Coxe', 'municipio_id' => 4],
            
        ];
        DB::table('distritos')->insert($distritos_Dembos);

        $distritos_Nambuangongo = [
            ['name' => 'Quicunzo', 'municipio_id' => 5],
            ['name' => 'Muxaluando', 'municipio_id' => 5],
            ['name' => 'Quixico', 'municipio_id' => 5],
            ['name' => 'Gombe', 'municipio_id' => 5],
            ['name' => 'Cage', 'municipio_id' => 5],
            ['name' => 'Zala', 'municipio_id' => 5],
            ['name' => 'Canacassala', 'municipio_id' => 5],

        ];
        DB::table('distritos')->insert($distritos_Nambuangongo);

        $distritos_pango = [
            ['name' => 'Pango Aluquen', 'municipio_id' => 6],
            ['name' => 'Cazuangongo', 'municipio_id' => 6],
            

        ];
        DB::table('distritos')->insert($distritos_pango);

        // Inserindo os municípios da província de Benguela (id = 2)
        $municipios_benguela = [
            ['id' => 7, 'name' => 'Baia Farta', 'provincia_id' => 2],
            ['id' => 8, 'name' => 'Balombo', 'provincia_id' => 2],
            ['id' => 9, 'name' => 'Benguela', 'provincia_id' => 2],
            ['id' => 10, 'name' => 'Bocoio', 'provincia_id' => 2],
            ['id' => 11, 'name' => 'Caimbambo', 'provincia_id' => 2],
            ['id' => 12, 'name' => 'Catumbela', 'provincia_id' => 2],
            ['id' => 13, 'name' => 'Chongorai', 'provincia_id' => 2],
            ['id' => 14, 'name' => 'Cubal', 'provincia_id' =>2],
            ['id' => 15, 'name' => 'Ganda', 'provincia_id' =>2],
            ['id' => 16, 'name' => 'Lobito', 'provincia_id' =>2],
                
        ];

        DB::table('municipios')->insert($municipios_benguela);

      

        $distritos_baia = [
            ['name' => 'Dombe Grande', 'municipio_id' => 7],
            ['name' => 'Baia Farta', 'municipio_id' => 7],
            ['name' => 'Calohanga', 'municipio_id' => 7],
            ['name' => 'Equimina', 'municipio_id' => 7],


        ];
        DB::table('distritos')->insert($distritos_baia);

        $distritos_balombo = [
            ['name' => 'Balombo', 'municipio_id' => 8],
            ['name' => 'Chingongo', 'municipio_id' => 8],
            ['name' => 'Chindumbo', 'municipio_id' => 8],
            ['name' => 'Maca Mombolo', 'municipio_id' => 8],


        ];
        DB::table('distritos')->insert($distritos_balombo);

        
       

        $distritos_bocoio = [
            ['name' => 'Bocoio', 'municipio_id' => 10],
            ['name' => 'Cubal do Lumbo', 'municipio_id' => 10],
            ['name' => 'Monte Belo', 'municipio_id' => 10],
            ['name' => 'Chila', 'municipio_id' => 10],
            ['name' => 'Passe', 'municipio_id' => 10],


        ];
        DB::table('distritos')->insert($distritos_bocoio);

        

        $distritos_Caimbambo = [
            ['name' => 'caimambo', 'municipio_id' => 11],
            ['name' => 'Catengue', 'municipio_id' => 11],
            ['name' => 'Caiave', 'municipio_id' => 11],
            ['name' => 'Canhamela', 'municipio_id' => 11],
            ['name' => 'Viangombe', 'municipio_id' => 11],


        ];
        DB::table('distritos')->insert($distritos_Caimbambo);


        $distritos_Catumbela = [
            ['name' => 'Catumbela', 'municipio_id' => 12],
            ['name' => 'Praia do Bebé', 'municipio_id' => 12],
            ['name' => 'Gama', 'municipio_id' => 12],
            ['name' => 'Biópio', 'municipio_id' => 12],
           


        ];
        DB::table('distritos')->insert($distritos_Catumbela);


        $distritos_Chongorai = [
            ['name' => 'Chongorai', 'municipio_id' => 13],
            ['name' => 'Bolonguera', 'municipio_id' => 13],
            ['name' => 'Camuine', 'municipio_id' => 13],
          ];
        DB::table('distritos')->insert($distritos_Chongorai);


        $distritos_Cubal = [
            ['name' => 'Capupa', 'municipio_id' => 14],
            ['name' => 'Cubal', 'municipio_id' => 14],
            ['name' => 'Tumbulo', 'municipio_id' => 14],
            ['name' => 'Iambala', 'municipio_id' => 14],
        ];
        DB::table('distritos')->insert($distritos_Cubal);

        $distritos_ganda = [
            ['name' => 'Ganda', 'municipio_id' => 15],
            ['name' => 'Ebanga', 'municipio_id' => 15],
            ['name' => 'Chicuma', 'municipio_id' => 15],
            ['name' => 'Casseque', 'municipio_id' => 15],
            ['name' => 'Babaera', 'municipio_id' => 15],
            
        ];
        DB::table('distritos')->insert($distritos_ganda);


        $distritos_lobito = [
            ['name' => 'Egito Praia', 'municipio_id' => 16],
            ['name' => 'Lobito', 'municipio_id' => 16],
            ['name' => 'Canata', 'municipio_id' => 16],
            ['name' => 'Canjala', 'municipio_id' => 16],
        ];
        DB::table('distritos')->insert($distritos_lobito);
       

        // Inserindo os municípios da província de Bié (id = 3)
        $municipios_bie = [
            ['id' => 17, 'name' => 'Andulo', 'provincia_id' => 3],
            ['id' => 18, 'name' => 'Camacupa', 'provincia_id' => 3],
            ['id' => 19, 'name' => 'Catabola', 'provincia_id' => 3],
            ['id' => 20, 'name' => 'Chinguar', 'provincia_id' => 3],
            ['id' => 21, 'name' => 'Chitembo', 'provincia_id' => 3],
            ['id' => 22, 'name' => 'Cuemba', 'provincia_id' => 3],
            ['id' => 23, 'name' => 'Cuito', 'provincia_id' => 3],
            ['id' => 24, 'name' => 'Cunhinga', 'provincia_id' => 3],
            ['id' => 25, 'name' => 'Nharea', 'provincia_id' => 3],
            ];

        DB::table('municipios')->insert($municipios_bie);

        $distritos_andulo = [
            ['name' => 'Andulo', 'municipio_id' => 17],
            ['name' => 'Calucinga', 'municipio_id' => 17],
            ['name' => 'Cassumbe', 'municipio_id' => 17],
            ['name' => 'Chivaúlo', 'municipio_id' => 17],
        ];
        DB::table('distritos')->insert($distritos_andulo);

        $distritos_Camacupa = [
            ['name' => 'Camacupa', 'municipio_id' => 18],
            ['name' => 'Ringoma	Camacupa', 'municipio_id' => 18],
            ['name' => 'Muinha', 'municipio_id' => 18],
            ['name' => 'Umpulo', 'municipio_id' => 18],
            ['name' => 'Cuanza', 'municipio_id' => 18],
        ];
        DB::table('distritos')->insert($distritos_Camacupa);

        $distritos_Catabola = [
            ['name' => 'Catabola', 'municipio_id' => 19],
            ['name' => 'Chipeta', 'municipio_id' => 19],
            ['name' => 'Caiuera', 'municipio_id' => 19],
            ['name' => 'Chiuca', 'municipio_id' => 19],
            ['name' => 'Sande', 'municipio_id' => 19],
        ];
        DB::table('distritos')->insert($distritos_Catabola);

        $distritos_Chinguar = [
            ['name' => 'Chinguar', 'municipio_id' => 20],
            ['name' => 'Cutato', 'municipio_id' => 20],
            ['name' => 'Cangote', 'municipio_id' => 20],
        ];
        DB::table('distritos')->insert($distritos_Chinguar);

        $distritos_Chitembo = [
            ['name' => 'Chitembo', 'municipio_id' => 21],
            ['name' => 'Cachingues', 'municipio_id' => 21],
            ['name' => 'Mutumbo', 'municipio_id' => 21],
            ['name' => 'Mumbué', 'municipio_id' => 21],
            ['name' => 'Malengue', 'municipio_id' => 21],


        ];
        DB::table('distritos')->insert($distritos_Chitembo);

        $distritos_Cuemba = [
            ['name' => 'Cuemba', 'municipio_id' => 22],
            ['name' => 'Luando', 'municipio_id' => 22],
            ['name' => 'Munhango', 'municipio_id' => 22],
            ['name' => 'Sachinemuna', 'municipio_id' => 22],
           ];
        DB::table('distritos')->insert($distritos_Cuemba);

        $distritos_Cuito = [
            ['name' => 'Cuito', 'municipio_id' => 23],
            ['name' => 'Chicala', 'municipio_id' => 23],
            ['name' => 'Cunje', 'municipio_id' => 23],
            ['name' => 'Trumba', 'municipio_id' => 23],
            ['name' => 'Cambândua', 'municipio_id' => 23],
        ];
        DB::table('distritos')->insert($distritos_Cuito);

        $distritos_Cunhinga = [
            ['name' => 'Cunhinga', 'municipio_id' => 24],
            ['name' => 'Belo Horizonte', 'municipio_id' => 24],
            
        ];
        DB::table('distritos')->insert($distritos_Cunhinga);

        $distritos_Nharea = [
            ['name' => 'Nharêa', 'municipio_id' => 25],
            ['name' => 'Gamba', 'municipio_id' => 25],
            ['name' => 'Lúbia', 'municipio_id' => 25],
            ['name' => 'Caiei', 'municipio_id' => 25],
            ['name' => 'Dando', 'municipio_id' => 25],


            ];
        DB::table('distritos')->insert($distritos_Nharea);

        // Inserindo os municípios da província de Cabinda (id = 4)
        $municipios_cabinda = [
            ['id' => 26, 'name' => 'Belize', 'provincia_id' => 4],
            ['id' => 27, 'name' => 'Buco-Zau', 'provincia_id' => 4],
            ['id' => 28, 'name' => 'Cabinda', 'provincia_id' => 4],
            ['id' => 29, 'name' => 'Cacongo', 'provincia_id' => 4],
        ];
        
        DB::table('municipios')->insert($municipios_cabinda);

        $distritos_belize = [
            ['name' => 'Miconje', 'municipio_id' => 26],
            ['name' => 'Belize', 'municipio_id' => 26],
            ['name' => 'Luali', 'municipio_id' => 26],
           
        ];

        DB::table('distritos')->insert($distritos_belize);

        $distritos_BucoZau = [
            ['name' => 'Buco Zau', 'municipio_id' => 27],
            ['name' => 'Necuto', 'municipio_id' => 27],
            ['name' => 'Inhuca', 'municipio_id' => 27],
            ]; 

        DB::table('distritos')->insert($distritos_BucoZau);
        $distritos_cabinda = [
            ['name' => 'Cabinda', 'municipio_id' => 28],
            ['name' => 'Malembo', 'municipio_id' => 28],
            ['name' => 'Tando Zinze', 'municipio_id' => 28],
           
        ];

        DB::table('distritos')->insert($distritos_cabinda);

        $distritos_cacongo = [
            ['name' => 'Cacongo', 'municipio_id' => 29],
            ['name' => 'Dinge', 'municipio_id' => 29],
            ['name' => 'Massabi', 'municipio_id' => 29],
            
        ];
        DB::table('distritos')->insert($distritos_cacongo);


        // Inserindo os municípios da província de C cubango(id = 5)
        $municipios_cubango = [
            ['id' => 30, 'name' => 'Calai', 'provincia_id' => 5],
            ['id' => 31, 'name' => 'Cuangar', 'provincia_id' =>5],
            ['id' => 32, 'name' => 'Cuchi', 'provincia_id' => 5],
            ['id' => 33, 'name' => 'Cuito Cuanavale', 'provincia_id' => 5],
            ['id' => 34, 'name' => 'Dirico', 'provincia_id' => 5],
            ['id' => 35, 'name' => 'Mavinga', 'provincia_id' => 5],
            ['id' => 36, 'name' => 'Menongue', 'provincia_id' => 5],
            ['id' => 37, 'name' => 'Nancova', 'provincia_id' => 5],
            ['id' => 38, 'name' => 'Rivungo', 'provincia_id' => 5],
        ];


        DB::table('municipios')->insert($municipios_cubango);

        $distritos_Calai = [
            ['name' => 'Maué', 'municipio_id' => 30],
            ['name' => 'Calai', 'municipio_id' => 30],
            ['name' => 'Mavengue', 'municipio_id' => 30],

        ];

        DB::table('distritos')->insert($distritos_Calai);
        $distritos_Cuangar = [
            ['name' => 'Savete', 'municipio_id' => 31],
            ['name' => 'Caila', 'municipio_id' => 31],
            ['name' => 'Cuangar', 'municipio_id' => 31],

        ];

        DB::table('distritos')->insert($distritos_Cuangar);

        DB::table('distritos')->insert($distritos_Calai);
        $distritos_Cuchi = [
            ['name' => 'Cuchi', 'municipio_id' => 32],
            ['name' => 'Cutato', 'municipio_id' => 32],
            ['name' => 'Chinguanja', 'municipio_id' => 32],
            ['name' => 'Vissati', 'municipio_id' => 32],


        ];

        DB::table('distritos')->insert($distritos_Cuchi);


        DB::table('distritos')->insert($distritos_Calai);
        $distritos_Cuitocan = [
            ['name' => 'Lupire', 'municipio_id' => 33],
            ['name' => 'Cuito Cuanavale', 'municipio_id' => 33],
            ['name' => 'Longa', 'municipio_id' => 33],
            ['name' => 'Baixo Longa', 'municipio_id' => 33],

        ];

        DB::table('distritos')->insert($distritos_Cuitocan);


        DB::table('distritos')->insert($distritos_Calai);

        $distritos_Dirico = [
            ['name' => 'Dirico', 'municipio_id' => 34],
            ['name' => 'Mucusso', 'municipio_id' => 34],
            ['name' => 'Xamavera', 'municipio_id' => 34],
           ];


        DB::table('distritos')->insert($distritos_Dirico);


        $distritos_Mavinga = [
            ['name' => 'Mavinga', 'municipio_id' => 35],
            ['name' => 'Cutuile', 'municipio_id' => 35],
            ['name' => 'Cunjamba', 'municipio_id' =>35],
            ['name' => 'Luengue', 'municipio_id' => 35],
        ];


        DB::table('distritos')->insert($distritos_Mavinga);


        $distritos_Menongue = [
            ['name' => 'Menongue', 'municipio_id' => 36],
            ['name' => 'Caiundo', 'municipio_id' => 36],
            ['name' => 'Cueio', 'municipio_id' => 36],
            ['name' => 'Missombo', 'municipio_id' => 36],
        ];



        DB::table('distritos')->insert($distritos_Menongue);


        $distritos_Nancova = [
            ['name' => 'Nancova', 'municipio_id' => 37],
            ['name' => 'Rito', 'municipio_id' => 37],
            
        ];
        DB::table('distritos')->insert($distritos_Nancova);


        $distritos_Rivungo = [
            ['name' => 'Rivungo', 'municipio_id' => 38],
            ['name' => 'Xipundo', 'municipio_id' => 38],
            ['name' => 'Luiana', 'municipio_id' => 38],


        ];
        DB::table('distritos')->insert($distritos_Rivungo);

        // Inserindo os municípios da província de C Norte(id = 5)

        $municipios_c_norte = [
            ['id' => 39, 'name' => 'Banga', 'provincia_id' => 6],
            ['id' => 40, 'name' => 'Bolongongo', 'provincia_id' => 6],
            ['id' => 41, 'name' => 'Cambambe', 'provincia_id' => 6],
            ['id' => 42, 'name' => 'Cazengo', 'provincia_id' => 6],
            ['id' => 43, 'name' => 'Gulungo Alto', 'provincia_id' => 6],
            ['id' => 44, 'name' => 'Lucala', 'provincia_id' => 6],
            ['id' => 45, 'name' => 'Ngonguembo', 'provincia_id' => 6],
            ['id' => 46, 'name' => 'Quiculungo', 'provincia_id' => 6],
            ['id' => 47, 'name' => 'Ambaca', 'provincia_id' => 6],
            ['id' => 48, 'name' => 'Samba-Caju', 'provincia_id' => 6],
            
        ];

DB::table('municipios')->insert($municipios_c_norte);

        $distritos_banga = [
            ['name' => 'Banga', 'municipio_id' => 39],
            ['name' => 'Caculo Cabaça', 'municipio_id' => 39],
            ['name' => 'Aldeia Nova', 'municipio_id' => 39],
            ['name' => 'Cariamba', 'municipio_id' => 39],
            ];
            DB::table('distritos')->insert($distritos_banga);


        $distritos_Bolongongo = [
            ['name' => 'Bolongongo', 'municipio_id' => 40],
            ['name' => 'Terreiro', 'municipio_id' => 40],
            ['name' => 'Quiquiemba', 'municipio_id' => 40],
            ];
        DB::table('distritos')->insert($distritos_Bolongongo);


        $distritos_Cambambe = [
            ['name' => 'Dondo', 'municipio_id' => 41],
            ['name' => 'Massangano', 'municipio_id' => 41],
            ['name' => 'Dange ya Menha', 'municipio_id' => 41],
            ['name' => 'Zenza do Itombe', 'municipio_id' => 41],
            ['name' => 'São Pedro da Quilemba', 'municipio_id' => 41],
            
        ];
        DB::table('distritos')->insert($distritos_Cambambe);

        $distritos_Cazengo = [
            ['name' => 'Ndalatando', 'municipio_id' => 42],
            ['name' => 'Canhoca', 'municipio_id' => 42],

        ];
        DB::table('distritos')->insert($distritos_Cazengo);


        $distritos_Gulungo = [
            ['name' => 'Cambondo', 'municipio_id' => 43],
            ['name' => 'Quiluanje', 'municipio_id' => 43],
            ['name' => 'Cêrca', 'municipio_id' => 43],
        ];
        DB::table('distritos')->insert($distritos_Gulungo);


        $distritos_Lucala = [
            ['name' => 'Lucala', 'municipio_id' => 44],
            ['name' => 'Quiangombe', 'municipio_id' => 44],
           

        ];
        DB::table('distritos')->insert($distritos_Lucala);

        $distritos_Ngonguembo = [
            ['name' => 'Quilombo dos Dembos', 'municipio_id' => 45],
            ['name' => 'Camame', 'municipio_id' => 45],
            ['name' => 'Cavunga', 'municipio_id' => 45],

        ];
        DB::table('distritos')->insert($distritos_Ngonguembo);

        $distritos_Quiculungo = [
            ['name' => 'Quiculungo', 'municipio_id' => 46],
            
//

        ];
        DB::table('distritos')->insert($distritos_Quiculungo);


        $distritos_Ambaca = [
            ['name' => 'Camabatela', 'municipio_id' => 47],
            ['name' => 'Tango', 'municipio_id' => 47],
            ['name' => 'Máua', 'municipio_id' => 47],
            ['name' => 'Bindo', 'municipio_id' => 47],
            ['name' => 'Luinga', 'municipio_id' => 47],



        ];
        DB::table('distritos')->insert($distritos_Ambaca);


        $distritos_SambaCaju = [
            ['name' => 'Samba-Caju', 'municipio_id' => 48],
            ['name' => ' Samba Lucala', 'municipio_id' => 48],
            



        ];
        DB::table('distritos')->insert($distritos_SambaCaju);


        // Inserindo os municípios da província de C sul (id = 7)

        $municipios_c_sul = [
            ['id' => 49, 'name' => 'Gabela', 'provincia_id' => 7],
            ['id' => 50, 'name' => 'Cassongue', 'provincia_id' => 7],
            ['id' => 51, 'name' => 'Cela', 'provincia_id' => 7],
            ['id' => 52, 'name' => 'Conda', 'provincia_id' => 7],
            ['id' => 53, 'name' => 'Ebo', 'provincia_id' => 7],
            ['id' => 54, 'name' => 'Libolo', 'provincia_id' => 7],
            ['id' => 55, 'name' => 'Mussende', 'provincia_id' => 7],
            ['id' => 56, 'name' => 'Porto Amboín', 'provincia_id' => 7],
            ['id' => 57, 'name' => 'Quibala', 'provincia_id' => 7],
            ['id' => 58, 'name' => 'Seles', 'provincia_id' => 7],
            ['id' => 59, 'name' => 'Sumbe', 'provincia_id' => 7],
            ['id' => 60, 'name' => 'Quilenda', 'provincia_id' => 7],

           ];
            DB:: table('municipios')->insert($municipios_c_sul);

        $distritos_Gabela = [
            ['name' => 'Gabela', 'municipio_id' => 49],
            ['name' => 'Assango', 'municipio_id' => 49],
        ];
        DB::table('distritos')->insert($distritos_Gabela);

        $distritos_Cassongue = [
            ['name' => 'Cassongue', 'municipio_id' => 50],
            ['name' => 'Pambangala', 'municipio_id' => 50],
            ['name' => 'Dumbi', 'municipio_id' => 50],
            ['name' => 'Atóme', 'municipio_id' => 50],
        ];
        DB::table('distritos')->insert($distritos_Cassongue);

        $distritos_Cela = [
            ['name' => 'Sanga', 'municipio_id' => 51],
            ['name' => 'Waku Kungo', 'municipio_id' => 51],
            ['name' => 'Quissanga Cunjo', 'municipio_id' => 51]
        ];
        DB::table('distritos')->insert($distritos_Cela);

        $distritos_Conda = [
            ['name' => 'Conda', 'municipio_id' => 52],
            ['name' => 'Cunjo', 'municipio_id' => 52],
           
        ];
        DB::table('distritos')->insert($distritos_Conda);

        $distritos_ebo = [
            ['name' => 'Ebo', 'municipio_id' => 53],
            ['name' => 'Cordão', 'municipio_id' => 53],
            ['name' => 'Quissanje', 'municipio_id' => 53]
        ];
        DB::table('distritos')->insert($distritos_ebo);

        $distritos_libolo = [
            ['name' => 'Calulo', 'municipio_id' => 54],
            ['name' => 'Munenga', 'municipio_id' => 54],
            ['name' => 'Cabuta', 'municipio_id' => 54],
            ['name' => 'Quissongo', 'municipio_id' => 54]

        ];
        DB::table('distritos')->insert($distritos_libolo);

        $distritos_mussende = [
            ['name' => 'Mussende', 'municipio_id' => 55],
            ['name' => 'Quienha', 'municipio_id' => 55],
            ['name' => 'São Lucas', 'municipio_id' => 55],
            ['name' => 'Quissongo', 'municipio_id' => 55]
        ];
        DB::table('distritos')->insert($distritos_mussende);

        $distritos_Amboin = [
            ['name' => 'Capolo', 'municipio_id' => 56],
            ['name' => 'Porto Amboim', 'municipio_id' => 56],
             ];
        DB::table('distritos')->insert($distritos_Amboin);

        $distritos_Quibala = [
            ['name' => 'Quibala', 'municipio_id' => 57],
            ['name' => 'Dala Cachibo', 'municipio_id' => 57],
            ['name' => 'Cariango', 'municipio_id' => 57],
            ['name' => 'Lonhe', 'municipio_id' => 57],
            ];
        DB::table('distritos')->insert($distritos_Quibala);
       
        $distritos_Seles = [
            ['name' => 'Seles', 'municipio_id' => 58],
            ['name' => 'Amboiva', 'municipio_id' => 58],
            ['name' => 'Botera', 'municipio_id' => 58],
            ];
        DB::table('distritos')->insert($distritos_Seles);
       
        $distritos_Sumbe = [
            ['name' => 'Sumbe', 'municipio_id' => 59],
            ['name' => 'Gungo', 'municipio_id' => 59],
            ['name' => 'Gangula', 'municipio_id' => 59],
            ['name' => 'Quicombo', 'municipio_id' => 59]

        ];
        DB::table('distritos')->insert($distritos_Sumbe);

        $distritos_Quilenda = [
            ['name' => 'Quilenda', 'municipio_id' => 60],
            ['name' => 'Quirimbo', 'municipio_id' => 60],
          ];
          DB::table('distritos')->insert($distritos_Quilenda);

//cunene n 8
        $municipios_cunene= [
            ['id' => 61, 'name' => 'Cahama', 'provincia_id' => 8],
            ['id' => 62, 'name' => 'Cuanhama', 'provincia_id' => 8],
            ['id' => 63, 'name' => 'Curoca', 'provincia_id' => 8],
            ['id' => 64, 'name' => 'Cuvelai', 'provincia_id' => 8],
            ['id' => 65, 'name' => 'Namacunde', 'provincia_id' => 8],
            ['id' => 66, 'name' => 'Ombadja', 'provincia_id' => 8],
            ];
        DB::table('municipios')->insert($municipios_cunene);

        $distritos_Cahama = [
            ['name' => 'Cahama', 'municipio_id' => 61],
            ['name' => 'Otchinjau', 'municipio_id' => 61],
        ];
        DB::table('distritos')->insert($distritos_Cahama);

        $distritos_Cuanhama = [
            ['name' => 'Ondjiva', 'municipio_id' => 62],
            ['name' => 'Nehone Cafima', 'municipio_id' => 62],
            ['name' => 'Evale', 'municipio_id' => 62],
            ['name' => 'Tchompolo Oximolo', 'municipio_id' => 62],
            ['name' => 'Móngwa', 'municipio_id' => 62],

        ];
        DB::table('distritos')->insert($distritos_Cuanhama);


        $distritos_Curoca = [
            ['name' => 'Chitado', 'municipio_id' => 63],
            ['name' => 'Oncócua', 'municipio_id' => 63],
        ];
        DB::table('distritos')->insert($distritos_Curoca);


        $distritos_Cuvelai = [
            ['name' => 'Mupa', 'municipio_id' => 64],
            ['name' => 'Mukolongodjo', 'municipio_id' => 64],
            ['name' => 'Calonga', 'municipio_id' => 64],
            ['name' => 'Cubati', 'municipio_id' => 64],

        ];
        DB::table('distritos')->insert($distritos_Cuvelai);


        $distritos_Namacunde = [
            ['name' => 'Namacunde', 'municipio_id' => 65],
            ['name' => 'Chiede', 'municipio_id' => 65],
        ];
        DB::table('distritos')->insert($distritos_Namacunde);



        $distritos_Ombadja = [
            ['name' => 'Humpe', 'municipio_id' => 66],
            ['name' => 'Mucope', 'municipio_id' => 66],
            ['name' => 'Naulila', 'municipio_id' => 66],
            ['name' => 'Xangongo', 'municipio_id' => 66],
            ['name' => 'Ombala yo Mungu', 'municipio_id' => 66],

        ];
        DB::table('distritos')->insert($distritos_Ombadja);

 
        

        //Huambo 9
        $municipios_huambo= [
            ['id' => 67, 'name' => 'Bailundo', 'provincia_id' => 9],
            ['id' => 68, 'name' => 'Caála', 'provincia_id' => 9],
            ['id' => 69, 'name' => 'Cachiungo', 'provincia_id' => 9],
            ['id' => 70, 'name' => 'Chicala Choloanga', 'provincia_id' => 9],
            ['id' => 71, 'name' => 'Chinjenje', 'provincia_id' => 9],
            ['id' => 72, 'name' => 'Ecunha', 'provincia_id' => 9],
            ['id' => 73, 'name' => 'Huambo', 'provincia_id' => 9],
            ['id' => 74, 'name' => 'Londuimbali', 'provincia_id' => 9],
            ['id' => 75, 'name' => 'Longonjo', 'provincia_id' => 9],
            ['id' => 76, 'name' => 'Mungo', 'provincia_id' => 9],
            ['id' => 77, 'name' => 'Ucuma', 'provincia_id' => 9],


            ];
        DB::table('municipios')->insert($municipios_huambo);

        $distritos_Bailundo = [
            ['name' => 'Bimbe', 'municipio_id' => 67],
            ['name' => 'Bailundo', 'municipio_id' => 67],
            ['name' => 'Lunge', 'municipio_id' => 67],
            ['name' => 'Luvemba', 'municipio_id' => 67],
            ['name' => 'Hengue', 'municipio_id' => 67],

        ];
        DB::table('distritos')->insert($distritos_Bailundo);



        $distritos_caala = [
            ['name' => 'Caála', 'municipio_id' => 68],
            ['name' => 'Catata', 'municipio_id' => 68],
            ['name' => 'Calenga', 'municipio_id' => 68],
            ['name' => 'Cuima', 'municipio_id' => 68],
        ];
        DB::table('distritos')->insert($distritos_caala);


        $distritos_Cachiungo = [
            ['name' => 'Chiumbo', 'municipio_id' => 69],
            ['name' => 'Chinhama', 'municipio_id' => 69],
            ['name' => 'Cachiungo', 'municipio_id' => 69],
        ];
        DB::table('distritos')->insert($distritos_Cachiungo);

        $distritos_Chicala = [
            ['name' => 'Sambo', 'municipio_id' => 70],
            ['name' => 'Mbawe', 'municipio_id' => 70],
            ['name' => 'Chicala', 'municipio_id' => 70],
            ['name' => 'Samboto', 'municipio_id' => 70],
        ];
        DB::table('distritos')->insert($distritos_Chicala);


        $distritos_Chinjenje = [
            ['name' => 'Chinjenje', 'municipio_id' => 71],
            ['name' => 'Chiaca', 'municipio_id' => 71],
        ];
        DB::table('distritos')->insert($distritos_Chinjenje);


        $distritos_Ecunha = [
            ['name' => 'Ucuma', 'municipio_id' => 72],
            ['name' => 'Cacoma', 'municipio_id' => 72],
            ['name' => 'Mundundo', 'municipio_id' => 72],

        ];
        DB::table('distritos')->insert($distritos_Ecunha);

        $distritos_Huambo = [
            ['name' => 'Huambo', 'municipio_id' =>73],
            

        ];
        DB::table('distritos')->insert($distritos_Huambo);
	

        $distritos_Londuimbali = [
            ['name' => 'Londuimbali', 'municipio_id' => 74],
            ['name' => 'Cumbira', 'municipio_id' => 74],
            ['name' => 'Galanga', 'municipio_id' => 74],
            ['name' => 'Ussoque', 'municipio_id' => 74],
            ['name' => 'Hama', 'municipio_id' => 74],
            
        ];
        DB::table('distritos')->insert($distritos_Londuimbali);


        $distritos_Longonjo = [
            ['name' => 'Lépi', 'municipio_id' => 75],
            ['name' => 'Iava', 'municipio_id' => 75],
            ['name' => 'Chilata', 'municipio_id' => 75],
            ['name' => 'Longonjo', 'municipio_id' => 75],

        ];
        DB::table('distritos')->insert($distritos_Longonjo);


        $distritos_Mungo = [
            ['name' => 'Mungo', 'municipio_id' => 76],
            ['name' => 'Cambuengo', 'municipio_id' => 76],
        ];
        DB::table('distritos')->insert($distritos_Mungo);

        $distritos_Ucuma = [
            ['name' => 'Ucuma', 'municipio_id' => 77],
            ['name' => 'Cacoma', 'municipio_id' => 77],
            ['name' => 'Mundundo', 'municipio_id' => 77],
            ];
        DB::table('distritos')->insert($distritos_Ucuma);




        //Huíla 10
        $municipios_huila= [
            ['id' => 78, 'name' => 'Caconda', 'provincia_id' => 10],
            ['id' => 79, 'name' => 'Cacula', 'provincia_id' => 10],
            ['id' => 80, 'name' => 'Caluquembe', 'provincia_id' => 10],
            ['id' => 81, 'name' => 'Chibia', 'provincia_id' => 10],
            ['id' => 82, 'name' => 'Chicomba', 'provincia_id' => 10],
            ['id' => 83, 'name' => 'Chipindo', 'provincia_id' => 10],
            ['id' => 84, 'name' => 'Cuvango', 'provincia_id' => 10],
            ['id' => 85, 'name' => 'Gambos', 'provincia_id' => 10],
            ['id' => 86, 'name' => 'Humpata', 'provincia_id' => 10],
            ['id' => 87, 'name' => 'Jamba', 'provincia_id' => 10],
            ['id' => 88, 'name' => 'Lubango', 'provincia_id' => 10],
            ['id' => 89, 'name' => 'Matala', 'provincia_id' => 10],
            ['id' => 90, 'name' => 'Quilengues', 'provincia_id' => 10],
            ['id' => 91, 'name' => 'Quipungo', 'provincia_id' => 10],
             ];
        DB::table('municipios')->insert($municipios_huila);

        $distritos_Caconda = [
            ['name' => 'Caconda', 'municipio_id' => 78],
            ['name' => 'Gungue', 'municipio_id' => 78],
            ['name' => 'Uaba', 'municipio_id' => 78],
            ['name' => 'Cusse', 'municipio_id' => 78],
         ];
        DB::table('distritos')->insert($distritos_Caconda);

        $distritos_Cacula = [
            ['name' => 'Chituto', 'municipio_id' => 79],
            ['name' => 'Viti Vivali', 'municipio_id' => 79],
            ['name' => 'Cacula', 'municipio_id' => 79],
            ['name' => 'Tchicuaqueia', 'municipio_id' => 79],
            ];
        DB::table('distritos')->insert($distritos_Cacula);


        $distritos_Caluquembe = [
            ['name' => 'Caluquembe', 'municipio_id' => 80],
            ['name' => 'Calepi', 'municipio_id' => 80],
            ['name' => 'Ngola', 'municipio_id' => 80],
            ];
        DB::table('distritos')->insert($distritos_Caluquembe);

        $distritos_Chibia = [
            ['name' => 'Chibia', 'municipio_id' => 81],
            ['name' => 'Jau', 'municipio_id' => 81],
            ['name' => 'Capunda Cavilongo', 'municipio_id' => 81],
            ['name' => 'Quihita', 'municipio_id' => 81],


        ];
        DB::table('distritos')->insert($distritos_Chibia);

        $distritos_Chicomba = [
            ['name' => 'Chicomba', 'municipio_id' => 82],
            ['name' => 'Cutenda', 'municipio_id' => 82],
            ];
        DB::table('distritos')->insert($distritos_Chicomba);

        $distritos_Chipindo = [
            ['name' => 'Bambi', 'municipio_id' => 83],
            ['name' => 'Chipindo', 'municipio_id' => 83],
        
 
        ];
        DB::table('distritos')->insert($distritos_Chipindo);

        $distritos_Cuvango = [
            ['name' => 'Cuvango', 'municipio_id' => 84],
            ['name' => 'Galangue', 'municipio_id' => 84],
            ['name' => 'Vicungo', 'municipio_id' => 84],
        ];
        DB::table('distritos')->insert($distritos_Cuvango);

        $distritos_Gambos = [
            ['name' => 'Chimbemba', 'municipio_id' => 85],
            ['name' => 'Chiange', 'municipio_id' => 85],
        ];
        DB::table('distritos')->insert($distritos_Gambos);

        $distritos_Humpata = [
            ['name' => 'Humpata', 'municipio_id' => 86],
            
        ];
        DB::table('distritos')->insert($distritos_Humpata);

        $distritos_Jamba = [
            ['name' => 'Dongo', 'municipio_id' => 87],
            ['name' => 'Cassinga', 'municipio_id' => 87],
            ['name' => 'Jamba', 'municipio_id' => 87],

           
        ];
        DB::table('distritos')->insert($distritos_Jamba);


        $distritos_Lubango = [
            ['name' => 'Lubango', 'municipio_id' =>88],
            ['name' => 'Hoque', 'municipio_id' => 88],
            ['name' => 'Arimba', 'municipio_id' => 88],
            ['name' => 'Huila', 'municipio_id' =>88],

            
        ];
        DB::table('distritos')->insert($distritos_Lubango);

        $distritos_Matala = [
            ['name' => 'Capelongo', 'municipio_id' => 89],
            ['name' => 'Matala', 'municipio_id' => 89],
            ['name' => 'Mulondo', 'municipio_id' => 89],
        ];
        DB::table('distritos')->insert($distritos_Matala);
        $distritos_Quilengues = [
            ['name' => 'Quilengues', 'municipio_id' => 90],
            ['name' => 'Impulo', 'municipio_id' => 90],
            ['name' => 'Dinde', 'municipio_id' => 90],


        ];
        DB::table('distritos')->insert($distritos_Quilengues);
        $distritos_Quipungo = [
            ['name' => 'Quipungo', 'municipio_id' => 91],

        ];
        DB::table('distritos')->insert($distritos_Quipungo);


        //Luanda 11
        $municipios_luanda = [
            ['id' => 92, 'name' => 'Belas', 'provincia_id' => 11],
            ['id' => 93, 'name' => 'Cacuaco', 'provincia_id' => 11],
            ['id' => 94, 'name' => 'Cazenga', 'provincia_id' => 11],
            ['id' => 95, 'name' => 'Icolo e Bengo', 'provincia_id' => 11],
            ['id' => 96, 'name' => 'Kilamba Kiaxi', 'provincia_id' => 11],
            ['id' => 97, 'name' => 'Luanda', 'provincia_id' => 11],
            ['id' => 98, 'name' => 'Quiçama', 'provincia_id' => 11],
            ['id' => 99,'name' => 'Talatona', 'provincia_id' => 11],
            ['id' => 100, 'name' => 'Viana', 'provincia_id' => 11],
           
            
        ];
        DB::table('municipios')->insert($municipios_luanda);

        $distritos_belas = [
            ['name' => 'Quenguela', 'municipio_id' => 92],
            ['name' => 'Morro dos Veados', 'municipio_id' => 92],
            ['name' => 'Ramiros', 'municipio_id' => 92],
            ['name' => 'Vila Verde', 'municipio_id' => 92],
            ['name' => 'Cabolombo', 'municipio_id' => 92],
            ['name' => 'Kilamba', 'municipio_id' => 92],
            ['name' => 'Camama', 'municipio_id' => 92],
            ['name' => 'Benfica', 'municipio_id' => 92],
            ['name' => 'Vila Estoril', 'municipio_id' => 92],
            ['name' => 'Ilha do Mussulo', 'municipio_id' => 92],
            ['name' => 'Barra do Kwanza', 'municipio_id' => 92],
            ['name' => 'Futungo de Belas', 'municipio_id' => 92],
            ['name' => 'Soba Cabaça', 'municipio_id' => 92],

        ];
        DB::table('distritos')->insert($distritos_belas);

        $distritos_cacuaco = [
            ['name' => 'Cacuaco', 'municipio_id' => 93],
            ['name' => 'Quicolo', 'municipio_id' => 93],
            ['name' => 'Funda', 'municipio_id' => 93],
            ['name' => 'Mulenvos de Baixo', 'municipio_id' => 93],
            ['name' => 'Sequele', 'municipio_id' => 93],
        ];
        DB::table('distritos')->insert($distritos_cacuaco);

        $distritos_Cazenga = [
            ['name' => 'Cazenga', 'municipio_id' => 94],
            ['name' => 'Hoji ya Henda', 'municipio_id' => 94],
            ['name' => '11 de Novembro', 'municipio_id' => 94],
            ['name' => 'Kima Kieza', 'municipio_id' => 94],
            ['name' => 'Tala Hadi', 'municipio_id' => 94],
            ['name' => 'Ngola Kiluange', 'municipio_id' => 94],
            ['name' => 'Skwanzas', 'municipio_id' => 94],
            ['name' => 'Petrangol', 'municipio_id' => 94],
            ['name' => 'Nocal', 'municipio_id' => 94],
            ['name' => 'Bairro dos Ossos', 'municipio_id' => 94],
            ['name' => 'Sopão', 'municipio_id' => 94],

        ];
        DB::table('distritos')->insert($distritos_Cazenga);


        $distritos_Icolo = [
            ['name' => 'Cassoneca', 'municipio_id' => 95],
            ['name' => 'Cabiri', 'municipio_id' => 95],
            ['name' => 'Bom Jesus', 'municipio_id' => 95],
            ['name' => 'Caculo Cahango', 'municipio_id' => 95],
            ['name' => 'Quiminha', 'municipio_id' => 95],
            ['name' => 'Catete', 'municipio_id' => 95],
            ['name' => 'Bela Vista', 'municipio_id' => 95],
           

        ];
        DB::table('distritos')->insert($distritos_Icolo);
        //Golfe	SapÃº	Palanca	Nova Vida

        $distritos_k_Kiaxi = [
            ['name' => 'Golf 1', 'municipio_id' => 96],
            ['name' => 'Golf 2', 'municipio_id' => 96],
            ['name' => 'Kimbango', 'municipio_id' => 96],
            ['name' => 'Palanca', 'municipio_id' => 96],
            ['name' => 'Nova Vida', 'municipio_id' => 96],
            ['name' => 'Quintalão do Petro', 'municipio_id' => 96],
            ['name' => 'Divina', 'municipio_id' => 96],
            ['name' => 'Avo Kumbi', 'municipio_id' => 96],

        ];
        DB::table('distritos')->insert($distritos_k_Kiaxi);

        $distritos_Luanda = [
            ['name' => 'Sambizanga', 'municipio_id' => 97],
            ['name' => 'Rangel', 'municipio_id' => 97],
            ['name' => 'Maianga', 'municipio_id' =>97],
            ['name' => 'Ingombota', 'municipio_id' => 97],
            ['name' => 'Samba', 'municipio_id' => 97],
            ['name' => 'Neves Bendinha', 'municipio_id' => 97],
            ['name' => 'Ngola Kiluanje', 'municipio_id' => 97],
            ['name' => 'Terra nova', 'municipio_id' => 97],
            ['name' => 'Dona Amalha', 'municipio_id' => 97],
            ['name' => 'Jumbo', 'municipio_id' => 97],
            ['name' => 'Escongolenses', 'municipio_id' => 97],

        ];
        DB::table('distritos')->insert($distritos_Luanda);

        $distritos_Quicama = [
            ['name' => 'Muxima', 'municipio_id' => 98],
            ['name' => 'Demba Chio', 'municipio_id' => 98],
            ['name' => 'Quixinge', 'municipio_id' => 98],
            ['name' => 'Mumbondo', 'municipio_id' => 98],
            ['name' => 'Caboledo', 'municipio_id' => 99],
 //
           
             ];
        DB::table('distritos')->insert($distritos_Quicama);

        $distritos_talatona = [
            ['name' => 'Benfica', 'municipio_id' => 99],
            ['name' => 'Futungo de Belas', 'municipio_id' => 99],
            ['name' => 'Lar do Patriota', 'municipio_id' => 99],
            ['name' => 'Talatona', 'municipio_id' => 99],
            ['name' => 'Camama', 'municipio_id' => 99],
            ['name' => 'Cidade Universitária', 'municipio_id' => 99],
            


        ];
        DB::table('distritos')->insert($distritos_talatona);


        $distritos_Viana = [
            ['name' => 'Viana', 'municipio_id' => 99],
            ['name' => 'Estalagem', 'municipio_id' => 99],
            ['name' => 'Kikuxi', 'municipio_id' => 99],
            ['name' => 'Baí­a', 'municipio_id' => 99],
            ['name' => 'Zango', 'municipio_id' => 99],
            ['name' => 'Vila Flor', 'municipio_id' => 99],
            ['name' => 'Ponte Partida', 'municipio_id' => 99],
            ['name' => 'Moagem', 'municipio_id' => 99],
            ['name' => 'KM 30', 'municipio_id' => 99],
            ['name' => 'Ponte do 25', 'municipio_id' => 99],
                 

        ];
        DB::table('distritos')->insert($distritos_Viana);


        //Lunda norte 12
        $municipios_lundaN = [
            ['id' => 101, 'name' => 'Cambulo', 'provincia_id' => 12],
            ['id' => 102, 'name' => 'Capenda Camulemba', 'provincia_id' => 12],
            ['id' => 103, 'name' => 'Caungula', 'provincia_id' => 12],
            ['id' => 104, 'name' => 'Chitato', 'provincia_id' => 12],
            ['id' => 105, 'name' => 'Cuango', 'provincia_id' => 12],
            ['id' => 106, 'name' => 'Cuilo', 'provincia_id' => 12],
            ['id' => 107, 'name' => 'Lubalu', 'provincia_id' => 12],
            ['id' => 108, 'name' => 'Lucapa', 'provincia_id' => 12],
            ['id' => 109, 'name' => 'Xá-Muteba', 'provincia_id' => 12],
            ];
        DB::table('municipios')->insert($municipios_lundaN);

        $distritos_Calumbo = [
            ['name' => 'Luia', 'municipio_id' => 101],
            ['name' => 'Cachimo', 'municipio_id' => 101],
            ['name' => 'Canzar', 'municipio_id' => 101],
            ['name' => 'Cambulo', 'municipio_id' => 101],
             ];
        DB::table('distritos')->insert($distritos_Calumbo);


        $distritos_Capenda = [
            ['name' => 'Capenda Camulemba', 'municipio_id' => 102],
            ['name' => 'Xinge', 'municipio_id' => 102],
            
        ];
        DB::table('distritos')->insert($distritos_Capenda);

        $distritos_Caungula = [
            ['name' => 'Caungula', 'municipio_id' => 103],
            ['name' => 'Camaxili', 'municipio_id' => 103],

        ];
        DB::table('distritos')->insert($distritos_Caungula);
        $distritos_Chitato = [
            ['name' => 'Chitato', 'municipio_id' => 104],
            ['name' => 'Luachimo', 'municipio_id' => 104],
            ['name' => 'Chitato', 'municipio_id' => 104],
            ['name' => 'Dundo', 'municipio_id' => 104],
            ['name' => 'Mussungue', 'municipio_id' => 104],
            
        ];
        DB::table('distritos')->insert($distritos_Chitato);


       


        $distritos_Cuango = [
            ['name' => 'Cuango', 'municipio_id' => 105],
            ['name' => 'Luremo', 'municipio_id' => 105],
        ];
        DB::table('distritos')->insert($distritos_Cuango);

        $distritos_Cuilo = [
            ['name' => 'Cuilo', 'municipio_id' => 106],
            ['name' => 'Caluango', 'municipio_id' => 106],
        ];
        DB::table('distritos')->insert($distritos_Cuilo);

        $distritos_lubalu = [
            ['name' => 'Lubalu', 'municipio_id' => 107],
            ['name' => 'Luangue', 'municipio_id' => 107],
            ['name' => 'Muvuluege', 'municipio_id' => 107],

        ];
        DB::table('distritos')->insert($distritos_lubalu);

        $distritos_lucapa = [
            ['name' => 'Lucapa', 'municipio_id' => 108],
            ['name' => 'Capaia', 'municipio_id' => 108],
            ['name' => 'Camissombo', 'municipio_id' => 108],
            ['name' => 'Xá Cassau', 'municipio_id' => 108],

        ];
        DB::table('distritos')->insert($distritos_lucapa);
        $distritos_muteba = [
            ['name' => 'Muteba', 'municipio_id' => 109],
            ['name' => 'Iongo', 'municipio_id' => 109],
            ['name' => 'Cassanje Calucala', 'municipio_id' => 109],
            

        ];
        DB::table('distritos')->insert($distritos_muteba);



        //Lunda Sul 13
        $municipios_lundaS = [
            ['id' => 110, 'name' => 'Cacolo', 'provincia_id' => 13],
            ['id' => 111, 'name' => 'Dala', 'provincia_id' => 13],
            ['id' => 112, 'name' => 'Muconda', 'provincia_id' => 13],
            ['id' => 113, 'name' => 'Saurimo', 'provincia_id' => 13],
           
        ];
        DB::table('municipios')->insert($municipios_lundaS);

        $distritos_Cacolo = [
            ['name' => 'Xassengue', 'municipio_id' => 110],
            ['name' => 'Cucumbi', 'municipio_id' => 110],
            ['name' => 'Alto Chicapa', 'municipio_id' => 110],
            ['name' => 'Cacolo', 'municipio_id' => 110],
        ];
        DB::table('distritos')->insert($distritos_Cacolo);


        $distritos_Dala = [
            ['name' => 'Dala', 'municipio_id' => 111],
            ['name' => 'Luma Cassai', 'municipio_id' => 111],
            ['name' => 'Cazage', 'municipio_id' => 111],
           
        ];
        DB::table('distritos')->insert($distritos_Dala);

        $distritos_Muconda = [
            ['name' => 'Muconda', 'municipio_id' => 112],
            ['name' => 'Chiluage', 'municipio_id' => 112],
            ['name' => 'Cassai', 'municipio_id' => 112],
            ['name' => 'Muriege', 'municipio_id' => 112],
        ];
       

        DB::table('distritos')->insert($distritos_Muconda);


        $distritos_Saurimo = [
            ['name' => 'Saurimo', 'municipio_id' => 113],
            ['name' => 'Mona Quimbundo', 'municipio_id' => 113],
            ['name' => 'Sombo', 'municipio_id' => 113],
           
        ];
        DB::table('distritos')->insert($distritos_Saurimo);

       // malange 14
        $municipios_Malange = [
            ['id' => 114, 'name' => 'Cacuso', 'provincia_id' => 14],
            ['id' => 115, 'name' => 'Cahombo', 'provincia_id' => 14],
            ['id' => 116, 'name' => 'Calandula', 'provincia_id' => 14],
            ['id' => 117, 'name' => 'Cambundi Catembo', 'provincia_id' => 14],
            ['id' => 118, 'name' => 'Kunda dya Baze', 'provincia_id' => 14],
            ['id' => 119, 'name' => 'Luquembo', 'provincia_id' => 14],
            ['id' => 120, 'name' => 'Malanje', 'provincia_id' => 14],
            ['id' => 121, 'name' => 'Marimba', 'provincia_id' => 14],
            ['id' => 122, 'name' => 'Massango', 'provincia_id' => 14],
            ['id' => 123, 'name' => 'Mucari', 'provincia_id' => 14],
            ['id' => 124, 'name' => 'Quela', 'provincia_id' => 14],
            ['id' => 125, 'name' => 'Quirima', 'provincia_id' => 14],
            ['id' => 126, 'name' => 'Cangandala', 'provincia_id' => 14],
            ['id' => 127, 'name' => 'Kiwaba Nzoji', 'provincia_id' => 14],
 
        ];
        DB::table('municipios')->insert($municipios_Malange);

        $distritos_Cacuso = [
            
            ['name' => 'Lombe', 'municipio_id' => 114],
            ['name' => 'Quizenga', 'municipio_id' => 114],
            ['name' => 'Pungu a Ndongo', 'municipio_id' => 114],
            ['name' => 'Cacuso', 'municipio_id' => 114],
  
          
        ];
        DB::table('distritos')->insert($distritos_Cacuso);

        $distritos_Cahombo = [
            ['name' => 'Mbanji ya Ngola', 'municipio_id' => 115],
            ['name' => 'Cahombo', 'municipio_id' => 115],
            ['name' => 'Cambo Suinginge', 'municipio_id' => 115],
            ['name' => 'Micanda', 'municipio_id' => 115],


        ];
        DB::table('distritos')->insert($distritos_Cahombo);

        $distritos_Cambundi = [
            ['name' => 'Cambundi Catembo', 'municipio_id' => 117],
            ['name' => 'Talamungongo', 'municipio_id' => 117],

            ['name' => 'Quitapa', 'municipio_id' => 117],
            ['name' => 'Dumba Cambango', 'municipio_id' => 117],

        ];
        DB::table('distritos')->insert($distritos_Cambundi);

        $distritos_Kunda = [
            ['name' => 'Kunda dya Baze', 'municipio_id' => 118],
            ['name' => 'Milando', 'municipio_id' => 118],
            ['name' => 'Lemba', 'municipio_id' => 118],
            ];
        DB::table('distritos')->insert($distritos_Kunda);


        $distritos_Luquembo= [
            ['name' => 'Luquembo', 'municipio_id' => 119],
            ['name' => 'Quimbango', 'municipio_id' => 119],
            ['name' => 'Capunda', 'municipio_id' => 119],
            ['name' => 'Dombo wa Zanga', 'municipio_id' => 119],
            ['name' => 'Luquembo', 'municipio_id' => 119],
            ['name' => 'Cunga Palanga', 'municipio_id' => 119],
            ['name' => 'Rimba', 'municipio_id' => 119],


        ];
        DB::table('distritos')->insert($distritos_Luquembo);


        $distritos_Malanje = [
            ['name' => 'Malanje', 'municipio_id' => 120],
            ['name' => 'Ngola Luiji', 'municipio_id' => 120],
            ['name' => 'Cambaxe', 'municipio_id' => 120],


        ];
        DB::table('distritos')->insert($distritos_Malanje);


        $distritos_Marimba = [
            ['name' => 'Luquembo', 'municipio_id' => 121],

        ];
        DB::table('distritos')->insert($distritos_Marimba);


        $distritos_Massango = [
            ['name' => 'Marimba', 'municipio_id' => 122],
            ['name' => 'Cabombo', 'municipio_id' => 122],
            ['name' => 'Tembo Aluma', 'municipio_id' => 122],


        ];
        DB::table('distritos')->insert($distritos_Massango);

        $distritos_Mucari = [
            ['name' => 'Catala', 'municipio_id' => 123],
            ['name' => 'Caculama', 'municipio_id' => 123],
            ['name' => 'Caxinga', 'municipio_id' => 123],
            ['name' => 'Muquixe', 'municipio_id' => 123],


        ];
        DB::table('distritos')->insert($distritos_Mucari);


        $distritos_Quela = [
            ['name' => 'Xandele', 'municipio_id' => 124],
            ['name' => 'Moma', 'municipio_id' => 124],
            ['name' => 'Bângalas', 'municipio_id' => 124],


        ];
        DB::table('distritos')->insert($distritos_Quela);


        $distritos_Quirima = [
            ['name' => 'Mucari', 'municipio_id' => 125],
            ['name' => 'Sautar', 'municipio_id' => 125],

        ];
        DB::table('distritos')->insert($distritos_Quirima);



        $distritos_cangandala = [
            ['name' => 'Cangandala', 'municipio_id' => 126],
            ['name' => 'Bembo', 'municipio_id' => 126],
            ['name' => 'Culamagia', 'municipio_id' => 126],
            ['name' => 'Caribo', 'municipio_id' => 126],

        ];
        DB::table('distritos')->insert($distritos_cangandala);


        $distritos_Kiwaba = [
            ['name' => 'Kiwaba Nzoji', 'municipio_id' => 127],
            ['name' => 'SauMufuma', 'municipio_id' => 127],
                ];
        DB::table('distritos')->insert($distritos_Kiwaba);


        // Municípios de Moxico
        $municipios_Moxico = [
            ['id' => 128, 'name' => 'Alto Zambeze', 'provincia_id' => 15],
            ['id' => 129, 'name' => 'Bundas', 'provincia_id' => 15],
            ['id' => 130, 'name' => 'Camanongue', 'provincia_id' => 15],
            ['id' => 131, 'name' => 'Cameia', 'provincia_id' => 15],
            ['id' => 132, 'name' => 'Léua', 'provincia_id' => 15],
            ['id' => 133, 'name' => 'Luacano', 'provincia_id' => 15],
            ['id' => 134, 'name' => 'Luau', 'provincia_id' => 15],
            ['id' => 135, 'name' => 'Luchazes', 'provincia_id' => 15],
            ['id' => 136, 'name' => 'Moxico', 'provincia_id' => 15],
        ];

        // Municípios de Namibe
        $municipios_Namibe = [
            ['id' => 137, 'name' => 'Bibala', 'provincia_id' => 16],
            ['id' => 138, 'name' => 'Camucuio', 'provincia_id' => 16],
            ['id' => 139, 'name' => 'Moçâmedes', 'provincia_id' => 16],
            ['id' => 140, 'name' => 'Tômbwa', 'provincia_id' => 16],
            ['id' => 141, 'name' => 'Virei', 'provincia_id' => 16],
        ];

        // Municípios de Uíge
        $municipios_Uige = [
            ['id' => 142, 'name' => 'Alto Cauale', 'provincia_id' => 17],
            ['id' => 143, 'name' => 'Ambuíla', 'provincia_id' => 17],
            ['id' => 144, 'name' => 'Bembe', 'provincia_id' => 17],
            ['id' => 145, 'name' => 'Buengas', 'provincia_id' => 17],
            ['id' => 146, 'name' => 'Bungo', 'provincia_id' => 17],
            ['id' => 147, 'name' => 'Damba', 'provincia_id' => 17],
            ['id' => 148, 'name' => 'Maquela do Zombo', 'provincia_id' => 17],
            ['id' => 149, 'name' => 'Milunga', 'provincia_id' => 17],
            ['id' => 150, 'name' => 'Mucaba', 'provincia_id' => 17],
            ['id' => 151, 'name' => 'Negage', 'provincia_id' => 17],
            ['id' => 152, 'name' => 'Púri', 'provincia_id' => 17],
            ['id' => 153, 'name' => 'Quimbele', 'provincia_id' => 17],
            ['id' => 154, 'name' => 'Sanza Pombo', 'provincia_id' => 17],
            ['id' => 155, 'name' => 'Songo', 'provincia_id' => 17],
            ['id' => 156, 'name' => 'Uíge', 'provincia_id' => 17],
        ];

        // Municípios de Zaire
        $municipios_Zaire = [
            ['id' => 157, 'name' => 'Cuimba', 'provincia_id' => 18],
            ['id' => 158, 'name' => 'Mbanza Congo', 'provincia_id' => 18],
            ['id' => 159, 'name' => 'Nóqui', 'provincia_id' => 18],
            ['id' => 160, 'name' => 'Nzeto', 'provincia_id' => 18],
            ['id' => 161, 'name' => 'Soyo', 'provincia_id' => 18],
            ['id' => 162, 'name' => 'Tomboco', 'provincia_id' => 18],
        ];

        DB::table('municipios')->insert(array_merge($municipios_Moxico, $municipios_Namibe, $municipios_Uige, $municipios_Zaire));

        // Distritos do município Alto Zambeze (ID 128)
        $distritos_Alto_Zambeze = [
            ['name' => 'Nana Candundo', 'municipio_id' => 128],
            ['name' => 'Lumbala Caquengue', 'municipio_id' => 128],
            ['name' => 'Cazombo', 'municipio_id' => 128],
            ['name' => 'Macondo', 'municipio_id' => 128],
            ['name' => 'Caianda', 'municipio_id' => 128],
            ['name' => 'Calunda', 'municipio_id' => 128],
            ['name' => 'Lóvua', 'municipio_id' => 128],
        ];


        // Distritos do município Bundas (ID 129)
        $distritos_Bundas = [
            ['name' => 'Lutembo', 'municipio_id' => 129],
            ['name' => 'Chiume', 'municipio_id' => 129],
            ['name' => 'Lumbala Nguimbo', 'municipio_id' => 129],
            ['name' => 'Luvuei', 'municipio_id' => 129],
            ['name' => 'Ninda', 'municipio_id' => 129],
            ['name' => 'Mussuma', 'municipio_id' => 129],
            ['name' => 'Sessa', 'municipio_id' => 129],
        ];

        // Distritos do município Camanongue (ID 130)
        $distritos_Camanongue = [
            ['name' => 'Camanongue', 'municipio_id' => 130],
        ];

        // Distritos do município Cameia (ID 131)
        $distritos_Cameia = [
            ['name' => 'Cameia', 'municipio_id' => 131],
           
        ];

        // Distritos do município Léua (ID 132)
        $distritos_Leua = [
            ['name' => 'Léua', 'municipio_id' => 132],
            ['name' => 'Liangongo', 'municipio_id' => 132],
        ];

        // Distritos do município Luacano (ID 133)
        $distritos_Luacano = [
            ['name' => 'Luacano', 'municipio_id' => 133],
            ['name' => 'Lago Dilolo', 'municipio_id' => 133],
        ];

        // Distritos do município Luau (ID 134)
        $distritos_Luau = [
            ['name' => 'Luau', 'municipio_id' => 134],
        ];

        // Distritos do município Luchazes (ID 135)
        $distritos_Luchazes = [
            ['name' => 'Cancombe', 'municipio_id' => 135],
            ['name' => 'Cassamba', 'municipio_id' => 135],
            ['name' => 'Tempué', 'municipio_id' => 135],
            ['name' => 'Cangamba', 'municipio_id' => 135], 
            ['name' => 'Muié', 'municipio_id' => 135],
        ];

        // Distritos do município Moxico (ID 136)
        $distritos_Moxico = [
            ['name' => 'Luena', 'municipio_id' => 136],
            ['name' => 'Lucusse', 'municipio_id' => 136],
            ['name' => 'Cachipoque', 'municipio_id' => 136],
            ['name' => 'Muangai', 'municipio_id' => 136],
        ];
        // Distritos do município Bibala (ID 137)
        $distritos_Bibala = [
            ['name' => 'Bibala', 'municipio_id' => 137],
            ['name' => 'Caitou', 'municipio_id' => 137],
            ['name' => 'Capangongombe', 'municipio_id' => 137],
            ['name' => 'Lola', 'municipio_id' => 137],
        ];

        // Distritos do município Camucuio (ID 138)
        $distritos_Camucuio = [
            ['name' => 'Camucuio', 'municipio_id' => 138],
            ['name' => 'Mamué', 'municipio_id' => 138],
            ['name' => 'Chingo', 'municipio_id' => 138],
        ];

        // Distritos do município Moçâmedes (ID 139)
        $distritos_Mocamedes = [
            ['name' => 'Moçâmedes', 'municipio_id' => 139],
            ['name' => 'Lucira', 'municipio_id' => 139],
            ['name' => 'Forte Santa Rita', 'municipio_id' => 139],
            ['name' => 'Bentiaba', 'municipio_id' => 139],
        ];

        // Distritos do município Tômbwa (ID 140)
        $distritos_Tombwa = [
            ['name' => 'Tômbwa', 'municipio_id' => 140],
             ['name' => 'Baia dos Tigres', 'municipio_id' => 140],
            ['name' => 'Iona', 'municipio_id' => 140],
        ];

        // Distritos do município Virei (ID 141)
        $distritos_Virei = [
            ['name' => 'Virei', 'municipio_id' => 141],
            ['name' => 'Cainde', 'municipio_id' => 141],
        ];

        // Distritos do município Alto Cauale (ID 142)
        $distritos_Alto_Cauale = [
            ['name' => 'Cangola', 'municipio_id' => 142],
             ['name' => 'Bengo', 'municipio_id' => 142],
              ['name' => 'Caiongo', 'municipio_id' => 142],
        ];

        // Distritos do município Ambuíla (ID 143)
        $distritos_Ambuila = [
            ['name' => 'Nova Ambuíla', 'municipio_id' => 143],
            ['name' => 'Quipedro', 'municipio_id' => 143],
        ];

        // Distritos do município Bembe (ID 144)
        $distritos_Bembe = [
            ['name' => 'Bembe', 'municipio_id' => 144],
             ['name' => 'Lucunga', 'municipio_id' => 144],
            ['name' => 'Mabaia', 'municipio_id' => 144],
        ];

        // Distritos do município Buengas (ID 145)
        $distritos_Buengas = [
            ['name' => 'Buenga Sul', 'municipio_id' => 145],
            ['name' => 'Nova Esperança', 'municipio_id' => 145],
            ['name' => 'Cuilo Camboso', 'municipio_id' => 145],
        ];


        // Distritos do município Bungo (ID 146)
        $distritos_Bungo = [
            ['name' => 'Bungo', 'municipio_id' => 146],
        ];

        // Distritos do município Damba (ID 147)
        $distritos_Damba = [
            ['name' => 'Damba', 'municipio_id' => 147],
            ['name' => 'Camatambo', 'municipio_id' => 147],
            ['name' => 'Nsosso', 'municipio_id' => 147],
            ['name' => 'Lêmboa', 'municipio_id' => 147],
            ['name' => 'Petecusso', 'municipio_id' => 147],
           
        ];

        $distritos_Maquela = [
            ['name' => 'Maquela do Zombo', 'municipio_id' => 148],
            ['name' => 'Quibocolo', 'municipio_id' => 148],
            ['name' => 'Béu', 'municipio_id' => 148],
            ['name' => 'Sacandica', 'municipio_id' => 148],
            ['name' => 'Cuilo Futa', 'municipio_id' => 148],

        ];

         $distritos_Milunga = [
            ['name' => 'Macocola', 'municipio_id' => 149],
            ['name' => 'Macolo', 'municipio_id' => 149],
            ['name' => 'Massau', 'municipio_id' => 149],
            ['name' => 'Milunga', 'municipio_id' => 149],
            

        ];

        $distritos_Mucaba = [
            ['name' => 'Mucaba', 'municipio_id' => 150],
            ['name' => 'Uando Mucaba', 'municipio_id' => 150],
          ];


        $distritos_negage = [
            ['name' => 'Negage', 'municipio_id' => 151],
            ['name' => 'Dimuca', 'municipio_id' => 151],
            ['name' => 'Quisseque', 'municipio_id' => 151],

        ];

        $distritos_puri = [
            ['name' => 'puri', 'municipio_id' => 152],
            

        ];
        $distritos_Quimbele = [
            ['name' => 'Cuango', 'municipio_id' => 153],
            ['name' => 'Icoca', 'municipio_id' => 153],
            ['name' => 'Quimbele', 'municipio_id' => 153],
            ['name' => 'Alto Zaza', 'municipio_id' => 153],

        ];

        $distritos_sanza = [
            ['name' => 'Sanza Pombo', 'municipio_id' => 154],
            ['name' => 'Cuilo Pombo', 'municipio_id' => 154],
            ['name' => 'Uamba', 'municipio_id' => 154],
            ['name' => 'Alfândega', 'municipio_id' => 154],
            

        ];

        $distritos_songo = [
            ['name' => 'Songo', 'municipio_id' => 155],
            ['name' => 'Quivuenga', 'municipio_id' => 155],
             ];

        $distritos_uige= [
            ['name' => 'Uige', 'municipio_id' => 156],
           ];

        //Zaire
        $distritos_Cuimba = [
            ['name' => 'Cuimba', 'municipio_id' => 157],
            ['name' => 'Buela', 'municipio_id' => 157],
            ['name' => 'Serra da Canda', 'municipio_id' => 157],
            ['name' => 'Luvaca', 'municipio_id' => 157],

        ];

        $distritos_Mbanza = [
            ['name' => 'Mbanza Kongo', 'municipio_id' => 158],
            ['name' => 'Luvo', 'municipio_id' => 158],
            ['name' => 'Caluca', 'municipio_id' => 158],
            ['name' => 'Madimba', 'municipio_id' => 158],
            ['name' => 'Quiende', 'municipio_id' => 158],
            ['name' => 'Calambata', 'municipio_id' => 158],

        ];

        $distritos_Noqui = [
            ['name' => 'Nóqui', 'municipio_id' => 159],
            ['name' => 'Lufico', 'municipio_id' => 159],
            ['name' => 'Mpala', 'municipio_id' => 159],
            

        ];

        $distritos_Nzeto = [
            ['name' => 'Nzeto', 'municipio_id' => 160],
            ['name' => 'Quindeje', 'municipio_id' => 160],
            ['name' => 'Musserra', 'municipio_id' => 160],
            ['name' => 'Quibala', 'municipio_id' => 160],
            ['name' => 'Norte', 'municipio_id' => 160],
        ];

        $distritos_Soyo= [
            ['name' => 'Soyo', 'municipio_id' => 161],
            ['name' => 'Sumba', 'municipio_id' => 161],
            ['name' => 'Pedra de Feitiço', 'municipio_id' => 161],
            ['name' => 'Quêlo', 'municipio_id' => 161],
            ['name' => 'Mangue Grande', 'municipio_id' => 161],
        ];
        $distritos_Tomboco= [
            ['name' => 'Tomboco', 'municipio_id' => 162],
            ['name' => 'Quinzau', 'municipio_id' => 162],
            ['name' => 'Quinsimba', 'municipio_id' => 162],
            
        ];

        $municipios_Uige= [
            ['id' => 163, 'name' => 'Alto Cauale', 'provincia_id' => 17],
            ];

        $distritos_Quitexe = [
            ['name' => 'Quitexe', 'municipio_id' => 163],
            ['name' => 'Aldeia', 'municipio_id' => 163],
            ['name' => 'Viçosa', 'municipio_id' => 163],
            ['name' => 'Cambamba', 'municipio_id' => 163],
            ['name' => 'Vista Alegre', 'municipio_id' => 163],
        ];
//Quitexe  Aldeia Viçosa Cambamba Vista Alegre
        DB::table('distritos')->insert(array_merge(
            $distritos_Alto_Zambeze,
            $distritos_Bundas,
            $distritos_Camanongue,
            $distritos_Cameia,
            $distritos_Leua,
            $distritos_Luacano,
            $distritos_Luau,
            $distritos_Luchazes,
            $distritos_Moxico,
            $distritos_Bibala,
            $distritos_Camucuio,
            $distritos_Mocamedes,
            $distritos_Tombwa,
            $distritos_Virei,
            $distritos_Alto_Cauale,
            $distritos_uige,
            $distritos_Amboin,
            $distritos_sanza,
            $distritos_Ambuila,
            $distritos_Bembe,
            $distritos_Buengas,
            $distritos_Bungo,
            $distritos_Maquela,
            $distritos_Damba,
            $distritos_Milunga,
            $distritos_Mucaba,
            $distritos_negage,
            $distritos_puri,
            $distritos_Quimbele,
            $distritos_sanza,
            $distritos_songo,
            $distritos_Quitexe,
            $distritos_Cuimba,
            $distritos_Mbanza,
            $distritos_Noqui,
            $distritos_Nzeto,
            $distritos_Soyo,
            $distritos_Tomboco,
            $distritos_Quitexe

            
            
        ));

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


}
}
