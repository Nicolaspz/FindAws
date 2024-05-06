<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::table('properties', function (Blueprint $table) {
            $table->renameColumn('business_id', 'busines_id');
            $table->renameColumn('typology_id', 'tipologies_id');
            $table->renameColumn('type_id', 'property_types_id');
            $table->renameColumn('condition_id', 'conditions_id');
            $table->renameColumn('tipe_energy', 'tipe_energies_id');
            $table->renameColumn('distrito_id', 'distritos_id');
            $table->renameColumn('municipio_id', 'municipios_id');
            $table->renameColumn('provincia_id', 'provinces_id');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->renameColumn('busines_id', 'business_id');
        });
    }
};
