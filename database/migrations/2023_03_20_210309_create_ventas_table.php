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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->string('ven_tipo_documento');
            $table->string('ven_numero_documento');
            $table->dateTime('ven_fecha');
            $table->string('ven_tipo_pago', 2);
            $table->decimal('ven_importe', 8, 2);
            $table->string('ven_estado', 2);

            $table->unsignedBigInteger('cliente_id'); 
            $table->foreign('cliente_id')->references('id')->on('clientes');

            $table->unsignedBigInteger('user_id');             
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('serie_id'); 
            $table->foreign('serie_id')->references('id')->on('series');

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
        Schema::dropIfExists('ventas');
    }
};
