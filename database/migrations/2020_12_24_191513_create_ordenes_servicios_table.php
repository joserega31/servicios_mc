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
            $table->integer('estatus');
            $table->boolean('igv');
            $table->date('fecha_pago')->nullable();
            $table->date('fecha_liquidacion')->nullable();
            $table->date('fecha_factura')->nullable();
            $table->string('num_factura', 10)->nullable();
            $table->double('monto_factura')->nullable();
            $table->integer('estados_pago_id')->unsigned();   
            $table->foreign('estados_pago_id')->references('id')->on('estados_pagos');
            $table->integer('modos_pagos_id')->unsigned(); 
            $table->foreign('modos_pagos_id')->references('id')->on('modo_pagos');
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
        Schema::dropIfExists('ordenes_servicios');
    }
}
