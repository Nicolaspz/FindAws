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
        Schema::table('users', function (Blueprint $table) {
            // Remover profile_id
            $table->dropForeign(['profile_id']);
            $table->dropColumn('profile_id');

            // Adicionar role
            $table->string('role')->default('user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Recriar profile_id
            $table->unsignedBigInteger('profile_id')->default(5);
            $table->foreign('profile_id')->references('id')->on('perfils')->onDelete('cascade');

            // Remover role
            $table->dropColumn('role');
        });
    }
};
