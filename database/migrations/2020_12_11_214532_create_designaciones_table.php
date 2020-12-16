<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesignacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('designaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('supervisores_id')->unsigned();
            $table->foreign('supervisores_id')->references('id')->on('supervisores');
            $table->integer('ingenios_id')->unsigned();
            $table->foreign('ingenios_id')->references('id')->on('ingenios');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
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
        Schema::dropIfExists('designaciones');
    }
}
