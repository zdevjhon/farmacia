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
        Schema::create('producto_venta', function (Blueprint $table) {
            $table->id();
            $table->string('pv_cantidad');
            $table->decimal('pv_precio', 8, 2);

            $table->unsignedBigInteger('producto_id'); 
            $table->foreign('producto_id')->references('id')->on('productos');

            $table->unsignedBigInteger('venta_id'); 
            $table->foreign('venta_id')->references('id')->on('ventas');

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
        Schema::dropIfExists('producto_venta');
    }
};
