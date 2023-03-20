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
        Schema::create('compra_producto', function (Blueprint $table) {
            $table->id();
            $table->string('cp_cantidad');
            $table->decimal('cp_precio', 8, 2);

            $table->unsignedBigInteger('producto_id'); 
            $table->foreign('producto_id')->references('id')->on('productos');

            $table->unsignedBigInteger('compra_id'); 
            $table->foreign('compra_id')->references('id')->on('compras');

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
        Schema::dropIfExists('compra_producto');
    }
};
