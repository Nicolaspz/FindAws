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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('reference')->unique()->nullable();
            $table->unsignedBigInteger('business_id')->nullable();
            $table->unsignedBigInteger('typology_id')->nullable();
            $table->unsignedBigInteger('type_id')->nullable();
            $table->integer('price')->nullable();
            $table->unsignedBigInteger('condition_id')->nullable();
            $table->unsignedBigInteger('tipe_energy')->nullable();
            $table->decimal('lng', 12, 9)->nullable();
            $table->decimal('lat', 12, 9)->nullable();
            $table->string('title')->nullable();
            $table->text('abstract')->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('distrito_id')->nullable(); // Distrito
            $table->unsignedBigInteger('municipio_id')->nullable(); // Conselho
            $table->unsignedBigInteger('provincia_id')->nullable(); // Freguesia
            $table->string('cidade')->nullable();
            $table->integer('area')->nullable();
            $table->integer('ano_construcao')->nullable();
            $table->integer('quarto')->nullable();
            $table->integer('banheiro')->nullable();
            $table->boolean('ar_condicionado')->default(0);
            $table->boolean('roupeiro_imbutido')->default(0);
            $table->boolean('elevator')->default(0);
            $table->integer('park')->nullable();
            $table->boolean('jardin')->default(0);
            $table->boolean('piscina')->default(0);
            $table->boolean('terraco')->default(0);
            $table->boolean('dispensa')->default(0);
            $table->boolean('propiedade_acessivel')->default(0);
            $table->boolean('reservedo')->default(0);
            $table->boolean('negociavel')->default(0);
            $table->date('visible_until')->format('Y-m-d')->nullable();
            $table->boolean('publish')->default(0);
            $table->integer('order')->nullable();
            $table->boolean('destaque')->default(0);
            $table->string('technical_details_img')->nullable();
            $table->string('the_project')->nullable();
            $table->string('the_renders')->nullable();
            $table->string('movie')->nullable();
            //estrangeiras
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('business_id')->references('id')->on('businesses')->onDelete('set null');
            $table->foreign('typology_id')->references('id')->on('tipologies')->onDelete('set null');
            $table->foreign('type_id')->references('id')->on('property_types')->onDelete('set null');
            $table->foreign('condition_id')->references('id')->on('conditions')->onDelete('set null');
            $table->foreign('tipe_energy')->references('id')->on('tipe_energies')->onDelete('set null');
            $table->foreign('distrito_id')->references('id')->on('distritos')->onDelete('set null');
            $table->foreign('municipio_id')->references('id')->on('municipios')->onDelete('set null');
            $table->foreign('provincia_id')->references('id')->on('provinces')->onDelete('set null');
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
