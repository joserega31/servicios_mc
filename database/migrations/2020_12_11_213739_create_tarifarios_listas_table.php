<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTarifariosListasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarifarios_listas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lineas_producto_id')->unsigned();
            $table->foreign('lineas_producto_id')->references('id')->on('lineas_productos');
            $table->integer('tarifario_id')->unsigned();
            $table->foreign('tarifario_id')->references('id')->on('tarifarios');
            $table->double('precio');
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
        Schema::dropIfExists('tarifarios_listas');
    }
}
