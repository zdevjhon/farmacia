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
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->dateTime('com_fecha');
            $table->string('com_tipo_pago', 2);
            $table->string('com_medio_pago', 2);
            $table->decimal('com_importe', 8, 2);
            $table->string('com_estado', 2);

            $table->unsignedBigInteger('proveedor_id'); 
            $table->foreign('proveedor_id')->references('id')->on('proveedors');

            $table->unsignedBigInteger('user_id'); 
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('compras');
    }
};
