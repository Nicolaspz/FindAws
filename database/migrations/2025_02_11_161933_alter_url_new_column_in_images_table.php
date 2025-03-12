<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() {
        // Passo 1: Criar uma nova coluna temporária como JSON
        Schema::table('images', function (Blueprint $table) {
            $table->json('url_new')->nullable();
        });

        // Passo 2: Converter os valores antigos (string) para JSON
        DB::table('images')->get()->each(function ($image) {
            if (!empty($image->url)) {
                DB::table('images')
                    ->where('id', $image->id)
                    ->update(['url_new' => json_encode([$image->url])]); // Converte para array JSON
            }
        });

        // Passo 3: Remover a coluna antiga e renomear a nova
        Schema::table('images', function (Blueprint $table) {
            $table->dropColumn('url');
            $table->renameColumn('url_new', 'url');
        });
    }

    public function down() {
        Schema::table('images', function (Blueprint $table) {
            $table->string('url')->change();
        });
    }
};