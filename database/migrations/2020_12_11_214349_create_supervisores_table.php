<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupervisoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supervisores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres', 45);
            $table->string('apellidos', 45);
            $table->string('dni', 8);
            $table->string('numcuenta', 45)->nullable();
            $table->string('cci', 45)->nullable();
            $table->string('banco', 45)->nullable();
            $table->integer('usuario_id')->unsigned();   
            $table->foreign('usuario_id')->references('id')->on('users');
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
        Schema::dropIfExists('supervisores');
    }
}
