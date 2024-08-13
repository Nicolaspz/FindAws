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
       if (Schema::hasTable('properties')) {
            // Verifica se a coluna não existe antes de adicionar

                Schema::table('properties', function (Blueprint $table) {
                     $table->boolean('fechado')->default(0);
                });

        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('properties', function (Blueprint $table) {

            $table->dropColumn('fechado');

        });
    }
};
