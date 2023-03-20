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
        Schema::create('modulo_user', function (Blueprint $table) {
            $table->id();
            $table->string('um_permisos');

            $table->unsignedBigInteger('user_id'); 
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('modulo_id'); 
            $table->foreign('modulo_id')->references('id')->on('modulos');

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
        Schema::dropIfExists('modulo_user');
    }
};
