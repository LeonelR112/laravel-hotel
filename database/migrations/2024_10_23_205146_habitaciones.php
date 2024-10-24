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
        Schema::create('habitaciones', function (Blueprint $table) {
            $table->id('id_hab');
            $table->integer("nro_habitacion");
            $table->string("tipo_habitacion")->comment("individual|doble|suite");
            $table->float("precio");
            $table->boolean("disponible");
            $table->text("descripcion");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('habitaciones');
    }
};
