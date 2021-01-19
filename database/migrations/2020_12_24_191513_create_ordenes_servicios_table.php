<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenesServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenes_servicios', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha'); 
            $table->integer('cliente_id')->unsigned();   
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->boolean('igv');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordenes_servicios');
    }
}
