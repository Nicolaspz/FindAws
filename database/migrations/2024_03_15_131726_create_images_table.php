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
        Schema::create('images', function (Blueprint $table) {
            $table->id();$table->unsignedBigInteger('property_id')->nullable();
            $table->string('url', 100)->unique();
            $table->string('title', 100)->nullable();
            $table->integer('type')->default(0); // 0 = 'visão geral', 1 = 'interior', 2 = 'exterior'
            $table->integer('order')->default(999);
            $table->timestamps();
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
