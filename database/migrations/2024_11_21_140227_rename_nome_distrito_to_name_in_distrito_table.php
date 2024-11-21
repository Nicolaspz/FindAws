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
            Schema::table('distritos', function (Blueprint $table) {
                $table->renameColumn('name_distrito', 'name');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('distritos', function (Blueprint $table) {
            Schema::table('distritos', function (Blueprint $table) {
                $table->renameColumn('name', 'name_distrito');
            });
        });
    }
};
