<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('cli_nombres')->nullable();
            $table->string('cli_apellidos')->nullable();
            $table->string('cli_telefono')->nullable();
            $table->string('cli_dni')->nullable();
            $table->string('cli_correo')->nullable();
            $table->string('cli_direccion')->nullable();
            $table->date('cli_fecha_nacimiento')->nullable();
            $table->string('cli_esatdo', 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
};
