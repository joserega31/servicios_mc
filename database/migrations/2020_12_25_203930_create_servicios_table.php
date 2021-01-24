<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('empresa_transporte', 255);
            $table->string('conductor', 45);
            $table->string('placa_unidad', 45);
            $table->string('placa_carretera', 45);
            $table->string('guia_transportista', 45);
            $table->string('almacen', 100);
            $table->double('cantidad');
            $table->string('unidad', 5);
            $table->double('costo_unitario_estiba');
            $table->double('costo_operativo_extra_estiba');
            $table->double('costo_flat_estiba');
            $table->double('costo_total_servicio');
            $table->double('costo_extra_estiba');
            $table->double('precio_extra_estiba');
            $table->double('precio_servicio');
            $table->double('precio_total_servicio');
            $table->double('utilidad');
            $table->double('igv');
            $table->string('observaciones', 255);
            $table->integer('lineas_productos_id')->unsigned();   
            $table->foreign('lineas_productos_id')->references('id')->on('lineas_productos');
            $table->integer('ordenes_servicios_id')->unsigned();   
            $table->foreign('ordenes_servicios_id')->references('id')->on('ordenes_servicios');
            $table->integer('tipo_servicio_id')->unsigned();   
            $table->foreign('tipo_servicio_id')->references('id')->on('tipo_servicios');

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
        Schema::dropIfExists('servicios');
    }
}
