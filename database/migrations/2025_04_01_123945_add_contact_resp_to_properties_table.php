<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('properties', function (Blueprint $table) {
        $table->string('contact_resp')->nullable(); // Ou use outro tipo de campo conforme a necessidade
    });
}

public function down()
{
    Schema::table('properties', function (Blueprint $table) {
        $table->dropColumn('contact_resp');
    });
}

};
