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
        Schema::table('distritos', function (Blueprint $table) {
            // Use o nome correto do índice
            $table->dropUnique('distritos_name_distrito_unique');
        });
    }

    public function down(): void
    {
        Schema::table('distritos', function (Blueprint $table) {
            // Reverte a adição da restrição única
            $table->unique('name', 'distritos_name_distrito_unique');
        });
    }
};
