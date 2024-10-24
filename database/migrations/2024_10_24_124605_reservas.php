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
        Schema::create('reservas', function (Blueprint $table) {
            $table->id('id_reserva');
            $table->integer("id_usuario");
            $table->integer("id_hab");
            $table->dateTime("fecha_check_in");
            $table->dateTime("fecha_check_out");
            $table->string("estado_reserva")->comment("confirmada|cancelada|completada");
            $table->date("fecha_reserva");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
