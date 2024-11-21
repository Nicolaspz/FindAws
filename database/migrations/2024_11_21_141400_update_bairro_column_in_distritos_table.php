<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('distritos', function (Blueprint $table) {
            // Torna a coluna bairro opcional
            $table->string('bairro')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('distritos', function (Blueprint $table) {
            // Reverte para obrigatório
            $table->string('bairro')->nullable(false)->change();
        });
    }
};
