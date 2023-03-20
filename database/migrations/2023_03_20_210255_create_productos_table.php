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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('prod_codigo');
            $table->string('prod_nombre');
            $table->text('prod_descripcion')->nullable();
            $table->string('prod_laboratorio')->nullable();
            $table->decimal('prod_precio_compra', 8, 2)->default(0);
            $table->decimal('prod_precio_venta', 8, 2)->default(0);
            $table->integer('prod_stock')->default(0);
            $table->integer('prod_stock_min');
            $table->date('prod_fecha_vencimiento')->nullable();
            $table->date('prod_fecha_registro');
            $table->string('prod_estado', 2);

            $table->unsignedBigInteger('categoria_id'); 
            $table->foreign('categoria_id')->references('id')->on('categorias');

            $table->unsignedBigInteger('unidad_id'); 
            $table->foreign('unidad_id')->references('id')->on('unidads');

            $table->unsignedBigInteger('user_id'); 
            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamps();
        });

        Schema::table('kardexes', function (Blueprint $table) {
            $table->unsignedBigInteger('producto_id')->nullable()->after('id');
            $table->foreign('producto_id')->references('id')->on('productos')
                ->onUpdate('cascade')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kardexes', function (Blueprint $table) {
            $table->dropForeign('kardexes_producto_id_foreign');
            $table->dropColumn('producto_id');
        });

        Schema::dropIfExists('productos');
    }
};
