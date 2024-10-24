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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('id_usuario');
            $table->string("nombre", 255);
            $table->string("apellido", 255);
            $table->string("email", 500);
            $table->string("telefono", 30);
            $table->string("rol")->comment("1=admin|2=recepcionista|3=cliente")->default("1");
            $table->date("fecha_registro");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
